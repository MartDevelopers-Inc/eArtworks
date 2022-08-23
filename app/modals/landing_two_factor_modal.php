<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="space-bottom-30">
                        <div class="ec-vendor-upload-detail">
                            <form class="row g-3" method="POST" enctype="multipart/form-data">
                                <?php
                                if ($customer['user_2fa_status'] == '0') {
                                ?>
                                    <h4 class="text-success text-center">
                                        Two factor authentication is not enabled yet.
                                    </h4>
                                    <p class="text-center"> Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to sign in. </p>
                                    <input type="hidden" name="user_2fa_status" value="1">
                                    <input type="hidden" name="user_email" value="<?php echo $customer['user_email']; ?>">
                                    <input type="hidden" name="user_2fa_code" value="<?php echo $two_fa_codes; ?>">
                                    <input type="hidden" name="alert" value="Two factor authentication is enabled">
                                    <div class="col-md-12 space-t-15 text-center">
                                        <button type="submit" name="Customer_2FA" class="btn btn-primary">Enable Two Factor Authentication</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                                    </div>
                                <?php } else { ?>
                                    <h4 class="text-success text-center">
                                        Two factor authentication is enabled.
                                    </h4>
                                    <p class="text-center"> Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to sign in. </p>
                                    <input type="hidden" name="user_email" value="<?php echo $customer['user_email']; ?>">
                                    <input type="hidden" name="user_2fa_status" value="0">
                                    <input type="hidden" name="user_2fa_code" value="">
                                    <input type="hidden" name="alert" value="Two factor authentication is disabled">
                                    <div class="col-md-12 space-t-15 text-center">
                                        <button type="submit" name="Customer_2FA" class="btn btn-primary">Disable Two Factor Authentication</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal" aria-label="Close">Close</a>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>