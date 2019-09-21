<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{\Illuminate\Support\Facades\Auth::user()->photo}}" class="img-circle" alt="User Image">

            </div>
            <div class="pull-left info">
                <p>{{\Illuminate\Support\Facades\Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{ route('home') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->can('add-member'))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Manage Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('add.member')}}"><i class="fa fa-users"></i> Add Member</a></li>
                    <li><a href="{{route('all.members')}}"><i class="fa fa-list"></i> View Members</a></li>
                </ul>
            </li>
            @endif
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark"></i>
                    <span>Manage Project</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-book"></i> Add Project</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-bookmark"></i> All Projects</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark"></i>
                    <span>Manage Permissions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('member.permission') }}"><i class="fa fa-book"></i> Give Permissions</a></li>
                    <li><a href="{{ route('all.permissions') }}"><i class="fa fa-bookmark"></i> All Permission</a></li>
                    <li><a href="{{ route('register.permission') }}"><i class="fa fa-bookmark"></i> Add Permission</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Manage Members</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Remove Member</a></li>
                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Assign Penalty To Member</a></li>
                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> All Punished Members</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Contributions</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('contribute') }}"><i class="fa fa-circle-o"></i> Add Contribution</a></li>
                    <li><a href="{{ route('all.contributions') }}"><i class="fa fa-circle-o"></i> All Contributions</a></li>
                    <li><a href="{{ route('my.contributions') }}"><i class="fa fa-circle-o"></i> My Contributions</a></li>

                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
