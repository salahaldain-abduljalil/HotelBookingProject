@extends('frontend.master')
@section('content')
    <!-- Inner Banner -->
    <div class="inner-banner inner-bg9">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="#">الصفحة الرئيسية</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>تسجيل الدخول</li>
                </ul>
                <h3>تسجيل الدخول</h3>
            </div>

        </div>
    </div>
    <!-- Inner Banner End -->

    <!-- Sign In Area -->
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">تسجيل الدخول</span>
                                <h2> !تسجيل الدخول إلى حسابك</h2>
                            </div>


                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="form-group">
                                            <input type="text" name="login" id="login" class="form-control"
                                                required data-error="Please enter your Username or Email"
                                                placeholder="إسم المستحدم/رقم الهاتف /البريد الألكتروني">
                                        </div>
                                        <x-input-error :messages="$errors->get('login')" class="mt-2" />

                                        </div>


                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" id="password" type="password" name="password"
                                                    placeholder="كلمة المرور">
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>

                                        <div class="col-lg-6 col-sm-6 form-condition">
                                            <div class="agree-label">
                                                <input type="checkbox" id="chb1">
                                                <label for="chb1">
                                                    قم بتذكيري
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12">
                                            <a class="forget" href="#">هل نسييت كلمة المرور؟
                                                </a>

                                            <div class="col-lg-12 col-md-12 text-center">
                                                <button type="submit"
                                                    class="default-btn btn-bg-three border-radius-5 form-control">
                                                    تسجيل الدخول
                                                </button>
                                            </div>

                                            <div class="col-12">
                                                <p class="account-desc">
                                                    Not a Member?
                                                    <a href="{{ route('register') }}">إنشاء جديد</a>
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- Sign In Area End -->
@endsection
