<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-12">
            <h4 class="text-center">Booking</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Profil</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <td><?php echo e($psychologist->name); ?></td>
                        </tr>
                        <tr>
                            <th>Spesialis</th>
                            <td><?php echo e($psychologist->specialist); ?></td>
                        </tr>
                        <tr>
                            <th>Skor</th>
                            <td>
                                <?php echo e($psychologist->rating()); ?>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Form Booking</h5>
                    <form action="<?php echo e(route('booking.store')); ?>" method="post" id="form">
                        <?php echo csrf_field(); ?>
                        <input type="text" hidden value="<?php echo e($psychologist->id); ?>" name="psychologist_id">
                        <div class="form-group formNone">
                            <label for="package">Paket</label>
                            <select name="package" id="package" class="form-control <?php $__errorArgs = ['package'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" selected disabled>-- Pilih Paket --</option>
                                <option value="Individu">Individu</option>
                                <option value="Pasangan">Pasangan</option>
                            </select>
                            <?php $__errorArgs = ['package'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group formNone">
                            <label for="duration">Durasi (Jam)</label>
                            <input type="number" min="1" class="form-control <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="duration" name="duration">
                            <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group formNone">
                            <label for="media">Media</label>
                            <select name="media" id="media" class="form-control <?php $__errorArgs = ['media'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" selected disabled>-- Pilih Media --</option>
                                <option value="Call Whatsapp">Call Whatsapp</option>
                                <option value="Chat Whatsapp">Chat Whatsapp</option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Zoom">Zoom</option>
                            </select>
                            <?php $__errorArgs = ['media'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group time d-none">
                            <label for="time">Atur Jadwal</label>
                            <div class="input-group date" id="time" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" data-target="#time" value="<?php echo e(old('time')); ?>" name="time"/>
                                <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-inline">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group formNone topic d-none">
                            <label for="topic">Topik</label>
                            <select name="topic" id="topic" class="form-control <?php $__errorArgs = ['topic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" selected disabled>-- Pilih Topik --</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Pasangan">Pasangan</option>
                                <option value="Trauma">Trauma</option>
                                <option value="Seksualitas">Seksualitas</option>
                            </select>
                            <?php $__errorArgs = ['topic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback">
                                <?php echo e($message); ?>

                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button type="button" class="btn btn-primary float-right btnBooking d-none">Booking Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- daterangepicker -->
<script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<script>
    $(function(){
        $('#package').on('change', function(){
            $('.btnBooking').removeClass('d-none');
        })
        $('.btnBooking').on('click', function(){
            $('.formNone').addClass('d-none');
            $('.time').removeClass('d-none');
            $(this).html('Jadwal Sudah Benar');
            $(this).on('click', function(){
                $('.time').addClass('d-none');
                $('.topic').removeClass('d-none');
                $(this).html('Lanjut Pembayaran');
                $(this).on('click', function(){
                    $(this).attr('type','submit');
                })
            })
            // $('#form').submit();
        })
        $('#time').datetimepicker({
        
            icons: { time: 'far fa-clock' },
            format: 'YYYY-MM-DD HH:mm:ss'

        });
    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\Downloads\tubes-wad\tubes-wad\resources\views/pages/booking/create.blade.php ENDPATH**/ ?>