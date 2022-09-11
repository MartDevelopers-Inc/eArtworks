<!-- Delete Modal -->
<div class="modal fade" id="delete_order_<?php echo $orders['order_code']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $orders['order_code']; ?>?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="order_code" value="<?php echo $orders['order_code']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_Order">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Update Modal -->
<div class="modal fade modal-add-contact" id="update_order_<?php echo $orders['order_code']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Update Order <?php echo $orders['order_code']; ?></h5>
                </div>

                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Order Cost (Ksh)</label>
                                <input type="number" value="<?php echo $orders['order_cost']; ?>" required class="form-control" name="order_cost">
                                <input type="hidden" required class="form-control" value="<?php echo $orders['order_code']; ?>" name="order_code">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Estimated Delivery Date</label>
                            <input type="date" value="<?php echo $orders['order_estimated_delivery_date']; ?>" required class="form-control" name="order_estimated_delivery_date">
                        </div>
                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Update_Order" class="btn btn-primary btn-pill">Update Order</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Update Order Status -->
<div class="modal fade" id="update_order_status<?php echo $orders['order_code']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Order # <?php echo $orders['order_code']; ?> Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-body px-4">
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="lastName">Order Status</label>
                                <!-- Hide This -->
                                <input type="hidden" name="order_code" value="<?php echo $orders['order_code']; ?>">
                                <select type="text" required class="form-control" name="order_status">
                                    <option value="Placed Orders">Order Placed</option>
                                    <option>Awaiting Fullfilment</option>
                                    <option>Shipped</option>
                                    <option>Out For Delivery</option>
                                    <option>Delivered</option>
                                    <option>Returned</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="Update_Order_Status" class="btn btn-primary btn-pill">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->