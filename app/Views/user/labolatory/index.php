<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Input Alat & Bahan</h1>
  </div>
  <div class="content">
    <div class="info-box">
      <h4 class="text-black">Nama Laboratorium</h4>
      <div class="row">
        <div class="col-lg-4">
          <form class="form-group">
            <input class="form-control" id="basicInput" type="text">
          </form>
        </div>
      </div>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="text-black">Upload File</h4>
                  <label for="input-file-max-fs">Banner Laboratorium</label>
                  <input type="file" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png pdf" name="file[]">
                </div>
              </div>
            </div>
          </div>

          <div class="card mt-4">
            <div class="card-body">
              <h4 class="text-black">Deskripsi Laboratorium</h4>
              <div id="summernote"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Submit button placed at the bottom right -->
      <div class="row mt-4">
        <div class="col-lg-4 ml-auto text-right">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- New Section: Cards Section -->
  <div class="content mt-4">
    <div class="row">
      <div class="col-lg-4 m-b-3"> 
        <div class="card"> 
          <img class="card-img-top img-responsive" src="/assets/userdist/img/img13.jpg" alt="Gambar tidak ditemukan" onerror="this.onerror=null; this.src='/assets/userdist/img/placeholder.png';">
          <div class="card-body">
            <h4 class="card-title">Nama Alat / Bahan</h4>
            <p class="card-text">Deskripsi singkat tentang gambar.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 m-b-3"> 
        <div class="card"> 
          <img class="card-img-top img-responsive" src="/assets/userdist/img/img14.jpg" alt="Gambar tidak ditemukan" onerror="this.onerror=null; this.src='/assets/userdist/img/placeholder.png';">
          <div class="card-body">
            <h4 class="card-title">Nama Alat / Bahan</h4>
            <p class="card-text">Deskripsi singkat tentang gambar.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
