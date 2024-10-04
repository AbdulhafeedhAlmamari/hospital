    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="">
                <img src="{{asset('storage/images/logo.jpg')}}" alt="logo" class="img-fluid rounded-circle h-25 w-25">
                لوحة التحكم
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item  {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{__('Statistics')}}</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <a class="nav-link text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" href="">
                {{-- {{ route('category.index') }} --}}
                <i class="fas fa-book-open"></i>
                <span>{{__('Sections')}}</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <a class="nav-link text-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}" href="">
                {{-- {{ route('category.index') }} --}}
                <i class="fas fa-book-open"></i>
                <span>{{__('Complaints')}}</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        {{-- <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('user.index') }}">
          <i class="fas fa-users"></i>
          <span>المستخدمون</span>
        </a>
      </li> --}}

        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item {{ request()->is('admin/posts*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('posts.index') }}">
        <i class="fas fa-pen-fancy"></i>
          <span>المنشورات</span>
        </a>
      </li> --}}

        <!-- Nav Item - Charts -->
        {{-- <li class="nav-item {{ request()->is('admin/role*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('role.index') }}">
        <i class="fas fa-table"></i>
          <span>الأدوار</span></a>
      </li> --}}

        <!-- Nav Item - Tables -->
        {{-- <li class="nav-item {{ request()->is('admin/permission*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('permissions') }}">
        <i class="fas fa-folder"></i>
          <span>الصلاحيات</span></a>
      </li> --}}

        {{-- <li class="nav-item {{ request()->is('admin/page*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('page.index') }}">
        <i class="fas fa-file"></i>
          <span>الصفحات</span></a>
      </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
