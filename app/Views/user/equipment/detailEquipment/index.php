
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Detail Equipment</h1>
    <ol class="breadcrumb">
      <li><a href="u/<?= $user->seo_user??''?>/lab">Equipment</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> Detail Equipment</li>
    </ol>
  </div>
  
  <div class="content">
    <form class="info-box" method="POST" enctype="multipart/form-data">
      <?= csrf_token() ?>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Equipment name</label>
          <input name="name" value="<?= $name?? $equipment->equipments_name??'' ?>" class="form-control" id="basicInput" type="text" placeholder="Basic Physics">
          <?php if(isset($name) && strlen($name) === 0):;?>
            <small class="text-danger">Equipment name cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Equipment location</label>
          <select class="custom-select form-control" id="lab_id" name="lab_id">
            <option disabled>choose location</option>
            <?php if (isset($listLab)):?>
              <?php foreach ($listLab as $lab):?>
                <option <?= isset($equipment) && $equipment->lab_id === $lab->id? 'selected': '' ?> value="<?= $lab->id?>"><?= $lab->lab_name ?></option>
              <?php endforeach; ?>  
            <?php endif; ?>  
          </select>
          <?php if(isset($location) && strlen($location) === 0):;?>
            <small class="text-danger">Equipment location cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label for="input-file-max-fs">Banner equipment</label>
          <input accept="image/*" type="file" name="banner" id="input-file-max-fs" class="dropify" data-max-file-size="2M" data-default-file=<?= isset($equipment->equipments_banner)? '/assets/file/equipment/'.$equipment->equipments_banner:'/assets/img/banner-lab-default.jpg' ?> />
          <input type="text" name="banner" value="" hidden>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Equipment description</label>
          <div id="summernote"><?= $descLong?? $equipment->equipments_description??'' ?></div>
          <input hidden type="text" name="descLong">
        </fieldset>
      </div>
      <div class="d-md-flex">
        <div class="col-md-6 m-t-2">
          <fieldset class="form-group">
            <label>Number of equipment</label>
            <input name="stock" value="<?= $stock?? $equipment->equipments_stock??'' ?>" class="form-control" type="number" placeholder="0">
          </fieldset>
        </div>
        <div class="col-md-6 m-t-2">
          <fieldset class="form-group">
            <label>Number of damaged equipment</label>
            <input name="damaged" value="<?= $damaged?? $equipment->equipments_damaged??'' ?>" class="form-control" type="number" placeholder="0">
            <?php if(isset($errorDamaged)):;?>
              <small class="text-danger"><?= $errorDamaged ?></small>
            <?php endif; ?>
          </fieldset>
        </div>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Equipment seo</label>
          <input name="seo" value="<?= $seo?? $equipment->seo_equipment??'' ?>" class="form-control" type="text" placeholder="basic-physics">
          <?php if(isset($errorSeo)):;?>
            <small class="text-danger"><?= $errorSeo ?></small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Equipment status</label>
          <select class="custom-select form-control" id="status" name="status">
            <option <?= isset($status) && $status == 1? 'selected' :  (isset($equipment) && $equipment->is_active === 1? 'selected' : "" )?> value="1">Active</option>
            <option <?= isset($status) && $status == 0? 'selected' :  (isset($equipment) && $equipment->is_active === 0? 'selected' : "") ?> value="0">Inactive</option>
          </select>
        </fieldset>
      </div>
      <div class="mt-4">
        <div class="col">
          <button type="submit" class="btn btn-success">Save</button>
          <?php if(isset($error)):;?>
            <div><small class="text-danger"><?= $error ?></small></div>
          <?php endif; ?>
        </div>
        
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const stockInput = document.querySelector('input[name="stock"]');
    const damagedInput = document.querySelector('input[name="damaged"]');

    function validateInputs() {
      let stock = parseInt(stockInput.value) || 0;
      let damaged = parseInt(damagedInput.value) || 0;

      // Cegah nilai negatif
      if (stock < 0) {
        alert("Jumlah alat tidak boleh negatif.");
        stockInput.value = 0;
        stock = 0;
      }

      if (damaged < 0) {
        alert("Jumlah alat rusak tidak boleh negatif.");
        damagedInput.value = 0;
        damaged = 0;
      }

      // Validasi jumlah alat rusak tidak boleh melebihi total alat
      if (damaged > stock) {
        alert("Jumlah alat rusak tidak boleh melebihi jumlah total alat.");
        damagedInput.value = stock;
      }
    }

    stockInput.addEventListener('input', validateInputs);
    damagedInput.addEventListener('input', validateInputs);
  });
</script>
