<?php
require_once "function.php";
?>
<div class="card-columns">

    <?php
    $sql = "SELECT * FROM contacts ORDER BY id DESC";
    $query = mysqli_query(con(), $sql);
    while ($row = mysqli_fetch_assoc($query)) {
    ?>
        <div class="card contact" data-id="<?php echo $row['id'] ?>">
            <div class="card-body">
                <div class="text-center">

                    <h2><?php echo $row['name']; ?></h2>
                    <p><?php echo $row['phone']; ?></p>
                    <div>
                        <button class="btn btn-outline-danger mr-2 del" data-id="<?php echo $row['id'] ?>">Delete</button>
                        <button class="btn btn-outline-warning upd" data-id="<?php echo $row['id'] ?>">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</div>