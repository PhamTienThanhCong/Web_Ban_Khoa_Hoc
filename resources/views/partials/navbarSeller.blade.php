<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{ route('seller.myAccount') }}" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('img/profile.jpg') }}" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Vũ Thu an</span>
          <span class="text-secondary text-small">Quản lý</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <span class="nav-link">
        <a href="{{ route('seller.addCourse') }}">
          <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Thêm khóa học</button>
        </a>
      </span>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'tongquan' ? 'active' : null }}">
      <a class="nav-link" href="{{ route('seller.overView') }}">
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
    <li class="nav-item">
      <a class="nav-link {{ Request::segment(1) === 'taikhoancuatoi' ? 'active' : null }}" href="{{ route('seller.myAccount') }}">
        <span class="menu-title">Quản lý trang cá nhân</span>
        <i class="mdi mdi-contacts menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>