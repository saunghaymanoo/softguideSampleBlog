<?php require_once "core/auth.php"; ?>
<?php require_once "core/isAdim.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                        <i class="feather-users text-primary"></i> User List
                    </h4>
                   
                </div>
                <hr>
               
                <table class="table table-hover mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (users() as $key => $c) {
                            
                            $time = showTime($c['created_at'], 'd-M-Y h:i');
                        ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $c['name']; ?></td>
                                <td><?php echo $c['email']; ?></td>
                                <td><?php echo $role[$c['role']]; ?></td>
                                <td>
                                    <a href="user_delete.php?id=<?php echo $c['id']; ?>"
                                     onclick="return confirm('Are you sure to delete.')"
                                     class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2"></i>
                                    </a>
                                    <a href="user_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>
                                </td>
                                <td><?php echo $time; ?></td>
                            </tr>
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
        "order" : [[0,"desc"]]
    });
</script>