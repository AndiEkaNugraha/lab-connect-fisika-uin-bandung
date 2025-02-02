<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Input Alat & Bahan</h1>
  </div>
  <!-- Main content -->
  <div class="content">
    <div class="info-box">
      <!-- Container for dynamically added form sections -->
      <div id="formContainer">
        <!-- Initial Form Section -->
        <div class="form-section mb-4">
          <h4 class="text-black">Laboratorium</h4>
          <div class="row">
            <div class="col-lg-4">
              <form class="form-group">
                <!-- Dropdown for selecting laboratory -->
                <select class="form-control" name="lab[]">
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
                  <input type="file" class="dropify" data-max-file-size="2M" data-allowed-file-extensions="jpg png pdf" name="file[]">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <form class="form-group">
                <h4 class="text-black mt-4">Nama Alat / Bahan</h4>
                <input class="form-control" type="text" name="nama_alat[]">
              </form>
            </div>
            <div class="col-lg-4">
              <form class="form-group">
                <h4 class="text-black mt-4">Stok Alat / Bahan</h4>
                <input class="form-control" type="number" name="stok_alat[]">
              </form>
            </div>
          </div>

          <!-- Form Summernote -->
          <div class="card mt-4">
            <div class="card-body">
              <h4 class="text-black">Deskripsi Alat / Bahan</h4> <!-- Ukuran lebih kecil dari sebelumnya -->
              <div id="summernote"></div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <!-- Add and Submit Buttons -->
      <div class="row mt-4">
        <div class="col-lg-4">
          <button type="button" class="btn btn-primary" id="addAlatBtn">Tambah Alat / Bahan</button>
        </div>
        <!-- Add ml-auto to push the Submit button to the right -->
        <div class="col-lg-4 ml-auto text-right">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Get the button and the container for form sections
  const addAlatBtn = document.getElementById("addAlatBtn");
  const formContainer = document.getElementById("formContainer");

  // Event listener to add new input form when the button is clicked
  addAlatBtn.addEventListener("click", function() {
    // Clone the first form section and append it to the form container
    const formSection = document.querySelector(".form-section");
    const newFormSection = formSection.cloneNode(true);

    // Add margin-top to the new form section for spacing
    newFormSection.classList.add("mt-4");

    formContainer.appendChild(newFormSection);
  });

  // Summernote Editor Functions
  function edit() {
    $(".click2edit").summernote({ focus: true });
  }

  function save() {
    $(".click2edit").summernote('destroy');
  }
</script>
