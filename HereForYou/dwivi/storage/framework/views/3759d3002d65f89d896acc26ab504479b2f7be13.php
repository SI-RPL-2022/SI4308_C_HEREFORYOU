<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-text text-center">Histori</h5>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th width="10" class="text-center">#</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Psikolog</th>
                                <th class="text-center">Paket</th>
                                <th class="text-center">Media</th>
                                <th class="text-center">Topik</th>
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Durasi (Jam)</th>
                                <th class="text-center">Biaya</th>
                                <th class="text-center">Pembayaran</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Dibuat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->number); ?></td>
                                    <td><?php echo e($item->psychologist->name); ?></td>
                                    <td><?php echo e($item->package); ?></td>
                                    <td><?php echo e($item->media); ?></td>
                                    <td><?php echo e($item->topic); ?></td>
                                    <td><?php echo e($item->time->translatedFormat('d/m/Y H:i:s')); ?></td>
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
                                    <td><?php echo e($item->created_at->translatedFormat('d/m/Y')); ?></td>
                                    <td>
                                        <?php if($item->status === 'SUCCESS'): ?>
                                        <Button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRating" data-id="<?php echo e($item->id); ?>" data-psychologist_id="<?php echo e($item->psychologist_id); ?>" id="btnRating">Beri Rating</Button>
                                        <?php else: ?>
                                        Tidak bisa
                                        <?php endif; ?>   
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Beri Rating</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo e(route('consultation.rating')); ?>" method="post">
        <div class="modal-body">
              <?php echo csrf_field(); ?>
              <input type="text" hidden name="psychologist_id" id="psychologist_id">
              <input type="text" hidden name="id" id="id">
                <?php for($i = 1;$i <= 5; $i++): ?>  
                <div class="custom-control custom-radio">
                    <input type="radio" name="score" value="<?= $i; ?>" class="custom-control-input" id="defaultUnchecked<?= $i; ?>" required="required">
                    <label for="defaultUnchecked<?= $i; ?>" class="custom-control-label">
                        <?php for ($j = 0;$j < $i; $j++): ?>
                        <span class="fas fa-star text-warning"></span>
                        <?php endfor ?> 
                    </label>
                </div>
                <?php endfor; ?>
                <div class="form-group">
                    <label for="text">Pesan</label>
                    <textarea name="text" id="text" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "searching":false
    });

    $('body').on('click', '#btnRating', function(){
        var id = $(this).data('id');
        var psychologist_id = $(this).data('psychologist_id');
        $('#id').val(id);
        $('#psychologist_id').val(psychologist_id);
    })
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/pages/booking/index.blade.php ENDPATH**/ ?>