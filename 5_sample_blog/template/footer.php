</div>
</div>
</section>
<script src="<?php echo $url ?>/assets/vendor/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="<?php echo $url ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/jquery.dataTables.min.js"></script>
<script src="<?php echo $url ?>/assets/vendor/data_table/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="<?php echo $url ?>/assets/js/app.js"></script>
<script>

    let category = ["phone","computer","TV"];
    let subCategory = [
        {name:"Samsung",category_id:0},
        {name:"Mi",category_id: 0},
        {name: "Hp",category_id: 1},
        {name: "Acer",category_id: 1},
        {name: "Panasonic",category_id: 2}
    ];


    category.map(function (el,index) {
        $("#c").append(`<option value="${index}">${el}</option>`);
    });

    subCategory.map(function (el,index) {
        $("#sc").append(`<option value="${index}" data-category="${el.category_id}">${el.name}</option>`);
    });

    $("#c").on("change",function () {
        let currentCategoryId = $(this).val();
        $("#sc option").hide();
        $(`[data-category=${currentCategoryId}]`).show();
    });

    // console.log(location.href);
    let currentPage=location.href;
    $(".menu-item-link").each(function(){
        console.log($(this).attr('href'));
        $(this).removeClass('active');
        if($(this).attr('href')==currentPage){
           
            $(this).addClass('active');
        }
    })

</script>
</body>
</html>