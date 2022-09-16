<?php include "frontpanel/head.php"; ?>
<?php include "core/functions.php"; ?>
<title>Home</title>
<?php include "frontpanel/site.php"; ?>
<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-lg-8">
            <?php foreach (fPosts() as $p) {  ?>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="">
                            <a href="">
                                <?php echo $p['title'] ?>
                            </a>
                            <div class="">
                                <i class="feather-user text-primary"></i>
                                <span class="text-black-50"><?php echo user($p['user_id'])['name'] ?></span>
                                <i class="feather-layers text-primary"></i>
                                <span class="text-black-50"><?php echo category($p['category_id'])['title'] ?></span>
                                <i class="feather-calendar text-primary"></i>
                                <span class="text-black-50"><?php echo date('j F Y', strtotime($p['created_at'])) ?></span>
                            </div>
                            <hr>
                            <p class="text-black-50">
                                <?php echo strip_tags(html_entity_decode($p['description'])); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-12 col-lg-4">
            <div class="categorySidebar" style="position: sticky;top: 15px;">
                <h2>Category</h2>
                <div class="list-group mb-4">
                    <?php foreach (fCategories() as $c) {  ?>
                        <a href="#" class="list-group-item list-group-item-action"><?php echo $c['title'] ?></a>
                    <?php } ?>
                </div>
                <h2>Advertisement</h2>
                <img src="<?php echo $url; ?>/assets/img/item/youarehere.webp" width="100%" alt="">
            </div>
        </div>
    </div>
</div>
<?php include "frontpanel/foot.php" ?>