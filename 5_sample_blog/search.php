<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
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
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <?php
                    $result = postSearch($_POST['searchKey']);
                    if(count($result) == 0){
                       
                        echo alert("There is no data .","warning");
                    }else{
                ?>
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
                        foreach (postSearch($_POST['searchKey']) as $key => $c) {
                            $userName = user($c['user_id']);
                            $time = showTime($c['created_at'], 'd-M-Y h:i');
                        ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td class="nowrap"><?php echo short($c['title']); ?></td>
                                <td class="nowrap"><?php echo short($c['description'], 50); ?></td>
                                <td><?php echo category($c['category_id'])['title']; ?></td>
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
                    <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>