<footer class="ec-footer section-space-mt">
    <div class="footer-container">
        <div class="footer-top section-space-footer-p">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 ec-footer-contact">
                        <div class="ec-footer-widget">
                            <div class="ec-footer-logo">
                                <a href="../">
                                    <h2>
                                        eArtworks
                                    </h2>
                                </a>
                            </div>
                            <h4 class="ec-footer-heading">Contact us</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        <?php echo $address; ?>
                                    </li>
                                    <li class="ec-footer-link">
                                        <span>Call Us:</span><a href="tel:<?php echo $contacts; ?>"><?php echo $contacts; ?></a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <span>Email:</span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-info">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Information</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        <a href="landing_about">About us</a>
                                    </li>
                                    <li class="ec-footer-link"><a href="landing_faq">FAQ</a></li>
                                    <li class="ec-footer-link">
                                        <a href="landing_terms">Terms And Conditions</a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <a href="landing_contacts">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-account">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Account</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        <a href="login">My Account</a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <a href="login">Order History</a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <a href="login">Wish List</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2 ec-footer-service">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Services</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        <a href="landing_terms">Discount Returns</a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <a href="landing_terms">Policy & policy </a>
                                    </li>
                                    <li class="ec-footer-link">
                                        <a href="landing_terms">Customer Service</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 ec-footer-news">
                        <div class="ec-footer-widget">
                            <h4 class="ec-footer-heading">Newsletter</h4>
                            <div class="ec-footer-links">
                                <ul class="align-items-center">
                                    <li class="ec-footer-link">
                                        Get instant updates about our new products and special
                                        promos!
                                    </li>
                                </ul>
                                <div class="ec-subscribe-form">
                                    <form id="ec-newsletter-form" name="ec-newsletter-form" method="post" action="#">
                                        <div id="ec_news_signup" class="ec-form">
                                            <input class="ec-email" type="email" required="" placeholder="Enter your email here..." name="ec-email" value="" />
                                            <button id="ec-news-btn" class="button btn-primary" type="submit" name="subscribe" value="">
                                                <i class="ecicon eci-paper-plane-o" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Footer social Start -->
                    <div class="col text-left footer-bottom-left">
                        <div class="footer-bottom-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item">
                                    <a class="hdr-facebook" href="https://<?php echo $fb; ?>" target="_blank"><i class="ecicon eci-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="https://<?php echo $twitter; ?>" target="_blank"><i class="ecicon eci-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="https://<?php echo $instagram; ?>" target="_blank"><i class=" ecicon eci-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="https://<?php echo $linkedin; ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer social End -->
                    <!-- Footer Copyright Start -->
                    <div class="col text-center footer-copy">
                        <div class="footer-bottom-copy">
                            <div class="ec-copy">
                                Copyright © 2022 - <?php echo date('Y'); ?>
                                <a class="site-name text-upper" href="https://martmbithi.github.io">eArtworks<span>.</span></a>. All Rights Reserved
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                    <!-- Footer payment -->
                    <div class="col footer-bottom-right">
                        <div class="footer-bottom-payment d-flex justify-content-end">
                            <div class="payment-link">
                                <img src="../public/landing_assets/images/icons/payment.png" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- Footer payment -->
                </div>
            </div>
        </div>
    </div>
</footer>