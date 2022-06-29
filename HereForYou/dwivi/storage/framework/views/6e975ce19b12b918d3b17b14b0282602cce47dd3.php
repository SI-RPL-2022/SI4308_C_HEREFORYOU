<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <div class="text-center user-panel">
      <img src="<?php echo e(asset('assets/image/logohfy1.png')); ?>" style="height:80px; width:80px " alt="" class="img-fluid">
     </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('assets/image/PasFoto.JPEG')); ?>" class="img-circle elevation-2" alt="Admin Image">
        </div>
        <div class="info">
          <a href="<?php echo e(route('admin.profile')); ?>" class="d-block"><?php echo e(auth()->user()->name); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.psychologists.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Psikolog
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.banks.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Bank
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.bookings.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <div class="nav-item">
            <a href="<?php echo e(route('logout')); ?>" class="nav-link" onclick="event.preventDefault();
            document.getElementById('formLogout').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form action="<?php echo e(route('logout')); ?>" method="post" id="formLogout">
              <?php echo csrf_field(); ?>
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/admin/layouts/partials/sidebar.blade.php ENDPATH**/ ?>