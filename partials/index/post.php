<!-- ============================ posts Start ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 mb-3">
                <div class="sec-heading2 sec-heading-flex">
                    <div class="sec-left">
                        <h3>مطالب آموزشی</h3>
                    </div>
                    <div class="sec-right">
                        <select class="form-control form-control-sm bg-success text-white" name="" id="">
                            <option value="">نمایش بر اساس : جدیدترین ها</option>
                            <option value="">محبوب ترین ها</option>
                            <option value="">داغ ترین ها</option>
                            <option value="">مطالب ویدئویی</option>
                        </select>
                        <!-- <a href="javascript:void(0);" class="btn-br-more">همه مطالب</a> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                <div class="arrow_slide three_slide-dots arrow_middle" dir="rtl">

                    <!-- Single Slide -->
                    <?php get_template_part('loop/index/post-loop', 'post-loop');?>
                </div>
            </div>
        </div>
        <p class="text-center"><a href="#">همه مطالب</a></p>
    </div>

</section>

<!-- ============================ posts End ================================== -->
