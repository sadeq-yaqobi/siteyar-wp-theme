<!-- ========================== post tech Section =============================== -->
<section class="min-sec">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading2 sec-heading-flex">
                    <div class="sec-left">
                        <h2 class="pl-2">آخرین اخبار دنیای تکنولوژی</h2>
                    </div>
                    <div class="sec-right">
                        <select id="post-tech-filter" class="form-control form-control-sm bg-light text-dark">
                            <option value="newest">نمایش بر اساس : جدیدترین ها</option>
                            <option value="popular">محبوب ترین ها</option>
                            <option value="hottest">داغ ترین ها</option>
                            <option value="video">مطالب ویدئویی</option>
                        </select>
                        <!-- <a href="javascript:void(0);" class="btn-br-more">همه مطالب</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="tech-loading position-absolute"></div>
            <div id="ajax-load-content" class="row">
                <!--                    showing tech post by loop-->
                <?php get_template_part('/loop/index/tech-loop', 'tech-loop') ?>
            </div>
        <p class="text-center"><a href="<?php echo site_url('technology') ?>">همه مطالب</a></p>
    </div>


</section>
<!-- ========================== post tech Section =============================== -->

