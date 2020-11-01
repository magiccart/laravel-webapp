<!DOCTYPE html>
<html>
@include('admin.layout.head')
<body class="menu-position-side menu-side-left full-screen">
<div id="loading"><img id="loading-img" src="{{asset('img/loading.gif')}}" alt=""></div>
<div class="all-wrapper solid-bg-all">
    <!--------------------
    START - Top Bar
    -------------------->
@include('admin.layout.top-bar')
    <!--------------------
    END - Top Bar
    -------------------->
    <div class="search-with-suggestions-w">
        <div class="search-with-suggestions-modal">
            <div class="element-search">
                <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                <div class="close-search-suggestions">
                    <i class="os-icon os-icon-x"></i>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-box"></div>
                    </div>
                    <div class="ssg-name">
                        Projects
                    </div>
                    <div class="ssg-info">
                        24 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-boxed">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url('../../../../public/img/company6.png')"></div>
                            <div class="item-name">
                                Integ<span>ration</span> with API
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url('../../../../public/img/company7.png')"></div>
                            <div class="item-name">
                                Deve<span>lopm</span>ent Project
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-users"></div>
                    </div>
                    <div class="ssg-name">
                        Customers
                    </div>
                    <div class="ssg-info">
                        12 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-list">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                            <div class="item-name">
                                John Ma<span>yer</span>s
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                            <div class="item-name">
                                Th<span>omas</span> Mullier
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                            <div class="item-name">
                                Kim C<span>olli</span>ns
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-folder"></div>
                    </div>
                    <div class="ssg-name">
                        Files
                    </div>
                    <div class="ssg-info">
                        17 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-blocks">
                        <a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-file-text"></i>
                            </div>
                            <div class="item-name">
                                Work<span>Not</span>e.txt
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-film"></i>
                            </div>
                            <div class="item-name">
                                V<span>ideo</span>.avi
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-database"></i>
                            </div>
                            <div class="item-name">
                                User<span>Tabl</span>e.sql
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-image"></i>
                            </div>
                            <div class="item-name">
                                wed<span>din</span>g.jpg
                            </div>
                        </a>
                    </div>
                    <div class="ssg-nothing-found">
                        <div class="icon-w">
                            <i class="os-icon os-icon-eye-off"></i>
                        </div>
                        <span>No files were found. Try changing your query...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
            <div class="mm-logo-buttons-w">
                <a class="mm-logo" href="index.html"><img src="asset('img/logo.png')"><span>Clean Admin</span></a>
                <div class="mm-buttons">
                    <div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                    </div>
                    <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                    </div>
                </div>
            </div>
            <div class="menu-and-user">
                <div class="logged-user-w">
                    <div class="avatar-w">
                        <img alt="" src="asset('{{asset('img/avatar1.jpg')}}">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            Maria Gomez
                        </div>
                        <div class="logged-user-role">
                            Administrator
                        </div>
                    </div>
                </div>
                <!--------------------
                START - Mobile Menu List
                -------------------->
                <ul class="main-menu">
                    <li class="has-sub-menu">
                        <a href="index.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a>
                            </li>
                            <li>
                                <a href="apps_support_dashboard.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Dashboard 4</a>
                            </li>
                            <li>
                                <a href="apps_bank.html">Dashboard 5</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_image.html">Dashboard 6</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="layouts_menu_top_image.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layers"></div>
                            </div>
                            <span>Menu Styles</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layouts_menu_side_full.html">Side Menu Light</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Side &amp; Top</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_right.html">Right Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top.html">Top Menu Light</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="apps_bank.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-package"></div>
                            </div>
                            <span>Applications</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="apps_email.html">Email Application</a>
                            </li>
                            <li>
                                <a href="apps_support_dashboard.html">Support Dashboard</a>
                            </li>
                            <li>
                                <a href="apps_support_index.html">Tickets Index</a>
                            </li>
                            <li>
                                <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Projects List</a>
                            </li>
                            <li>
                                <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_full_chat.html">Chat Application</a>
                            </li>
                            <li>
                                <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_chat.html">Popup Chat</a>
                            </li>
                            <li>
                                <a href="apps_pipeline.html">CRM Pipeline</a>
                            </li>
                            <li>
                                <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_calendar.html">Calendar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-file-text"></div>
                            </div>
                            <span>Pages</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="misc_invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="ecommerce_order_info.html">Order Info <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_charts.html">Charts</a>
                            </li>
                            <li>
                                <a href="auth_login.html">Login</a>
                            </li>
                            <li>
                                <a href="auth_register.html">Register</a>
                            </li>
                            <li>
                                <a href="auth_lock.html">Lock Screen</a>
                            </li>
                            <li>
                                <a href="misc_pricing_plans.html">Pricing Plans</a>
                            </li>
                            <li>
                                <a href="misc_error_404.html">Error 404</a>
                            </li>
                            <li>
                                <a href="misc_error_500.html">Error 500</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-life-buoy"></div>
                            </div>
                            <span>UI Kit</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="uikit_alerts.html">Alerts</a>
                            </li>
                            <li>
                                <a href="uikit_grid.html">Grid</a>
                            </li>
                            <li>
                                <a href="uikit_progress.html">Progress</a>
                            </li>
                            <li>
                                <a href="uikit_popovers.html">Popover</a>
                            </li>
                            <li>
                                <a href="uikit_tooltips.html">Tooltips</a>
                            </li>
                            <li>
                                <a href="uikit_buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="uikit_dropdowns.html">Dropdowns</a>
                            </li>
                            <li>
                                <a href="uikit_typography.html">Typography</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-mail"></div>
                            </div>
                            <span>Emails</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="emails_welcome.html">Welcome Email</a>
                            </li>
                            <li>
                                <a href="emails_order.html">Order Confirmation</a>
                            </li>
                            <li>
                                <a href="emails_payment_due.html">Payment Due</a>
                            </li>
                            <li>
                                <a href="emails_forgot.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="emails_activate.html">Activate Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Users</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="users_profile_big.html">Big Profile</a>
                            </li>
                            <li>
                                <a href="users_profile_small.html">Compact Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-edit-32"></div>
                            </div>
                            <span>Forms</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="forms_regular.html">Regular Forms</a>
                            </li>
                            <li>
                                <a href="forms_validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="forms_wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="forms_uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms_wisiwig.html">Wisiwig Editor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-grid"></div>
                            </div>
                            <span>Tables</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="tables_regular.html">Regular Tables</a>
                            </li>
                            <li>
                                <a href="tables_datatables.html">Data Tables</a>
                            </li>
                            <li>
                                <a href="tables_editable.html">Editable Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-zap"></div>
                            </div>
                            <span>Icons</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_themefy.html">Themefy Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                            </li>
                            <li>
                                <a href="icon_fonts_dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                            </li>
                            <li>
                                <a href="icon_fonts_entypo.html">Entypo</a>
                            </li>
                            <li>
                                <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                            </li>
                            <li>
                                <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                            </li>
                            <li>
                                <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_picons_social.html">Picons Social</a>
                            </li>
                            <li>
                                <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_dashicons.html">Dashicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_typicons.html">Typicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_light_admin.html">Light Admin</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--------------------
                END - Mobile Menu List
                -------------------->
                <div class="mobile-menu-magic">
                    <h4>
                        Light Admin
                    </h4>
                    <p>
                        Clean Bootstrap 4 Template
                    </p>
                    <div class="btn-w">
                        <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        @include('admin.layout.left-nav')
        <!--------------------
        END - Main Menu
        -------------------->
        @yield('content')
    </div>
    <div class="display-type"></div>
</div>
@include('admin.layout.script')
@yield('css')
@yield('script')
</body>
</html>