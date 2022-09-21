<?php
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$user_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$user_id}'");
if (mysqli_num_rows($user_sql) > 0) {
    while ($customer = mysqli_fetch_array($user_sql)) {

?>
        <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
            <div class="ec-sidebar-wrap">
                <!-- Sidebar Category Block -->
                <div class="ec-sidebar-block">
                    <div class="ec-vendor-block">
                        <div class="ec-vendor-block-detail">
                            <?php
                            /* Load Default Image If User Has No Profile Photo */
                            if ($customer['user_profile_picture'] == '') { ?>
                                <img class="v-img" src="../public/uploads/users/no-profile.png" alt="Customer image">
                            <?php } else { ?>
                                <img class="v-img" src="../public/uploads/users/<?php echo $customer['user_profile_picture']; ?>" alt="Customer image">
                            <?php } ?> <h5><?php echo $customer['user_first_name'] . ' ' . $customer['user_last_name']; ?></h5>
                        </div>
                        <div class="ec-vendor-block-items">
                            <ul>
                                <li><a href="landing_seller_dashboard">Dashboard</a></li>
                                <li><a href="landing_seller_products">Products</a></li>
                                <li><a href="landing_seller_orders">Orders</a></li>
                                <li><a href="landing_seller_payments">Payments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }
} ?>