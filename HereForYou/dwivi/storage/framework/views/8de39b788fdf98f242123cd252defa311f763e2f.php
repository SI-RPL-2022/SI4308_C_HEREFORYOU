<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Consultation</h4>
        </div>
    </div>
    <div class="row">
       <?php $__currentLoopData = $psychologists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $psychologist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-md-3">
            <div class="card">
                <img src="<?php echo e($psychologist->photo()); ?>" class="card-img-top" alt="..." style="height: 200px; width: auto">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($psychologist->name); ?></h5>
                    <p class="card-text">
                        Spesialis : <?php echo e($psychologist->specialist); ?>

                    </p>
                    <p class="card-text">
                        <div class="small">
                            <?php for($i = 0; $i < floor($psychologist->rating()); $i++): ?>
                            <span class="fas fa-star text-warning"></span>
                            <?php endfor; ?>
                            <?php
                               $starInActive = 5 - floor($psychologist->rating())
                            ?>
                            <?php for($j = 0; $j < $starInActive; $j++): ?>
                            <span class="fas fa-star"></span>
                            <?php endfor; ?>
                            <span>(<?php echo e($psychologist->reviews()->count()); ?>)</span>
                        </div>
                        
                    </p>
                    <a href="<?php echo e(route('consultations.show',$psychologist->id)); ?>" class="btn btn-info btn-sm px-3 float-right">Detail</a>
                </div>
            </div>
        </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI4308_KELOMPOK09_HERE-FOR-YOU\Tubes-WAD\resources\views/pages/consultation/index.blade.php ENDPATH**/ ?>