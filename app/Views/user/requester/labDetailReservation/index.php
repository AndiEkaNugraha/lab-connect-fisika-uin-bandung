  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Form Reservation</h1>
      <ol class="breadcrumb">
        <li><a href="/u/<?=$user->seo_user??''?>/reservation-lab">Laboratory Reservation</a></li>
        <li><i class="fa fa-angle-right"></i> Reservation Detail</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <div id="demo1">
          <div class="step-app">
            <ul class="step-steps">
              <li class=""><a href="#tab1" style="height:100%"><div class="number">1</div> <span class="d-none d-md-inline">Request</span></a></li>
              <li class=""><a href="#tab2" style="height:100%"><div class="number">2</div> <span class="d-none d-md-inline">Before</span></a></li>
              <li class=""><a href="#tab3" style="height:100%"><div class="number">3</div> <span class="d-none d-md-inline">After</span></a></li>
            </ul>
            <div class="step-content">
              <div class="step-tab-panel" id="tab1">
                <form name="frmReq" id="frmReq" enctype="multipart/form-data">
                  <div class="row m-t-2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="location1">Select labolatory :</label>
                        <select <?php if (isset($reservation) && $reservation->reservation_status > 1) echo "disabled"; ?> class="custom-select form-control" id="location1" name="labolatory">
                            <option disabled value="">Select labolatory</option>
                            <?php if (!empty($listLab)): 
                                foreach($listLab as $labExisting): ?>
                                    <option <?php if (isset($reservation) && $labExisting->id == $reservation->lab_id) echo "selected"; ?>  value="<?= $labExisting->id ?>"><?= $labExisting->lab_name ?></option>
                            <?php 
                                endforeach; 
                            endif;?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="start">Start Time :</label>
                        <input <?php if (isset($reservation) && $reservation->reservation_status > 1) echo "disabled"; ?> value="<?= $reservation->reservation_start??'' ?>" class="form-control" id="start" type="datetime-local" name="start">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end">End Time :</label>
                        <input <?php if (isset($reservation) && $reservation->reservation_status > 1) echo "disabled"; ?> value="<?= $reservation->reservation_end??'' ?>" class="form-control" id="end" type="datetime-local" name="end">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="end">Description :</label>
                        <textarea <?php if (isset($reservation) && $reservation->reservation_status > 1) echo "disabled"; ?> value="<?= $reservation->reservation_desc??'' ?>" class="form-control" id="desc" name="desc"><?= $reservation->reservation_desc??'' ?></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <label for="end">Input Student :</label>
                        <input <?php if (isset($reservation) && ($reservation->reservation_status == 6 || $reservation->reservation_status == 2)) echo "disabled"; ?> onchange="handleFile(event)" accept=".xls, .xlsx" type="file" name="student" id="input-file-max-fs" class="dropify" data-max-file-size="1M" <?= isset($reservation->reservation_listUser)? 'data-default-file= /assets/file/labReservation/'.$reservation->reservation_listUser:'' ?> />
                        <input type="text" name="student" value="" hidden>
                        <small class=""><a href="/assets/file/labReservation/example/example-template.xlsx">Download template here!</a></small>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-------------------------------- tab 2 -------------------------------->
              <div class="step-tab-panel" id="tab2">
                <form name="frmBefore" id="frmBefore">
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="mt-4"><strong>Conditions before using the laboratory</strong></label>
                        <p>Input the condition of the room before using it, such as describing the condition of the room, providing image descriptions, and so on that support the explanation</p>
                        <div id="summernoteBefore"><?= $reservation->reservation_descBefore??'' ?></div>
                      </div>
                    </div>
                  </div>  
                </form>
              </div>
              <!-------------------------------- tab 3 -------------------------------->
              <div class="step-tab-panel" id="tab3">
                <form name="frmAfter" id="frmAfter">
                <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label class="mt-4"><strong>Conditions After using the laboratory</strong></label>
                        <p>Input the condition of the room after using it, such as describing the condition of the room, providing image descriptions, and so on that support the explanation</p>
                        <div id="summernoteAfter"><?= $reservation->reservation_descAfter??'' ?></div>
                      </div>
                    </div>
                  </div>  
                </form>
              </div>
            </div>
            <div class="step-footer">
              <button data-direction="prev" class="btn btn-light">Previous</button>
              <button <?php if (isset($reservation->reservation_status) && ($reservation->reservation_status == 2 || $reservation->reservation_status == 6)) echo "disabled"; ?> type="button" class="btn btn-success me-auto" onclick="submitForms()">Save</button>
              <button data-direction="next" class="btn btn-light">Next</button>
              <button <?php if (isset($reservation->reservation_status) && ($reservation->reservation_status == 2 || $reservation->reservation_status == 6)) echo "disabled"; ?> data-direction="finish" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-body d-grid d-xl-flex" style="gap: 50px">
            <div class=" col-12 col-xl-8">
                <table id="example2" class="table table-bordered" data-name="cool-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nim</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
                            
            <div class="mt-4 mt-xl-0" style="max-width: 500px">
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status < 3): ?>
                <form method="POST" class="form-group">
                  <?= csrf_token() ?>
                  <label>Cancel using the facility?</label>
                  <textarea <?php if (isset($reservation->reservation_status) && $reservation->reservation_status == 2) echo "disabled"; ?>  name="note" class="form-control" id="placeTextarea" rows="3" placeholder="Input your reason"></textarea>
                  <input  type="text" value="2" name="status" hidden>
                  <button <?php if (isset($reservation->reservation_status) && $reservation->reservation_status == 2) echo "disabled"; ?> type="submit" class="btn btn-danger btn-sm mt-2">Cancel</button>
                </form>
                <hr>
                <?php endif; ?>
                <h4 class="m-b-2 text-black">Status</h4>
                <?php if (isset($stepRequest)): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Make a reservation</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation)): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Reservation made</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status == 2): ?>
                  <div class="sl-item sl-danger">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Cancelled</p>
                        <p><?= $reservation->reservation_note ?></p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status == 1): ?>
                  <div class="sl-item sl-danger">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$approver->name??''?></small>
                        <p>Reject</p>
                        <p><?= $reservation->reservation_note ?></p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 3): ?>
                  <div class="sl-item sl-success">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$approver->name??''?></small>
                        <p>Approve</p>
                        <p><?= $reservation->reservation_note ?></p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 4): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Use the facilities</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 5): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Get ready to leave the room</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 6): ?>
                  <div class="sl-item sl-success">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Finish using the facilities</p>
                      </div>
                  </div>
                <?php endif; ?>
            </div>
        </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->

<!-- submit form -->
<script>
  var csrfToken = '<?= csrf_token_value() ?>';
  function countLetters(text) {
    return (text.replace(/[^a-zA-Z]/g, '')).length; // Hanya menghitung huruf
  }

  function submitForms(status) {
      var descBefore = $('#summernoteBefore').summernote('code').toString(); // Ambil isi Summernote
      var descAfter = $('#summernoteAfter').summernote('code').toString(); // Ambil isi Summernote
      const descBeforeLetters = countLetters(descBefore);
      const descAfterLetters = countLetters(descAfter);

      // Validasi minimal 12 huruf
      <?php if (isset($reservation) && $reservation->reservation_status == 3) { ?>
      if (descBeforeLetters < 11) {
          showAlert('danger', 'Description before using the laboratory must contain at least 12 letters.');
          return;
      }
      <?php } ?>
      <?php if (isset($reservation) && $reservation->reservation_status == 4) { ?>
      if (descAfterLetters < 11) {
          showAlert('danger', 'Description after using the laboratory must contain at least 12 letters.');
          return;
      }
      <?php } ?>

      const form1 = document.getElementById('frmReq');

      const formData = new FormData(form1);
      formData.append('_token', csrfToken);
      formData.append('descBefore', descBefore);
      formData.append('descAfter', descAfter);
      if (status) {
        formData.append('status', status);
      }

      const startInput = document.getElementById('start').value;
      const endInput = document.getElementById('end').value;

      // Validasi apakah input kosong
      if (startInput === '' || endInput === '') {
          showAlert('danger', 'Start time and end time are required.');
          return; // Hentikan proses jika salah satu kosong
      }

      const startTime = new Date(startInput);
      const endTime = new Date(endInput);
      const currentTime = new Date();
      if (startTime < currentTime) {
          showAlert('danger', 'Start time cannot be in the past.');
          return; // Hentikan submit jika tidak valid
      }

      if (endTime <= startTime) {
          showAlert('danger', 'End time must be greater than start time.');
          return;
      }
      <?php if (isset($reservation)){ ?>
        const url = '/u/<?=$user->seo_user?>/reservation-lab/<?=$reservation->id?>';	
      <?php 
      } else { ?>
        const url = '/u/<?=$user->seo_user?>/reservation-lab/create';
      <?php } ?>
      fetch(url, {
      method: 'POST',
      body: formData // Kirim sebagai form data
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showAlert('success', 'Reservation save successful .');
        setTimeout(() => window.location.href = '/u/<?= $user->seo_user??'' ?>/reservation-lab', 1000); // Reload halaman setelah sukses
      } else {
        showAlert('danger', 'Reservation save failed, make sure your data is correct.');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showAlert('danger', 'An error occurred on the server.');
    });
  }

</script>

<!-- form wizard --> 
<script src="/assets/user/dist/plugins/formwizard/jquery-steps.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> 
<script>
    var frmReq = $('#frmReq');
    var frmReqValidator = frmReq.validate();
	
    var frmBefore = $('#frmBefore');
    var frmBeforeValidator = frmBefore.validate();

    var frmAfter = $('#frmAfter');
    var frmAfterValidator = frmAfter.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmReq.valid();
            <?php if (isset($reservation) && $reservation->reservation_status >2) { ?>
                return valid;
            <?php } elseif (isset($reservation) && $reservation->reservation_status == 2) { ?>
                return showAlert('danger', 'The application has cancelled');
            <?php } elseif (isset($reservation) && $reservation->reservation_status == 1) { ?>
                return showAlert('danger', 'The application has rejected');
            <?php } else {?>
                return showAlert('danger', 'The application has not been approved');
            <?php } ?>
            
            // return valid;
          }
          if (stepDirection === 'backward') {
            frmReqValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmBefore.valid();
            <?php if (isset($reservation) && $reservation->reservation_status >3) { ?>
                return valid;
            <?php } elseif (isset($reservation) && $reservation->reservation_status == 3) { ?>
                return showAlert('danger', 'Save conditions before using the laboratory');
            <?php } ?>
          }
          if (stepDirection === 'backward') {
            frmBeforeValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmAfter.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmAfterValidator.resetForm();
          }
        }
        
        return true;

      },
      onFinish: function () {
        submitForms(5);
      }
    });
</script>
<!-- script input tabel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script src="/assets/user/dist/js/importStudentReservation.js"></script>
<script>
  <?php if (isset($reservation)) :?>
    document.addEventListener('DOMContentLoaded', () => {
        loadExcelFromServer('/assets/file/labReservation/<?=$reservation->reservation_listUser?>'); // Path file di folder server
    });
  <?php endif;?>
</script>
