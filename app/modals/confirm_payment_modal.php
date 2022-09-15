<!-- Add User Modal  -->
<div class="modal fade modal-add-contact" id="confirm_payment_<?php echo $order_code; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Enter MPESA Transaction Code You Have Received.</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="firstName">Enter Payment Transaction Code:</label>
                                <input type="hidden" name="payment_order_code" value="<?php echo $_GET['view']; ?>">
                                <input type="hidden" name="payment_amount" value="<?php echo ($total_price + $constant_delivery_fee); ?>">
                                <input type="text" name="confirm_payment_code" value="" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="Confirm_Mpesa_Payment" class="btn btn-primary btn-pill">Pay Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>