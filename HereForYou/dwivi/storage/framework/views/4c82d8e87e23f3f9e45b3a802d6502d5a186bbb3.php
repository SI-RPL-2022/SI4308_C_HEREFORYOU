<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Psikolog</h6>
                    <a href="<?php echo e(route('admin.psychologists.create')); ?>" class="btn btn-sm btn-primary">Tambah Psikolog</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Spesialis</th>
                            <th class="text-center">Tarif (Jam)</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Status</th>
                            <th width="90" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <img src="<?php echo e($item->photo()); ?>" alt="" class="img-fluid" style="max-height: 80px;max-width: 80px">
                                </td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->specialist); ?></td>
                                <td>Rp. <?php echo e(number_format($item->price_hourly)); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->phone_number); ?></td>
                                <td><?php echo e($item->address); ?></td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                    <div class="badge badge-success">Aktif</div>
                                    <?php else: ?> 
                                    <div class="badge badge-danger">Tidak Aktif</div>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.psychologists.show', $item->id)); ?>" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo e(route('admin.psychologists.edit', $item->id)); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="<?php echo e(route('admin.psychologists.destroy', $item->id)); ?>" class="d-inline" method="post">
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/admin/pages/psychologist/index.blade.php ENDPATH**/ ?>