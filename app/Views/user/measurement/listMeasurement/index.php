<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">List Measurement Experiment</h1>
    <ol class="breadcrumb">
      <li>Measurement</li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="d-flex justify-content-end">
      <a href="/u/<?= $user->seo_user??'' ?>/measurement/create"  >
          <button type="button" class="btn btn-primary" style="cursor: pointer">
              + Add new experiment
          </button>
      </a>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name of the experiment</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listExperiment as $experiment) : ?>
                <tr>
                  <td><?= $experiment->id ?></td>
                  <td><?= $experiment->masterMeasurement_label ?></td>
                  <td><?= $experiment->created_at ?></td>
                  <td class="text-center"><div class="badge badge-pill badge-<?= $experiment->is_active ? 'success' : 'danger' ?>"><?= $experiment->is_active ? 'Active' : 'Inactive' ?></div></td>
                  <td class="text-center" style="font-size: 20px">
                    <a href="/u/<?= $user->seo_user??'' ?>/measurement/edit/<?= $experiment->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <a onclick='deleteProject("<?php echo $experiment->id ?>")'><i class="fa fa-trash text-danger" style="cursor: pointer"></i></a>
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
function deleteProject(id) {
  if (confirm('Apakah Anda yakin ingin menghapus ini?')) {
    const formData = new FormData();
    formData.append('id', id);
    formData.append('_token', csrfToken);

    fetch('/u/<?= $user->seo_user??'' ?>/measurement', {
      method: 'POST',
      body: formData // Kirim sebagai form data
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showAlert('success', 'Pengukuran berhasil dihapus.');
        setTimeout(() => window.location.href = '<?= $_SERVER['REQUEST_URI'] ?>', 1000); // Reload halaman setelah sukses
      } else {
        showAlert('danger', 'Gagal menghapus project.');
        setTimeout(() => window.location.href = '<?= $_SERVER['REQUEST_URI'] ?>', 1000); // Reload halaman setelah sukses
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showAlert('danger', 'Terjadi kesalahan pada server.');
      // setTimeout(() => window.location.href = '<?= $_SERVER['REQUEST_URI'] ?>', 1000); // Reload halaman setelah sukses
    });
  }
}
</script>