<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $payments['means_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $payments['means_name']; ?>?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="means_id" value="<?php echo $payments['means_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_Payment_Means">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Update Modal -->
<div class="modal fade modal-add-contact" id="edit_<?php echo $payments['means_id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Payment Means</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payment Means Code</label>
                                <input type="hidden" required class="form-control" name="means_id" value="<?php echo $payments['means_id']; ?>">
                                <input type="text" required class="form-control" name="means_code" value="<?php echo $payments['means_code']; ?>">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Payment Means Name</label>
                                <input type="text" required class="form-control" name="means_name" value="<?php echo $payments['means_name']; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Update_Payment_Means" class="btn btn-primary btn-pill">Update Payment Means</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->