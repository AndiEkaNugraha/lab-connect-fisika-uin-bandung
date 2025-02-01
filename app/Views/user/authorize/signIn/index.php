<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Sign In</h3>
    <form action="sign-in" method="post">
      <?= csrf_token() ?>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control sty1" placeholder="Email">
      </div>
      <div class="form-group has-feedback">
        <div class="input-group">
          <input name="password" id="password" type="password" class="form-control sty1" placeholder="Password">
          <div class="input-group-append">
            <button type="button" class="border-0 bg-white" id="togglePassword" style="outline: none;height: 100%;color:rgb(197, 197, 197);">
              <i class="fa fa-eye"></i>
            </button>
          </div>
        </div>
      </div>
      <div>
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="remember" name="remember"> 
              Remember Me </label>
            <a href="pages-recover-password.html" class="pull-right"><i class="fa fa-lock"></i> Forgot pwd?</a> </div>
        </div>
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <?php if (isset($error) && $error) : ?>
            <div class=" text-center"><small class="text-danger"><?= $error ?></small></div>
          <?php endif; ?>
        </div>
      </div>
    </form>
    <div class="social-auth-links text-center">
      <div class="m-t-2">Don't have an account? <a href="sign-up" class="text-center">Sign Up</a></div>
    </div>
  </div>
</div>

<script src="/assets/user/dist/js/showPassword.js"></script>