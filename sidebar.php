<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">

                <li class="active" id="active">
                    <a href="dashboard.php">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Dashboard </span>
                    </a>
                </li>
                <?php
                if (($_SESSION['usergroup'] == 'admin')) {
                    ?>
                    <li class="menu-dropdown">
                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Configurations</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa fa-fw ti-receipt"></i> Institutions
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu p-l-40">
                                    <li>
                                        <a href="setup-instituition.php">
                                            <i class="fa fa-fw ti-alert"></i> Setup Instituitions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="instituitions.php">
                                            <i class="fa fa-fw ti-layout-width-default"></i>    Instituitions
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li>
                                <a href="region.php">
                                    <i class="fa fa-fw ti-alert"></i> Region
                                </a>
                            </li>
                            <li>
                                <a href="district.php">
                                    <i class="fa fa-fw ti-alert"></i> District
                                </a>
                            </li>
                            <li>
                                <a href="region_districts.php">
                                    <i class="fa fa-fw ti-alert"></i> Pair Region with District
                                </a>
                            </li>
                            <li>
                                <a href="department.php">
                                    <i class="fa fa-fw ti-alert"></i> Department
                                </a>
                            </li>
                            <li>
                                <a href="institution_types.php">
                                    <i class="fa fa-fw ti-alert"></i> Institutions Types
                                </a>
                            </li>
                            <li>
                                <a href="gradestypes.php">
                                    <i class="fa fa-fw ti-alert"></i> Grade Types
                                </a>
                            </li>

                        </ul>
                    </li>
                    <?php
                }
                ?>

                <li class="menu-dropdown">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Staff</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li>
                            <a href="new-staff.php">
                                <i class="fa fa-fw ti-alert"></i> New Staff
                            </a>
                        </li> <li>
                            <a href="allstaff.php">
                                <i class="fa fa-fw ti-layout-width-default"></i> All Staff
                            </a>
                        </li>



                    </ul>

                </li>


            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>
