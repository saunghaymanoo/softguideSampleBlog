<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Contact Us</h4>
                            <div class="">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Contact</button>
                                <button class="btn btn-outline-info" onclick="showGrid()">Grid</button>
                                <button class="btn btn-outline-info" onclick="showList()">List</button>
                                
                            </div>
                        </div>
                      
                        <div class="page"></div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <p class="message"></p>
                                    </div>
                                    <div class="modal-body">

                                        <form action="save.php" method="post" id="addContact">
                                            <div class="form-row">
                                                <div class="col-12 col-md-6">
                                                    <label for="">Name</label>
                                                    <input type="text" name="contact-name" class="form-control">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Contact</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">Edit Contact</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div>
                                        <p class="editmessage"></p>
                                    </div>
                                    <div class="modal-body">

                                        <form action="update.php" method="post" id="updContact">
                                            <div class="form-row">
                                                <div class="col-12 col-md-6">
                                                    <label for="">Name</label>
                                                    <input type="text" name="contact-name" class="form-control" id="editName">
                                                    <input type="hidden" id="editId">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control" id="editPhone">
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Edit Contact</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- <form action="save.php" method="post">
                                    <div class="form-row">
                                        <div class="col-12 col-md-6">
                                            <label for="">Name</label>
                                            <input type="text" name="contact-name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Add Contact</button>
                                      </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function showList(){
            $.get('list.php',function(data){
                $('.page').html(data);
            })
        }
        function showGrid(){
            $.get('grid.php',function(data){
                $('.page').html(data);
            })
        }
        // $(".page").delegate('.contact','click',function(){
        //     let currentId = $(this).attr('data-id');
        //     alert('U click' +currentId);
        // })
        $(".page").delegate('.del','click',function(){
            let currentId = $(this).attr('data-id');
           
            $.get("delete.php?id="+currentId,function(data){
                console.log(data)
                if(data == 'success'){
                   
                    showList();
                }
            })
        })
        $(".page").delegate(".upd","click",function(){
            let currentId = $(this).attr('data-id');
           
            $.get("detail.php?id="+currentId,function(data){
                $contactDetail = JSON.parse(data);
                $('#editId').val(currentId);
                $('#editName').val($contactDetail.name);
                $('#editPhone').val($contactDetail.phone);
                $('#edit').modal("show");
                // console.log($contactDetail);
            })
        })
        showList();
        $("#addContact").on('submit', function(e) {
            e.preventDefault();
            let input = $(this).serialize();
            // $.ajax({
            //     type: "POST",
            //     url: $(this).attr('action'),
            //     data: input,
            //     success: function(data){
            //         console.log(data);
            //     }
            // });
            $.post($(this).attr('action'),input,function(data){
                // console.log(data);
                let message = $('.message');
                if(data == 'success'){
                    $('input').val('');
                    message.html(`<span class='text-success'>Content Added</span>`);
                    showList();
                }else{
                    message.html(`<span class='text-danger'>Content Added Fail!</span>`);
                }
            });
        })
        $("#updContact").on('submit', function(e) {
            e.preventDefault();
            let input = $(this).serialize();
           
            $.post($(this).attr('action'),input,function(data){
                console.log(data);
                // let editmessage = $('.editmessage');
                // if(data == 'success'){
                //     $('input').val('');
                //     editmessage.html(`<span class='text-success'>Content Updated</span>`);
                //     showList();
                // }else{
                //     editmessage.html(`<span class='text-danger'>Content Updated Fail!</span>`);
                // }
            });
        })
    </script>
</body>

</html>