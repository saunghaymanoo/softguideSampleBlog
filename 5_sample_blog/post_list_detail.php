<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php
    $id = $_GET['id'];
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post List</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                    echo post($id)['title'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-6">
        <div class="card mb-4">
            <div class="card-body">
                <!-- <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle text-primary"></i> Add Post
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr> -->
                <?php
                $id = $_GET['id'];
                $current = post($id);

                // if (isset($_POST['updateBtn'])) {

                //     if (postUpdate()) {
                //         linkto('post_list.php');
                //     }
                // }

                ?>
               
                   <div class="page">

                   </div>

                    <form action="comment.php" id="commentForm" method="post" enctype="multipart/form-data">                  
                   
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="hidden" name="id" value="<?php echo $id;?>">

                            <textarea class="form-control" name="comment" id="commentText" rows="2 "></textarea>
                        </div>
                   

                    <hr>
                    <button name="commentBtn" class="btn btn-primary">Comment</button>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    function showDetailList(){
        
        let id = <?php echo $id = $_GET['id']; ?>;
        $.get('post_like_detail_list.php?id='+id,function(data){
            $(".page").html(data);
        })
    }
    showDetailList();

    $("#commentForm").on("submit", function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        console.log(data);
        $.post($(this).attr('action'), data, function(data) {
            console.log(data);
            if ($.trim(data) == 'success') {
                $("#commentText").val('');
                showDetailList();
            }
        })

    })
    $(".page").delegate(".delCommentBtn","click",function(){
        let currentId = $(this).attr("comment-id");
        $.get("comment_delete.php?id="+currentId,function(data){
            
            if ($.trim(data) == 'success') {
                showDetailList();
                // location.href='post_like_list.php';
            }
        })
    })
  
    $('.example-class').tab();
</script>