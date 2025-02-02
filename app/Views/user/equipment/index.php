<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Input Alat & Bahan</h1>
  </div>
  <!-- Main content -->
  <div class="content">
    <div class="info-box">
      <h4 class="text-black">Laboratorium</h4>
      <div class="row">
        <div class="col-lg-4">
          <form class="form-group">
            <!-- Dropdown for selecting laboratory -->
            <select class="form-control" id="labDropdown">
              <option value="">Pilih laboratorium</option>
              <option value="lab1">Laboratorium 1</option>
              <option value="lab2">Laboratorium 2</option>
              <option value="lab3">Laboratorium 3</option>
              <option value="lab4">Laboratorium 4</option>
            </select>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="card">
            <div class="card-body">
              <h4 class="text-black">Upload File</h4>
              <label for="input-file-max-fs">Gambar Alat / Bahan</label>
              <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png pdf" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>