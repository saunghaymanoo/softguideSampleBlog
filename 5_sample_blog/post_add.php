<?php require_once "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php
                if (isset($_POST['addBtn'])) {
                    $file = postAdd();
                    print_r($file);
                }

                ?>
                
<form method="post" enctype="multipart/form-data" class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle text-primary"></i> Add Post
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
              
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input type="text" name="title" class="form-control" required />
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" id="" class="custom-select">
                            <?php
                            foreach (categories() as $c) {
                            ?>
                                <option value="<?php echo $c['id'] ?>"><?php echo $c['title'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                       
                    </div> -->
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="upload" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea type="text" name="description" class="form-control" id="description" rows="15" required></textarea>
                    </div>
                   

            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle text-primary"></i> Add Category
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <?php
                        foreach (categories() as $c) {
                        ?>
                            <div class="custom-control custom-radio">
                                <input type="radio" value="<?php echo $c['id'] ?>" id="customRadio<?php echo $c['id'] ?>" name="category_id" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio<?php echo $c['id'] ?>"><?php echo $c['title'] ?></label>
                            </div>
                           
                        <?php
                        }
                        ?>
                    </div>
                    <hr>
                    <button name="addBtn" class="btn btn-primary">Add Post</button>

                
            </div>
        </div>
    </div>
</form>

<?php include "template/footer.php"; ?>
<script>
    $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 300,
        
    });
</script>