<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e($title ?? 'Home'); ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/bs4/css/bootstrap.min.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="<?php echo e(route('home')); ?>">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('consultations.index')); ?>">Consultation</a>
                    </li>
                    
                    <?php if(auth()->guard()->guest()): ?>
                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                    <?php else: ?> 
                    <?php if(auth()->user()->role === 'admin'): ?>
                    <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a>
                    <?php else: ?> 
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo e(route('history.index')); ?>">Histori</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          <?php echo e(auth()->user()->name); ?>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('formLogout').submit()">Logout</a>
                          <form action="<?php echo e(route('logout')); ?>" method="post" id="formLogout">
                            <?php echo csrf_field(); ?>
                          </form>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
      </nav>

    <div style="min-height: 700px">
      <?php echo $__env->yieldContent('content'); ?>
    </div>


  <!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a href="https://mdbootstrap.com/"> HereForYou.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <script src="<?php echo e(asset('assets/bs4/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/bs4/js/bootstrap.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\HereForYou_OLD\resources\views/layouts/app.blade.php ENDPATH**/ ?>