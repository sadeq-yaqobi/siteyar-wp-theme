<!-- ============================ search Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs-wrap">
                    <h3 class="breadcrumb-title">نتایج جستجو برای: <?php echo'<span class="text-warning">' . $_GET['s'] . '</span>'?></h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php Breadcrumb::get_breadcrumb();?>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ search Title End ================================== -->
