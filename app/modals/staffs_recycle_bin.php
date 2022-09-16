<!-- Restore Staff -->
<div class="modal fade" id="restore_staff_<?php echo $staffs['user_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM RESTORE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Restore <?php echo  $staffs['user_first_name'] . ' ' . $staffs['user_last_name']; ?> Deleted Account ?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="user_id" value="<?php echo $staffs['user_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Restore_Staff_Account">Yes, Restore</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Restore Modal -->

<!-- Start Delete Modal -->
<div class="modal fade" id="delete_staff_<?php echo $staffs['user_id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST">
                <div class="modal-body text-center ">
                    <h4 class="text-danger">
                        Delete <?php echo  $staffs['user_first_name'] . ' ' . $staffs['user_last_name']; ?> From Recycle Bin?
                    </h4>
                    <br>
                    <!-- Hide This -->
                    <input type="hidden" name="user_id" value="<?php echo $staffs['user_id']; ?>">
                    <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="text-center btn btn-danger" name="Delete_Staff_Account">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Delete Staff -->