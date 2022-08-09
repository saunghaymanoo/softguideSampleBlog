<table class="table table-hover mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>User</th>
            <th>Control</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (categories() as $key => $c) {
            $userName = user($c['user_id']);
            $time = showTime($c['created_at'], 'd-M-Y h:i');
        ?>
            <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $c['title']; ?></td>
                <td><?php echo $userName['name']; ?></td>
                <td>
                    <a href="category_delete.php?id=<?php echo $c['id']; ?>"
                    onclick="return confirm('Are you sure to delete.')"
                    class="btn btn-outline-danger btn-sm">
                        <i class="feather-trash-2"></i>
                    </a>
                    <a href="category_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                        <i class="feather-edit-2 fa-fw"></i>
                    </a>
                </td>
                <td><?php echo $time; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>