<!-- Delete Modal -->
<div class="modal fade" id="delete_<?php echo $apis['api_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $apis['api_name']; ?>?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="api_id" value="<?php echo $apis['api_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_API">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Update Modal -->
<div class="modal fade modal-add-contact" id="edit_<?php echo $apis['api_id']; ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update <?php echo $apis['api_name']; ?></h5>
                </div>
                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="firstName">API Name</label>
                                <input type="hidden" required class="form-control" name="api_id" value="<?php echo $apis['api_id']; ?>">
                                <input type="text" required class="form-control" name="api_name" value="<?php echo $apis['api_name']; ?>">
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="email">API Token (Consumer Secret)</label>
                            <textarea class="form-control" rows="2" name="api_token"><?php echo $apis['api_token']; ?></textarea>
                        </div>
                        <div class=" form-group col-lg-">
                            <label for="email">API Identification (Consumer Key)</label>
                            <textarea class="form-control" rows="2" name="api_identification"><?php echo $apis['api_identification']; ?></textarea>
                        </div>
                    </div>
                </div>


                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Update_API" class="btn btn-primary btn-pill">Update API</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->