<!-- ========================
    page title 
=========================== -->
<section class="page-title-layout2 page-title-light text-center pb-0 bg-overlay bg-parallax">
    <div class="bg-img"><img src="/assets/general/images/page-titles/10.jpg" alt="background"></div>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
        <h1 class="pagetitle-heading">Research</h1>
        </div><!-- /.col-xl-6 -->
    </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="breadcrumb-area">
    <div class="container">
        <nav>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item">
            <a href="/"><i class="icon-home"></i> <span>Beranda</span></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Labolatorium</li>
        </ol>
        </nav>
    </div><!-- /.container -->
    </div><!-- /.breadcrumb-area -->
</section><!-- /.page-title -->

<!-- ========================
    Services Layout 2
=========================== -->
<section class="services-layout2">
    <div class="container">
    <div id="filtered-items" class="row">
        <?php foreach ($listLab as $lab) : ?>
            <div class="col-sm-12 col-md-12 col-lg-6 mix filter-medical">
            <div class="service-item">
                <div class="service-img">
                <div class="bg-img"><img src="/assets/file/lab/<?=strlen($lab->lab_banner) > 1 ? $lab->lab_banner :'default/banner-lab-default.jpg'?>" alt="service"></div>
                </div><!-- /.service-img -->
                <div class="service-body">
                <h4 class="service-title">
                    <a href="labolatorium/<?=$lab->seo_lab?>" ><?=$lab->lab_name?></a>
                </h4>
                <p class="service-desc">
                    <?php 
                        $text = strip_tags($lab->lab_description); 
                        echo mb_strlen($text) > 10 ? mb_substr($text, 0, 200) . "..." : $text;
                    ?>
                </p>
                <a href="labolatorium/<?=$lab->seo_lab?>" class="btn btn-link btn-primary">
                    <i class="plus-icon">+</i>
                    <span>Read More</span>
                </a>
                </div><!-- /.service-body -->
            </div><!-- /.service-item -->
            </div><!-- /.col-lg-4 -->
        <?php endforeach ?>
    </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.Services Layout 2 -->