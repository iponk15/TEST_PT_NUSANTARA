<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="#">Customer</a>
            </nav>
        </header>

        <!-- Begin page content -->
        <main role="main" style="margin-top: 6%">
            <div class="container">
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
                            @foreach($customer as $key => $value)
                                <tr>
                                    <td class="text-center" width="1%">{{ $key + 1 }}</td>
                                    <td>{{ $value->customer_name }}</td>
                                    <td>{{ $value->customer_email }}</td>
                                    <td class="text-center">{{ ($value->customer_gender == 'L' ? 'Laki-laki' : 'Perempuan') }}</td>
                                    <td class="text-center">{{ ($value->customer_menikah == 0 ? 'Tidak' : 'Iya' ) }}</td>
                                    <td>{{ $value->customer_address }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info">Detail</button>
                                        <button type="button" class="btn btn-primary">Edit</button>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        {{-- start modal form add --}}
        <div class="modal fade" id="modalFormAdd" tabindex="-1" role="dialog" aria-labelledby="modalFormAddLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('api/listcust') }}" method="POST" class="formCustomer">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalFormAddLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="customer_name">
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
                                        <input type="radio" id="customRadioInline1" name="customer_gender" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1" value="L">Laki-laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customer_gender" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2" value="P">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Merried</legend>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customer_menikah" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1" value="1">Iya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customer_menikah" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2" value="0">Tidak</label>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end modal form add --}}

        <script>
            $(document).ready(function(){
                $( "#target" ).submit(function( e ) {
                    e.preventDefault();

                    alert('hallo');
                });
            });
        </script>

        <script src="{{ URL::asset('js/jquery-3.5.1.slim.min.js') }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('js/popper.min.js') }}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>