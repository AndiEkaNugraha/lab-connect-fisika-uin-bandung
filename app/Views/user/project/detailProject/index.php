
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">Detail Project</h1>
    <ol class="breadcrumb">
      <li><a href="u/<?= $user->seo_user??''?>/project">Project</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> Detail Project</li>
    </ol>
  </div>
  
  <div class="content">
    <form class="info-box" method="POST" enctype="multipart/form-data">
      <?= csrf_token() ?>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Project name</label>
          <input name="name" value="<?= $name?? $project->projects_name??'' ?>" class="form-control" id="basicInput" type="text" placeholder="Basic Physics">
          <?php if(isset($name) && strlen($name) === 0):;?>
            <small class="text-danger">Project name cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Project location</label>
          <select class="custom-select form-control" id="lab_id" name="lab_id">
            <option disabled>choose location</option>
            <?php if (isset($listLab)):?>
              <?php foreach ($listLab as $lab):?>
                <option <?= isset($project) && $project->lab_id === $lab->id? 'selected': '' ?> value="<?= $lab->id?>"><?= $lab->lab_name ?></option>
              <?php endforeach; ?>  
            <?php endif; ?>  
          </select>
          <?php if(isset($location) && strlen($location) === 0):;?>
            <small class="text-danger">Project location cannot be empty</small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label for="input-file-max-fs">Banner Project</label>
          <input accept="image/*" type="file" name="banner" id="input-file-max-fs" class="dropify" data-max-file-size="2M" data-default-file=<?= isset($project->projects_banner)? '/assets/file/project/'.$project->projects_banner:'/assets/img/banner-lab-default.jpg' ?> />
          <input type="text" name="banner" value="" hidden>
        </fieldset>
      </div>
      <div class="col-12 m-t-3">
        <fieldset class="form-group">
          <label>Project description</label>
          <div id="summernote"><?= $descLong?? $project->projects_description??'' ?></div>
          <input hidden type="text" name="descLong">
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Project seo</label>
          <input name="seo" value="<?= $seo?? $project->seo_projects??'' ?>" class="form-control" type="text" placeholder="basic-physics">
          <?php if(isset($errorSeo)):;?>
            <small class="text-danger"><?= $errorSeo ?></small>
          <?php endif; ?>
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Project status</label>
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
