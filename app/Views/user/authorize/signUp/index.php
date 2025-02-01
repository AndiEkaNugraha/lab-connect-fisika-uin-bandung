<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign Up</h3>
    <form action="sign-up" method="POST">
      <?= csrf_token() ?>
      <div class="form-group has-feedback">
        <label for="name">Name</label>
        <input required value="<?= $name??'' ?>" name="name" type="text" class="form-control sty1" placeholder="J. Habibi">
      </div>
      <div class="form-group has-feedback">
      <label for="name">Nim/Nik</label>
        <input required value="<?= $nim??'' ?>" name="nim" type="number" class="form-control sty1" placeholder="1117030000">
        <?php if (isset($nimRegistered) && $nimRegistered): ?>
        <small class="text-danger">Nim/Nik already registered</small>
        <?php endif; ?>
      </div>
      <div class="form-group has-feedback">
      <label for="name">Email</label>
        <input required value="<?= $email??'' ?>" name="email" type="email" class="form-control sty1" placeholder="habibi@mail.co">
        <?php if ((isset($invalidEmail) && $invalidEmail) || (isset($emailRegistered) && $emailRegistered)): ?>
          <small class="text-danger">
            <?= $invalidEmail ? 'Invalid Email' : 'Email already registered' ?>
          </small>
        <?php endif; ?>

      </div>
      <div class="form-group has-feedback">
        <label for="name">Phone</label> 
        <input required value="<?= $phone??'' ?>" name="phone" type="number" class="form-control sty1" placeholder="02112345678">
      </div>
      <div class="form-group has-feedback">
      <label for="name">Password</label> 
        <div class="input-group">
          <input name="password" id="password" type="password" class="form-control sty1" placeholder="@USer112">
          <div class="input-group-append">
            <button type="button" class="border-0 bg-white" id="togglePassword" style="outline: none;height: 100%;color:rgb(197, 197, 197);">
              <i class="fa fa-eye"></i>
            </button>
          </div>
        </div>
        <?php if (isset($invalidPassword) && $invalidPassword): ?>
          <small class="text-danger">At least 8 characters, including uppercase, lowercase, number, and symbol</small>
        <?php endif; ?>
      </div>
      <div>
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">
               I agree to all Terms </label>
             </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign UP</button>
          <?php if (isset($error) && $error) : ?>
            <div class=" text-center"><small class="text-danger"><?= $error ?></small></div>
          <?php endif; ?>
        </div>
        <!-- /.col --> 
      </div>
    </form>
    <div class="m-t-2">Already have an account? <a href="sign-in" class="text-center">Sign In</a></div>
  </div>
  <!-- /.login-box-body --> 
</div>

<script src="/assets/user/dist/js/showPassword.js"></script>