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
                    <a class="sidenav-item-link" href="backoffice_recycle_bin">
                        <i class="mdi mdi-vie"></i>
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