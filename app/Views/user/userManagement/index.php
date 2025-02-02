<!-- DataTables -->
<link rel="stylesheet" href="/assets/user/dist/plugins/datatables/css/dataTables.bootstrap.min.css">
<!-- bootstrap-switch -->
<link rel="stylesheet" href="/assets/user/dist/plugins/bootstrap-switch/bootstrap-switch.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">List <?= $page ?></h1>
    <ol class="breadcrumb">
      <li>List <?= $page ?></li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="row m-t-3">
      <div class="col-lg-12">
        <div class="card ">
          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">Create <?= $page ?></h5>
          </div>
          <div class="card-body">
            
            <form method="POST" action="/u/<?= $user_seo??'' ?>/manajemen-user/create"> 
            <?= csrf_token() ?>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Name</label>
                  <input value="<?= $name??'' ?>" class="form-control" placeholder="J. Habibi" type="text" name = "name">
                  <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Nim/Nik</label>
                  <input value="<?= $nim??'' ?>" class="form-control" placeholder="1117030000" type="text" name="nim">
                  <span class="fa fa-id-badge form-control-feedback" aria-hidden="true"></span> 
                  <?php if (isset($nimRegistered) && $nimRegistered): ?>
                    <small class="text-danger">Nim/Nik already registered</small>
                  <?php endif; ?>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Email</label>
                  <input value="<?= $email??'' ?>" class="form-control" placeholder="habibi@mail.co" type="text" name = "email">
                  <span class="fa fa-phone form-control-feedback" aria-hidden="true"></span> 
                    <?php if ((isset($invalidEmail) && $invalidEmail) || (isset($emailRegistered) && $emailRegistered)): ?>
                      <small class="text-danger">
                        <?= $invalidEmail ? 'Invalid Email' : 'Email already registered' ?>
                      </small>
                    <?php endif; ?>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Phone</label>
                  <input value="<?= $phone??'' ?>" class="form-control" placeholder="02112345678" type="text" name = "phone">
                  <span class="fa fa-envelope-open-o form-control-feedback" aria-hidden="true"></span>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group has-feedback">
                  <label class="control-label">Password</label>
                  <input class="form-control" placeholder="@USer123" type="text" name = "password">
                  <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
                  <?php if (isset($invalidPassword) && $invalidPassword): ?>
                    <small class="text-danger">At least 8 characters, including uppercase, lowercase, number, and symbol</small>
                  <?php endif; ?>
              </div>
              <input type="text" name="cat_id" value="<?= $cat_id ?>" hidden>
              <input type="text" name="page" value="<?=$page?>" hidden>
              <input type="hidden" name="listUser" value='<?= json_encode($listUser) ?>'>
              <div class="col-md-12">
                <button type="submit" class="btn btn-success">Create Account</button>
                <?php if (isset($error) && $error) : ?>
                  <div class=""><small class="text-danger"><?= $error ?></small></div>
                <?php endif; ?>
                <?php if (isset($success) && $success) : ?>
                  <div class=""><small class="text-success"><?= $success ?></small></div>
                <?php endif; ?>
              </div>
                </div>
            </form>
          
          </div>
        </div>
      </div>
    </div>
    
    <div class="card  mt-4">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listUser as $index => $user): ?>
                <tr>
                  <td><?= $user->name ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->phone ?></td>
                  <td><?= $user->mobile ?></td>
                  <td class="text-center">
                    <input onchange="toggleStatus('<?= $user->id ?>')" data-on-text="Active" data-off-text="Off" type="checkbox" <?= $user->is_active? '' : '' ?>  data-size="mini">
                  </td>
                  <td class="text-center">
                    <button onclick="deleteUser('<?= $user->id ?>')" class="text-danger" style="border: none;background: none;cursor: pointer; outline: none;"><i class="fa fa-trash-o"></i></button>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content --> 
</div>
<!-- /.content-wrapper -->

<!-- DataTable --> 
<script src="/assets/user/dist/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="/assets/user/dist/plugins/datatables/dataTables.bootstrap.min.js"></script> 
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<!-- bootstrap-switch --> 
<script src="/assets/user/dist/plugins/bootstrap-switch/bootstrap-switch.js"></script> 
<script src="/assets/user/dist/plugins/bootstrap-switch/highlight.js"></script> 
<script src="/assets/user/dist/plugins/bootstrap-switch/main.js"></script>

<script>
// JavaScript untuk deleteUser dan toggleStatus dengan POST ke URL API

function deleteUser(userId) {
  if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
    const formData = new FormData();
    formData.append('id', userId);
    formData.append('_token', '<?= csrf_token_value() ?>');

    fetch('/u/<?= $user->seo_user??'' ?>/manajemen-user/delete', {
      method: 'POST',
      body: formData // Kirim sebagai form data
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert('User berhasil dihapus.');
        location.reload();
      } else {
        alert('Gagal menghapus user.');
      }
    })
    .catch(error => console.error('Error:', error));
  }
}

function toggleStatus(userId) {
  const checkbox = event.target;
  const isActive = checkbox.checked ? 1 : 0; // Kirim dalam bentuk angka

  const formData = new FormData();
  formData.append('id', userId);
  formData.append('is_active', isActive);
  formData.append('_token', '<?= csrf_token_value() ?>');

  fetch('/u/<?= $user->seo_user??'' ?>/manajemen-user/edit', {
    method: 'POST',
    body: formData
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert('Status berhasil diperbarui.');
    } else {
      alert('Gagal memperbarui status.');
    }
  })
  .catch(error => console.error('Error:', error));
}
// Pastikan checkbox tercentang sesuai status
window.onload = function() {
  document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
    checkbox.checked = checkbox.getAttribute('data-on-text') === 'Active';
  });
}

</script>