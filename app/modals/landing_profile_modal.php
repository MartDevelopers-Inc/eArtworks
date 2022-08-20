<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="space-bottom-30">
                        <div class="ec-vendor-upload-detail">
                            <form class="row g-3">
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">First name</label>
                                    <input type="text" value="<?php echo $customer['user_first_name']; ?>" required class="form-control">
                                </div>
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">Last name</label>
                                    <input type="text" value="<?php echo $customer['user_last_name']; ?>" required class="form-control">
                                </div>
                                <div class="col-md-8 space-t-15">
                                    <label class="form-label">Email</label>
                                    <input type="text" value="<?php echo $customer['user_email']; ?>" required class="form-control">
                                </div>
                                <div class="col-md-4 space-t-15">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date" value="<?php echo $customer['user_dob']; ?>" required class="form-control">
                                </div>
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" value="<?php echo $customer['user_phone_number']; ?>" required class="form-control">
                                </div>
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">Profile Photo</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-12 space-t-15">
                                    <label class="form-label">Address</label>
                                    <textarea type="text" required class="form-control"><?php echo $customer['user_default_address']; ?></textarea>
                                </div>
                                <div class="col-md-12 space-t-15 text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>