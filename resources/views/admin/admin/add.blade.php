@extends('admin.layout.master')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="bordered-layout-colored-controls">Admin Add</h4>

                </div>
                <div class="card-body">

                    <form action="{{ url('admin/insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>LogIn ID</label>
                                 <input type="text" name="login" class="form-control" id="checkValue" placeholder="Enter Admin login Id" required="required">
                                <span id="error_value"></span>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Enter Login Password      ******" value="12345@" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Admin Full Name" required="required">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="number" class="form-control" name="contact" placeholder="Enter Admin Contact Number" required="required">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Admin E-mail Address" required="required">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label>Active</label>
                                <div class="input-group">
                                    <div class="custom-control custom-radio d-inline-block ml-1">
                                        <input type="radio" id="activeY" value="1" name="status" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="activeY">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block ml-2">
                                        <input type="radio" id="activeN" value="0" name="status" class="custom-control-input">
                                        <label class="custom-control-label" for="activeN">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label>Super Admin</label>
                                <div class="input-group">
                                    <div class="custom-control custom-radio d-inline-block ml-1">
                                        <input type="radio" id="suerAdminY" value="1" name="super" class="custom-control-input">
                                        <label class="custom-control-label" for="suerAdminY">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio d-inline-block ml-2">
                                        <input type="radio" id="suerAdminN" value="0" name="super" class="custom-control-input" checked>
                                        <label class="custom-control-label" for="suerAdminN">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input " name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="document.getElementById('preview1').src = window.URL.createObjectURL(this.files[0])" required="required" >
                                        <label class="custom-file-label" for="inputGroupFile01">Choose
                                            file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img id="preview1" alt="Image Not Selected" class="rounded mx-auto d-block" width="150px" height="75px" />
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="btnSubmit" name="submit" class="btn btn-block gradient-sublime-vivid white">Apply Changes</button>
                            <button type="button" class="btn grey btn-outline-secondary"  onClick="history.go(-1); return false;"><i class="ft-x"></i>Cancel</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

    <!-- DatePicker JS -->
    <script src="{{ asset('app-assets/custom/datePicker/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('app-assets/custom/datePicker/coustom_date_function.js') }}"></script>

    <!-- Summernote JS -->
    <script src="{{ asset('app-assets/custom/summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('app-assets/custom/summernote/custom_edit_function.js') }}"></script>
<script>

    $(function() {
            $('form').submit(function() {
                setTimeout(function() {
                    disableButton();
                }, 0);
            });
            function disableButton() {
                $("#btnSubmit").prop('disabled', true);
            }
        });

// Check Data Unique Start
    $(document).ready(function(){
        $('#checkValue').blur(function(){
        var error_Msg = '';
        var table ="admins";
        var field ="login";
        var value = $('#checkValue').val();
        var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('value_available.check') }}",
                method:"POST",
                data:{ _token:_token, value:value, table:table, field:field },
                success:function(result)
                {
                if(result == 'unique')
                {
                $('#error_value').html('<label class="text-success">value Available</label>');
                $('#value').removeClass('has-error');
                $('#btnSubmit').attr('disabled', false);
                }
                else
                {
                $('#error_value').html('<label class="text-danger">value not Available</label>');
                $('#value').addClass('has-error');
                $('#btnSubmit').attr('disabled', 'disabled');
                }
                }
            })
        });
    });
 // Check Data Unique End

</script>
@endsection
