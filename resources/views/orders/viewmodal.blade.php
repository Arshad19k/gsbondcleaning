<div class="modal fade" id="viewOrder_modal" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Order details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form id="editOrderForm">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editfname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editlname">Last Name</label>
                                <input type="text" class="form-control" name="editlname" id="lname" placeholder="Enter last Name" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editemail">Email</label>
                                <input type="text" class="form-control" name="editemail" id="email" placeholder="Enter Email" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editphone">Phone</label>
                                <input type="text" class="form-control" name="editphone" id="phone" placeholder="Enter Phone" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="services">Services</label>
                                <select name="services" id="services" class="form-control" disabled>
                                    <option value="">Select a service</option>
                                    <option value="Care_removals">Care Removals</option>
                                    <option value="Care_bond_cleaning">Care Bond Cleaning</option>
                                    <option value="Care_care_cleaning">Care Care Cleaning</option>
                                    <option value="Care_tiles_grout_cleaning">Care Tiles Grout Cleaning</option>
                                    <option value="Care_handyman">Care Handyman</option>
                                    <option value="Care_plumbers">Care Plumbers</option>
                                    <option value="Care_gardening">Care Gardening</option>
                                    <option value="Care_electrician">Care Electrician</option>
                                    <option value="Care_locksmith">Care Locksmith</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="editmessage">Message</label>
                                <textarea name="editmessage" class="form-control" id="message" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editsubrub">Subrub</label>
                                <input type="text" class="form-control" name="editsubrub" id="subrub" placeholder="Enter Subrub" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editstate">State/Region</label>
                                <input type="text" class="form-control" name="editstate" id="state" placeholder="Enter State" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editpostCode">Post Code</label>
                                <input type="text" class="form-control" name="editpostCode" id="postCode" placeholder="Enter Post Code" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editjobdate">Job Date</label>
                                <input type="text" class="form-control" name="editjobdate" id="jobdate" placeholder="Enter Job Date" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editbedrooms">Bedrooms</label>
                                <select name="editbedrooms" id="bedrooms" class="form-control" disabled>
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editbathroom">Bathrooms</label>
                                <select name="editbathroom" id="bathroom" class="form-control" disabled>
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="editlivingrooms">Living Room</label>
                                <select name="editlivingrooms" id="livingrooms" class="form-control" disabled>
                                    <?php for($i= 0; $i <= 10; $i++) { ?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="editfurnished">Furnished</label>
                                <select name="editfurnished" id="furnished" class="form-control" disabled>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="housetype">House Type</label>
                                <select name="edithousetype" id="housetype" class="form-control" disabled>
                                    <option value="">Select</option>
                                    <option value="unit">Unit</option>
                                    <option value="house">House</option>
                                    <option value="two_storey">Two Storey</option>
                                    <option value="multi_storey">Multi Storey</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="blinds">Blinds</label>
                                <select name="editblinds" id="blinds" class="form-control" disabled>
                                    <option value="">Select</option>
                                    <option value="no_blinds">No Blinds</option>
                                    <option value="verticals">Verticals</option>
                                    <option value="venetians">Venetians</option>
                                    <option value="shutters">shutters</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="howlong">How long have you been living here?</label>
                                <textarea name="edithowlong" class="form-control" id="howlong" rows="3" disabled></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="assign_user">Assign user</label>
                                <select name="assignUser" id="assign_user" class="form-control" disabled>
                                    <option value="">Select User</option>
                                    @foreach($user as $user)
                                        <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Extras</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="carpet" id="carpet" value="1" disabled><label for="editcarpet">&nbsp; Carpet</label></li>
                                    <li><input type="checkbox" name="pest" id="pest" value="1" disabled><label for="editpest">&nbsp; Pest</label></li>
                                </ul>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label>Preferred Method of Contact</label>
                                <ul class="checkbox">
                                    <li><input type="checkbox" name="call" id="call" value="1" disabled><label for="editcall">&nbsp; Call</label></li>
                                    <li><input type="checkbox" name="sms" id="sms" value="1" disabled><label for="editsms">&nbsp; SMS</label></li>
                                    <li><input type="checkbox" name="sendemail" id="sendemail" value="1" disabled><label for="sendemail">&nbsp; Email</label></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="editstatus">Status</label>
                                <select name="editstatus" id="status" class="form-control" disabled>
                                    <option value="">Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1" >Running</option>
                                    <option value="2" >Completed</option>
                                </select>
                            </div>
                        </div>
                        <!-- Images -->
                            <div class="row">
                                <div class="col-md-12 form-group mt-4">
                                    <label for="beforeImg">Before service image</label>
                                    <div class="row" id="beforeImg">
                                       
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12 form-group mt-4">
                                    <label for="afterImg">After service image</label>
                                    <div class="row" id="afterImg">
                                       
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary btn-submit">Update</button>
                    <button class="btn btn-primary loader" type="button" disabled style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button> -->
                </div>
            </form>
        </div>
    </div>
</div>