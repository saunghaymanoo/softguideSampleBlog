<?php
require_once "function.php";
?>
<table class="table table-hover table-striped">
    <thead>
        <th>#</th>
        <th>name</th>
        <th>phone</th>
        <th>control</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM contacts ORDER BY id DESC";
        $query = mysqli_query(con(), $sql);
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <tr class="contact" data-id="<?php echo $row['id'] ?>">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td>
                    <button class="btn btn-outline-danger mr-2 del" data-id="<?php echo $row['id'] ?>">Delete</button>
                    <button class="btn btn-outline-warning upd" data-id="<?php echo $row['id'] ?>">Edit</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>