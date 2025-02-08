<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1 class="text-black">Profile Page</h1>
      <ol class="breadcrumb">
        <li></i> Profile Page</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <div class="col-lg-4">
          <div class="user-profile-box m-b-3">
            <div class="box-profile text-white"> 
              <img class="profile-user-img img-responsive img-circle m-b-2" height="100px" width="100px"
                  style="object-fit: cover;object-position: center;height: 100px; width: 100px;"
                  src="<?= $user->avatar? '/assets/file/avatar/'. $user->avatar : '/assets/img/profile-default.jpg'  ?>" 
                  alt="User profile picture">
              <h3 class="profile-username text-center"><?= $user->name??'' ?></h3>
              <p class="text-center"><?= $user->nim??'' ?></p>
              <p class="text-center"><?= isset($user->bio) ? substr(strip_tags($user->bio), 0, 100) . '...' : '' ?></p>
            </div>
          </div>
          <div class="info-box">
            <div class="box-body"> <strong><i class="fa fa-book margin-r-5"></i> Field of Study</strong>
              <p class="text-muted"> <?= $user->major??'' ?> </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
              <p class="text-muted"><?= $user->address??'' ?></p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
              <p><?= $user->phone??'' ?></p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Social Media</strong>
              <div class="text-left mt-2 d-flex" style="gap: 10px;">
                <?php if($user->facebook): ?>
                  <a href="<?= $user->facebook??'' ?>" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                <?php endif; ?>
                <?php if($user->instagram): ?>
                  <a href="<?= $user->instagram??'' ?>" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                <?php endif; ?>
                <?php if($user->linkedin): ?>
                  <a href="<?= $user->linkedin??'' ?>" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
                <?php endif; ?>
                <?php if($user->twitter): ?>
                  <a href="<?= $user->twitter??'' ?>" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                <?php endif; ?>
              </div>
            </div>
            <!-- /.box-body --> 
          </div>
        </div>
        <div class="col-lg-8">
          <div class="info-box">
            <div class="card tab-style1"> 
              <!-- Nav tabs -->
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">Profile</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reset" role="tab">Reset</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="profile" role="tabpanel" aria-expanded="false" >
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Name Lengkap</strong> <br>
                        <p class="text-muted"><?= $user->name??'' ?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Mobile</strong> <br>
                        <p class="text-muted"><?= $user->mobile??'' ?></p>
                      </div>
                      <div class="col-lg-3 col-xs-6 b-r"> <strong>Email</strong> <br>
                        <p class="text-muted"><?= $user->email??'' ?></p>
                      </div>
                    </div>
                    <hr>
                    <div>
                      <?= $user->bio??'' ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
                    <form action="/u/<?= $user->seo_user??'' ?>/profile/update"  
                          class="form-horizontal form-material" method="POST"
                          enctype="multipart/form-data">
                      <?= csrf_token() ?>
                      <div class="form-group">
                        <label class="col-md-12">NIM/NIK</label>
                        <div class="col-md-12">
                          <input disabled name="nim" value="<?= $user->nim??'' ?>" placeholder="Nim/Nik" class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Avatar</label>
                        <div class="col-md-12">
                        <div class="card">
                            <input accept="image/*" type="file" name="avatar" id="input-file-max-fs" class="dropify" data-max-file-size="1M" data-default-file="<?= $user->avatar? '/assets/file/avatar/'. $user->avatar : '/assets/img/profile-default.jpg'  ?>"/>
                            <input type="text" name="avatar" value="<?= $user->avatar??'' ?>" hidden>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Name</label>
                        <div class="col-md-12">
                          <input placeholder="J. Habibi"  value="<?= $user->name??'' ?>" name="name" 
                                  class="form-control form-control-line" 
                                  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                          <input placeholder="habibi@mail.co" value="<?= $user->email??'' ?>" name="email" 
                                  class="form-control form-control-line" 
                                  id="example-email" type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" value="<?= $user->phone??'' ?>" name="phone"
                                  class="form-control form-control-line" type="number">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Mobile No</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" value="<?= $user->mobile??'' ?>" name="mobile"
                                  class="form-control form-control-line" type="number">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Address</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" value="<?= $user->address??'' ?>" name="address"
                                  class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Field of Study</label>
                        <div class="col-md-12">
                          <input placeholder="Physics" value="<?= $user->mobile??'' ?>" name="major"
                                  class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Bio</label>
                        <div class="col-md-12">
                          <div class="card">
                              <div id="summernote" ><?= $user->bio??'' ?></div>
                              <input hidden type="text" name="descLong">
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-12">Instagram</label>
                        <div class="col-md-12">
                        <input placeholder="instagram.com/habibi_05" value="<?= $user->instagram??'' ?>" name="instagram"
                              class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">facebook</label>
                        <div class="col-md-12">
                        <input placeholder="facebook.com/habibi/" value="<?= $user->facebook??'' ?>" name="facebook"
                              class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">X</label>
                        <div class="col-md-12">
                        <input placeholder="x.com/habibi_05" value="<?= $user->twitter??'' ?>" name="twitter"
                              class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">linkedin</label>
                        <div class="col-md-12">
                        <input placeholder="linkedin.com/in/habibi_05/" value="<?= $user->linkedin??'' ?>" name="linkedin"
                              class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button class="btn btn-success">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane" id="reset" role="tabpanel">
                  <div class="card-body">
                    <!-- <form class="form-horizontal form-material">
                      <div class="form-group">
                        <label class="col-md-12">Full Name</label>
                        <div class="col-md-12">
                          <input placeholder="Florence Douglas" class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                          <input placeholder="florencedouglas@admin.com" class="form-control form-control-line" name="example-email" id="example-email" type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                          <input value="password" class="form-control form-control-line" type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Phone No</label>
                        <div class="col-md-12">
                          <input placeholder="123 456 7890" class="form-control form-control-line" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-12">Message</label>
                        <div class="col-md-12">
                          <textarea rows="5" class="form-control form-control-line"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-12">Select Country</label>
                        <div class="col-sm-12">
                          <select class="form-control form-control-line">
                            <option>London</option>
                            <option>India</option>
                            <option>Usa</option>
                            <option>Canada</option>
                            <option>Thailand</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button class="btn btn-success">Update Profile</button>
                        </div>
                      </div>
                    </form> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Main row --> 
    </div>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->

