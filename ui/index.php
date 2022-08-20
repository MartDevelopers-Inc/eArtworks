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

  <!-- ekka Cart Start -->
  <?php include('../app/partials/landing_cart.php'); ?>
  <!-- ekka Cart End -->



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
                  <h1 class="ec-slide-title">New Fashion Collection</h1>
                  <h2 class="ec-slide-stitle">Sale Offer</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do
                  </p>
                  <a href="#" class="btn btn-lg btn-secondary">Order Now</a>
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
                  <h1 class="ec-slide-title">Boat Headphone Sets</h1>
                  <h2 class="ec-slide-stitle">Sale Offer</h2>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do
                  </p>
                  <a href="#" class="btn btn-lg btn-secondary">Order Now</a>
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
                <!-- Product Content -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 ec-product-content" data-animation="fadeIn">
                  <div class="ec-product-inner">
                    <div class="ec-pro-image-outer">
                      <div class="ec-pro-image">
                        <a href="product-left-sidebar.html" class="image">
                          <img class="main-image" src="../public/landing_assets/images/product-image/6_1.jpg" alt="Product" />
                          <img class="hover-image" src="../public/landing_assets/images/product-image/6_2.jpg" alt="Product" />
                        </a>
                        <span class="percentage">20%</span>
                        <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="../public/landing_assets/images/icons/quickview.svg" class="svg_img pro_svg" alt="" /></a>
                        <div class="ec-pro-actions">
                          <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="../public/landing_assets/images/icons/compare.svg" class="svg_img pro_svg" alt="" /></a>
                          <button title="Add To Cart" class="add-to-cart">
                            <img src="../public/landing_assets/images/icons/cart.svg" class="svg_img pro_svg" alt="" />
                            Add To Cart
                          </button>
                          <a class="ec-btn-group wishlist" title="Wishlist"><img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></a>
                        </div>
                      </div>
                    </div>
                    <div class="ec-pro-content">
                      <h5 class="ec-pro-title">
                        <a href="landing_product">Round Neck T-Shirt</a>
                      </h5>
                      <div class="ec-pro-rating">
                        <i class="ecicon eci-star fill"></i>
                        <i class="ecicon eci-star fill"></i>
                        <i class="ecicon eci-star fill"></i>
                        <i class="ecicon eci-star fill"></i>
                        <i class="ecicon eci-star"></i>
                      </div>
                      <span class="ec-price">
                        <span class="old-price">$27.00</span>
                        <span class="new-price">$22.00</span>
                      </span>
                      <div class="ec-pro-option">
                        <div class="ec-pro-color">
                          <ul class="ec-opt-swatch ec-change-img">
                            <li class="active">
                              <a href="#" class="ec-opt-clr-img" data-src="../public/landing_assets/images/product-image/6_1.jpg" data-src-hover="../public/landing_assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color: #e8c2ff"></span></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

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
  <!-- ec Product tab Area End -->

  <!-- ec Banner Section Start -->
  <section class="ec-banner section section-space-p">
    <h2 class="d-none">Banner</h2>
    <div class="container">
      <!-- ec Banners Start -->
      <div class="ec-banner-inner">
        <!--ec Banner Start -->
        <div class="ec-banner-block ec-banner-block-2">
          <div class="row">
            <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight">
              <div class="bnr-overlay">
                <img src="../public/landing_assets/images/banner/2.jpg" alt="" />
                <div class="banner-text">
                  <span class="ec-banner-stitle">New Arrivals</span>
                  <span class="ec-banner-title">mens<br />
                    Sport shoes</span>
                  <span class="ec-banner-discount">30% Discount</span>
                </div>
                <div class="banner-content">
                  <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                </div>
              </div>
            </div>
            <div class="banner-block col-lg-6 col-md-12" data-animation="slideInLeft">
              <div class="bnr-overlay">
                <img src="../public/landing_assets/images/banner/3.jpg" alt="" />
                <div class="banner-text">
                  <span class="ec-banner-stitle">New Trending</span>
                  <span class="ec-banner-title">Smart<br />
                    watches</span>
                  <span class="ec-banner-discount">Buy any 3 Items & get <br />20% Discount</span>
                </div>
                <div class="banner-content">
                  <span class="ec-banner-btn"><a href="#">Order Now</a></span>
                </div>
              </div>
            </div>
          </div>
          <!-- ec Banner End -->
        </div>
        <!-- ec Banners End -->
      </div>
    </div>
  </section>
  <!-- ec Banner Section End -->

  <!--  Category Section Start -->
  <section class="section ec-category-section section-space-p" id="categories">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="section-title">
            <h2 class="ec-bg-title">Our Top Artwork Collection</h2>
            <h2 class="ec-title">Top Artwork Categories</h2>
            <p class="sub-title">Browse The Collection of Top Artwork Categories</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Category Section End -->

  <!--  Top Vendor Section Start -->
  <section class="section section-space-p" id="vendors">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="section-title">
            <h2 class="ec-bg-title">Top Artists & Artwork Shops</h2>
            <h2 class="ec-title">Top Artists & Artwork Shops</h2>
            <p class="sub-title">
              Browse The Collection of
              <a href="landing_artists">All Artists</a>
            </p>
          </div>
        </div>
      </div>
      <div class="row margin-minus-t-15 margin-minus-b-15">
        <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
          <div class="ec-vendor-card">
            <div class="ec-vendor-detail">
              <div class="ec-vendor-avtar">
                <img src="../public/landing_assets/images/vendor/2.jpg" alt="vendor img" />
              </div>
              <div class="ec-vendor-info">
                <a href="catalog-single-vendor.html" class="name">Marvelus</a>
                <p class="prod-count">154 Products</p>
                <div class="ec-pro-rating">
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star fill"></i>
                  <i class="ecicon eci-star"></i>
                </div>
                <div class="ec-sale">
                  <p title="Weekly sales">Sales 954</p>
                </div>
              </div>
            </div>
            <div class="ec-vendor-prod">
              <div class="ec-prod-img">
                <a href="product-left-sidebar.html"><img src="../public/landing_assets//images/product-image/1_1.jpg" alt="vendor img" /></a>
              </div>
              <div class="ec-prod-img">
                <a href="product-left-sidebar.html"><img src="../public/landing_assets//images/product-image/2_1.jpg" alt="vendor img" /></a>
              </div>
              <div class="ec-prod-img">
                <a href="product-left-sidebar.html"><img src="../public/landing_assets//images/product-image/3_1.jpg" alt="vendor img" /></a>
              </div>
              <div class="ec-prod-img">
                <a href="product-left-sidebar.html"><img src="../public/landing_assets//images/product-image/4_1.jpg" alt="vendor img" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Top Vendor Section End -->


  <!-- Footer Start -->
  <?php require_once('../app/partials/landing_footer.php'); ?>
  <!-- Footer Area End -->

  <!-- Vendor JS -->
  <?php require_once('../app/partials/landing_scripts.php'); ?>
</body>


</html>