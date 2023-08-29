@extends('layouts.main')
<?php 
use Illuminate\Support\Facades\Auth;
$query = [];
$query['filterstatus'] = [];
$url = $_SERVER['REQUEST_URI'];
$parts = parse_url($url);
if(!$parts) {

    parse_str($parts['query'], $query);
}
?>

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <?php if(Auth::user()->is_admin == 1) { ?>
                        <li class="breadcrumb-item"><a href="{{ route('dashobard') }}">Dashboard</a></li>
                    <?php } ?>
                    <li class="breadcrumb-item active">Order List</li>
                </ol>
            </div>
            <?php if(Auth::user()->is_admin == 1) { ?>
            <div class="col-sm-6 text-right">
                <!-- <a href="{{ route('addForm') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>&nbsp; Add</a> -->
            </div>
            <?php } ?>
        </div>
    </div><!-- /.container-fluid -->

    <div class="container-fluid mt-4">
        <?php if(Auth::user()->is_admin == 1) { ?>
        <div class="card">
            <div class="col-md-12">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <div class="card-body">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ app('request')->input('name') }}" placeholder="Enter a name">
                            </div>
                            <div class="col-md-3">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ app('request')->input('email') }}" placeholder="Enter a email">
                            </div>
                            <div class="col-md-3">
                                <label for="filterstatus">Status</label>
                                <select name="filterstatus" id="filterstatus" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" <?php if($query['filterstatus'] == 1) { echo "selected"; } ?> >Pending</option>
                                    <option value="2" <?php if($query['filterstatus'] == 2) { echo "selected"; } ?> >Running</option>
                                    <option value="3" <?php if($query['filterstatus'] == 3) { echo "selected"; } ?> >Completed</option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-4 align-items-center">
                                <div class="btn_just justify-content-between">
                                    <button class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('orderList') }}" class="btn btn-default btn-sm">Clear</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="card">
            <div class="card-body">
                <table class="table-res table-stripped" id="orderTable">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>Phone</th>
                            <th>Assign To</th>
                            <th>Job date</th>
                            <th>Status</th>
                            <th width="105px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $index => $val)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><?php echo $val['fname'].' '.$val['lname']; ?></td>
                                <td>{{ $val['email'] }}</td>
                                <td>{{ $val['phone'] }}</td>
                                <td> 
                                    @if(!empty($val['user_name']))
                                        {{ $val['user_name'] }}
                                    @endif
                                </td>
                                <td>
                                    <?php echo $date = date('d-m-Y', strtotime($val['job_date'])); ?>
                                </td>
                                <td>
                                    <?php 
                                        if ($val['status'] == '1') { echo "Pending"; } elseif ($val['status'] == '2') { echo "Running"; } else {echo "Completed"; }
                                    ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs" title="Upload Images" id="uploadImages" data-id="{{ $val['id'] }}"><i class="fas fa-camera"></i></a>
                                    <?php if(Auth::user()->is_admin == 1) { ?>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-xs" title="Email user" id="emailUser" data-id="{{ $val['id'] }}"><i class="fas fa-envelope"></i></a>
                                    <?php } ?>
                                    <a href="javascript:void(0)" class="btn btn-warning btn-xs" title="View details" id="viewOrder" data-id="{{ $val['id'] }}"><i class="fas fa-eye"></i></a>
                                    <?php if(Auth::user()->is_admin == 1) { ?>
                                        <a href="{{ route('getOrderDetail',$val['id']) }}" class="btn btn-primary btn-xs" title="Edit"><i class="fas fa-pen"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="Delete" id="deleteOrder" data-id="{{ $val['id'] }}"><i class="fas fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<!-- modal to upload images start -->
<div class="modal fade" id="uploadImage" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Images</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="serviceImages" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" id="uploadId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group beforeImage mb-3">
                            <label for="beforeimage">Upload before service images</label>
                            <input type="file" name="beforeimage[]" id="beforeimage" multiple="true" accept="images/*" class="form-control">
                        </div>
                        <hr>
                        <div class="col-md-12 form-group afterImage mt-3">
                            <label for="afterimage">Upload after service images</label>
                            <input type="file" name="afterimage[]" id="afterimage" multiple="true" accept="images/*" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit">Upload</button>
                    <button class="btn btn-primary loader" type="button" disabled style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal to upload images end -->

<!-- modal to send email to user start -->
<div class="modal fade" id="usersendEmail" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Send Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="sendemailForm" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" id="customerId">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group beforeImage mb-3">
                            <label for="customer_email">Customer Email Id <span class="text-danger fw-bold">*</span></label>
                            <input type="email" name="customer_email" id="customer_email" class="form-control" readonly>
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <label for="subject">subject <span class="text-danger fw-bold">*</span></label>
                            <input type="text" name="subject" id="subject" class="form-control">
                            <small id="error_subject" style="display: none;font-weight:bold" class="text-danger mt-2 text-sm-start fw-bold">The Subject field is required.</small>
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <label for="email_message">Message <span class="text-danger fw-bold">*</span></label>
                            <textarea name="email_message" id="email_message" data-editor="ClassicEditor" height="100px" class="form-control editor"></textarea>
                            <small id="error_message" style="display: none;font-weight:bold" class="text-danger mt-2 text-sm-start fw-bold">The message field is required.</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit">Send Email</button>
                    <button class="btn btn-primary loader" type="button" disabled style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Sending...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal to send email to user end -->

<!-- modal for image showing -->
<div id="showImage" class="modalimage">
    <span class="imgclose">&times;</span>
    <img class="img-modal-content" id="showimg">
    <div id="caption"></div>
</div>

@include('orders.viewmodal')
@endsection

@section('scripts')

<script src="{{asset('assets/ckeditor5/build/ckeditor.js')}}"></script>
<script src="{{asset('assets/ckeditor5/sample/script.js')}}"></script>

<script>

    $(function() {
        $('#orderTable').DataTable({
        });
    });    

    // jQuery to get modal for uploading images of particular order
    $(document).on('click', '#uploadImages', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        $('#uploadId').val(id);
        $('#uploadImage').modal('show');
    });

    // jQuery to upload images of before and after services 
    $(document).on('submit', '#serviceImages', function(e) {
        e.preventDefault();

        $.ajax({
            type : "post",
            url : "{{ route('uploadImage') }}",
            data : new FormData(this),
            processData: false,
            contentType: false,
            beforeSend : function() {
                $('.btn-submit').css('visibility','hidden');
                $('.loader').css('display','block');
            },
            success : function (data) {
                $('.loader').css('display','none');
                if(data) {
                    $('#uploadImage').hide();
                    swal(
                        'Success',
                        'Image uploaded successfully',
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
            error : function (xhr) {

            }
        })
    });

    // jQuery to view order details.
    $(document).on('click', '#viewOrder', function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        
        $.ajax({
            type : "GET",
            url : "{{ route('viewOrderDetail') }}",
            data : {id : id},
            success: function(data) {
                if (data) {
                    let alldata = data[0];

                    $('#fname').val(alldata.fname);
                    $('#lname').val(alldata.lname);
                    $('#email').val(alldata.email);
                    $('#phone').val(alldata.phone);
                    $('#message').val(alldata.message);
                    $('#subrub').val(alldata.address);
                    $('#state').val(alldata.state);
                    $('#postCode').val(alldata.zip_code);
                    $('#jobdate').val(alldata.job_date);
                    $('#bedrooms').val(alldata.bedroom);
                    $('#bathroom').val(alldata.bathroom);
                    $('#livingrooms').val(alldata.livingroom);
                    $('#furnished').val(alldata.furnished);
                    $('#housetype').val(alldata.house_type);
                    $('#blinds').val(alldata.blinds);
                    $('#howlong').val(alldata.howlong);
                    $('#status').val(alldata.status);

                    if(alldata.carpet == 1) { $('#carpet').prop("checked", true) }
                    if(alldata.pest == 1) { $('#pest').prop("checked", true) }
                    if(alldata.call == 1) { $('#call').prop("checked", true) }
                    if(alldata.sms == 1) { $('#sms').prop("checked", true) }
                    if(alldata.send_email == 1) { $('#sendemail').prop("checked", true) }

                    let beforeImg = '';
                    var flagsUrl = '';
                    let img = alldata.images;
                    $.each(img, function(i, en) {
                        if(en.img_for == 1) {

                            beforeImg = en.imgname;
                            $('#beforeImg').append('<div class="col-md-2 text-center"><img src="storage/'+beforeImg+'" class="serv_img" height="80" width="100"/></div>');
                        }
                        if(en.img_for == 2) {

                            beforeImg = en.imgname;
                            $('#afterImg').append('<div class="col-md-2 text-center"><img src="storage/'+beforeImg+'" class="serv_img" height="80" width="100"/></div>');
                        }
                    })
                    
                    $('#viewOrder_modal').modal('show');
                }
            }
        })
    });

    // jQuery to delete order.
    $(document).on('click', '#deleteOrder', function(e) {
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
                    url : "{{ route('deleteOrder') }}",
                    data : {id : id},
                    success: function(data) {
                        if (data) {
                            swal(
                                'Success',
                                'Order deleted successfully',
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
            } else {
                swal({
                    title: 'Cancelled',
                    text: 'Your data is safe :)',
                    type: 'error'
                });
            }
        })
        console.log(id);
    });

    //jQuery to send mail to user
    $(document).on('click', '#emailUser', function(e) {

        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            type : "GET",
            url : "{{ route('getSendEmail_detail') }}",
            data : {id : id},
            success: function(data) {
                if(data) {

                    $('#customer_email').val(data.email);
                    $('#usersendEmail').modal('show');
                }
            }
        });
    });


    //jQuery to send mail using stmp
    $(document).on('submit', '#sendemailForm', function(e) {
        e.preventDefault();

        $.ajax({
            type : "POST",
            url : "{{ route('sendEmailToCustomer') }}",
            data : $(this).serialize(),
            beforeSend : function() {
                $('.btn-submit').css('visibility','hidden');
                $('.loader').css('display','block');
            },
            success : function(data) {
                if(data) {
                    swal(
                        'Success',
                        'Email sent successfully',
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
            error: function(xhr, responseJSON) {
                $.each(xhr.responseJSON.errors, function(key,value) {
                    if(key == 'email_message') {
                        $('#error_message').css('display','block');
                    }
                    if(key == 'subject') {
                        $('#error_subject').css('display','block');
                    }
                });
                console.log(xhr.responseJSON.errors);
            }
        })
    });

    // Show image in popup using jquery
    $(document).on('click', '.serv_img', function(e) {

        let img = $(this).attr('src');
        console.log(img);
        $("#showimg").attr("src",img);
        $('#showImage').css('display','block');
    });

    $(document).on('click', '.imgclose', function() {
        $('#showImage').css('display','none');
    });
</script>

@endsection