  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Form Reservation</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> Forms</li>
        <li><i class="fa fa-angle-right"></i> Form Wizard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="info-box">
        <div id="demo1">
          <div class="step-app">
            <ul class="step-steps">
              <li><a href="#tab1"><span class="number">1</span> Request</a></li>
              <li><a href="#tab2"><span class="number">2</span> Job Status</a></li>
              <li><a href="#tab3"><span class="number">3</span> Interview</a></li>
              <li><a href="#tab4"><span class="number">4</span> Remark</a></li>
            </ul>
            <div class="step-content">
              <div class="step-tab-panel" id="tab1">
                <form name="frmReq" id="frmReq" enctype="multipart/form-data">
                  <div class="row m-t-2">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="location1">Select labolatory :</label>
                        <select class="custom-select form-control" id="location1" name="labolatory">
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
                        <input value="<?= $reservation->reservation_start??'' ?>" class="form-control" id="start" type="datetime-local" name="start">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end">End Time :</label>
                        <input value="<?= $reservation->reservation_end??'' ?>" class="form-control" id="end" type="datetime-local" name="end">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="end">Description :</label>
                        <textarea value="<?= $reservation->reservation_desc??'' ?>" class="form-control" id="desc" name="desc"><?= $reservation->reservation_desc??'' ?></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <label for="end">Input Student :</label>
                        <input onchange="handleFile(event)" accept=".xls, .xlsx" type="file" name="student" id="input-file-max-fs" class="dropify" data-max-file-size="1M" <?= isset($reservation->reservation_listUser)? 'data-default-file= /assets/file/labReservation/'.$reservation->reservation_listUser:'' ?> />
                        <input type="text" name="student" value="" hidden>
                        <small class=""><a href="/assets/file/labReservation/example/example-template.xlsx">Download template here!</a></small>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-------------------------------- tab 2 -------------------------------->
              <div class="step-tab-panel" id="tab2">
                <h3>Tab2</h3>
                <form name="frmInfo" id="frmInfo">
                </form>
              </div>
              <div class="step-tab-panel" id="tab3">
                <h3>Tab3</h3>
                <form name="frmLogin" id="frmLogin">
                </form>
              </div>
              <div class="step-tab-panel" id="tab4">
                <h3>Tab4</h3>
                <form name="frmMobile" id="frmMobile">
                </form>
              </div>
            </div>
            <div class="step-footer">
              <button type="button" class="btn btn-success me-auto" onclick="submitForms()">Save</button>
              <button data-direction="prev" class="btn btn-light">Previous</button>
              <button data-direction="next" class="btn btn-primary">Next</button>
              <button data-direction="finish" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card mt-4">
        <div class="card-body d-grid d-xl-flex" style="gap: 50px">
            <div class="table-responsive col-12 col-xl-8">
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

            <div class="info-box" style="max-width: 500px">
                <h4 class="m-b-2 text-black">Status</h4>
                <?php if (isset($stepRequest)): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> <?=$user->name??''?></small>
                          <p>Make a reservation</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation)): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content"><small class="text-muted"><i class="fa fa-user position-left"></i> <?=$user->name??''?></small>
                          <p>Reservation made</p>
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
    function submitForms() {
        const form = document.getElementById('frmReq');
        const formData = new FormData(form);
        formData.append('_token', csrfToken);

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
	
    var frmInfo = $('#frmInfo');
    var frmInfoValidator = frmInfo.validate();

    var frmLogin = $('#frmLogin');
    var frmLoginValidator = frmLogin.validate();

    var frmMobile = $('#frmMobile');
    var frmMobileValidator = frmMobile.validate();

    $('#demo1').steps({
      onChange: function (currentIndex, newIndex, stepDirection) {
        console.log('onChange', currentIndex, newIndex, stepDirection);
        // tab1
        if (currentIndex === 0) {
          if (stepDirection === 'forward') {
            var valid = frmReq.valid();
            <?php if (isset($reservation) && $reservation->reservation_status >=2) {
                    ?>return valid;<?php
                }else {
                    ?>return showAlert('danger', 'The application has not been approved');<?php
                }
            ?>
            
            // return valid;
          }
          if (stepDirection === 'backward') {
            frmReqValidator.resetForm();
          }
        }
		
		// tab2
        if (currentIndex === 1) {
          if (stepDirection === 'forward') {
            var valid = frmInfo.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmInfoValidator.resetForm();
          }
        }

        // tab3
        if (currentIndex === 2) {
          if (stepDirection === 'forward') {
            var valid = frmLogin.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmLoginValidator.resetForm();
          }
        }

        // tab4
        if (currentIndex === 3) {
          if (stepDirection === 'forward') {
            var valid = frmMobile.valid();
            return valid;
          }
          if (stepDirection === 'backward') {
            frmMobileValidator.resetForm();
          }
        }

        return true;

      },
      onFinish: function () {
        alert('Wizard Completed');
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
