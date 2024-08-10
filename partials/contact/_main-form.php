<div class="col-lg-8 col-md-7">
    <div class="prc_wrap">

        <div class="prc_wrap_header">
            <h4 class="property_block_title">تکمیل فرم درخواست</h4>
        </div>

        <div class="prc_wrap-body">
            <form method="post" id="contact-form">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="contact-full-name">نام و نام خانوادگی</label>
                            <input id="contact-full-name" type="text" class="form-control simple"
                                   name="contact_full_name" placeholder="نام و نام خانوادگی">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="contact-email">ایمیل</label>
                            <input id="contact-email" type="email" class="form-control simple" name="contact_email"
                                   placeholder="ایمیل خود را وارد کنید...">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="contact-title">عنوان</label>
                    <input id="contact-title" type="text" class="form-control simple" name="contact_title"
                           placeholder="موضوع درخواست...">
                </div>

                <div class="form-group">
                    <label for="contact-message">پیام</label>
                    <textarea id="contact-message" class="form-control simple" name="contact_message"
                              placeholder="متن پیام شما..."></textarea>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="Your google recaptcha Site Key"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 contact-btn-wrapper">
                        <div class="form-group">
                            <button class="btn btn-theme" type="submit"> ارسال درخواست <i
                                        class="fa fa-spin fa-spinner mr-3 d-none load-more-icon"></i></button>
                        </div>
                    </div>
                </div>


            </form>
        </div>

    </div>

</div>
