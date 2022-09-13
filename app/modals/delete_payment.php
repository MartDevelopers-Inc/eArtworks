<div class="modal fade" id="delete_payment_<?php echo $payments['payment_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $payments['payment_ref_code'] ?>?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="order_code" value="<?php echo $payments['payment_order_code']; ?>">
                    <input type="hidden" name="payment_id" value="<?php echo $payments['payment_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_Payment">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>