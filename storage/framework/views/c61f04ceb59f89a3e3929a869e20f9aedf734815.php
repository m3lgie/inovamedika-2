<?php $__env->startSection('content'); ?>


  <div class="login-box">
      <div class="logo">
        <div class="item">

              <img class="col-sm-3" src="<?php echo e(asset('images/logo.png')); ?>" width="100%">
              <div class="col-sm-9">

                <a href="javascript:void(0);">SIM<b>PERKOM</b></a>
                <small>Sistem Informasi Perekonomian</small>

              </div>

        </div>
  <small>Biro Administrasi Perekonomian & SDA - Prov. Riau</small>
          <small>&nbsp;</small>
      </div>
      <div class="card">
          <div class="body">
              <form id="sign_in" method="POST">
                  <div class="msg">Sign in to start your session</div>
                  <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                      <?php echo e(csrf_field()); ?>





                  <div class="input-group form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                      <span class="input-group-addon">
                          <i class="material-icons">person</i>
                      </span>
                      <div class="form-line">
                        <input id="username" type="text" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required autofocus>

                        <?php if($errors->has('username')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('username')); ?></strong>
                            </span>
                        <?php endif; ?>
                      </div>
                  </div>


                  <div class="input-group">
                      <span class="input-group-addon">
                          <i class="material-icons">lock</i>
                      </span>
                      <div class="form-line">
                        <input id="password" type="password" class="form-control" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xs-8 p-t-5">
                          <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                          <label for="rememberme">Remember Me</label>
                      </div>
                      <div class="col-xs-4">
                          <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                      </div>
                  </div>
                  <div class="row m-t-15 m-b--20">
                      <div class="col-xs-6">
                          <a href="sign-up.html">Register Now!</a>
                      </div>
                      <div class="col-xs-6 align-right">
                          <a href="forgot-password.html">Forgot Password?</a>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/signin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>