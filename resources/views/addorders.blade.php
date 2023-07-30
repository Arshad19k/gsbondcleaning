<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="col-md-12 mt-5 mb-5">
            <div class="row mt-3">
                <div class="card">
                    <form action="{{ route('storeform') }}" method="POST">
                        @csrf
                    <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="fname" class="form-control" id="firstname" placeholder="Etner First Name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lname" id="lastname" class="form-control" placeholder="Etner Last Name">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 form-group">
                                    <label for="email">email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Etner Email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Etner Phone">
                                </div>
                            </div>
                            <div class="col-md-12 mt-4 form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 form-group">
                                    <label for="subrub">Subrub</label>
                                    <input type="text" class="form-control" name="subrub" id="subrub" placeholder="Enter SubRub">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="state">State/Region</label>
                                    <input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="postcode">Post code</label>
                                    <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Enter Post Code">
                                </div>
                                <div class="col-md-12 mt-4 form-group">
                                    <label for="jobdate">Job Date</label>
                                    <input class="form-control" name="jobdate" id="jobdate" class="form-control"/>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 form-group">
                                        <label for="bedroom">Bedrooms</label>
                                        <select name="bedroom" id="bedroom" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="bathroom">Bathrooms</label>
                                        <select name="bathroom" id="bathroom" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 form-group">
                                        <label for="livingroom">Living Rooms</label>
                                        <select name="livingroom" id="livingroom" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="furnished">Furnished</label>
                                        <select name="furnished" id="furnished" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 form-group">
                                        <label for="housetype">House Type</label>
                                        <select name="housetype" id="housetype" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="blinds">Blinds</label>
                                        <select name="blinds" id="blinds" class="form-control">
                                            <?php for($i= 0; $i<=10; $i++) { ?>
                                                <option value="<?=$i;?>"><?=$i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-3 form-group">
                                        <label for="howlong">How long have you been living here?</label>
                                        <input type="text" class="form-control" name="howlong" id="howlong">
                                    </div>
                                    <div class="col-md-12 mt-4 form-group">
                                        <h5>Extras</h5>
                                        <div class="row">
                                            <div class="checkbox">
                                                <input type="checkbox" name="carpet" id="carpet" value="1"><label for="carpet">&nbsp; Carpet</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="pest" id="pest" value="1"><label for="pest">&nbsp; Pest</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4 form-group">
                                        <h5>Preferred Method of Contact</h5>
                                        <div class="row">
                                            <div class="checkbox">
                                                <input type="checkbox" name="call" id="call" value="1"><label for="call">&nbsp; Call</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="sms" id="sms" value="1"><label for="sms">&nbsp; SMS</label>
                                            </div>
                                            <div class="checkbox">
                                                <input type="checkbox" name="send_email" id="send_email" value="1"><label for="send_email">&nbsp; Email</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="submitbtn text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>