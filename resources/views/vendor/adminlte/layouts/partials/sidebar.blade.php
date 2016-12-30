
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header"> <span>MAIN NAVIGATION</span></li>
            <!-- Optionally, you can add icons to the links -->
            <!--Old MAILBOX
            <li class="{{ Request::is('home') ? "active":""}}"><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('profile') ? "active":""}}"><a href="{{ url('profile') }}"><i class='fa fa-user'></i> <span>Profile</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-envelope'></i> <span>Mailbox</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ Request::is('client') ? "active":""}}"><a href="{{ url('client') }}"><i class='fa fa-inbox'></i>
                    <span>Inbox</span><small class="label pull-right bg-red">{{ \App\Client::count() }}</small>
                    </a></li>
                    <li class="{{ Request::is('compose') ? "active":""}}"><a href="{{ route('message.index') }}"><i class='fa fa-send-o'></i> <span>Sent</span><small class="label pull-right bg-blue">{{ \App\Message::count() }}</small></span></a></li>
                    <li class="{{ Request::is('compose') ? "active":""}}"><a href="{{ route('message.create') }}"><i class='fa fa-envelope-o'></i> <span>Compose</span></a></li>
                </ul>
            </li>
          -->
          <li class="{{ Request::is('home') ? "active":""}}"><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i></i> <span>Dashboard</span></a></li>
          <li class="{{ Request::is('profile') ? "active":""}}"><a href="{{ url('profile') }}"><i class='fa fa-user'></i> <span>Profile</span></a></li>

            <li class="{{ Request::is('client','message','message/create') ? "active":""}}"> <!--class="treeview active"-->
              <a href="#">
                <i class="fa fa-envelope"></i><span>Mailbox</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ Request::is('client') ? "active":""}}">
                  <a href="{{ url('client') }}"><i class='fa fa-inbox'></i><span>Inbox</span>
                    <span class="pull-right-container">
                      <span class="label label-danger pull-right">{{ \App\Client::count() }}</span>
                    </span>
                  </a>
                </li>
                <li class="{{ Request::is('message') ? "active":""}}">
                  <a href="{{  route('message.index') }}"><i class='fa fa-send-o'></i><span>Sent</span>
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">{{ \App\Message::count() }}</span>
                    </span>
                  </a>
                </li>
                <li class="{{ Request::is('message/create') ? "active":""}}"><a href="{{ route('message.create') }}"><i class='fa fa-edit'></i><span>Compose</span>  </a></li>
              </ul>
              </li>

              <li class="{{ Request::is('user') ? "active":""}}"><a href="{{ url('user') }}"><i class='fa fa-users'></i> <span>Users</span></a></li>


        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
