<!-- ============================ Footer Start ================================== -->
    <footer class="<?php echo (is_front_page())?'light-footer':'dark-footer skin-dark-footer'?>">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="footer-widget">
                            <img src="<?php echo get_template_directory_uri() .'/assets/img/'. (is_front_page()?'logo.png':'logo-light.png') ?>"
                                 class="img-footer" alt=""/>
                            <div class="footer-add">
                                <p>تهران، خیابان سعادت آباد، خیابان کاج</p>
                                <p>+1 246-345-0695</p>
                                <p>info@learnup.com</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="footer-widget">
                            <h4 class="widget-title">لینک مفید</h4>
                            <ul class="footer-menu">
                                <li><a href="about-us.html">درباره ما</a></li>
                                <li><a href="faq.html">سوالات متداول</a></li>
                                <li><a href="checkout.html">تسویه حساب</a></li>
                                <li><a href="contact.html">تماس با ما</a></li>
                                <li><a href="blog.html">وبلاگ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="footer-widget">
                            <h4 class="widget-title">دسته بندی</h4>
                            <ul class="footer-menu">
                                <li><a href="#">طراحی وب</a></li>
                                <li><a href="#">شبکه و امنیت</a></li>
                                <li><a href="#">برنامه نویسی وب</a></li>
                                <li><a href="#">پایگاه داده</a></li>
                                <li><a href="#">برنامه نویسی موبایل</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3">
                        <div class="footer-widget">
                            <h4 class="widget-title">راهنما و پشتیبانی</h4>
                            <ul class="footer-menu">
                                <li><a href="#">اسناد</a></li>
                                <li><a href="#">چت آنلاین</a></li>
                                <li><a href="#">ارسال ایمیل</a></li>
                                <li><a href="#">قوانین و شرایط</a></li>
                                <li><a href="#">سوالات متداول</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <div class="footer-widget">
                            <h4 class="widget-title">دانلود اپلیکیشن</h4>
                            <a href="#" class="other-store-link">
                                <div class="other-store-app">
                                    <div class="os-app-icon">
                                        <i class="lni-playstore theme-cl"></i>
                                    </div>
                                    <div class="os-app-caps">
                                        گوگل پلی
                                        <span>دریافت اپلیکیشن</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="other-store-link">
                                <div class="other-store-app">
                                    <div class="os-app-icon">
                                        <i class="lni-apple theme-cl"></i>
                                    </div>
                                    <div class="os-app-caps">
                                        اپ استور
                                        <span>دریافت اپلیکیشن</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-6">
                        <p class="mb-0">© 2022 LearnUp ارائه شده توسط <a href="#">راست چین</a></p>
                    </div>

                    <div class="col-lg-6 col-md-6 text-left">
                        <ul class="footer-bottom-social">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">ورود به حساب</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <label>نام کاربری</label>
                                <input type="text" class="form-control" placeholder="نام کاربری">
                            </div>

                            <div class="form-group">
                                <label>رمز عبور</label>
                                <input type="password" class="form-control" placeholder="*******">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">ورود به حساب</button>
                            </div>

                        </form>
                    </div>

                    <div class="social-login mb-3">
                        <ul>
                            <li>
                                <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                <label for="reg" class="checkbox-custom-label">ذخیره رمزعبور</label>
                            </li>
                            <li class="left"><a href="#" class="theme-cl">رمز عبور خود را فراموش کرده اید؟</a></li>
                        </ul>
                    </div>

                    <div class="modal-divider"><span>یـا</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-2">حساب کاربری دارید؟ <a href="register.html" class="link">ورود به اکانت</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- Sign Up Modal -->
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="sign-up">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">ثبت نام</h4>
                    <div class="login-form">
                        <form>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="نام کامل">
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="پست الکترونیکی">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="نام کاربری">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="*******">
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">ثبت نام</button>
                            </div>

                        </form>
                    </div>

                    <div class="modal-divider"><span>یـا</span></div>
                    <div class="social-login ntr mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>Facebook</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>Google</a></li>
                        </ul>
                    </div>

                    <div class="text-center">
                        <p class="mt-3"><i class="ti-user ml-1"></i>آیا حساب کاربری دارید؟ <a href="#" class="link">ورود
                                به
                                حساب کاربری</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/popper.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/select2.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/slick.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/jquery.counterup.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/counterup.min.js' ?>"></script>
    <script src="<?php echo get_template_directory_uri() . '/assets/js/custom.js' ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

    <!-- WordPress function for essential footer elements -->
    <?php wp_footer() ?>
    </body>

    </html>
