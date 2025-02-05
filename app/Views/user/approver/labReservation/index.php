<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black">List Laboratory Reservation</h1>
    <ol class="breadcrumb">
      <li>Laboratory Reservation</li>
    </ol>
  </div>
  
  <!-- Main content -->
  <div class="content">
    <div class="d-flex justify-content-end">
      <a href="/u/<?= $user->seo_user??'' ?>/reservation-lab/create"  >
          <button type="button" class="btn btn-primary" style="cursor: pointer">
              + Add new reservation
          </button>
      </a>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered" data-name="cool-table">
            <thead>
              <tr>
                <th>Nim/Nik</th>
                <th>Labolatory</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($listReservation)): 
                  foreach ($listReservation as $reservation) :?>
                  <tr>
                    <td>
                      <?php foreach ($users as $user) {
                        if ($reservation->user_id == $user->id) {
                          echo $user->nim;
                          break;
                        }
                      } ?>
                    </td>
                    <td>
                      <?php foreach ($labolatory as $lab) {
                        if ($reservation->lab_id == $lab->id) {
                          echo $lab->lab_name;
                          break;
                        }
                      } ?>
                    </td>
                    <td class="text-center">
                      <?php 
                        if (isset($reservation->reservation_start) && $reservation->reservation_start != ''): 
                          $start = $reservation->reservation_start ;
                          $start = new DateTime($start);
                          $start = $start->format('j F Y - H.i');
                          echo $start;
                        endif;
                      ?>
                    </td>
                    <td class="text-center">
                      <?php 
                        if (isset($reservation->reservation_end) && $reservation->reservation_end != ''): 
                          $end = $reservation->reservation_end;
                          $end = new DateTime($end);
                          $end = $end->format('j F Y - H.i');
                          echo $end;
                        endif;
                      ?>
                    </td>
                    <td class="text-center">
                      <?= $reservation->reservation_status ?>
                    </td>
                    <td class="text-center">
                      <a href="/u/<?= $user->seo_user??'' ?>/lab-reservation/<?= $reservation->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                    </td>
                  </tr>
              <?php 
                  endforeach;
                endif?>
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