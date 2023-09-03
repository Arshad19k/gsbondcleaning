@extends('layouts.main')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('dashobard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orderList') }}">Order List</a></li>
                    <li class="breadcrumb-item active">Order Details</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->

    <div class="container-fluid mt-4">
        <div class="card">
            <form id="editOrderForm">
                @csrf
                <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" value="{{ $order->fname }}" placeholder="Enter First Name">
                                <div id="editfname"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname" value="{{ $order->lname }}" placeholder="Enter last Name">
                                <div id="editlname"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $order->email }}" placeholder="Enter Email" readonly>
                                <div id="editemail"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $order->phone }}" placeholder="Enter Phone">
                                <div id="editphone"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="services">Services</label>
                                <select name="services" id="services" class="form-control">
                                    <option value="">Select a service</option>
                                    <option value="Care_removals" <?php if($order->services == 'Care_removals') { echo "selected"; } ?> >Care Removals</option>
                                    <option value="Care_bond_cleaning" <?php if($order->services == 'Care_bond_cleaning') { echo "selected"; } ?> >Care Bond Cleaning</option>
                                    <option value="Care_care_cleaning" <?php if($order->services == 'Care_care_cleaning') { echo "selected"; } ?> >Care Care Cleaning</option>
                                    <option value="Care_tiles_grout_cleaning" <?php if($order->services == 'Care_tiles_grout_cleaning') { echo "selected"; } ?> >Care Tiles Grout Cleaning</option>
                                    <option value="Care_handyman" <?php if($order->services == 'Care_handyman') { echo "selected"; } ?> >Care Handyman</option>
                                    <option value="Care_plumbers" <?php if($order->services == 'Care_plumbers') { echo "selected"; } ?> >Care Plumbers</option>
                                    <option value="Care_gardening" <?php if($order->services == 'Care_gardening') { echo "selected"; } ?> >Care Gardening</option>
                                    <option value="Care_electrician" <?php if($order->services == 'Care_electrician') { echo "selected"; } ?> >Care Electrician</option>
                                    <option value="Care_locksmith" <?php if($order->services == 'Care_locksmith')  { echo "selected"; } ?> >Care Locksmith</option>
                                </select>
                                <div id="editservices"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="3">{{ $order->message }}</textarea>
                                <div id="editmessage"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editsubrub">Subrub</label>
                                <input type="text" class="form-control" name="editsubrub" id="editsubrub" value="{{ $order->address }}" placeholder="Enter Subrub">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editstate">State/Region</label>
                                <input type="text" class="form-control" name="editstate" id="editstate" value="{{ $order->state }}" placeholder="Enter State">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editpostCode">Post Code</label>
                                <input type="text" class="form-control" name="editpostCode" id="editpostCode" value="{{ $order->zip_code }}" placeholder="Enter Post Code">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="jobdate">Job Date</label>
                                <input type="text" class="form-control" name="jobdate" id="jobdate" value="{{ $order->job_date }}" placeholder="Enter Job Date">
                                <div id="editjobdate"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editbedrooms">Bedrooms</label>
                                <select name="editbedrooms" id="editbedrooms" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>" <?php if($order['bedroom'] == $i) { echo "selected"; } ?> ><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editbathroom">Bathrooms</label>
                                <select name="editbathroom" id="editbathroom" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>" <?php if($order['bathroom'] == $i) { echo "selected"; } ?> ><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editlivingrooms">Living Room</label>
                                <select name="editlivingrooms" id="editlivingrooms" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>" <?php if($order['livingroom'] == $i) { echo "selected"; } ?> ><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editfurnished">Furnished</label>
                                <select name="editfurnished" id="editfurnished" class="form-control">
                                    <option value="">Select option</option>
                                    <option value="1" <?php if($order['furnished'] == 1) { echo "selected"; } ?> >Yes</option>
                                    <option value="0" <?php if($order['furnished'] == 0) { echo "selected"; } ?> >No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="edithousetype">House Type</label>
                                <select name="edithousetype" id="edithousetype" class="form-control">
                                    <option value="">Select option</option>
                                    <option value="unit" <?php if($order['house_type'] == 'unit') { echo "selected"; } ?> >Unit</option>
                                    <option value="house" <?php if($order['house_type'] == 'house') { echo "selected"; } ?> >House</option>
                                    <option value="two_storey" <?php if($order['house_type'] == 'two_storey') { echo "selected"; } ?> >Two Storey</option>
                                    <option value="multi_storey" <?php if($order['house_type'] == 'multi_storey') { echo "selected"; } ?> >Multi Storey</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editblinds">Blinds</label>
                                <select name="editblinds" id="editblinds" class="form-control">
                                    <option value="">Select option</option>
                                    <option value="no_blinds" <?php if($order['blinds'] == 'no_blinds') { echo "selected"; } ?> >No Blinds</option>
                                    <option value="verticals" <?php if($order['blinds'] == 'verticals') { echo "selected"; } ?> >Verticals</option>
                                    <option value="venetians" <?php if($order['blinds'] == 'venetians') { echo "selected"; } ?> >Venetians</option>
                                    <option value="shutters" <?php if($order['blinds'] == 'shutters') { echo "selected"; } ?> >shutters</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="edithowlong">How long have you been living here?</label>
                                <textarea name="edithowlong" class="form-control" id="edithowlong" rows="3">{{ $order->howlong }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="assign_user">Assign user</label>
                                <select name="assignUser" id="assign_user" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($user as $user)
                                        <option value="{{ $user->id }}" <?php if($order['assign_to'] == $user->id) { echo "selected"; } ?> >{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Extras</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="carpet" id="editcarpet" <?php if($order['carpet'] == 1) { echo "checked"; } ?> value="1"><label for="editcarpet">&nbsp; Carpet</label></li>
                                    <li><input type="checkbox" name="pest" id="editpest" <?php if($order['pest'] == 1) { echo "checked"; } ?> value="1"><label for="editpest">&nbsp; Pest</label></li>
                                </ul>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Preferred Method of Contact</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="call" id="editcall" <?php if($order['call'] == 1) { echo "checked"; } ?> value="1"><label for="editcall">&nbsp; Call</label></li>
                                    <li><input type="checkbox" name="sms" id="editsms" <?php if($order['sms'] == 1) { echo "checked"; } ?> value="1"><label for="editsms">&nbsp; SMS</label></li>
                                    <li><input type="checkbox" name="sendemail" id="sendemail" <?php if($order['send_email'] == 1) { echo "checked"; } ?> value="1"><label for="sendemail">&nbsp; Email</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="editstatus">Status</label>
                                <select name="editstatus" id="editstatus" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" <?php if($order['status'] == 1) { echo "selected"; } ?> >Pending</option>
                                    <option value="2" <?php if($order['status'] == 2) { echo "selected"; } ?> >Running</option>
                                    <option value="3" <?php if($order['status'] == 3) { echo "selected"; } ?> >Completed</option>
                                </select>
                            </div>
                        </div>
                        <!-- Images -->
                        <?php if(count($totalImage) > 0) { ?>
                            <div class="row">
                                <div class="col-md-12 form-group mt-4">
                                    <label for="beforeImg">Before service image</label>
                                    <div class="row" id="beforeImg">
                                        @foreach($order->images as $img)
                                            @if($img->img_for == 1)
                                                <div class="col-md-2 imgBox">
                                                    <img src='{{ asset("storage/$img->imgname") }}' class="serv_img" height="80" width="auto" alt="demo">
                                                    <span class="delete-btn"><img src="{{ asset('image/delete.png') }}" class="delete-icon" data-img_id="{{ $img->id }}" alt=""></span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 form-group mt-4">
                                    <label for="beforeImg">After service image</label>
                                    <div class="row" id="beforeImg">
                                        @foreach($order->images as $img)
                                            @if($img->img_for == 2)
                                                <div class="col-md-2 imgBox">
                                                    <img src='{{ asset("storage/$img->imgname") }}' class="serv_img" height="80" width="auto" alt="demo">
                                                    <span class="delete-btn"><img src="{{ asset('image/delete.png') }}" class="delete-icon" data-img_id="{{ $img->id }}" alt=""></span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-submit">Update</button>
                    <button class="btn btn-primary loader" type="button" disabled style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>
            </form>
            <!-- edit order model -->
        </div>
    </div>
</section>


<!-- modal for image showing -->
<div id="showImage" class="modalimage">
  <span class="imgclose">&times;</span>
  <img class="img-modal-content" id="showimg">
  <div id="caption"></div>
</div>

@endsection

@section('scripts')
<script>
    $(function() {
        $( "#jobdate" ).datepicker({
            format: 'yyyy-mm-dd',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: false,
        });
    });

     // jQuery to saved edited order details
    $(document).on('submit', '#editOrderForm', function(e) {
        e.preventDefault();

        $.ajax({
            type : "POST",
            url : "{{ route('editOrder') }}",
            data : $(this).serialize(),
            beforeSend : function() {
                // $('.btn-submit').css('visibility','hidden');
                // $('.loader').css('display','block');
            },
            success: function(data) {
                if(data.status) {
                    swal(
                        'Success',
                        'Order updated successfully',
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
            }, error: function(xhr) {
                console.log(xhr.responseJSON);
                swal({
                    title: 'error',
                    text:   'Something went wrong',
                    type: 'error'
                });
                let err = xhr.responseJSON;
                $.each(err.errors, function(i, err) {
                    $('#edit'+i).append('<small class="form-text text-danger">'+err+'</small>');
                });
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

    // jQuery to delete servie image
    $(document).on('click', '.delete-icon', function(e) {

        let id = $(this).data('img_id');

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
                    url : "{{ route('deleteServImage') }}",
                    data : {id : id},
                    success: function(data) {
                        if(data) {
                            swal(
                                'Success',
                                'Image deleted successfully',
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
            }
        })
    });
</script>

@endsection