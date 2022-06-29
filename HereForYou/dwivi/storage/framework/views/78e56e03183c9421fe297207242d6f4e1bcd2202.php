<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Consultation Detail</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
            <a class="nav-link" id="v-pills-review-tab" data-toggle="pill" href="#v-pills-review" role="tab" aria-controls="v-pills-review" aria-selected="false">Review</a>
            <a class="nav-link" id="v-pills-schedule-tab" data-toggle="pill" href="#v-pills-schedule" role="tab" aria-controls="v-pills-schedule" aria-selected="false">Jadwal</a>
            <a href="<?php echo e(route('booking.create',$item->id)); ?>" class="btn btn-sm btn-info btn-block mt-4">Konseling Sekarang</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
               <table class="table table-borderless">
                   <tr>
                       <th>Nama</th>
                       <td>
                           <?php echo e($item->name); ?>

                       </td>
                   </tr>
                    <tr>
                        <th>Spesialis</th>
                        <td><?php echo e($item->specialist); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo e($item->email); ?></td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td><?php echo e($item->phone_number); ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?php echo e($item->address); ?></td>
                    </tr>
               </table>
            </div>
            <div class="tab-pane fade" id="v-pills-review" role="tabpanel" aria-labelledby="v-pills-review-tab">
                <p class="mb-4"> 
                    Nilai : <span class="badge badge-success">
                        
                        <?php echo e($item->rating()); ?>

                    </span>
                </p>
                <table id="table" class="table table-striped dtable w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $item->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($review->user->name); ?></td>
                            <td><?php echo e($review->value); ?></td>
                            <td><?php echo e($review->text); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab">
                <table id="table" class="table table-striped dtable w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hari</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $item->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($schedule->day); ?></td>
                            <td><?php echo e($schedule->opened_at); ?></td>
                            <td><?php echo e($schedule->closed_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $('.dtable').DataTable({
        "paging": true,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "searching":false,
        "lengthChange":false
    });
  });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/pages/consultation/show.blade.php ENDPATH**/ ?>