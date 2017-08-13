<!-- Left side column. contains the logo and sidebar -->

<?php
$permissions = Session::get('permissions');
?>

<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar-->
    <section class="sidebar">
        <div id="menu" role="navigation">
            <ul class="navigation">

                <li  id="active" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('dashboard') }}">
                        <i class="menu-icon ti-layout-list-large-image"></i>
                        <span class="mm-text ">Dashboard </span>
                    </a>
                </li>
                <?php
                if (in_array("VIEW_CONFIGURATIONS", $permissions)) {
                    ?> 
                    <li class="menu-dropdown {{ Request::is('configurations*') ? 'active' : '' }}" >
                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Configurations</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if (in_array("VIEW_INSTITUITIONS", $permissions)) {
                                ?> 
                                <li class="{{ Request::is('configurations/newinstitution') ? 'active' : '' }}">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-fw ti-receipt"></i> Institutions
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu p-l-40">
                                        <?php
                                        if (in_array("CREATE_INSTITUTITION", $permissions)) {
                                            ?> 
                                            <li class="{{ Request::is('configurations/newinstitution') ? 'active' : '' }}">
                                                <a href="{{ url('configurations/newinstitution') }}">
                                                    <i class="fa fa-fw ti-alert"></i> Setup Institution
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <li class="{{ Request::is('configurations/institutions') ? 'active' : '' }}">
                                            <a href="{{ url('configurations/institutions') }}">
                                                <i class="fa fa-fw ti-alert"></i>  Institutions
                                            </a>
                                        </li>

                                    </ul>

                                </li>
                                <?php
                            }

                            if (in_array("VIEW_DISTRICTS", $permissions)) {
                                ?>
                                <li class="{{ Request::is('configurations/districts') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/districts') }}">
                                        <i class="fa fa-fw ti-alert"></i> Districts
                                    </a>
                                </li>
                                <?php
                            }
                            if (in_array("VIEW_REGION_DISTRICT", $permissions)) {
                                ?>
                                <li class="{{ Request::is('configurations/regiondistricts') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/regiondistricts') }}">
                                        <i class="fa fa-fw ti-alert"></i> Pair Region with District
                                    </a>
                                </li>
                                <?php
                            }
                            if (in_array("VIEW_DEPARTMENTS", $permissions)) {
                                ?>
                                <li class="{{ Request::is('configurations/departments') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/departments') }}">
                                        <i class="fa fa-fw ti-alert"></i> Department
                                    </a>
                                </li>
                                <?php
                            }
                            if (in_array("VIEW_INSTITUTION_TYPES", $permissions)) {
                                ?>
                                <li class="{{ Request::is('configurations/institutiontypes') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/institutiontypes') }}">
                                        <i class="fa fa-fw ti-alert"></i> Institutions Types
                                    </a>
                                </li>
                                <?php
                            }
                            if (in_array("VIEW_GRADE_TYPES", $permissions)) {
                                ?>
                                <li class="{{ Request::is('configurations/gradetypes') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/gradetypes') }}">
                                        <i class="fa fa-fw ti-alert"></i> Grade Types
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>
                    </li>
                    <?php
                }

                if (in_array("VIEW_STAFF", $permissions)) {
                    ?>

                    <li class="menu-dropdown {{ Request::is('staff*') ? 'active' : '' }}" >

                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Staff</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if (in_array("CREATE_STAFF", $permissions)) {
                                ?> 
                                <li class="{{ Request::is('staff/new') ? 'active' : '' }}">

                                    <a href="{{ url('staff/new') }}">
                                        <i class="fa fa-fw ti-alert"></i> New Staff
                                    </a>
                                </li> 
                                <?php
                            }
                            ?>
                            <li class="{{ Request::is('staff/all') ? 'active' : '' }}">

                                <a href="{{ url('staff/all') }}">
                                    <i class="fa fa-fw ti-alert"></i> All Staff
                                </a>
                            </li> 
                        </ul>

                    </li>

                    <?php
                }
                if (in_array("VIEW_STUDENTS", $permissions)) {
                    ?>
                    <li class="menu-dropdown {{ Request::is('students*') ? 'active' : '' }}" >

                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Students</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php
                            if (in_array("CREATE_STUDENT", $permissions)) {
                                ?> 
                                <li class="{{ Request::is('students/new') ? 'active' : '' }}">
                                    <a href="{{ url('students/new') }}">
                                        <i class="fa fa-fw ti-alert"></i> New Student
                                    </a>
                                </li> 
                                <?php
                            }
                            ?>
                            <li class="{{ Request::is('students/all') ? 'active' : '' }}">
                                <a href="{{ url('students/all') }}">
                                    <i class="fa fa-fw ti-layout-width-default"></i> All Students
                                </a>
                            </li>



                        </ul>

                    </li>

                    <?php
                }
                if (in_array("VIEW_USERS", $permissions)) {
                    ?>
                    <li class="menu-dropdown {{ Request::is('account*') ? 'active' : '' }}" >

                        <a href="javascript:void(0)">
                            <i class="menu-icon ti-check-box"></i>
                            <span>Account</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">

                            <?php
                            if (in_array("VIEW_USER_GROUPS", $permissions)) {
                                ?> 
                                <li class="{{ Request::is('account/usergroups') ? 'active' : '' }}">

                                    <a href="{{ url('account/usergroups') }}">
                                        <i class="fa fa-fw ti-alert"></i> User Groups
                                    </a>
                                </li> 
                                <?php
                            }
                            if (in_array("ASSIGN_ROLES", $permissions)) {
                                ?>

                                <li class="{{ Request::is('account/assignroles') ? 'active' : '' }}">

                                    <a href="{{ url('account/assignroles') }}">
                                        <i class="fa fa-fw ti-alert"></i> Assign Roles And Permissions
                                    </a>
                                </li> 
                            <?php }
                            ?>
                            <li class="{{ Request::is('account/users') ? 'active' : '' }}">

                                <a href="{{ url('account/users') }}">
                                    <i class="fa fa-fw ti-alert"></i> Users
                                </a>
                            </li>
                        </ul>

                    </li>
                    <?php
                }
                ?>
            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>
