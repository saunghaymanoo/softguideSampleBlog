<?php
    require_once "conn.php";
    function categoryList(){
        global $conn;
        $sql = "SELECT * FROM to_do";
        $query=mysqli_query($conn,$sql);
        $total_row=mysqli_num_rows($query);
        $rows=[];
        while($row=mysqli_fetch_assoc($query)){
            array_push($rows,$row);
        }
        return $rows;
    }
    function categoryCreate(){
        global $conn;
        if(isset($_GET['addBtn'])){
                                
            $message=$_GET['message'];
            $query="INSERT INTO to_do(message) VALUES ('$message')";
            
            if(mysqli_query($conn,$query)){
               
                echo "<script> location.href='category_list.php' </script>";
            }else{
                echo "Query Fail". mysqli_error($conn);
            }
            }

    }
    function categoryDelete(){
        global $conn;
        $id=$_GET['id'];
        $sql="DELETE FROM to_do WHERE id=$id";
        if(mysqli_query($conn,$sql)){
            echo "<script>location.href='category_list.php'</script>";
        }else{
            echo "Delete Fail:".mysqli_error($conn);
        }
    }
    function categoryUpdate(){
        global $conn;
        if(isset($_GET['updateBtn'])){
            $message=$_GET['message'];
            $id=$_GET['id'];
            $sql = "UPDATE to_do SET message= '$message' WHERE id=$id";
            
            if(mysqli_query($conn,$sql)){
               echo "<script>location.href='category_list.php'</script>";
            }else{
                echo "Update Fail:".mysqli_error($conn);
            }
        }
    }
    function categoryShow($id){
        global $conn;
        $id = $_GET['id'];
        $sql="SELECT * FROM to_do WHERE id=$id";
        $query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($query);
        return $row;                      
    }
?>