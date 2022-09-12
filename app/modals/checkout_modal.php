<!-- Add User Modal  -->
<div class="modal fade modal-add-contact" id="checkout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout Confirmation</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="firstName">Are You Sure You Want To Checkout This Order?</label>
                                <input type="hidden" name="order_status" value="Placed Orders">
                                <input type="hidden" name="order_estimated_delivery_date" value="<?php echo date('Y-m-d', $delivery_date); ?>">
                                <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="hidden" name="user_email" value="<?php echo $_SESSION['user_email']; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">No, Cancel</button>
                        <button type="submit" name="Process_Cart" class="btn btn-primary btn-pill">Yes, Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>