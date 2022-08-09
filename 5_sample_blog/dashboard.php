<?php require_once "core/auth.php"; ?>

<?php include "template/header.php"; ?>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-shopping-bag h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">123</span>
                        </p>
                        <p class="mb-0 text-black-50">Today Viewers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/user_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('users'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/category_add.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-layers h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('categories'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Categories</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('<?php echo $url; ?>/post_list.php')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-list h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up"><?php echo countTotal('users'); ?></span>
                        </p>
                        <p class="mb-0 text-black-50">Total Posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12 col-xl-7">
        <div class="card overflow-hidden shadow mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Users Or Viewers</h4>
                    <div class="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                    </div>
                </div>

                <canvas id="ov" height="140"></canvas>

            </div>
        </div>
    </div>
    <!-- <div class="col-12 col-md-6 col-xl-5">
                    <div class="card mb-4 item-carousel-card">
                        <div class="card-body">
                            <div id="carouselExampleIndicators" class="carousel item-carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators" style="bottom: -30px">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="bg-secondary active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-secondary"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-secondary"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3" class="bg-secondary"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="item-card">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div class="w-50">

                                                    <h4 class="">Coffee Cup</h4>
                                                    <p class="font-weight-bolder text-black-50 mb-3">500 MMk</p>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar " role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <img src="img/item/item1.png" class="item-card-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="item-card">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div class="w-50">

                                                    <h4 class="">Stick</h4>
                                                    <p class="font-weight-bolder text-black-50 mb-3">1500 MMk</p>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar " role="progressbar" style="width: 65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <img src="img/item/item2.png" class="item-card-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="item-card">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div class="w-50">
                                                    <h4 class="">Book</h4>
                                                    <p class="font-weight-bolder text-black-50 mb-3">520 MMk</p>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar " role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <img src="img/item/item3.png" class="item-card-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="item-card">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div class="w-50">

                                                    <h4 class="">Name Card</h4>
                                                    <p class="font-weight-bolder text-black-50 mb-3">500 MMk</p>
                                                    <div class="progress mb-4">
                                                        <div class="progress-bar " role="progressbar" style="width: 35%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <img src="img/item/item4.png" class="item-card-img" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> -->
    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Categories & Posts</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>
                <canvas id="op" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card overflow-hidden mb-4">

            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Recent Posts</h4>
                    <div class="">
                        <?php
                            $currentUser = $_SESSION['user']['id'];
                            $postTotal = countTotal('posts');
                            $currentUserPosts = countTotal('posts',"user_id=$currentUser");
                            $currentPostPercentage = ($currentUserPosts/$postTotal)*100;
                            
                        ?>
                        <small>Your Posts: <?php echo $currentPostPercentage ?></small>
                        <div class="progress" style="width:350px; height:15px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?php echo floor($currentPostPercentage); ?>%" aria-valuenow="<?php echo "$currentPostPercentage%"; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php
                            if ($_SESSION['user']['role'] != 2) {
                            ?>
                                <th>User</th>
                            <?php
                            }
                            ?>
                            <th>Control</th>
                            <th>Created</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (dashboardPosts(5) as $key => $c) {
                            $userName = user($c['user_id']);
                            $time = showTime($c['created_at'], 'd-M-Y h:i');
                        ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td class="nowrap"><?php echo short($c['title']); ?></td>
                                <td class="nowrap"><?php echo short($c['description'], 50); ?></td>
                                <td><?php echo $c['ctitle']; ?></td>
                                <?php
                                if ($_SESSION['user']['role'] != 2) {
                                ?>
                                    <td><?php echo $userName['name']; ?></td>
                                <?php
                                }
                                ?>
                                <td class="nowrap">
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>" onclick="return confirm('Are you sure to delete.')" class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2"></i>
                                    </a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>
                                </td>
                                <td class="nowrap"><?php echo $time; ?></td>
                                <td class=""><img src="<?php echo $c['image'] ?>" alt="" class="img" style="width:20px;height:20px;"></td>
                            </tr>
                            <!-- <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo short($c['title']); ?></td>
                                <td><?php echo short($c['description'], 80); ?></td>
                                <td><?php echo category($c['category_id'])['title']; ?></td>
                                <td><?php echo $userName['name']; ?></td>
                                <td>
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>"
                                     onclick="return confirm('Are you sure to delete.')"
                                     class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2"></i>
                                    </a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>
                                </td>
                                <td><?php echo $time; ?></td>
                            </tr> -->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php"; ?>
<script src="<?php echo $url; ?>/assets/vendor/way_point/jquery.waypoints.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url; ?>/assets/vendor/chart_js/chart.min.js"></script>
<script>
    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });

    
    <?php
    $dateArr = [];
    $usersCount = [];
    for ($i = 0; $i < 10; $i++) {

        $today = date_create(date("Y-m-d"));
        date_sub($today, date_interval_create_from_date_string("$i days"));
        $date = date_format($today, 'Y-m-d');
        array_push($dateArr, $date);
        $result = countTotal('users', "CAST(created_at AS DATE) = '$date'");
        array_push($usersCount, $result);
    }

    ?>
    let dateArr = <?php  echo json_encode($dateArr); ?>;
    let viewerCountArr = <?php echo json_encode($usersCount); ?>;
    let ov = document.getElementById('ov').getContext('2d');
    let ovChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [
                {
                    label: 'Viewer Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#28a74530',
                    ],
                    borderColor: [
                        '#28a745',
                    ],
                    borderWidth: 1,
                    tension: 0
                },
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false,
                    gridLines: [{
                        display: false
                    }]
                }]
            },
            legend: {
                display: true,
                shape: "circle",
                position: 'top',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        }
    });
    <?php
    $categoryName = [];
    $countPost = [];
    foreach (categories() as $c) {
        array_push($categoryName, $c['title']);
        array_push($countPost, countTotal('posts', "category_id = {$c['id']}"));
    }
    ?>
    let countPost = <?php echo json_encode($countPost); ?>;
    let categoryName = <?php echo json_encode($categoryName); ?>;

    let op = document.getElementById('op').getContext('2d');
    let opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: categoryName,
            datasets: [{
                label: '# of Votes',
                data: countPost,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false
                }]
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#333',
                    usePointStyle: true
                }
            }
        }
    });
</script>