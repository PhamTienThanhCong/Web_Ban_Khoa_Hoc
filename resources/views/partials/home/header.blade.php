<header class="header">
    <div class="header-contain">
        <div class="header-logo">
            <span>Vaiable</span>
        </div>
        <div class="header-search">
            <form class="search-input-form" action="{{ route('home.course') }}" method="get">
                <div class="input-container">
                    <input class="input" type="text" id="keyword" name="keyword" placeholder="Search">
                </div>
            </form>
        </div>
        @if (Session::get('name') == null)
            <div class="login">
                <a href="{{ route('user.login') }}">
                    <button class="btn-login">Đăng nhập</button>
                </a>
            </div>
        @else
            <div class="header__user">
                <img src="{{ asset("images/avatar/" . Session::get('image')) }}" alt="{{ Session::get('name') }}"
                    class="header__user-img">
                <span class="header__user-name">{{ Session::get('name') }}</span>

                <ul class="header__user-menu">
                    <li class="header__user-item">
                        <a href="{{ route('user.myAccount') }}">Tài khoản của tôi</a>
                    </li>
                    <li class="header__user-item">
                        <a href="{{ route('home.myCart') }}">Giỏ hàng của tôi</a>
                    </li>
                    <li class="header__user-item">
                        <a href="{{ route('user.logout') }}">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</header>