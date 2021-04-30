<div class="row">
    <div class="col-lg-2 col-md-2">
        <div class="header__logo">
            <a href="./index.html"><img src="{{ asset('/img') }}/logo.png" alt=""></a>
        </div>
    </div>
    <div class="col-lg-10 col-md-10">
        <div class="header__nav">
            <nav class="header__menu mobile-menu">
                <ul>
                    {{-- <li class="nav-item"><a href="/" class="nav-link {{ request()->is('/') ? 'active' : ''}}"><i class="nav-icon fas fa-home"></i><p>Home</p></a></li> --}}

                    <li class="{{ request()->is('dashboard') ? 'active' : ''}}"><a href="/dashboard">Home</a></li>
                    <li class="{{ request()->is('dashboard/data_transaksi') ? 'active' : ''}}"><a href="/dashboard/data_transaksi">Data Transaksi</a></li>

                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Logout') }}</a></li>
                </ul>
            </nav>
            <div class="header__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
            </div>
        </div>
