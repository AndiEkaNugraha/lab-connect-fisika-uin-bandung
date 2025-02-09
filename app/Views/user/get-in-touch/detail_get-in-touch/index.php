
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
          <label>Name</label>
          <input disabled name="name" value="<?= $detail->name??'' ?>" class="form-control" type="text">
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Email</label>
          <input disabled name="name" value="<?= $detail->email??'' ?>" class="form-control" type="text">
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Phone</label>
          <input disabled name="name" value="<?= $detail->phone??'' ?>" class="form-control" type="number">
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Message</label>
          <textarea disabled name="name" value="<?= $detail->text??'' ?>" class="form-control"><?= $detail->text??'' ?></textarea>
        </fieldset>
      </div>
      <div class="col-12 m-t-2">
        <fieldset class="form-group">
          <label>Equipment status</label>
          <select class="custom-select form-control" id="status" name="status">
            <option <?= (isset($detail) && $detail->followUp === 1? 'selected' : "" )?> value="1">Done</option>
            <option <?= (isset($detail) && $detail->followUp === 0? 'selected' : "") ?> value="0">Need follow up</option>
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
