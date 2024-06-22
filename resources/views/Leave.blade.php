<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta charset="utf-8" />
    <title>CHUKA | Student Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Chuka Student Portal" name="description" />
    <meta content="CHUKA" name="DSL" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <link href="/assets/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" />
    <!-- App css -->
    <link href="/assets/css/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="/assets/css/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="/assets/css/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="/assets/css/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="/assets/js/jquery2.0.3.min.js"></script>
</head>
<body class="loading" style="background-color: #dfe8f7">

<link href="/CSS/Loader.css" rel="stylesheet" />
<div class="loading" align="center" id="divLoader">
    <br />
    <img src="/assets/images/ajax-loader.gif" alt="" height="150" width="150" />
</div>
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <ul class="list-unstyled topnav-menu float-end mb-0">
                <li class="d-none d-lg-block">
                    <form class="app-search">
                        <div class="app-search-box dropdown">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                <button class="btn" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img class="rounded-circle" src="/assets/images/profile_m.png" alt="">

                        <span class="pro-user-name ms-1">
                                WAIRIMU ROSEMARY WANJIKU <i class="mdi mdi-chevron-down"></i>
                            </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                        <!-- item-->
                        <a href="#" onclick="DashBoardLink('STUD');" class="dropdown-item notify-item">
                            <i class="ri-user-fill"></i>
                            <span>Profile</span>
                        </a>
                        <!-- item-->
                        <a href="/" class="dropdown-item notify-item">
                            <i class="ri-logout-box-line"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- LOGO -->
            <div class="logo-box">
                <a href="#" onclick="DashBoardLink('STUD');" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="/assets/images/logo2.png" alt="" height="24">
                            <!-- <span class="logo-lg-text-light">Minton</span> -->
                        </span>
                    <span class="logo-lg">
                            <img src="/assets/images/logo2.png" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">M</span> -->
                        </span>
                </a>
            </div>
            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>

                <li>
                    <!-- Mobile menu toggle (Horizontal Layout)-->
                    <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <!-- LOGO -->
        <div class="logo-box">
            <a href="#" onclick="DashBoardLink('STUD');" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="/assets/images/Logo2.png" alt="" height="64">
                    </span>
                <span class="logo-lg">
                        <img src="/assets/images/Logo2.png" alt="" height="60">
                    </span>
            </a>
        </div>
        <div class="h-100" data-simplebar>
            <!-- User box -->
            <div class="user-box text-center">
                <img class="rounded-circle avatar-md" src="/assets/images/profile_m.png" alt="">

                <div class="dropdown">
                    <a href="#" class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block"
                       data-bs-toggle="dropdown">WAIRIMU ROSEMARY WANJIKU</a>
                    <div class="dropdown-menu user-pro-dropdown">
                        <!-- item-->
                        <a href="#" onclick="DashBoardLink('STUD');" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>Profile</span>
                        </a>
                        <!-- item-->
                        <a href="/" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul id="side-menu">
                    <li class="menu-title">Dashboard</li>
                    <li>
                        <a href="#" onclick="DashBoardLink('STUD');">
                            <i class="ri-user-2-fill"></i>
                            <span>Personal Profile</span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Academics</li>
                    <li>
                        <a href="#" onclick="CourseRegistrationLink();">
                            <i class="ri-registered-fill"></i>
                            <span>Course Registration</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="TimeTableLink();">
                            <i class="ri-time-fill"></i>
                            <span>TimeTable</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="AcademicRequisitionLink();">
                            <i class="ri-git-pull-request-fill"></i>
                            <span>Academic Requisition</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="LecturerEvaluationLink();">
                            <i class="ri-clapperboard-fill"></i>
                            <span>Course Evaluation</span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Financials</li>
                    <li>
                        <a href="#" onclick="FeeStatementLink();">
                            <i class="ri-money-cny-box-fill"></i>
                            <span>Fee Statement</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="LegacyStatementLink();">
                            <i class="ri-money-cny-box-fill"></i>
                            <span>Legacy Statement</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="ReceiptsLink();">
                            <i class="ri-folder-received-fill"></i>
                            <span>Receipts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="SemProformaLink();">
                            <i class="ri-folder-received-fill"></i>
                            <span>Semester Proforma</span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Accommondation</li>
                    <li>
                        <a href="#" onclick="HostelBookingLink();">
                            <i class="ri-hotel-bed-fill"></i>
                            <span>Hostel Booking</span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Examination</li>
                    <li>
                        <a href="#" onclick="ProvisionalResultsLink();">
                            <i class="ri-download-cloud-fill"></i>
                            <span>Transcipt</span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Settings</li>
                    <li>
                        <a href="#" onclick="ChangePasswordLink();">
                            <i class="ri-settings-2-fill"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Provisional Results</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <style>
                    .rowFocus {
                        background-color: red;
                        border: solid 1px lightblue;
                    }

                    .RemoverowFocus {
                        background-color: white;
                    }

                    tr.border_bottom td {
                        border-bottom: 1px solid black;
                        border-top: 1px solid black;
                        font-weight: bolder
                    }

                    .pre-scrollable {
                        max-height: none
                    }
                </style>
                <div class="modal-content">
                    <div class="modal-body pre-scrollable">
                        <table class="table table-hover" style="font-size:12px">
                            <thead style="color:white;background-color:black">
                            <tr>
                                <th>
                                    Unit
                                </th>
                                <th>
                                    Description
                                </th>
                                <th style="text-align:center">
                                    Credits
                                </th>
                                <th style="text-align:center">
                                    Grade
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr style="color:white;background-color:cadetblue">
                                <td colspan="6">Y1S1-SEM1-21/22</td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 101
                                </td>
                                <td>
                                    Economics
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 102
                                </td>
                                <td>
                                    Management Mathematics
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 111
                                </td>
                                <td>
                                    Introducton to Procurement
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 112
                                </td>
                                <td>
                                    Supplies and Materials Management I
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    COMS 101
                                </td>
                                <td>
                                    Communication Skills
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    PHIL 104
                                </td>
                                <td>
                                    Philosophy and Society
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ZOOL 143
                                </td>
                                <td>
                                    HIV AIDS and Life Skills
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td colspan="2" align="right">Totals</td>
                                <td align="center">
                                    315
                                </td>
                                <td colspan="2"></td>
                            </tr>

                            </tbody>
                            <tbody>
                            <tr style="color:white;background-color:cadetblue">
                                <td colspan="6">Y1S2-SEM3-21/22</td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 103
                                </td>
                                <td>
                                    Principles of Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 113
                                </td>
                                <td>
                                    Supplies and Materials Management 11
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 114
                                </td>
                                <td>
                                    Introduction to Supply Chain Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 121
                                </td>
                                <td>
                                    Distributions and Warehousing
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 171
                                </td>
                                <td>
                                    Principles of Accounting
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    COSC 103
                                </td>
                                <td>
                                    Introduction to Computer Applications
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td colspan="2" align="right">Totals</td>
                                <td align="center">
                                    270
                                </td>
                                <td colspan="2"></td>
                            </tr>

                            </tbody>
                            <tbody>
                            <tr style="color:white;background-color:cadetblue">
                                <td colspan="6">Y2S1-SEM1-22/23</td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 221
                                </td>
                                <td>
                                    Principles of Marketing
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 251
                                </td>
                                <td>
                                    Introduction to Human Resource Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 262
                                </td>
                                <td>
                                    Business Statistics I
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 211
                                </td>
                                <td>
                                    Stores Management &amp; Stock Control
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 213
                                </td>
                                <td>
                                    Managing Supply Chain Relationships
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 222
                                </td>
                                <td>
                                    Transport Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 271
                                </td>
                                <td>
                                    Intermediate Accounting
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td colspan="2" align="right">Totals</td>
                                <td align="center">
                                    315
                                </td>
                                <td colspan="2"></td>
                            </tr>

                            </tbody>
                            <tbody>
                            <tr style="color:white;background-color:cadetblue">
                                <td colspan="6">Y2S2-SEM2-22/23</td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 231
                                </td>
                                <td>
                                    Business Finance
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 241
                                </td>
                                <td>
                                    Risk and Insurance
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 263
                                </td>
                                <td>
                                    Operations Research I
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM  214
                                </td>
                                <td>
                                    Retail Merchandise Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM  215
                                </td>
                                <td>
                                    Inventory Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 216
                                </td>
                                <td>
                                    Purchasing Policy and Strategy
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 223
                                </td>
                                <td>
                                    Clearing and Forwarding
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td colspan="2" align="right">Totals</td>
                                <td align="center">
                                    315
                                </td>
                                <td colspan="2"></td>
                            </tr>

                            </tbody>
                            <tbody>
                            <tr style="color:white;background-color:cadetblue">
                                <td colspan="6">Y3S1-SEM1-23/24</td>
                            </tr>
                            <tr>
                                <td>
                                    BCOM 212
                                </td>
                                <td>
                                    Cost Accounting
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 302
                                </td>
                                <td>
                                    Business Law
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    D
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 311
                                </td>
                                <td>
                                    System Production Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 312
                                </td>
                                <td>
                                    Sustainable Supply Chain Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 321
                                </td>
                                <td>
                                    Financial Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    C
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 324
                                </td>
                                <td>
                                    Logistics Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    A
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    BPLM 361
                                </td>
                                <td>
                                    Project Management
                                </td>
                                <td align="center">
                                    45
                                </td>
                                <td align="center">
                                    B
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td colspan="2" align="right">Totals</td>
                                <td align="center">
                                    315
                                </td>
                                <td colspan="2"></td>
                            </tr>

                            </tbody>

                        </table>
                    </div>
                </div>




                <hr style="border:1px solid white" />
                <div align="right">
                    <script>document.write(new Date().getFullYear())</script> &copy; Designed by <a href="#">DSL Systems</a>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
<!--/////////////////notification///////////////////// -->
<div id="myModalViewNotification" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Notifications | <img src="/assets/images/NEW2.gif" /></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="modalBodyViewNotification">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END wrapper -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<!-- Vendor js -->
<script src="/assets/js/vendor.min.js"></script>
<script src="/assets/select2/js/select2.min.js"></script>
<script src="/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Apex js-->
<script src="/assets/libs/moment/min/moment.min.js"></script>
<script src="/assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>
<!-- TODO js-->
<script src="/assets/js/pages/jquery.todo.js"></script>
<!-- App js -->
<script src="/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="/assets/js/pages/form-wizard.init.js"></script>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/DatePicker/jquery-ui.min.js"></script>
<link href="/DatePicker/jquery-ui.min.css" rel="stylesheet" />
<script src="/JS/ShowProgression.js"></script>
<script type="text/javascript">
    var PopNotification= function() {
        ShowProgress();
        $.ajax({
            async: true,
            type: "GET",
            dataType: 'HTML',
            contentType: false,
            processData: false,
            url: '/Common/NotificationMessages',
            success: function (data) {
                HideProgress();
                $("#modalBodyViewNotification").html(data);
                $("#myModalViewNotification").modal("show");
            },
            error: function () {
                HideProgress();
                Swal.fire('Warning', 'There is some problem to process your request. Please try after some time', 'warning');
            }
        });
    };
    var DashBoardLink = function (userRole) {
        ShowProgress();
        if (userRole == "ALLUMINAE") {
            window.location = '/Alumni/Dashboard';
        }
        else {
            window.location = '/Dashboard/Dashboard';
        }
    }
    //current student Links/////////////////
    var CourseRegistrationLink = function () {
        ShowProgress();
        window.location = '/Course/CourseRegistration';
    }
    var FeeStatementLink = function () {
        ShowProgress();
        window.location = '/Financial/FeeStatement';
    }
    var LegacyStatementLink = function () {
        ShowProgress();
        window.location = '/ViewDocuments/ViewDocuments?DocT=LEGST';
    }
    var ReceiptsLink = function () {
        ShowProgress();
        window.location = '/Financial/Receipts';
    }
    var PayFees = function () {
        ShowProgress();
        window.location = '/Financial/PayFees';
    }
    var SemProformaLink = function () {
        ShowProgress();
        window.location = '/ViewDocuments/ViewDocuments?DocT=SEMPROFINV';
    }
    var PaymentPlanLink = function () {
        ShowProgress();
        window.location = '/Financial/PaymentPlan';
    }
    var TimeTableLink = function () {
        ShowProgress();
        window.location = '/Course/StudentTimeTable';
    }
    var AcademicRequisitionLink = function () {
        ShowProgress();
        window.location = '/Course/StudentRequisitions';
    }
    var LecturerEvaluationLink = function () {
        ShowProgress();
        window.location = '/Course/LecturerEvaluation';
    }
    var GraduationRequestLink = function () {
        ShowProgress();
        window.location = '/Course/GraduationRequest';
    }
    var ClearanceRequestLink = function () {
        ShowProgress();
        window.location = '/Course/ClearanceRequest';
    }
    var EnquiryLink = function () {
        ShowProgress();
        window.location = '/Course/StudentEnquiryList';
    }
    var SponsorshipRequisitionLink = function () {
        ShowProgress();
        window.location = '/Course/SponsorshipApplication';
    }
    var HostelBookingLink = function () {
        ShowProgress();
        window.location = '/Welfare/HostelList';
    }
    var MealBookingLink = function () {
        ShowProgress();
        window.location = '/Welfare/MealBooking';
    }
    var ClubsSocietiesLink = function () {
        ShowProgress();
        window.location = '/Welfare/ClubsSociety';
    }
    var ExamCardLink = function () {
        ShowProgress();
        window.location = '/ViewDocuments/ViewDocuments?DocT=EXAMCARD';
    }
    var ProvisionalResultsLink = function () {
        ShowProgress();
        //window.location = '/ViewDocuments/ViewDocuments?DocT=RESULTS';
        window.location = '/ExamResults/ProvisionalResults';
    }
    var StudentAuditLink = function () {
        ShowProgress();
        window.location = '/ViewDocuments/ViewDocuments?DocT=STDAUDIT';
    }
    //end current student Links/////////////////

    //Alluminae Links////////////////////
    var ApplicationIsntuctionLink = function () {
        ShowProgress();
        window.location = '/Alumni/OnlineApplicationInstructions';
    }
    var ApplicationListLink = function () {
        ShowProgress();
        window.location = '/Alumni/ProgrammApplicationList';
    }
    //end Alluminae Links/////////////////
    var ChangePasswordLink = function () {
        ShowProgress();
        window.location = '/Settings/ChangePassword';
    }
</script>
</body>
</html>
