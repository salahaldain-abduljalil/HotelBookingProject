    <!-- Top Header Start -->
    <header class="top-header top-header-bg">
        <div class="container">
            <div class="row align-items-center">


                <div class="col-lg-9 col-md-10">
                    <div class="header-right">
                        <ul>
                            <li>
                                <i class='bx bx-home-alt'></i>
                                <a href="#">الجمهورية اليمنية - تعز</a>
                            </li>
                            <li>
                                <i class='bx bx-phone-call'></i>
                                <a href="tel:+1-(123)-456-7890">+967739655904</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="mailto:hello@atoli.com">salahaldynalkhlydy44@gmail.com</a>

                                @auth


                                <li>
                                    <i class='bx bxs-user-pin'></i>
                                    <a href="{{ route('dashboard') }}">لوحة التحكم</a>
                                </li>

                                <li>
                                    <i class='bx bxs-user-rectangle'></i>
                                    <a href="{{ route('user.logout') }}">تسجيل الخروج</a>
                                </li>
                            @else
                                <li>
                                    <i class='bx bxs-user-rectangle'></i>
                                    <a href="{{ route('register') }}">إنشاء حساب لدينا</a>
                                </li>

                                <li> <i class='bx bxs-user-pin'></i>
                                    <a href="{{ route('login') }}">تسجيل الدخول</a>
                                </li>

                            @endauth


                            </li>




                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header End -->
