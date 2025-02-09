<!-- ========================
    page title 
=========================== -->
<section class="page-title-layout2 page-title-light text-center pb-0 bg-overlay bg-parallax">
    <div class="bg-img"><img src="/assets/general/images/page-titles/10.jpg" alt="background"></div>
    <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
        <h1 class="pagetitle-heading">Proyek Penelitian</h1>
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
            <li class="breadcrumb-item active" aria-current="page">Proyek Penelitian</li>
        </ol>
        </nav>
    </div><!-- /.container -->
    </div><!-- /.breadcrumb-area -->
</section><!-- /.page-title -->

<!-- ========================
    Services Layout 2
=========================== -->
<section class="services-layout1">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <ul class="list-filter d-flex flex-wrap justify-content-center list-unstyled mb-30">
              <li><a class="filter active" href="#" data-filter="all">Semua</a></li>
                <?php foreach ($listLab as $lab) : ?>
                    <li><a class="filter" href="#" data-filter=".<?= $lab->seo_lab ?>"><?= $lab->lab_name ?></a></li>
                <?php endforeach ?> 
            </ul><!-- /.portfolio-filter  -->
          </div><!-- /.col-lg-12 -->
        </div>
        <div id="filtered-items" class="row">
          <!-- service item #1 -->
            <?php foreach ($listProject as $project) : 
                foreach($listLab as $lab):
                    if($project->lab_id == $lab->id): 
                    $currentLab = $lab;
                    endif;
                endforeach ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mix <?= $currentLab->seo_lab ?>">
                    <div class="service-item">
                    <div class="service-img">
                        <img height="265px" width="100%" style="object-fit: cover;object-position: center" src="/assets/file/project/<?=strlen($project->projects_banner) > 1 ? $project->projects_banner :'default/banner-equipment-default.jpg'?>" alt="service">
                    </div><!-- /.service-img -->
                    <div class="service-body">
                        <div class="service-category">
                            <a href="labolatorium/<?= $currentLab->seo_lab ?>"><?= $currentLab->lab_name ?></a>
                        </div>
                        <h4 class="service-title">
                        <a href="proyek/<?=$project->seo_projects?>"><?= $project->projects_name ?></a>
                        </h4>
                        <p class="service-desc">
                            <?php 
                                $text = strip_tags($project->projects_description); 
                                echo mb_strlen($text) > 10 ? mb_substr($text, 0, 200) . "..." : $text;
                            ?>
                        </p>
                        <a href="proyek/<?=$project->seo_projects?>" class="btn btn-link btn-primary">
                        <i class="plus-icon">+</i>
                        <span>Read More</span>
                        </a>
                    </div><!-- /.service-body -->
                    </div><!-- /.service-item -->
                </div><!-- /.col-lg-4 -->
            <?php endforeach ?>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services Layout 1 -->