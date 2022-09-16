<?php require_once "core/auth.php"; ?>
<?php require_once "core/functions.php"; ?>
<?php
$id = $_GET['id'];
$sql = "SELECT posts.*,COUNT(posts.id) AS LikesCount FROM posts INNER JOIN post_likes ON posts.id=post_likes.post_id WHERE post_likes.post_id=$id";
$row = fetch($sql);
?>
<div class="my-3">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-0">
            <i class="feather-info text-primary"></i> Post Detail
        </h4>
        <a href="<?php echo $url; ?>/item_list.php" class="btn btn-outline-primary">
            <i class="feather-list"></i>
        </a>
    </div>
    <div class="">
        <i class="feather-user text-primary"></i>
        <span class="text-black-50"><?php echo user($id)['name'] ?></span>
        <i class="feather-layers text-primary"></i>
        <span class="text-black-50"><?php echo category($id)['title'] ?></span>
        <i class="feather-calendar text-primary"></i>
        <span class="text-black-50"><?php echo date('j F Y',strtotime($row['created_at'])) ?></span>
    </div>
    <hr>
    <div class="">
        <h4>Post Title</h4>
        <p><?php echo $row['title'] ?></p>
    </div>
    <div class="my-3">
        <h4>Category</h4>
        <p><?php echo category($row['category_id'])['title']; ?></p>
    </div>
    <div class="d-flex">
        <div class="my-3 mr-5">
            <img src="<?= $row['image'] ?>" alt="" style="width:200px;height:200px;">
        </div>
        <div class="my-3">
            <h5>Post Description</h5>
            <p name="description" class=""><?php echo strip_tags(html_entity_decode($row['description'])); ?></p>
        </div>
    </div>
    <div class="my-3">
        <?php
        $sql = "SELECT posts.*,COUNT(posts.id) AS LikesCount FROM posts INNER JOIN post_likes ON posts.id=post_likes.post_id WHERE post_likes.post_id=$id";
        $row = fetch($sql);
        ?>
        <i class="feather-heart fa-fw text-danger"></i>
        <span id="like-count" class="ml-2 text-danger font-weight-bold"><?php echo $row['LikesCount'] ?></span>
    </div>

    <?php
    if (countTotal('comments', "post_id=$id") != 0) {
        $currentUser = $_SESSION['user']['id'];
        foreach (comments("post_id=$id") as $c) {
            if ($currentUser == $c['user_id']) {
    ?>
                <h6><?php echo user($c['user_id'])['name']; ?></h6>
                <div class="p-2 border border-1 rounded d-flex justify-content-between">

                    <!-- <input type="hidden" name="commentId" value="<?php echo $c['id']; ?>"> -->
                    <div class="" name="updComment"><?php echo $c['comment']; ?></div>
                    <a class="text-danger text-decoration-none delCommentBtn" comment-id="<?php echo $c['id']; ?>"><i class="feather feather-trash-2 fa-fw"></i></a>
                </div>
            <?php
            } else {
            ?>
                <h6><?php echo user($c['user_id'])['name']; ?></h6>

                <div class="p-2 border border-1 rounded d-flex justify-content-between">
                    <div class="" name="updComment"><?php echo $c['comment']; ?></div>
                    <a class="text-danger text-decoration-none delCommentBtn" comment-id="<?php echo $c['id']; ?>"><i class="feather feather-trash-2 fa-fw"></i></a>
                </div>
    <?php
            }
        }
    }
    ?>

</div>