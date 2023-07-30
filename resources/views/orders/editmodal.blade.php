<!-- edit order Model -->
<div class="modal fade" id="editOrder_modal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Order</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="" id="editOrderForm">
                @csrf
                <input type="hidden" name="order_id" id="order_id">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editfname">First Name</label>
                                <input type="text" class="form-control" name="editfname" id="editfname" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editlname">Last Name</label>
                                <input type="text" class="form-control" name="editlname" id="editlname" placeholder="Enter last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editemail">Email</label>
                                <input type="text" class="form-control" name="editemail" id="editemail" placeholder="Enter Email" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editphone">Phone</label>
                                <input type="text" class="form-control" name="editphone" id="editphone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="editmessage">Message</label>
                                <textarea name="editmessage" class="form-control" id="editmessage" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editsubrub">Subrub</label>
                                <input type="text" class="form-control" name="editsubrub" id="editsubrub" placeholder="Enter Subrub">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editstate">State/Region</label>
                                <input type="text" class="form-control" name="editstate" id="editstate" placeholder="Enter State">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editpostCode">Post Code</label>
                                <input type="text" class="form-control" name="editpostCode" id="editpostCode" placeholder="Enter Post Code">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editjobdate">Job Date</label>
                                <input type="text" class="form-control" name="editjobdate" id="editjobdate" placeholder="Enter Job Date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editbedrooms">Bedrooms</label>
                                <select name="editbedrooms" id="editbedrooms" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editbathroom">Bathrooms</label>
                                <select name="editbathroom" id="editbathroom" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editlivingrooms">Living Room</label>
                                <select name="editlivingrooms" id="editlivingrooms" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editfurnished">Furnished</label>
                                <select name="editfurnished" id="editfurnished" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="edithousetype">House Type</label>
                                <select name="edithousetype" id="edithousetype" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editblinds">Blinds</label>
                                <select name="editblinds" id="editblinds" class="form-control">
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="edithowlong">How long have you been living here?</label>
                                <textarea name="edithowlong" class="form-control" id="edithowlong" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="assign_user">Assign user</label>
                                <select name="assignUser" id="assign_user" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($user as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Extras</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="carpet" id="editcarpet"><label for="editcarpet">&nbsp; Carpet</label></li>
                                    <li><input type="checkbox" name="pest" id="editpest"><label for="editpest">&nbsp; Pest</label></li>
                                </ul>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Preferred Method of Contact</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="call" id="editcall"><label for="editcall">&nbsp; Call</label></li>
                                    <li><input type="checkbox" name="sms" id="editsms"><label for="editsms">&nbsp; SMS</label></li>
                                    <li><input type="checkbox" name="sendemail" id="sendemail"><label for="sendemail">&nbsp; Email</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="editstatus">Status</label>
                                <select name="editstatus" id="editstatus" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Running</option>
                                    <option value="2">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- edit order model -->