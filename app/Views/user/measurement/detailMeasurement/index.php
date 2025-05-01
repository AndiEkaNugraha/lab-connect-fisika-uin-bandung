
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Detail Measurement</h1>
    <ol class="breadcrumb">
      <li><a href="/u/<?= $user->seo_user??''?>/measurement">Measurement</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> Detail Measurement</li>
    </ol>
  </div>
  
  <div class="content">
    <form class="info-box" method="POST" enctype="multipart/form-data">
      <?= csrf_token() ?>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Measurement name</label>
          <input name="name" value="<?= $name?? $measurement->masterMeasurement_label??'' ?>" class="form-control" id="basicInput" type="text" placeholder="Basic Physics">
          <?php if(isset($_SESSION['data']['name']) && strlen($_SESSION['data']['name']) === 0) :;?>
            <small class="text-danger">Measurement name cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Measurement location</label>
          <select class="custom-select form-control" id="lab_id" name="lab_id">
            <option disabled>choose location</option>
            <?php if (isset($listLab)):?>
              <?php foreach ($listLab as $lab):?>
                <option <?= isset($measurement) && $measurement->lab_id === $lab->id? 'selected': '' ?> value="<?= $lab->id?>"><?= $lab->lab_name ?></option>
              <?php endforeach; ?>  
            <?php endif; ?>  
          </select>
          <?php if(isset ($_SESSION['data']['lab_id']) && strlen($_SESSION['data']['lab_id']) === 0):;?>
            <small class="text-danger">Measurement location cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label for="input-file-max-fs">Banner</label>
          <input accept="image/*" type="file" name="banner" id="input-file-max-fs" class="dropify" data-max-file-size="2M" data-default-file=<?= isset($measurement->masterMeasurement_banner)? '/assets/file/measurement/'.$measurement->masterMeasurement_banner:'/assets/file/measurement/default/banner-equipment-default.jpg' ?> />
          <input type="text" name="banner" value="" hidden>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Measurement description</label>
          <div id="summernote"><?= $descLong?? $measurement->masterMeasurement_description??'' ?></div>
          <input hidden type="text" name="descLong">
          <?php if(isset($_SESSION['data']['descLong']) && strlen($_SESSION['data']['descLong']) === 0):;?>
            <small class="text-danger">Measurement description cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Measurement status</label>
          <select class="custom-select form-control" id="status" name="status">
            <option <?= isset($status) && $status == 1? 'selected' :  (isset($measurement) && $measurement->is_active === 1? 'selected' : "" )?> value="1">Active</option>
            <option <?= isset($status) && $status == 0? 'selected' :  (isset($measurement) && $measurement->is_active === 0? 'selected' : "") ?> value="0">Inactive</option>
          </select>
          <?php if(isset($_SESSION['data']['status']) && strlen($_SESSION['data']['status']) === 0):;?>
            <small class="text-danger">Measurement status cannot be empty</small>
          <?php endif; ?>
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
  
  <?php 
  if (isset($measurement)){ ?>
  <div class="content">
    
    <div class="card mt-4">
    
      <div class="card-body">
      <h4 class="">Measurement Results</h4>
      <hr/>
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Condition</th>
                <th>Cycle</th>
                <th>Created At</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

