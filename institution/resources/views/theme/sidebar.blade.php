    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <img style="width:70%" src="{{ asset('image/logo.png') }}">
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" style="background-color: #fff">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>لوحة التحكم</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" style="background-color: #fff">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/news*') ? 'active' : '' }}" >
        <a class="nav-link text-right" href="{{ route('news.index') }}">
        <i class="fas fa-book-open"></i>
          <span>الأخبار</span>
        </a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('categories.index') }}">
            <i class="fas fa-book-open"></i>
          <span>التصنيفات</span>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/work_fields*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('work_fields.index') }}">
            <i class="fas fa-users"></i>
          <span>مجالات العمل</span>
        </a>
      </li>


      <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
          <span>المستخدمون</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('admin/setting*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('admin.settings.edit') }}">
            <i class="fas fa-users"></i>
          <span>الاعدادات</span>
        </a>
      </li>
      <li class="nav-item {{ request()->is('admin/slides*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('slides.index') }}">
            <i class="fas fa-users"></i>
            <span>السلايدات</span>
        </a>
    </li>
      <li class="nav-item {{ request()->is('admin/partners*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('partners.index') }}">
            <i class="fas fa-users"></i>
            <span>الشركاء</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('admin/messages*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('message.index') }}">
            <i class="fas fa-users"></i>
          <span>الرسائل</span>
        </a>
      </li>

    <li class="nav-item {{ request()->is('admin/analytics*') ? 'active' : '' }}">
        <a class="nav-link text-right" href="{{ route('analytics.index') }}">
          <i class="fas fa-chart-line"></i>
          <span>التحليلات</span>
        </a>
      </li>






      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
