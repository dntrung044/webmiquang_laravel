

<?php $__env->startSection('content'); ?>
    <!-- Body: Body -->
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> <?php echo e($title); ?></h3>
                        <?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-outline-secondary"
                            data-bs-toggle="modal">
                            <a class="btn btn-primary btn-sm"
                                href="/admin/abouts/edit/<?php echo e($about->id); ?>">
                                <i class="icofont-edit text-success"></i>
                            </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end  -->
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">
                       
                            <div class="card-body  d-flex teacher-fulldeatil">
                                <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center mx-auto">
                                        <img src="<?php echo e($about->thumb); ?>" alt="errorimg" style="width: 400px" class="xl rounded-circle img-thumbnail shadow-sm">
                                    
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    
                                    <p class="mt-2 small"><?php echo $about->description; ?></p>
                                    <div class="row g-2 pt-2">
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-ui-touch-phone"></i>
                                                <span class="ms-2 small"><?php echo e($about->phone); ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-email"></i>
                                                <span class="ms-2 small"><?php echo e($about->email); ?></span>
                                            </div>
                                        </div> <br> <br><br>
                                        
                                        <div class="col-xl-5">
                                            <div class="d-flex align-items-center">
                                                <i class="icofont-google-map"></i>
                                                <span class="ms-2 small"><?php echo $about->address; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                        <div class="col-lg-12 col-md-6 add_bottom_25">
                            <iframe src="<?php echo e($about->map); ?>" class="map_contact" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dntru\OneDrive\document\Web\Laravel\webmiquang_laravel\resources\views/admin/aboutus/list.blade.php ENDPATH**/ ?>