<?php require_once "core/base.php"; ?>
<?php require_once "function.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="form-row col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Register Form</h4>
                    <hr>
                    <?php
                       if(isset($_POST['addBtn'])){
                        echo register();
                       }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" id="" value="<?php echo oldName('name'); ?>" >
                            <?php
                                if(getError('name')){
                            ?>
                                    <small class="text-danger"><?php echo getError('name'); ?></small>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" id="" value="<?php echo oldName('email'); ?>" >
                            <?php
                                if(getError('email')){
                            ?>
                                    <small class="text-danger"><?php echo getError('email'); ?></small>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" value="<?php echo oldName('phone'); ?>" >
                            <?php
                                if(getError('phone')){
                            ?>
                                    <small class="text-danger"><?php echo getError('phone'); ?></small>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <?php
                            foreach($gender as $key => $g){
                            ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="gender" id="gender<?php echo $key ?>">
                                    <label for=""></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <hr>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" name="agree" type="checkbox" value="" id="flexCheckDefault" >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Agree
                                </label>
                            </div>
                            <button class="btn btn-primary" name="addBtn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        clearError();
    ?>
</body>

</html>