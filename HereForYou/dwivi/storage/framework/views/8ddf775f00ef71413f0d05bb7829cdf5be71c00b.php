<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo e($count['booking']); ?></h3>

            <p>Booking</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo e(route('admin.bookings.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo e($count['psychologist']); ?></h3>

            <p>Psikolog</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?php echo e(route('admin.psychologists.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo e($count['user']); ?></h3>

            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo e(route('admin.users.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>Booking Terbaru</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="10" class="text-center">#</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Psikolog</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Durasi (Jam)</th>
                        <th class="text-center">Biaya</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $booking_latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->number); ?></td>
                            <td><?php echo e($item->psychologist->name); ?></td>
                            <td><?php echo e($item->user->name); ?></td>
                            <td class="text-right"><?php echo e($item->duration); ?></td>
                            <td class="text-right">Rp. <?php echo e(number_format($item->cost)); ?></td>
                            <td>
                                <?php if($item->status === 'SUCCESS'): ?>
                                <span class="badge badge-success">SUCCESS</span>
                                <?php elseif($item->status === 'PENDING'): ?>
                                <span class="badge badge-info">PENDING</span>
                                <?php else: ?> 
                                <span class="badge badge-danger">FAILED</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->created_at->translatedFormat('d/m/Y H:i:s')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- ChartJS -->
<script src="<?php echo e(asset('assets/plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('assets/dist/js/pages/dashboard.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('assets/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sprint 1\dwivi\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>