<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/category_list.php">Category List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i> Add Category
                    </h4>
                    <a href="<?php echo $url; ?>/category_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <?php
                    $id = $_GET['id'];
                    $current = category($id);

                    if (isset($_POST['updateBtn'])) {
                       
                        if(categoryUpdate()){
                            linkto('category_add.php');
                        }
                    }


                ?>
                <form action="#" method="post">
                    <div class="form-inline">
                        <input type="hidden" value="<?php echo $current['id']; ?>" name="id">
                        <input value="<?php echo $current['title']; ?>" type="text" name="title" class="form-control mr-2" required />
                        <button name="updateBtn" class="btn btn-primary">Update</button>
                    </div>
                </form>

              <?php 
                include "category_list.php";
              ?>

            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>