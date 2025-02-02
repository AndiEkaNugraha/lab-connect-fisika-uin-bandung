<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">List Laboratory</h1>
    <ol class="breadcrumb">
      <li>Laboratory</li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="d-flex justify-content-end">
      <a href="/u/<?= $user->seo_user??'' ?>/lab/create"  >
          <button type="button" class="btn btn-primary" style="cursor: pointer">
              + Add new labolatory
          </button>
      </a>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Labolatory</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listLabs as $lab) : ?>
                <tr>
                  <td><?= $lab->lab_name ?></td>
                  <td><?= $lab->created_at ?></td>
                  <td><?= $lab->is_active ? 'Active' : 'Inactive' ?></td>
                  <td class="text-center" style="font-size: 20px">
                    <a href="/u/<?= $user->seo_user??'' ?>/lab/edit/<?= $lab->seo_lab ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <a onclick='deleteLab("<?php echo $lab->id ?>")'><i class="fa fa-trash text-danger" style="cursor: pointer"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content --> 
</div>

<script>
var csrfToken = '<?= csrf_token_value() ?>';
function deleteLab(userId) {
  if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
    const formData = new FormData();
    formData.append('id', userId);
    formData.append('_token', csrfToken);

    fetch('/u/<?= $user->seo_user??'' ?>/lab', {
      method: 'POST',
      body: formData // Kirim sebagai form data
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showAlert('success', 'User berhasil dihapus.');
        setTimeout(() => window.location.href = '<?= $_SERVER['REQUEST_URI'] ?>', 1000); // Reload halaman setelah sukses
      } else {
        showAlert('danger', 'Gagal menghapus user.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showAlert('danger', 'Terjadi kesalahan pada server.');
    });
  }
}
</script>