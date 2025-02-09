  <!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
<style>
    /* Atur tinggi dropdown */
    .select2-container .select2-selection--single {
        height: 36px !important; /* Ubah sesuai kebutuhan */
        padding: 5px;
    }

    /* Atur tinggi teks di dalam dropdown */
    .select2-container .select2-selection--single .select2-selection__rendered {
        line-height: 36px !important;
    }

    /* Atur tinggi ikon dropdown */
    .select2-container .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }
</style>
  
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
            <li class=""><a href="#tab1" style="height:100%"><div class="number">1</div> <span class="d-none d-md-inline">Request</span></a></li>
            <li class=""><a href="#tab2" style="height:100%"><div class="number">2</div> <span class="d-none d-md-inline">Before</span></a></li>
            <li class=""><a href="#tab3" style="height:100%"><div class="number">3</div> <span class="d-none d-md-inline">After</span></a></li>
            </ul>
            <div class="step-content">
              <div class="step-tab-panel" id="tab1">
                <form name="frmReq" id="frmReq" enctype="multipart/form-data">
                  <div class="row m-t-2">
                    <div class="col-md-6">
                      <div class="">
                        <label for="location1">Select Equipment :</label>
                        <select disabled class="custom-select form-control select2" id="equipment" name="equipment">
                            <option disabled value="">Select Equipment</option>
                            <?php if (!empty($listEquipment)): 
                                foreach($listEquipment as $equpmentExisting): ?>
                                    <option <?php if (isset($reservation) && $equpmentExisting->id == $reservation->equipment_id) echo "selected"; ?> value="<?= $equpmentExisting->id ?>">
                                        <?= $equpmentExisting->equipments_name ?>
                                    </option>
                            <?php 
                                endforeach; 
                            endif;?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="amount">Amount</label>
                      <input min="1" disabled value="<?= $reservation->reservation_amount??'' ?>" class="form-control" id="amount" type="number" name="amount">
                      <div><small class="text-danger"><?php (isset($error_amount) && $error_amount)? print $error_amount : "" ?></small></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="start">Start Time :</label>
                        <input disabled value="<?= $reservation->reservation_start??'' ?>" class="form-control" id="start" type="datetime-local" name="start">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="end">End Time :</label>
                        <input disabled value="<?= $reservation->reservation_end??'' ?>" class="form-control" id="end" type="datetime-local" name="end">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <label for="end">Description :</label>
                        <textarea disabled value="<?= $reservation->reservation_desc??'' ?>" class="form-control" id="desc" name="desc"><?= $reservation->reservation_desc??'' ?></textarea>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                        <label for="end">Input Student :</label>
                        <input disabled onchange="handleFile(event)" accept=".xls, .xlsx" type="file" name="student" id="input-file-max-fs" class="dropify" data-max-file-size="1M" <?= isset($reservation->reservation_listUser)? 'data-default-file= /assets/file/labReservation/'.$reservation->reservation_listUser:'' ?> />
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
              <button data-direction="next" class="btn btn-primary">Next</button>
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
                        <p>Using equipment</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 5): ?>
                  <div class="sl-item sl-primary">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Equipment has been stored</p>
                      </div>
                  </div>
                <?php endif; ?>
                <?php if (isset($reservation->reservation_status) && $reservation->reservation_status >= 6): ?>
                  <div class="sl-item sl-success">
                      <div class="sl-content">
                        <small class="text-muted"><i class="fa fa-user position-left"></i> <?=$requester->name??''?></small>
                        <p>Finish using the equipment</p>
                      </div>
                  </div>
                <?php endif; ?>
            </div>
        </div>
      </div>
      <div class="card mt-4">
          <form method="POST" id="approval" class="card-body">
            <?= csrf_token() ?>
            <div class="col-md-6">
              <div class="form-group">
                <label for="location1">Approval</label>
                <select <?php if (isset($reservation) && ($reservation->reservation_status == 2 || $reservation->reservation_status > 3)) echo "disabled"; ?> class="custom-select form-control" id="location1" name="approval">
                    <option value="3">approve</option>
                    <option value="1">reject</option>
                </select>
                <small class="text-danger"><?= ($error_approver?? "") ?></small>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="end">Note :</label>
                <textarea <?php if (isset($reservation) && ($reservation->reservation_status == 2 || $reservation->reservation_status > 3)) echo "disabled"; ?> value="<?= $reservation->reservation_note??'' ?>" class="form-control" id="note" name="note"><?= $reservation->reservation_note??'' ?></textarea>
              </div>
            </div>
            <div class="col" style="text-align: right">
              <button <?php if (isset($reservation) && ($reservation->reservation_status == 2 || $reservation->reservation_status > 3)) echo "disabled"; ?> type="submit" class="btn btn-success me-auto">Save</button>
              <div><small class="text-danger"><?php (isset($error_amount) && $error_amount)? print $error_amount : "" ?></small></div>
            </div> 
          </form>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->

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
            return valid;
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
        loadExcelFromServer('/assets/file/equipmentReservation/<?=$reservation->reservation_listUser?>'); // Path file di folder server
    });
  <?php endif;?>
</script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Equipment",
            allowClear: true,
            minimumResultsForSearch: 5,
            width: '100%'
        });
    });
</script>