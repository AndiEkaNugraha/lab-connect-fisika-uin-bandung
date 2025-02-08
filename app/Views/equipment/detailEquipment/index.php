    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title-layout3 page-title-light text-center pb-0 bg-overlay bg-parallax">
      <div class="bg-img"><img src="/assets/file/equipment/<?=strlen($equipment->equipments_banner) > 1 ? $equipment->equipments_banner :'default/banner-lab-default.jpg'?>" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 offset-xl-3">
            <h1 class="pagetitle-heading"><?= $equipment->equipments_name??'' ?></h1>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      <div class="breadcrumb-area" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="container">
          <nav>
            <ol class="breadcrumb justify-content-center mb-0">
              <li class="breadcrumb-item">
                <a href="/"><i class="icon-home"></i> <span>Beranda</span></a>
              </li>
              <li class="breadcrumb-item">
                <a href="/peralatan">Peralatan</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?= $equipment->equipments_name??'' ?>
              </li>
            </ol>
          </nav>
        </div><!-- /.container -->
      </div><!-- /.breadcrumb-area -->
    </section><!-- /.page-title -->


    <section class=" pb-80">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 offset-lg-2">
            <div class="text-block mb-50">
              <?= $equipment->equipments_description??'' ?>
            </div><!-- /.text-block -->
          </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

