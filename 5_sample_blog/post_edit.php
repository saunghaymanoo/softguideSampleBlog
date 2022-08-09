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
<div class="row">
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
                <?php
                  $id = $_GET['id'];
                  $current = post($id);

                  if (isset($_POST['updateBtn'])) {
                     
                      if(postUpdate()){
                          linkto('post_list.php');
                      }
                  }

                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="">Post Title</label>
                        <input value="<?php echo $current['title'] ?>" type="text" name="title" class="form-control" required />
                        <input value="<?php echo $current['id'] ?>" type="hidden" name="id" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select name="category_id" id="" class="custom-select">
                            <?php
                                foreach (categories() as $c){
                            ?>
                                <option value="<?php echo $c['id'] ?>" <?php echo $c['id']==$current['category_id']?"selected":"" ?>><?php echo $c['title'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea type="text" name="description" class="form-control" rows="15" required><?php echo $current['description']; ?></textarea>
                    </div>
                    <hr>
                    <button name="updateBtn" class="btn btn-primary">Update Post</button>
                    
                </form>

            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>