<!-- ============================
    Slider
============================== -->
<section class="slider">
    <div class="slick-carousel carousel-dots-light m-slides-0"
    data-slick='{"slidesToShow": 1,"autoplay": true, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>
    <div class="slide-item bg-overlay align-v-h">
        <div class="bg-img"><img src="/assets/img/bg-banner-home.jpg" alt="slide img"></div>
        <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
            <div class="slide-content">
                <span class="slide-subtitle">Inovasi penelitian Fisika berbasis integrasi ayat-ayat kauniyah Al’Quran</span>
                <h2 class="slide-title">Labolatorium Fisika</h2>
                <p class="slide-desc">Menghasilkan karya-karya penelitian tepat guna berbasis integrasi keilmuan dengan ayat-ayat kauniyah yang dapat diimplementasikan untuk meningkatkan kesejahteraan masyarakat.</p>
                <!-- <div class="d-flex flex-wrap align-items-center">
                <a href="tests-book-visit.html" class="btn btn-white btn-white-style2 mr-30">
                    <span>Book a Home Visit</span>
                    <i class="icon-arrow-right"></i>
                </a>
                <a href="tests-services.html" class="btn btn-white btn-outlined">
                    <span>Tests and Services</span>
                </a>
                </div> -->
            </div><!-- /.slide-content -->
            </div><!-- /.col-xl-7 -->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4 offset-xl-1">
            <div class="fancybox-layout5 p-0 m-0">
                <div class="fancybox-container">
                <!-- fancybox item #1 -->
                <div class="fancybox-item">
                    <div class="fancybox-body">
                    <div class="fancybox-icon">
                        <i class="icon-chemical5"></i>
                    </div><!-- /.fancybox-icon -->
                    <h4 class="fancybox-title">Pendidikan dan pengajaran</h4>
                    </div><!-- /.fancybox-body -->
                </div><!-- /.fancybox-item -->
                <!-- fancybox item #2 -->
                <div class="fancybox-item">
                    <div class="fancybox-body">
                    <div class="fancybox-icon">
                        <i class="icon-chemical2"></i>
                    </div><!-- /.fancybox-icon -->
                    <h4 class="fancybox-title">Berinovasi dalam Penelitian</h4>
                    </div><!-- /.fancybox-body -->
                </div><!-- /.fancybox-item -->
                <!-- fancybox item #3 -->
                <div class="fancybox-item">
                    <div class="fancybox-body">
                    <div class="fancybox-icon">
                        <i class="icon-archive"></i>
                    </div><!-- /.fancybox-icon -->
                    <h4 class="fancybox-title">Pengabdian kepada masyarakat</h4>
                    </div><!-- /.fancybox-body -->
                </div><!-- /.fancybox-item -->
                </div><!-- /.fancybox-container -->
            </div><!-- /.fancybox-layout5 -->
            </div><!-- /.col-xl-3 -->
        </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.slide-item -->
    </div><!-- /.carousel -->
</section><!-- /.slider -->

<!-- ========================
    Services Layout 4
=========================== -->
<section class="services-layout4 pb-0">
  <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
        <div class="heading-layout2 text-center mb-50">
            <h2 class="heading-subtitle">Fasilitas Labolatorium</h2>
            <h3 class="heading-title">Kami memiliki berbagai fasilitas yang menunjang aktivitas penelitian dan praktikum</h3>
        </div>
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="slick-carousel"
            data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 1100, "settings": {"slidesToShow": 2}},{"breakpoint": 992, "settings": {"slidesToShow": 1}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
            <?php foreach($listLab as $lab) : ?>
                <!-- service item #1 -->
                <div class="service-item">
                    <div class="service-body">
                        <h4 class="service-title">
                        <a href="labolatorium/<?=$lab->seo_lab?>"><?=$lab->lab_name??""?></a>
                        </h4>
                        <p class="service-desc">
                            <?php 
                                $text = strip_tags($lab->lab_description); 
                                echo mb_strlen($text) > 10 ? mb_substr($text, 0, 200) . "..." : $text;
                            ?>
                        </p>
                    </div><!-- /.service-body -->
                    <div class="service-img">
                        <img style="object-fit: cover;object-position: center" src="/assets/file/lab/<?=strlen($lab->lab_banner) > 1 ? $lab->lab_banner :'default/banner-lab-default.jpg'?>" alt="service" height="190px">
                    </div><!-- /.service-img -->
                    <a href="labolatorium/<?=$lab->seo_lab?>" class="service-more">
                        <svg class="service-more-svg">
                        <path stroke-width="2px" stroke="white" fill="transparent"
                            d="M105.000,82.843 L104.995,82.843 C104.982,87.968 102.169,92.700 97.606,95.262 L62.390,115.041 C57.816,117.610 52.181,117.610 47.607,115.041 L12.390,95.262 C7.827,92.700 5.014,87.968 5.001,82.843 L5.000,82.843 L5.000,82.821 C5.000,82.817 4.999,82.812 4.999,82.808 L5.000,82.808 L5.000,39.148 L4.992,39.148 C4.992,34.010 7.810,29.262 12.383,26.694 L47.600,6.915 C52.174,4.346 57.809,4.346 62.383,6.915 L97.599,26.694 C102.157,29.253 104.967,33.977 104.987,39.094 L105.000,39.094 L105.000,82.843 Z">
                        </path>
                        </svg>
                        <i class="plus-icon">+</i>
                    </a>
                </div><!-- /.service-item -->
            <?php endforeach; ?>
        </div><!-- /.slick-carousel -->
        
        </div><!-- /.col-12 -->
    </div><!-- /.row -->
    <div class="row">
      <div class="col-12 text-right">
        <a href="/labolatorium" class="btn btn-link btn-primary">
          <span>Liat selengkapnya</span>
          <i class="icon-arrow-right"></i>
        </a>
      </div><!-- /.col-12 -->
    </div>
  </div><!-- /.container -->
</section><!-- /.Services Layout 4 -->

<!-- ========================
    Services Layout 2
=========================== -->
<section class="services-layout2 services-carousel pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="heading-layout2 mb-50">
            <h2 class="heading-subtitle">Peralatan Penelitian</h2>
            <h3 class="heading-title">Perlatan berkualitas untuk menunjang penelitian dan praktikum</h3>
        </div>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row mb-10">
      <div class="col-12 text-left">
        <a href="/peralatan" class="btn btn-link btn-primary">
          <span>Liat selengkapnya</span>
          <i class="icon-arrow-right"></i>
        </a>
      </div><!-- /.col-12 -->
    </div>
    <div class="row">
      <div class="col-12">
        <div class="carousel-wrapper">
          <div class="slick-carousel"
            data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false,"infinite": true , "responsive": [ {"breakpoint": 1100, "settings": {"slidesToShow": 2}},{"breakpoint": 992, "settings": {"slidesToShow": 1}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
            <?php foreach($listEquipment as $equipment) : 
                foreach($listLab as $lab):
                  if($equipment->lab_id == $lab->id): 
                  $currentLab = $lab;
                  endif;
                endforeach ?>
              <div class="service-item">
                <div class="service-img">
                  <div class="bg-img"><img src="/assets/file/equipment/<?=strlen($equipment->equipments_banner) > 1 ? $equipment->equipments_banner :'default/banner-equipment-default.jpg'?>" alt="equipment"></div>
                </div><!-- /.service-img -->
                <div class="service-body">
                  <div class="service-category">
                    <a href="labolatorium/<?= $currentLab->seo_lab ?>"><?= $currentLab->lab_name ?></a>
                  </div>
                  <h4 class="service-title">
                    <a href="peralatan/<?=$equipment->seo_equipment?>"><?=$equipment->equipments_name?></a>
                  </h4>
                  <p class="service-desc">
                    <?php 
                        $text = strip_tags($equipment->equipments_description); 
                        echo mb_strlen($text) > 10 ? mb_substr($text, 0, 180) . "..." : $text;
                    ?>
                  </p>
                  <a href="peralatan/<?=$equipment->seo_equipment?>" class="btn btn-link btn-primary">
                    <i class="plus-icon">+</i>
                    <span>Read More</span>
                  </a>
                </div><!-- /.service-body -->
              </div><!-- /.service-item -->
            <?php endforeach; ?>
            <!-- service item #1 -->
            
          </div><!-- /.carousel -->
        </div><!-- /.carousel-wrapper -->
      </div><!-- /.col-12 -->
    </div><!-- /.row -->
    
  </div><!-- /.container -->
</section><!-- /.Services Layout 2 -->