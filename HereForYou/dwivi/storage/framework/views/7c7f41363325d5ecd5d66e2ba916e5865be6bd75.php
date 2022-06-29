<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Bank</h6>
                    <a href="<?php echo e(route('admin.banks.create')); ?>" class="btn btn-sm btn-primary">Tambah Bank</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Nama Bank</th>
                            <th class="text-center">No. Rekening</th>
                            <th class="text-center">Nama Pemilik</th>
                            <th class="text-center">Status</th>
                            <th width="170" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <img src="<?php echo e($item->logo()); ?>" alt="" class="img-fluid" style="max-height: 80px">
                                </td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->number); ?></td>
                                <td><?php echo e($item->owner_name); ?></td>
                                <td>
                                    <?php if($item->status == 1): ?>
                                    <span class="badge badge-success">Aktif</span>
                                    <?php else: ?>
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if($item->status == 1): ?>
                                    <a href="<?php echo e(route('admin.banks.set-status',$item->id)); ?>?status=0" class="btn btn-sm btn-secondary">Set Tidak Aktif</a>
                                    <?php else: ?>
                                    <a href="<?php echo e(route('admin.banks.set-status',$item->id)); ?>?status=1" class="btn btn-sm btn-success">Set Aktif</a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('admin.banks.edit', $item->id)); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="<?php echo e(route('admin.banks.destroy', $item->id)); ?>" class="d-inline" method="post">
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
<?php if(session('error')): ?>
<script>
    toastr.error('<?php echo e(session('error')); ?>.')
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\tubes-wad\tubes-wad\resources\views/admin/pages/bank/index.blade.php ENDPATH**/ ?>