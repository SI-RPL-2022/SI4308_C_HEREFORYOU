<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Booking</h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Psikolog</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Paket</th>
                            <th class="text-center">Media</th>
                            <th class="text-center">Topik</th>
                            <th class="text-center">Jadwal</th>
                            <th class="text-center">Durasi (Jam)</th>
                            <th class="text-center">Biaya</th>
                            <th class="text-center">Pembayaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Dibuat</th>
                            <th width="90" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($item->psychologist->name); ?></td>
                                <td><?php echo e($item->user->name); ?></td>
                                <td><?php echo e($item->package); ?></td>
                                <td><?php echo e($item->media); ?></td>
                                <td><?php echo e($item->topic); ?></td>
                                <td><?php echo e($item->time->translatedFormat('l, d F Y H:i:s')); ?></td>
                                <td class="text-right"><?php echo e($item->duration); ?></td>
                                <td class="text-right">Rp. <?php echo e(number_format($item->cost)); ?></td>
                                <td>
                                    <?php echo e($item->bank_name . ' - ' . $item->bank_number); ?>

                                </td>
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
                                <td class="text-center">
                                    <?php if($item->status === 'SUCCESS'): ?>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=PENDING" class="btn btn-sm btn-info"><i class="fas fa-spinner"></i></a>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=FAILED" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i></a>
                                    <?php elseif($item->status === 'PENDING'): ?>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=SUCCESS" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=FAILED" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i></a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=SUCCESS" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <a href="<?php echo e(route('admin.bookings.set-status',$item->id)); ?>?status=PENDING" class="btn btn-sm btn-info"><i class="fas fa-spinner"></i></a>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('admin.bookings.destroy', $item->id)); ?>" class="d-inline" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<!-- Toastr -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/toastr/toastr.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('assets/plugins/toastr/toastr.min.js')); ?>"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $('#table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
  });
</script>
<?php if(session('success')): ?>
<script>
    toastr.success('<?php echo e(session('success')); ?>.')
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\tubes-wad\tubes-wad\resources\views/admin/pages/booking/index.blade.php ENDPATH**/ ?>