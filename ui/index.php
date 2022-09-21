<?php
/*
 *   Crafted On Thu Aug 18 2022
 *
 * 
 *   https://bit.ly/MartMbithi
 *   martdevelopers254@gmail.com
 *
 *
 *   The MartDevelopers End User License Agreement
 *   Copyright (c) 2022 MartDevelopers
 *
 *
 *   1. GRANT OF LICENSE 
 *   MartDevelopers hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from MartDevelopers. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from MartDevelopers.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by MartDevelopers and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   MARTDEVELOPERS  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   MARTDEVELOPERS SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL MARTDEVELOPERS OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF MARTDEVELOPERS HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL MARTDEVELOPERS  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */
session_start();
require_once('../app/settings/config.php');
require_once('../app/partials/landing_head.php');
?>

<body>
  <div id="ec-overlay"><span class="loader_img"></span></div>

  <!-- Header start  -->
  <?php require_once('../app/partials/landing_navigation.php'); ?>
  <!-- Header End  -->


  <!-- Main Slider Start -->
  <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
    <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
      <!-- Main slider -->
      <div class="swiper-wrapper">
        <div class="ec-slide-item swiper-slide d-flex ec-slide-1">
          <div class="container align-self-center">
            <div class="row">
              <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                <div class="ec-slide-content slider-animation">
                  <h1 class="ec-slide-title text-primary">Top Artwork Collection</h1>
                  <h2 class="ec-slide-title text-primary">Sale Offer</h2>
                  <p class="text-primary">
                    Purchase high-quality artworks from your favorite artists from across the world.
                  </p>
                  <a href="landing_products" class="btn btn-lg btn-secondary">Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ec-slide-item swiper-slide d-flex ec-slide-2">
          <div class="container align-self-center">
            <div class="row">
              <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                <div class="ec-slide-content slider-animation">
                  <h1 class="ec-slide-title">Ready Market</h1>
                  <h2 class="ec-slide-stitle">Expand your market quickly.</h2>
                  <p class="">
                    Are you an artist looking to expand into new markets? Register today and receive a free platform to sell your artworks.
                  </p>
                  <a href="register" class="btn btn-lg btn-secondary">Register Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination swiper-pagination-white"></div>
      <div class="swiper-buttons">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
  <!-- Main Slider End -->

  <!-- Product tab Area Start -->
  <section class="section ec-product-tab section-space-p" id="collection">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="section-title">
            <h2 class="ec-bg-title">Our Top Artwork Collection</h2>
            <h2 class="ec-title">Our Top Artwork Collection</h2>
            <p class="sub-title">Browse The Collection of Top Products</p>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col">
          <div class="tab-content">
            <!-- 1st Product tab start -->
            <div class="tab-pane fade show active" id="tab-pro-for-all">
              <div class="row">
                <?php

                $products_sql = mysqli_query(
                  $mysqli,
                  "SELECT * FROM products p
                  INNER JOIN users u ON u.user_id = p.product_seller_id
                  INNER JOIN categories c ON c.category_id = p.product_category_id
                  WHERE u.user_delete_status = '0' 
                  AND c.category_delete_status = '0'
                  AND p.product_delete_status = '0'
                  ORDER BY RAND() LIMIT 6"
                );
                if (mysqli_num_rows($products_sql) > 0) {
                  while ($products = mysqli_fetch_array($products_sql)) {
                    /* Image Directory */
                    if ($products['product_image'] == '') {
                      $image_dir = "../public/uploads/products/no_image.png";
                    } else {
                      $image_dir = "../public/uploads/products/" . $products['product_image'];
                    }

                    /* Only show available artworks */
                    $availability = strtotime($products['product_available_from']);
                    /* Show Available Artowkrs */
                    if ($current_time >= $availability) {
                ?>
                      <!-- Product Content -->
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-6 ec-product-content" data-animation="fadeIn">
                        <div class="ec-product-inner">
                          <div class="ec-pro-image-outer">
                            <div class="ec-pro-image">
                              <a href="landing_product?view=<?php echo $products['product_id']; ?>&category=<?php echo $products['category_id']; ?>" class="image">
                                <img class="main-image" src="<?php echo $image_dir; ?>" alt="Product" />
                              </a>
                              <span class="percentage"><?php echo $products['product_sku_code']; ?> </span>
                            </div>
                          </div>
                          <div class="ec-pro-content">
                            <h5 class="ec-pro-title">
                              <a href="landing_product?view=<?php echo $products['product_id']; ?>&category=<?php echo $products['category_id']; ?>"><?php echo $products['product_name']; ?></a>
                            </h5>
                            <span class="ec-price">
                              <span class="new-price">Ksh <?php echo number_format($products['product_price'], 2); ?></span>
                            </span>
                          </div>
                        </div>
                      </div>
                  <?php }
                  }
                } else { ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-6 ec-product-content" data-animation="fadeIn">
                    <div class="ec-product-inner">
                      <div class="ec-pro-image-outer">
                        <div class="ec-pro-image">
                          <a href="" class="image">
                            <img class="main-image" src="../public/uploads/products/no_image.png" alt="Product" />
                          </a>
                        </div>
                      </div>
                      <div class="ec-pro-content">
                        <h5 class="ec-pro-title">
                          <a href="">No available products at the moment</a>
                        </h5>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                <div class="col-sm-12 shop-all-btn">
                  <a href="landing_products">Shop All Collection</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer Start -->
  <?php require_once('../app/partials/landing_footer.php'); ?>
  <!-- Footer Area End -->

  <!-- Vendor JS -->
  <?php require_once('../app/partials/landing_scripts.php'); ?>
</body>


</html>