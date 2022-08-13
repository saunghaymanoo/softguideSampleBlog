<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-list text-primary"></i> Post List
                    </h4>
                    <a href="<?php echo $url; ?>/post_add.php" class="btn btn-outline-primary">
                        <i class="feather-plus-circle"></i>
                    </a>
                </div>
                <hr>

                <table class="table table-hover table-bordered mt-3" id="like-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php
                            if ($_SESSION['user']['role'] != 2) {
                            ?>
                                <th>User</th>
                            <?php
                            }
                            ?>
                            <th>Like</th>
                            <th>Comment</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (postList() as $key => $c) {
                            $currentUser = $_SESSION['user']['id'];
                            // echo $currentUser;
                            $userName = user($c['user_id']);
                            $time = showTime($c['created_at'], 'd-M-Y h:i');
                        ?>
                            <tr class="like-detail" like-detail-id="<?php echo $c['id']; ?>">
                                <td><?php echo $key + 1; ?></td>
                                <td class="nowrap"><?php echo short($c['title']); ?></td>
                                <td class="nowrap"><?php echo short(strip_tags(html_entity_decode($c['description'])), 60); ?></td>
                                <td><?php echo category($c['category_id'])['title']; ?></td>
                                <?php
                                if ($_SESSION['user']['role'] != 2) {
                                ?>
                                    <td><?php echo $userName['name']; ?></td>
                                <?php
                                }
                                ?>
                                <td class="nowrap">

                                    <?php
                                    if (countTotal('post_likes') != 0) {
                                        $isData = true;
                                        foreach (postLikeList() as $key => $p) {

                                            if ($c['id'] == $p['post_id']) {
                                                if ($p['user_id'] == $currentUser && $p['status'] == 1) {

                                                    $isData = true;
                                                    break;
                                                } else {

                                                    $isData = false;
                                                }
                                            } else {
                                                $isData = false;
                                            }
                                        }
                                        // foreach end
                                        if (!$isData) {
                                    ?>
                                            <button id="likeBtn<?php echo $c['id']; ?>" class="likeBtn btn btn-outline-info btn-sm" post-id="<?php echo $c['id']; ?>">
                                                <i id="like-emoji<?php echo $c['id']; ?>" class="like-emoji feather-thumbs-up fa-fw"></i>
                                            </button>

                                        <?php
                                        } else {
                                        ?>
                                            <button id="likeBtn<?php echo $c['id']; ?>" class="likeBtn btn btn-info btn-sm" post-id="<?php echo $c['id']; ?>">
                                                <i id="like-emoji<?php echo $c['id']; ?>" class="like-emoji feather-thumbs-up fa-fw"></i>
                                            </button>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <button id="likeBtn<?php echo $c['id']; ?>" class="likeBtn btn btn-outline-info btn-sm" post-id="<?php echo $c['id']; ?>">
                                            <i id="like-emoji<?php echo $c['id']; ?>" class="like-emoji feather-thumbs-up fa-fw"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>



                                    <span id="post-count<?php echo $c['id']; ?>"><?php echo countTotal('post_likes', "status='1' AND post_id={$c['id']}"); ?></span>
                                </td>
                                <td>
                                    <a href="post_list_detail.php?id=<?php echo $c['id']; ?>" class="commentBtn btn btn-outline-info btn-sm" post-id="<?php echo $c['id']; ?>">
                                        <i class="feather-message-square fa-fw mr-1"></i>comment
                                    </a>
                                    <a href="comment_show.php?id=<?php echo $c['id']; ?>" class="mr-2 text-decoration-none" post-id="<?php echo $c['id']; ?>">
                                    <span class="badge badge-info badge-pill px-2 py-1"><?php echo countTotal('comments', "post_id={$c['id']}"); ?></span>
                                    </a>
                                </td>
                                <!-- <td class="nowrap">

                                    <?php
                                    if (countTotal('comments') != 0) {
                                        $isData = true;
                                        foreach (comments() as $key => $com) {

                                            if ($c['id'] == $com['post_id']) {
                                                if ($com['user_id'] == $currentUser) {

                                                    $isData = true;
                                                    break;
                                                } else {

                                                    $isData = false;
                                                }
                                            } else {
                                                $isData = false;
                                            }
                                        }
                                        // foreach end
                                        if (!$isData) {
                                    ?>
                                            <div>
                                                <i class="feather-message-square fa-fw text-primary mr-1"></i>
                                                <span class="text-sm text-primary font-weight-bold">No Comment</span>
                                            </div>


                                        <?php
                                        } else {
                                        ?>
                                            <div>
                                                <i class="feather-message-square fa-fw text-primary mr-1"></i>
                                                <span class="text-sm text-primary font-weight-bold"><?php echo $com['comment']; ?></span>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div>
                                            <i class="feather-message-square fa-fw text-primary mr-1"></i>
                                            <span class="text-sm text-primary font-weight-bold">No Comment</span>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </td> -->
                                <td class="">
                                    <img src="<?php echo $c['image'] ?>" alt="" class="img" style="width:20px;height:20px;">
                                </td>
                            </tr>
                            <!-- <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo short($c['title']); ?></td>
                                <td><?php echo short($c['description'], 80); ?></td>
                                <td><?php echo category($c['category_id'])['title']; ?></td>
                                <td><?php echo $userName['name']; ?></td>
                                <td>
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>"
                                     onclick="return confirm('Are you sure to delete.')"
                                     class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2"></i>
                                    </a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>
                                </td>
                                <td><?php echo $time; ?></td>
                            </tr> -->
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal fade modal-dialog modal-dialog-centered" id="likeDetail" tabindex="-1" aria-labelledby="likeDetailLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="likeDetailLabel">Post Like List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div>
                                <p class="likeDetailMessage"></p>
                            </div>
                            <div class="modal-body">

                                <div id="page">
                                    <h2 id="title"></h2>
                                    <p id="description"></p>
                                    <div>
                                        <i class="feather-heart fa-fw text-danger"></i>
                                        <span id="like-count" class="ml-2 text-danger font-weight-bold"></span>
                                    </div>
                                </div>
                                <hr>
                                <form action="comment.php" method="post" id="commentForm">
                                    <div class="form-row">
                                        <div class="col-12 col-md-6">
                                            <label for="">Comment</label>
                                            <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
                                            <input type="hidden" id="likeDetailId" name="id">
                                        </div>

                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $('.table').delegate('.likeBtn', "click", function() {
        let id = $(this).attr('post-id');
        console.log(id)

        if ($("#likeBtn" + id).hasClass('btn-outline-info')) {
            // console.log($("#like-emoji" + id));
            $.get('post_like.php?id=' + id, function(res) {
                if ($.trim(res)) {
                    $("#likeBtn" + id).removeClass('btn-outline-info');
                    $("#likeBtn" + id).addClass('btn-info');
                    $("#post-count" + id).html(res);
                } else {
                    $("#like-emoji" + id).removeClass('btn-info');
                    $("#like-emoji" + id).addClass('btn-outline-info');
                }
            })
        } else {

            $.get('post_like_update.php?id=' + id, function(data) {
                console.log(data);
                if ($.trim(data)) {                    
                    $("#likeBtn" + id).removeClass('btn-info');
                    $("#likeBtn" + id).addClass('btn-outline-info');
                    $("#post-count" + id).html(data);
                }
            })
        }

    })
    // $("#like-table").delegate(".commentBtn", "click", function() {
    //     let likeDetailId = $(this).attr('like-detail-id');
    //     $.get('post_list_detail.php?id=' + likeDetailId, function(data) {
    //         let detail = JSON.parse(data);

    //         $("#title").html(detail.title);
    //         $("#description").html(detail.description);
    //         $("#like-count").html(detail.LikesCount);
    //         $('#likeDetailId').val(likeDetailId);
    //         $('#likeDetail').modal("show");
    //     })


    // })
    $("#commentForm").on("submit", function(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.post($(this).attr('action'), data, function(data) {
            if ($.trim(data) == 'success') {
                $('#likeDetail').modal("hide");
            }
        })

    })
    $(".table").dataTable({
        // "order" : [[0,"desc"]]
    });
</script>