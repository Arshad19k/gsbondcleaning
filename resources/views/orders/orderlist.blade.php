@extends('layouts.main')

@section('style')
<style>
    .checkbox {
        padding:0; 
        margin:0;
        display: flex;
        list-style: none;
        justify-content:left;
    }
    .checkbox li {
        padding: 0px 20px;
    }
</style>
@endsection

@section('content')

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
                <a href="{{ route('addForm') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add</a>
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
                <table class="table table-striped" id="orderTable">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>Job date</th>
                            <th>Status</th>
                            <th width="90px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><?php echo $val['fname'].' '.$val['lname']; ?></td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>{{$val->job_date}}</td>
                                <td>
                                    <?php 
                                        if ($val['status'] == '0') { echo "Pending"; } elseif ($val['status'] == '1') { echo "Processing"; } else {echo "Completed"; }
                                    ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs" title="Upload Images" data-id="{{$val->id}}"><i class="fas fa-camera"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-xs" title="View details" data-id="{{$val->id}}"><i class="fas fa-eye"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs" id="edit_order" title="Edit" data-id="{{$val->id}}"><i class="fas fa-pen"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="Delete" data-id="{{$val->id}}"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!-- Modals -->
@include('orders.editmodal') 
<!-- end modals -->

@endsection
@section('scripts')

<script>

    $(function() {
        $('#orderTable').DataTable();
    });

    $(document).on('click', '#edit_order', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            type : "GET",
            url : "{{ route('getOrderDetail') }}",
            data: {id : id},
            success:function (data) {
                if (data) {
                    $('#order_id').val(data.id);
                    $('#editfname').val(data.fname);
                    $('#editlname').val(data.lname);
                    $('#editemail').val(data.email);
                    $('#editphone').val(data.phone);
                    $('#editmessage').val(data.message);
                    $('#editsubrub').val(data.address);
                    $('#editstate').val(data.state);
                    $('#editpostCode').val(data.zip_code);
                    $('#editjobdate').val(data.job_date);
                    $('#editbedrooms').val(data.bedroom);
                    $('#editbathroom').val(data.bathroom);
                    $('#editlivingrooms').val(data.livingroom);
                    $('#editfurnished').val(data.furnished);
                    $('#edithousetype').val(data.house_type);
                    $('#editblinds').val(data.blinds);
                    $('#edithowlong').val(data.howlong);
                    $('#editstatus').val(data.status);

                    $('#editcarpet').val(data.carpet);
                    $('#editpest').val(data.pest);
                    $('#editcall').val(data.call);
                    $('#editsms').val(data.sms);
                    $('#sendemail').val(data.send_email);

                    if(data.carpet == 1) { $('#editcarpet').prop('checked',true); }
                    if(data.pest == 1) { $('#editpest').prop('checked',true); }
                    if(data.call == 1) { $('#editcall').prop('checked',true); }
                    if(data.sms == 1) { $('#editsms').prop('checked',true); }
                    if(data.send_email == 1) { $('#sendemail').prop('checked',true); }

                    $('#editOrder_modal').modal('show');
                }
            }
        })
    });

    $(document).on('submit', '#editOrderForm', function(e) {
        e.preventDefault();

        $.ajax({
            type : "POST",
            url : "{{ route('updateOrder') }}",
            data : $(this).serialize(),
            success: function(data) {

            }
        })
    });
</script>

@endsection