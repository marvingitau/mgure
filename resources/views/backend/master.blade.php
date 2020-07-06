
<!doctype html>
<html lang="en">
{{-- @include('backend.partials.head') --}}
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<body class="bg-light">
{{-- @include('backend.partials.nav') --}}
<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark d-print-none">

        {{-- @include('backend.admin.sidebar') --}}
    </div>

    <div class="content p-4" id="app">
        @yield('content')

    </div>
</div>

{{-- <div class="modal" id="change_password_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.user_profile.change_password.store')}}" method="post" >@csrf
                    <div class="form-row justify-content-center">
                        <div class="form-group col-lg-12">
                            <label for="old_password">Old Password <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="old_password" name="old_password"
                                   placeholder="Old Password" >
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-lg-12">
                            <label for="new_password">New Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="new_password" name="new_password"
                                   placeholder="New Password" >
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-lg-12">
                            <label for="new_password_confirmation">Confirmed Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
                                   placeholder="Confirmed Password">
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="form-group col-lg-12">
                            <hr/>
                            <button type="submit" class="btn btn-tsk "><i class="fa fa-save"></i> Change</button>
                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>
</div> --}}
{{-- @include('backend.partials.script') --}}
{{-- @include('backend.partials.msg') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</body>
</html>