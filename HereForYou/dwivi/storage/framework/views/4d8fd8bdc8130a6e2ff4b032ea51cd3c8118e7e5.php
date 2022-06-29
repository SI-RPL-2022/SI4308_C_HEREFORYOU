<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-text text-center">Anda berhasil booking dengan Nomor Booking #<?php echo e($item->number); ?></h6>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <p class="card-text text-center">
                        Silahkan Lakukan pembayaran sesuai yang tertera dibawah ini
                    </p>
                    <h2 class="text-center">
                        Rp. <?php echo e(number_format($item->cost)); ?>

                    </h2>
                    <p class="small text-center mt-3">
                        Ke Rekening Dibawah ini
                    </p>
                    <div class="text-center">
                        <img src="<?php echo e($bank->logo()); ?>" alt="" class="img-fluid my-3" style="max-height: 60px;max-widht:80px">
                    </div>
                    <h4 class="text-center">
                        <?php echo e($bank->number); ?>

                    </h4>
                    <h6 class=" text-center">a.n <?php echo e($bank->owner_name); ?></h6>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <p class="text-center card-text">Jika sudah melakukan pembayaran, silahkan tunggu admin untuk memverifikasi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/pages/booking/success.blade.php ENDPATH**/ ?>