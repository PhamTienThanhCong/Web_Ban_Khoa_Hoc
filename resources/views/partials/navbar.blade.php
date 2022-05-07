<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset("images/avatar/".Session::get('image')) }}" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ Session::get('name') }}</span>
          @if (Session::get('lever') == '2')
            <span class="text-secondary text-small">Quản lý cấp cao</span>
          @else
            <span class="text-secondary text-small">Seler</span>
          @endif
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    @if (Session::get('lever') == '2')
      <li class="nav-item {{ Request::segment(1) === 'tongquan' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('admin.overview') }}">
          <span class="menu-title">Tổng quan</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === '' ? 'active' : null }}" href="{{ route('admin.managerCourse') }}">
          <span class="menu-title">Quản lý khóa học</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-book-open-page-variant menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === '' ? 'active' : null }}" href="{{ route('admin.managerSeller') }}">
          <span class="menu-title">Quản lý nhân viên</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === '' ? 'active' : null }}" href="{{ route('admin.managerUser') }}">
          <span class="menu-title">Quản lý người dùng</span>
          <i class="mdi mdi-account menu-icon"></i>
        </a>
      </li>
    @else
      <li class="nav-item {{ Request::segment(1) === 'taokhoahoc' ? 'active' : null }}">
          <a class="nav-link" href="{{ route('seller.addCourse') }}">
            <span class="menu-title">Tạo khóa học</span>
            <i class="mdi mdi-border-color menu-icon"></i>
          </a>
      </li>
      <li class="nav-item {{ Request::segment(1) === 'tongquan' ? 'active' : null }}">
        <a class="nav-link" href="{{ route('seller.overview') }}">
          <span class="menu-title">Tổng quan</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) === 'quanlykhoahoc' ? 'active' : null }}" href="{{ route('seller.managerCourse') }}">
          <span class="menu-title">Quản lý khóa học</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
      </li>
    @endif
    
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1) === 'taikhoancuatoi' ? 'active' : null }}" href="{{ route('admin.myAccount') }}">
        <span class="menu-title">Quản lý trang cá nhân</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>