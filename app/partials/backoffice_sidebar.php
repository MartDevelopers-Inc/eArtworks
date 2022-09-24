<?php
/*
 *   Crafted On Sat Sep 24 2022
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
$user_access_level = mysqli_real_escape_string($mysqli, $_SESSION['user_access_level']);
global $user_access_level;
if ($user_access_level == 'Administrator') {
?>
    <div class="ec-left-sidebar ec-bg-sidebar">
        <div id="sidebar" class="sidebar ec-sidebar-footer">

            <div class="ec-brand">
                <a href="dashboard" title="eArtworks">
                    <img class="ec-brand-icon" src="../public/backoffice_assets/img/logo/ec-site-logo.png" alt="" />
                    <span class="ec-brand-name text-truncate">eArtworks</span>
                </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="ec-navigation" data-simplebar>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <!-- Dashboard -->
                    <li>
                        <a class="sidenav-item-link" href="dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Users -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Staffs</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="backoffice_import_users">
                                        <span class="nav-text">Bulk Import</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_staffs">
                                        <span class="nav-text">Manage Staffs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Customers -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">Customers</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li>
                                    <a class="sidenav-item-link" href="backoffice_import_customers">
                                        <span class="nav-text">Bulk Import</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_customers">
                                        <span class="nav-text">Manage Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </li>

                    <!-- Category -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Categories</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_import_categories">
                                        <span class="nav-text">Bulk Import</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_categories">
                                        <span class="nav-text">Manage Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Products -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-palette-advanced"></i>
                            <span class="nav-text">Products</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_import_products">
                                        <span class="nav-text">Bulk Import</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_products">
                                        <span class="nav-text">Manage Products</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Orders -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-cart"></i>
                            <span class="nav-text">Orders</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_orders">
                                        <span class="nav-text">Manage Orders</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_payments">
                                        <span class="nav-text">Order Payments</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Settings -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-settings"></i>
                            <span class="nav-text">Settings</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="settings" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_settings_mailer">
                                        <span class="nav-text">Mailer API</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_settings_api">
                                        <span class="nav-text">Thirdparty APIs</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_settings_payments">
                                        <span class="nav-text">Payments Methods</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="backoffice_reports">
                            <i class="mdi mdi-file"></i>
                            <span class="nav-text">Reports</span>
                        </a>
                        <hr>
                    </li>
                    <li>
                        <a class="sidenav-item-link" href="backoffice_recycle_bin">
                            <i class="mdi mdi-trash-can"></i>
                            <span class="nav-text">Recycle Bin</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Lite CMS -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-cast"></i>
                            <span class="nav-text">Lite CMS</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="settings" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_cms_toc">
                                        <span class="nav-text">Terms & Conditions</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_cms_faq">
                                        <span class="nav-text">FAQ</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_cms_contacts">
                                        <span class="nav-text">Contacts</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_cms_about">
                                        <span class="nav-text">About Us</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } else if ($user_access_level == 'Staff') { ?>

    <div class="ec-left-sidebar ec-bg-sidebar">
        <div id="sidebar" class="sidebar ec-sidebar-footer">

            <div class="ec-brand">
                <a href="dashboard" title="eArtworks">
                    <img class="ec-brand-icon" src="../public/backoffice_assets/img/logo/ec-site-logo.png" alt="" />
                    <span class="ec-brand-name text-truncate">eArtworks</span>
                </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="ec-navigation" data-simplebar>
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <!-- Dashboard -->
                    <li>
                        <a class="sidenav-item-link" href="dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <hr>
                    </li>

                    <!-- Customers -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">Customers</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_customers">
                                        <span class="nav-text">Manage Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </li>

                    <!-- Category -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-dns-outline"></i>
                            <span class="nav-text">Categories</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_categories">
                                        <span class="nav-text">Manage Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Products -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-palette-advanced"></i>
                            <span class="nav-text">Products</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_products">
                                        <span class="nav-text">Manage Products</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Orders -->
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)">
                            <i class="mdi mdi-cart"></i>
                            <span class="nav-text">Orders</span> <b class="caret"></b>
                        </a>
                        <div class="collapse">
                            <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_orders">
                                        <span class="nav-text">Manage Orders</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a class="sidenav-item-link" href="backoffice_manage_payments">
                                        <span class="nav-text">Order Payments</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php } else {
    /* Prevent Customer Accessing Back Office */
    header('Location: logout');
} ?>