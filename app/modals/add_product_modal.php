<div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Register New Product</h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="firstName">Product Name</label>
                                <input type="text" required class="form-control" name="product_name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="lastName">Available From</label>
                                <input type="date" required class="form-control" name="product_available_from">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="email">Select Product Category</label>
                            <select type="text" required class="form-control" name="product_category_id">
                                <?php
                                $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0' ORDER BY category_name ASC");
                                if (mysqli_num_rows($categories_sql) > 0) {
                                    while ($product_categories = mysqli_fetch_array($categories_sql)) {
                                ?>
                                        <option value="<?php echo $product_categories['category_id']; ?>"><?php echo $product_categories['category_code'] . ' ' .  $product_categories['category_name']; ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="lastName">SKU Code</label>
                                <input type="text" required class="form-control" value="<?php echo $sku_code; ?>" name="product_sku_code">
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="email">Product price (Ksh)</label>
                            <input type="number" required class="form-control" name="product_price">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="email">Quantity In Stock</label>
                            <input type="number" required class="form-control" name="product_qty_in_stock">
                        </div>

                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-12 col-lg-12 col-form-label">Product Image</label>
                            <div class="col-sm-12 col-lg-12">
                                <div class="custom-file mb-1">
                                    <input type="file" required accept=".png, .jpg, .jpeg" name="product_image" class="custom-file-input">
                                    <label class="custom-file-label" for="coverImage">
                                        Choose file...
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group col-lg-12">
                            <label for="email">Product Details</label>
                            <textarea class="form-control" required name="product_details"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Register_New_Product" class="btn btn-primary btn-pill">Register Product</button>
                </div>
            </form>
        </div>
    </div>
</div>