<!-- Delete Modal -->
<div class="modal fade" id="delete_category_<?php echo $categories['category_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $categories['category_name']; ?>?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="category_id" value="<?php echo $categories['category_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_Product_Category">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Update Modal -->
<div class="modal fade modal-add-contact" id="update_category_<?php echo $categories['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Category</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="firstName">Category Name</label>
                                <input type="hidden" value="<?php echo $categories['category_id']; ?>" required class="form-control" name="category_id">
                                <input type="text" required class="form-control" value="<?php echo $categories['category_name']; ?>" name="category_name">
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="email">Category Details</label>
                            <textarea class="form-control" rows="5" required name="category_details"><?php echo $categories['category_details']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Update_Product_Category" class="btn btn-primary btn-pill">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->