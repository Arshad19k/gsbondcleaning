

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Order List</li>
                </ol>
            </div>
            <div class="col-sm-6 text-right">
                <a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add</a>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    <div class="container-fluid mt-4">
        <div class="card">
            <div class="col-md-12">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter a name">
                            </div>
                            <div class="col-md-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter a email">
                            </div>
                            <div class="col-md-3">
                                <label for="name">service</label>
                                <select name="service" id="service" class="form-control">
                                    <option value="">Select service</option>
                                    <option value="cleaning">Cleaning</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-4 d-flex align-items-center justify-content-between">
                                <div class="">
                                    <button class="btn btn-primary btn-sm">Submit</button>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Service</th>
                            <th>Appointment date</th>
                            <th>Created date</th>
                            <th>Status</th>
                            <th width="125px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rahul</td>
                            <td>Floor Cleaning</td>
                            <td>19-03-23</td>
                            <td>15-03-23</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>