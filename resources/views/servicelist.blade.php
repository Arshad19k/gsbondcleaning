

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Service List</li>
                </ol>
            </div>
            <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addService"><i class="fas fa-plus"></i>&nbsp;Add</button>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Services</h5>
            </div>
            <div class="col-md-12">
                <div class="card-body">
                    <table class="table table-striped" id="service_table">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Service</th>
                                <th>Status</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $serv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($index+1)); ?></td>
                                    <td><?php echo e($serv->service_name); ?></td>
                                    <td>
                                        <?php echo ($serv->status == '1') ? 'Active' : 'Inactive'; ?>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm" title="Edit" id="edit_serv" data-id="<?=$serv->id?>"><i class="fas fa-pen"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" title="Delete" id="del_serv" data-id="<?=$serv->id?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Add service Modal -->
<div class="modal fade" id="addService" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="addService">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="serviceName">Service Name</label>
                        <input type="text" class="form-control" name="service_name" id="serviceName" placeholder="Enter a service name">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Select status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit service modal -->
<div class="modal fade" id="editService" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="edit_Service">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="service_id" id="service_id">
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="edit_servicename">Service Name</label>
                        <input type="text" class="form-control" name="edit_servicename" id="edit_servicename" placeholder="Enter a service name">
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="editstatus">Status</label>
                        <select name="editstatus" id="editstatus" class="form-control">
                            <option value="">Select status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready( function(){
        let ResultTable = $('#service_table').DataTable();
        // table.DataTable();
    });

    $(document).ready(function() {
        $('#addService').submit(function (e) {
            e.preventDefault();

           let formData = $(this).serialize(); 
           
           $.ajax({
                type : "POST",
                url : "<?php echo e(route('addSerivce')); ?>",
                data : formData,
                success : function(data) {
                    if(data.status) {
                        $('#addService').hide();
                        swal(
                            'Success',
                            'Service added successfully..',
                            'success'
                        ).then(function(){
                            location.reload();
                        });
                    }   
                }
           })
        });

        // get service details to edit
        $(document).on('click', '#edit_serv', function(e) {
            e.preventDefault();

            let id = $(this).data('id');

            $.ajax({
                type : "GET",
                url : "<?php echo e(route('getSerivce')); ?>",
                data : {id : id},
                success : function(data) {
                    $('#service_id').val(data.id);
                    $('#edit_servicename').val(data.service_name);
                    $('#editstatus').val(data.status);

                    $('#editService').modal('show');
                }
            })
        });

        // update service details
        $(document).on('submit', '#edit_Service', function(e){
            e.preventDefault();

            $.ajax({
                type : "POST",
                url : "<?php echo e(route('update.service')); ?>",
                data : $(this).serialize(),
                success: function(data) {
                    if (data) {
                        swal(
                            'Success',
                            'Service updated successfully..',
                            'success'
                        ).then(function(){
                            location.reload();
                        });
                    } else {
                        swal(
                            'Warning!',
                            'Something went wrong..!',
                            'warning'
                        ).then(function(){
                            location.reload();
                        });   
                    }
                }
            })
        });

        //Delete service
        $(document).on('click', '#del_serv', function(e) {
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
                        url : "<?php echo e(route('delete.service')); ?>",
                        data : {id : id},
                        success: function(data) {
                            swal(
                                'Deleted!',
                                'Service deleted successfully..',
                                'success'
                            ).then(function(){
                                location.reload();
                            });
                        }
                    })
                }
            });
        })
    });
</script>

<?php $__env->stopSection(); ?>