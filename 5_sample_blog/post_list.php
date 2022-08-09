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

                <table class="table table-hover table-bordered mt-3">
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
                            <th>Control</th>
                            <th>Created</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (posts() as $key => $c) {
                            $userName = user($c['user_id']);
                            $time = showTime($c['created_at'], 'd-M-Y h:i');
                        ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td class="nowrap"><?php echo short($c['title']); ?></td>
                                <td class="nowrap"><?php echo short(strip_tags(html_entity_decode($c['description'])),60); ?></td>
                                <td><?php echo $c['ctitle']; ?></td>
                                <?php
                                if ($_SESSION['user']['role'] != 2) {
                                ?>
                                    <td><?php echo $userName['name']; ?></td>
                                <?php
                                }
                                ?>
                                <td class="nowrap">
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>" onclick="return confirm('Are you sure to delete.')" class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2"></i>
                                    </a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>
                                </td>
                                <td class="nowrap"><?php echo $time; ?></td>
                                <td class=""><img src="<?php echo $c['image'] ?>" alt="" class="img" style="width:20px;height:20px;"></td>
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

            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $(".table").dataTable({
        // "order" : [[0,"desc"]]
    });
</script>