<?php
    $url = 'http://localhost:8000/api/customer';
    $ch  = curl_init();

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);

    $result = curl_exec($ch);
    $decRes = json_decode($result);
    
    curl_close($ch);
?>
<b>List Data Customer</b>
<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalFormAdd">Add Data</button>
<br><br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th class="text-center">No</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Merried</th>
            <th class="text-center">Address</th>
            <th class="text-center">Action</th>
        </thead>
        <tbody>
            <?php 
                if(empty($decRes)){
                    echo '<tr><td colspan="7" class="text-center"><i> Data is empty </i></td></tr>';
                }else{
                    foreach($decRes as $key => $value){ 
            ?>
                        <tr>
                            <td class="text-center" width="1%"><?php echo $key + 1; ?></td>
                            <td><?php echo $value->customer_name; ?></td>
                            <td><?php echo $value->customer_email; ?></td>
                            <td class="text-center"><?php echo ($value->customer_gender == 'L' ? 'Laki-laki' : 'Perempuan'); ?></td>
                            <td class="text-center"><?php echo ($value->customer_menikah == 0 ? 'Tidak' : 'Iya' ); ?></td>
                            <td><?php echo $value->customer_address; ?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btnDetail" data-toggle="modal" data-target="#modalDetail" data-custid="<?php echo $value->customer_id; ?>">Detail</button>
                                <button type="button" class="btn btn-primary btnEdit" data-toggle="modal" data-target="#modalEdit" data-custid="<?php echo $value->customer_id; ?>">Edit</button>
                                <button type="button" class="btn btn-danger btnDelete" data-custid="<?php echo $value->customer_id; ?>">Delete</button>
                            </td>
                        </tr>
            <?php 
                    } 
                }
            ?>
        </tbody>
    </table>
</div>

<!-- {{-- start modal form add --}} -->
<div class="modal fade" id="modalFormAdd" tabindex="-1" role="dialog" aria-labelledby="modalFormAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" class="formCustomer">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormAddLabel">Form Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="customer_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="customer_email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                        <input type="password" class="form-control" name="customer_password">
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="customer_gender" value="L" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="customer_gender" value="P" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Merried</legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radioMerried1" name="customer_menikah" value="1" class="custom-control-input">
                                <label class="custom-control-label" for="radioMerried1">Iya</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="radioMerried2" name="customer_menikah" value="0" class="custom-control-input">
                                <label class="custom-control-label" for="radioMerried2">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                            <textarea name="customer_address" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btnCloseModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- {{-- end modal form add --}} -->

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalFormAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormAddLabel">Detail Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="ctnModDetail"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btnCloseModal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalFormAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="PUT" class="formeditCustomer">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormAddLabel">Detail Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="ctnModEdit"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btnCloseModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $( ".formCustomer" ).submit(function( e ) {
            e.preventDefault();

            $.ajax({
                url      : "src/storecust.php", 
                type     : "post",
                data     : $(this).serialize(),
                dataType : "json",
                beforeSend:function(){
                    $(".loading").html("Please wait....");
                },
                success:function(result){  
                    if(result.status.code == '201'){
                        $('.btnCloseModal').trigger('click');
                        $("#listCustomer").load("src/listcust.php");
                    }else{

                    }
                },
                error: function(xhr, Status, err) {
                    $("Terjadi error : " + Status);
                }
                
            });
        });

        $('.btnDetail').on('click', function(){
            $.post('src/detail.php', { id : $(this).data('custid') }, function(res){
                $('#ctnModDetail').html(res);
            });
        });

        $('.btnEdit').on('click', function(){
            $.post('src/edit.php', { id : $(this).data('custid') }, function(res){
                $('#ctnModEdit').html(res);
            });
        });

        $( ".formeditCustomer" ).submit(function( e ) {
            e.preventDefault();

            $.ajax({
                url      : "src/updatecust.php", 
                type     : "post",
                data     : $(this).serialize(),
                dataType : "json",
                beforeSend:function(){
                    $(".loading").html("Please wait....");
                },
                success:function(result){  
                    if(result.status.code == '200'){
                        $('.btnCloseModal').trigger('click');
                        $("#listCustomer").load("src/listcust.php");
                    }
                },
                error: function(xhr, Status, err) {
                    $("Terjadi error : " + Status);
                }
                
            });
        });

        $('.btnDelete').on('click', function(){
            var txt;
            var r = confirm("Are you sure, you want delete this data ?");
            if (r == true) {
                $.ajax({
                    url      : "src/deletecust.php", 
                    type     : "post",
                    data     : { id : $(this).data('custid') },
                    dataType : "json",
                    beforeSend:function(){
                        $(".loading").html("Please wait....");
                    },
                    success:function(result){  
                        if(result.status.code == '200'){
                            $("#listCustomer").load("src/listcust.php");
                        }
                    },
                    error: function(xhr, Status, err) {
                        $("Terjadi error : " + Status);
                    }
                    
                });
            }   
        });
    });
</script>