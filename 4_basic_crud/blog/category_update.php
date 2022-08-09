<?php include "template/header.php";?>
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>/category_list.php">Category List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Item</li>
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
                                    <i class="feather-plus-circle text-primary"></i> Add Category
                                </h4>
                                <a href="<?php echo $url; ?>/category_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                            <?php
                                $row=categoryShow($_GET['id']);
                                categoryUpdate();
                               

                            ?>
                            <form action="" method="get">
                                <div class="form-inline">
                                     <input type="hidden" value="<?php echo $row['id']; ?>" name="id" class="form-control mr-2"/>
                                    
                                    <input type="text" value="<?php echo $row['message']; ?>" name="message" class="form-control mr-2" required/>
                                    <button name="updateBtn" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>

<?php include "template/footer.php";?>