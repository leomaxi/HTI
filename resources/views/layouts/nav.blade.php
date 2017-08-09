<!-- Left side column. contains the logo and sidebar -->
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

                <li class="menu-dropdown {{ Request::is('configurations*') ? 'active' : '' }}" >
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Configurations</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ Request::is('configurations/newinstitution') ? 'active' : '' }}">
                            <a href="javascript:void(0)">
                                <i class="fa fa-fw ti-receipt"></i> Institutions
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu p-l-40">
                                <li class="{{ Request::is('configurations/newinstitution') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/newinstitution') }}">
                                        <i class="fa fa-fw ti-alert"></i> Setup Institution
                                    </a>
                                </li>
                                <li class="{{ Request::is('configurations/institutions') ? 'active' : '' }}">
                                    <a href="{{ url('configurations/institutions') }}">
                                        <i class="fa fa-fw ti-alert"></i>  Institutions
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="{{ Request::is('configurations/districts') ? 'active' : '' }}">
                            <a href="{{ url('configurations/districts') }}">
                                <i class="fa fa-fw ti-alert"></i> Districts
                            </a>
                        </li>
                        <li class="{{ Request::is('configurations/regiondistricts') ? 'active' : '' }}">
                            <a href="{{ url('configurations/regiondistricts') }}">
                                <i class="fa fa-fw ti-alert"></i> Pair Region with District
                            </a>
                        </li>
                        <li class="{{ Request::is('configurations/departments') ? 'active' : '' }}">
                            <a href="{{ url('configurations/departments') }}">
                                <i class="fa fa-fw ti-alert"></i> Department
                            </a>
                        </li>
                        <li class="{{ Request::is('configurations/institutiontypes') ? 'active' : '' }}">
                            <a href="{{ url('configurations/institutiontypes') }}">
                                <i class="fa fa-fw ti-alert"></i> Institutions Types
                            </a>
                        </li>
                        <li class="{{ Request::is('configurations/gradetypes') ? 'active' : '' }}">
                            <a href="{{ url('configurations/gradetypes') }}">
                                <i class="fa fa-fw ti-alert"></i> Grade Types
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="menu-dropdown {{ Request::is('staff*') ? 'active' : '' }}" >

                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Staff</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="{{ Request::is('staff/new') ? 'active' : '' }}">

                            <a href="{{ url('staff/new') }}">
                                <i class="fa fa-fw ti-alert"></i> New Staff
                            </a>
                        </li> 
                        <li class="{{ Request::is('staff/all') ? 'active' : '' }}">

                            <a href="{{ url('staff/all') }}">
                                <i class="fa fa-fw ti-alert"></i> All Staff
                            </a>
                        </li> 



                    </ul>

                </li>

                <li class="menu-dropdown" style="display: none">
                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Students</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li>
                            <a href="new-student.php">
                                <i class="fa fa-fw ti-alert"></i> New Student
                            </a>
                        </li> <li>
                            <a href="students.php">
                                <i class="fa fa-fw ti-layout-width-default"></i> All Students
                            </a>
                        </li>



                    </ul>

                </li>

                <li class="menu-dropdown {{ Request::is('account*') ? 'active' : '' }}" >

                    <a href="javascript:void(0)">
                        <i class="menu-icon ti-check-box"></i>
                        <span>Account</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">

                        <li class="{{ Request::is('account/usergroups') ? 'active' : '' }}">

                            <a href="{{ url('account/usergroups') }}">
                                <i class="fa fa-fw ti-alert"></i> User Groups
                            </a>
                        </li> 

                        <li class="{{ Request::is('account/assignroles') ? 'active' : '' }}">

                            <a href="{{ url('account/assignroles') }}">
                                <i class="fa fa-fw ti-alert"></i> Assign Roles And Permissions
                            </a>
                        </li> 
                        <li class="{{ Request::is('account/users') ? 'active' : '' }}">

                            <a href="{{ url('account/users') }}">
                                <i class="fa fa-fw ti-alert"></i> Users
                            </a>
                        </li>
                    </ul>

                </li>

            </ul>
            <!-- / .navigation --> </div>
        <!-- menu --> </section>
    <!-- /.sidebar --> </aside>
