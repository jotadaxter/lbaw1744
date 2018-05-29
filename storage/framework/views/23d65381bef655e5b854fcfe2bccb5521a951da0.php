<?php $__env->startSection('content'); ?>
    <div id="myDIV" class="container">

        <!-- Slideshow -->
        <section class="jk-slider">
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Slide Indicator -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol>
                <!-- images -->
                <div class="carousel-inner slideshow">
                    <div class="item active">
                        <div class="overlay"></div>
                        <a href="#"><img src="uploads/promo_images/promo_flstudio.jpg" width="1920" height="1080"/></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="uploads/promo_images/promo_dreamweaver.jpg" width="1920" height="1080"/></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="uploads/promo_images/promo_sublime.jpg" width="1920" height="1080"/></a>
                    </div>
                </div>
                <!-- Switch Image buttons -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </section>

        <!-- Image Gallery -->
        <div class="container gallery" >
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title"></h1>
                </div>

                <div align="center">
                    <button class="btn btn-default filter-button" data-filter="trending">Trending</button>
                    <button class="btn btn-default filter-button" data-filter="promo">Promotions</button>
                </div>
                <br/>

                <!-- Most Trending Products -->
                <?php if(isset($trending_products)): ?>
                    <?php $__currentLoopData = $trending_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter trending">
                            <figure>
                                <a href="<?php echo e(url('products/'. $tprod->product_id)); ?>">
                                    <img src="/uploads/product_images/<?php echo e($tprod->logo_path); ?>" class="img-responsive slide_image">
                                </a>
                                <figcaption class="figure-caption text-center product-description">
                                    <div> <b style="font-size: 25px;"> <?php echo e($tprod->name); ?></b>
                                        <p><b style="color:red;font-size:25px;">300€</b>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <!-- Promotion Products -->
                <?php if(isset($promo_products)): ?>
                    <?php $__currentLoopData = $promo_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pprod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter promo">
                            <figure>
                                <a href="<?php echo e(url('products/'. $pprod->product_id)); ?>">
                                    <img src="/uploads/product_images/<?php echo e($pprod->logo_path); ?>" class="img-responsive slide_image">
                                </a>
                                <figcaption class="figure-caption text-center product-description">
                                    <div> <b style="font-size: 25px;"> <?php echo e($pprod->name); ?></b>
                                        <p>
                                            <s><?php echo e($pprod->price); ?>€</s>
                                            <b style="color:red;font-size:25px;"><?php echo e($pprod->discounted_price); ?>€</b>
                                        </p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>



            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>