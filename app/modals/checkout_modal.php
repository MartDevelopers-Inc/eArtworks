<!-- Add User Modal  -->
<div class="modal fade modal-add-contact" id="checkout_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Checkout Your Order</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="firstName">Pay your order with:</label>
                                <input type="hidden" name="order_status" value="Placed Orders">
                                <input type="hidden" name="order_estimated_delivery_date" value="<?php echo date('Y-m-d', $delivery_date); ?>">
                                <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <select name="order_payment_means" class="form-control">
                                    <option>Select Method</option>
                                    <?php
                                    /* Select Payment Method */
                                    $payment_methods_sql = mysqli_query($mysqli, "SELECT * FROM payment_means WHERE means_delete_status = '0'");
                                    if (mysqli_num_rows($payment_methods_sql) > 0) {
                                        while ($payment_methods = mysqli_fetch_array($payment_methods_sql)) {
                                    ?>
                                            <option value="<?php echo $payment_methods['means_id']; ?>"><?php echo $payment_methods['means_name']; ?></option>
                                        <?php }
                                    } else { ?>
                                        <option>No means available</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="Process_Cart" class="btn btn-primary btn-pill">Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>