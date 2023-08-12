@extends('layouts.main')
@section('title', 'Users')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">User List</li>
                </ol>
            </div>
            <div class="col-sm-6 text-right">
                <!-- <a href="javascript:void(0)" class="btn btn-primary btn-sm add_users"><i class="fas fa-plus"></i>&nbsp; Add</a> -->
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_user"><i class="fas fa-plus"></i>&nbsp; Add user</button>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    <!-- Add user Model -->
    <div class="modal fade" id="add_user" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="" id="AddUser">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Full Name <span class="text-danger text-sm">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger text-sm">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <!-- <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger text-sm">*</span></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="Enter Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="addstatus">Status <span class="text-danger text-sm">*</span></label>
                            <select name="status" id="addstatus" class="form-control">
                                <option value="">Select</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Add user model -->

    <!-- Edit user Model -->
    <div class="modal fade" id="edit_user" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="" id="submitEditUser">
                    @csrf
                    <input type="hidden" name="userId" id="userid">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editname">Full Name <span class="text-danger text-sm">*</span></label>
                            <input type="text" class="form-control" name="editname" id="editname" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="editemail">Email <span class="text-danger text-sm">*</span></label>
                            <input type="email" class="form-control" name="editemail" id="editemail" placeholder="Enter Email" readonly>
                        </div>
                        <div class="form-group">
                            <label for="editphone">Phone</label>
                            <input type="text" class="form-control" name="editphone" id="editphone" placeholder="Enter Phone Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                        </div>
                        <!-- <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select</option>
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="editstatus">Status <span class="text-danger text-sm">*</span></label>
                            <select name="editstatus" id="editstatus" class="form-control">
                                <option value="">Select</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Edit user model -->

    <!-- change user password Model -->
    <div class="modal fade" id="changeUser_password" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form action="" id="userChangepass">
                    @csrf
                    <input type="hidden" name="cuser_id" id="changeuser_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="cpassword">New Password <span class="text-danger text-sm">*</span></label>
                            <input type="password" class="form-control" name="password" id="cpassword" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="changeconfirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="changeconfirm_password" placeholder="Enter Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End change user password model -->

    <div class="container-fluid mt-4">
        <div class="card">
            <div class="col-md-12">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <div class="card-body">
                    <form action="" id="">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="filtername" placeholder="Enter a name">
                            </div>
                            <div class="col-md-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="filteremail" placeholder="Enter a email">
                            </div>
                            <div class="col-md-3">
                                <label for="name">Status</label>
                                <select name="filterstatus" id="status" class="form-control">
                                    <option value="">- select -</option>
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-4 align-items-center">
                                <div class="btn_just justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <button class="btn btn-default btn-sm">Clear</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table id="user_table">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th width="70px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$val->name}}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>
                                <?php $role = ($val['is_admin'] == 0) ? 'User' : 'Admin'; ?>
                                    {{ $role }}
                                </td>
                                <td>
                                    <?php $status = ($val['status'] == 1) ? 'Active' : 'Inactive'; ?>
                                    {{ $status }}
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs" title="Edit user" data-id="<?php echo e($val->id); ?>" id="editUser"><i class="fas fa-pen"></i></a>
                                    <a href="javascript:voif(0)" class="btn btn-danger btn-xs" title="Delete user" data-id="<?php echo e($val->id); ?>" id="deleteUser"><i class="fas fa-trash"></i></a>
                                    <a href="javascript:voif(0)" class="btn btn-warning btn-xs" title="Change password" data-id="<?php echo e($val->id); ?>" id="changepassword"><i class="fas fa-key"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    $(document).ready( function(){
        let ResultTable = $('#user_table').DataTable();
        // table.DataTable();
    });
    $(document).ready(function (){

        $(document).on('submit', '#AddUser', function(e) {
            e.preventDefault();

            $.ajax({
                type : "POST",
                url : "<?php echo e(route('addUser')); ?>",
                data : $(this).serialize(),
                success : function (data) {
                    if(data) {
                        $('#add_user').hide();
                        swal(
                            'Success',
                            'User added successfully',
                            'success'
                        ).then(function(){
                            location.reload();
                        });
                    } else {
                        swal({
                            title: 'error',
                            text: data.msg,
                            type: 'error'
                        });
                    }
                },
                error: function (err) {
                    $('.val_error').remove();
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="val_error" style="color: red; font-size:13px">'+error[0]+'</span>'));
                    });
                }
            })
        });

        $(document).on('click', '#editUser', function(e){
            e.preventDefault();

            let id = $(this).data('id');

            $.ajax({
                type : "GET",
                url : "{{ route('getUser') }}",
                data : {id : id},
                success: function(data) {
                    if(data) {
                        $('#editname').val(data.name);
                        $('#editemail').val(data.email);
                        $('#editphone').val(data.phone);
                        $('#editstatus').val(data.status);
                        $('#userid').val(data.id);
                        
                        $('#edit_user').modal('show');
                    }
                }
            })
        });

        $(document).on('submit', '#submitEditUser', function(e) {
            e.preventDefault();

            console.log();
            
            $.ajax({
                type : "GET",
                url : "{{ route('edituser') }}",
                data : $(this).serialize(),
                success: function(data) {
                    if(data) {
                        $('#edit_user').modal('hide');
                        swal(
                            'Success',
                            'User updated successfully',
                            'success'
                        ).then(function(){
                            location.reload();
                        });
                    } else {
                        swal({
                            title: 'error',
                            text: data.msg,
                            type: 'error'
                        });
                    }
                }
            })
        });

        $(document).on('click', '#deleteUser', function(e){
            e.preventDefault();

            let id = $(this).data('id');

            swal({
                title: 'Are you sure?',
                text: "It will permanently deleted !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(isConfirm) {
                if(isConfirm) {
                    $.ajax({
                        type : "GET",
                        url : "<?php echo e(route('deleteUser')); ?>",
                        data : {id : id},
                        success: function(data) {
                            swal(
                                'Deleted!',
                                'User deleted successfully',
                                'success'
                            ).then(function(){
                                location.reload();
                            });
                            // lcoation.reload();
                        }
                    })
                }
            })
        });

        $(document).on('click', '#changepassword', function(e) {
            e.preventDefault();

            let id = $(this).data('id');
            $('#changeuser_id').val(id);
            console.log(id);

            $('#changeUser_password').modal('show');
        });

        $(document).on('submit', '#userChangepass', function(e) {
            e.preventDefault();

            $.ajax({
                type : "POST",
                url : "{{ route('user_pass') }}",
                data : $(this).serialize(),
                success: function(data) {
                    if(data) {
                        $('#changeUser_password').modal('hide');
                        swal(
                            'Success',
                            'User password changed successfully',
                            'success'
                        ).then(function(){
                            location.reload();
                        });
                    } else {
                        swal({
                            title: 'error',
                            text: data.msg,
                            type: 'error'
                        });
                    }
                },
                error: function (err) {
                    $('.val_error').remove();
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="val_error" style="color: red; font-size:13px">'+error[0]+'</span>'));
                    });
                }
            })
        })
    });
</script>

@endsection