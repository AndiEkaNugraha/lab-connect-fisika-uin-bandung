<div class="content-wrapper"> 
  <div class="content-header sty-one">
    <h1 class="text-black">Input Berita</h1>
  </div>
  <div class="content">
    <div class="info-box">
      <h4 class="text-black">Judul Berita</h4>
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
              <label for="input-file-max-fs">Banner Berita</label>
              <input type="file" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png pdf" name="file[]">
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-body">
          <h4 class="text-black">Deskripsi Berita</h4>
          <div id="summernote"></div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4">
          <form class="form-group">
            <h4 class="text-black">Hashtags</h4>
            <input class="form-control" id="basicInput" type="text">
          </form>
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
</div>