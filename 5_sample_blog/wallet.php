<?php require_once "core/auth.php"; ?>

<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
            </ol>
        </nav>
    </div>
</div>
<?php
                if (isset($_POST['payBtn'])) {
                    if(payNow()){
                        linkto("wallet.php");
                    }
                }


                ?>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-dollar-sign text-primary"></i>My Wallet
                    </h4>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="feather-users"></i>Your Money <?php echo $_SESSION['user']['money']; ?>
                    </a>
                </div>
                <hr>
              
                <form action="#" method="post">
                    <div class="form-inline">
                        <select name="to_user" class="form-control mr-2 custom-select" required>
                            <option value="" selected disabled>Select User</option>
                            <?php
                            foreach (users() as $user) {
                                if ($user['id'] != $_SESSION['user']['id']) {
                            ?>
                                 
                                    <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <input type="number" placeholder="Amount" max="<?php echo $_SESSION['user']['money']; ?>" name="amount" class="form-control mr-2" required />
                        <input type="text" placeholder="for what" name="description" class="form-control mr-2" required />
                        <button name="payBtn" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
                <table class="table table-striped table-hover">
                        <thead>
                            <th>#</th>
                            <th>From User</th>
                            <th>To User</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach(transitions() as $key => $t){
                                    
                            ?>
                                <tr>
                                    <td><?php echo $key; ?></td>
                                    <td><?php echo user($t['from_user'])['name']; ?></td>
                                    <td><?php echo user($t['to_user'])['name']; ?></td>
                                    <td><?php echo $t['amount']; ?></td>
                                    <td><?php echo $t['description']; ?></td>
                                    <td><?php echo date('d-m-Y g:i',strtotime($t['created_at'])); ?></td>
                                </tr>
                            <?php
                               
                                }
                            ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>