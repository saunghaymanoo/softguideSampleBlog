<?php
require_once "base.php";
//common start
function alert($data, $color = 'danger')
{
    return "<p class='alert alert-$color'>$data</p>";
}
function runQuery($sql)
{
    if (mysqli_query(con(), $sql)) {
        return true;
    } else {
        alert("DB Error");
    }
}
function redirect($l)
{
    header("location:$l");
}
function linkto($l)
{
    echo "<script>location.href='$l'</script>";
}
function fetch($sql)
{
    $query = mysqli_query(con(), $sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}
function fetchAll($sql)
{
    $query = mysqli_query(con(), $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)) {
        array_push($rows, $row);
    }
    return $rows;
}
function showTime($timestamp, $format = "d-m-y")
{
    return date($format, strtotime($timestamp));
}
function countTotal($table,$condition=1)
{
    $sql = "SELECT COUNT(id) AS COUNTTOTAL FROM $table WHERE $condition";
    $total = fetch($sql);
    return $total['COUNTTOTAL'];
}
function groupCount($table,$countId){
    $sql = "SELECT COUNT($countId) AS COUNTTOTAL FROM $table GROUP BY $countId";
    
    $total = fetch($sql);
    return $total['COUNTTOTAL'];
}
function short($str, $strlength = 50)
{
    return substr($str, 0, $strlength) . "....";
}
function textFilter($text)
{
    $text = trim($text);
    $text = htmlentities($text, ENT_QUOTES);
    $text = stripcslashes($text);
    return $text;
}
//common end

//auth start

function register()
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $spass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$spass')";
        if (runQuery($sql)) {
            redirect('login.php');
        }
    } else {
        return alert("Password & Confirm Password are not match!");
    }
}
function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query(con(), $sql);
    $row = mysqli_fetch_assoc($query);
    if (!$row) {
        return alert("Email or Password does not exit!");
    } else {
        if (!password_verify($password, $row['password'])) {
            return alert("Email or Password does not match!");
        } else {
            // return alert("User info correct",'success');
            // redirect('index.php');
            session_start();
            $_SESSION['user'] = $row;
            redirect('dashboard.php');
        }
    }
}
//auth end
// user start
function user($id)
{
    $sql = "SELECT * FROM users where id=$id";
    return fetch($sql);
}
function users()
{
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}
// user end
//category start

function categoryAdd()
{
    $title = $_POST['title'];
    $user_id = $_SESSION['user']['id'];
    echo $title;
    echo $user_id;
    $sql = "INSERT INTO categories (title,user_id) VALUES ('$title',$user_id)";
    if (runQuery($sql)) {
        linkto('category_add.php');
    }
}
function category($id)
{
    $sql = "SELECT * FROM categories WHERE id=$id";
    return fetch($sql);
}
function categories()
{
    $sql = "SELECT * FROM categories";
    return fetchAll($sql);
}
function categoryDelete($id)
{
    $sql = "DELETE FROM categories WHERE id = $id";
    return runQuery($sql);
}
function categoryUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $sql = "UPDATE categories SET title='$title' WHERE id=$id";

    return runQuery($sql);
}
function isCategory($id){
    if(category($id)){
        return $id;
    }else{
        die("Category is invalid!");
    }
}
//category end

//post start
function postAdd()
{
    global $url;
    $title = textFilter($_POST['title']);
    $description = textFilter($_POST['description']);
    $category_id = isCategory($_POST['category_id']);
    $user_id = $_SESSION['user']['id'];

    $fileName = $_FILES['upload']['name'];
    $tmpName = $_FILES['upload']['tmp_name'];
    $savedir = "store/";
    $newDir = $savedir . uniqid() . $fileName;
    move_uploaded_file($tmpName, $newDir);
    $sql = "INSERT INTO posts (title,description,category_id,user_id,image) VALUES ('$title','$description',$category_id,$user_id,'$newDir')";
    // die($sql);
    if (runQuery($sql)) {
        linkto('post_add.php');
    }
}
function post($id)
{
    $sql = "SELECT * FROM posts WHERE id=$id";
    return fetch($sql);
}
function posts()
{
    if ($_SESSION['user']['role'] == 2) {
        $currentUser = $_SESSION['user']['id'];
        $sql = "SELECT posts.*,categories.title AS ctitle FROM posts INNER JOIN categories ON posts.category_id = categories.id WHERE posts.user_id=$currentUser ORDER BY posts.id DESC";
    } else {
        $sql = "SELECT posts.*,categories.title AS ctitle,categories.user_id,categories.ordering,categories.created_at FROM posts INNER JOIN categories ON posts.category_id = categories.id";
    }
    return fetchAll($sql);
}
function postList()
{
    $sql = "SELECT * from posts";
    return fetchAll($sql);
}
function postLikeList(){
    $sql = "SELECT * FROM post_likes";
    return fetchAll($sql);
}
function postDelete($id)
{
    $sql = "SELECT * FROM posts WHERE id = $id";
    $row = fetch($sql);
    if ($row) {
        unlink($row['image']);
    }
    $sql = "DELETE FROM posts WHERE id = $id";
    return runQuery($sql);
}
function postUpdate()
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = textFilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $oldImage = $_POST['oldImage'];

    $fileName = $_FILES['upload']['name'];
    
    if($fileName){
        $sql = "SELECT * FROM posts WHERE id = $id";
        $row = fetch($sql);
        if ($row) {
            unlink($row['image']);
        }
        $tmpName = $_FILES['upload']['tmp_name'];
        $savedir = "store/";
        $newDir = $savedir . uniqid() . $fileName;
        move_uploaded_file($tmpName, $newDir);
    }else{
        $newDir = $oldImage;
    }
    
    $sql = "UPDATE posts SET title='$title',description='$description',category_id='$category_id',image='$newDir' WHERE id=$id";
    return runQuery($sql);
}

function postSearch($searchKey){
    if ($_SESSION['user']['role'] == 2) {
        $currentUser = $_SESSION['user']['id'];
        $sql = "SELECT * FROM posts WHERE (title LIKE '%$searchKey%' OR description LIKE '%$searchKey%') AND user_id='$currentUser'";

    }else{
        $sql = "SELECT * FROM posts WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%'";
    }
    
    return fetchAll($sql);
}
   //post end

   //comment start
   function comments($condition=1){
    $sql = "SELECT * FROM comments WHERE $condition";
    return fetchAll($sql);
   }
   function comment($id){
    $sql = "SELECT * FROM comments WHERE post_id=$id";
    return fetch($sql);
   }
   //comment end
   //dashboard start
   function dashboardPosts($limit=9999999)
   {
       if ($_SESSION['user']['role'] == 2) {
           $currentUser = $_SESSION['user']['id'];
           $sql = "SELECT posts.*,categories.title AS ctitle FROM posts INNER JOIN categories ON posts.category_id = categories.id WHERE posts.user_id=$currentUser ORDER BY posts.id DESC LIMIT $limit";
       } else {
           $sql = "SELECT posts.*,categories.title AS ctitle,categories.user_id,categories.ordering,categories.created_at FROM posts INNER JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT $limit";
       }
       return fetchAll($sql);
   }
   //dashboard end
   //payment start
   function payNow(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];


    $fromUser = user($from);
    if($fromUser['money'] >= $amount){
        $leftAmount = $fromUser['money']-$amount;
        $sql = "UPDATE users SET money=$leftAmount WHERE id=$from";
        mysqli_query(con(),$sql);

        $toUser = user($to);
        $newAmount = $toUser['money']+$amount;
        $sql = "UPDATE users SET money=$newAmount WHERE id=$to";
        mysqli_query(con(),$sql);

        $sql = "INSERT INTO transition (from_user,to_user,amount,description) VALUES ($from,$to,$amount,'$description')";
        runQuery($sql);
    }
   }
   function transition($id){
    $sql = "SELECT * FROM transition WHERE id=$id";
    return fetch($sql);

   }
   function transitions(){
    $userId = $_SESSION['user']['id'];
    if($_SESSION['user']['role'] == 0){
        $sql = "SELECT * FROM transition";
    }else{
        $sql = "SELECT * FROM transition WHERE to_user=$userId OR from_user=$userId";
    }
    return fetchAll($sql);
   }
   //payment end
//api start
   function apiOutput($sql){
    echo json_encode(posts($sql));
   }
//api end

