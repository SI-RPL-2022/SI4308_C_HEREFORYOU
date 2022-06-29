<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="<?php echo e($item->photo()); ?>"
                   alt="Foto <?php echo e($item->name); ?>">
            </div>

            <h3 class="profile-username text-center"><?php echo e($item->name); ?></h3>

            <p class="text-muted text-center"><?php echo e($item->specialist); ?></p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Nama</b> <a class="float-right text-dark small"><?php echo e($item->name); ?></a>
              </li>
              <li class="list-group-item">
                <b>Spesialis</b> <a class="float-right text-dark small"><?php echo e($item->specialist); ?></a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="float-right text-dark small"><?php echo e($item->address); ?></a>
              </li>
              <li class="list-group-item">
                <b>No. Telepon</b> <a class="float-right text-dark small"><?php echo e($item->phone_number); ?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right text-dark small"><?php echo e($item->email); ?></a>
              </li>
              <li class="list-group-item">
                <b>Tarif (Jam)</b> <a class="float-right text-dark small">Rp. <?php echo e(number_format($item->price_hourly)); ?></a>
              </li>
              <li class="list-group-item">
                <b>Bergabung pada </b></b> <a class="float-right small text-dark"><?php echo e($item->created_at->translatedFormat('l, d F Y')); ?></a>
              </li>
              <li class="list-group-item">
                <b>Terakhir Diperbaharui pada</b> <a class="float-right small text-dark"><?php echo e($item->updated_at->translatedFormat('l, d F Y')); ?></a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Jadwal Aktif</h6>
            </div>
            <div class="card-body">
                <a href="<?php echo e(route('admin.schedules.create',$item->id)); ?>" class="my-2 btn btn-sm btn-primary">Tambah Jadwal</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width=10>#</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam Buka</th>
                                <th class="text-center">Jam Tutup</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $item->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($schedule->day); ?></td>
                                <td><?php echo e($schedule->opened_at); ?></td>
                                <td><?php echo e($schedule->closed_at); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.schedules.edit',[$item->id,$schedule->id])); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="<?php echo e(route('admin.schedules.destroy',$schedule->id)); ?>" class="d-inline" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5">
                                    <div class="alert">
                                        <p class="text-center">Tidak Ada Jadwal</p>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Review User</h6>
            </div>
            <div class="card-body">
                <div class="my-2">
                    <h6>Nilai : <span class="badge badge-success"><?php echo e($item->rating()); ?></span></h6>
                </div>
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width=10>#</th>
                            <th class="text-center">Nama User</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Isi</th>
                            <th class="text-center">Tanggl</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $item->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($review->user->name); ?></td>
                            <td><?php echo e($review->value); ?></td>
                            <td><?php echo e($review->text); ?></td>
                            <td><?php echo e($item->created_at->translatedFormat('l, d F Y')); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
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
        "ordering": false,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "searching": false
    });
  });
</script>
<?php if(session('success')): ?>
<script>
    toastr.success('<?php echo e(session('success')); ?>.')
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/admin/pages/psychologist/show.blade.php ENDPATH**/ ?>