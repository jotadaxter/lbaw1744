<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>

    <div id="prodDIV" class="container">

        <div class="container-fluid">
            <div class="row"><div class="product-title page-title"><h1><?php echo e($product->name); ?></h1></div></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="/uploads/product_images/<?php echo e($product->logo_path); ?>" style="width:210px;height: 210px;" class="img-rounded" alt="Cinque Terre" width="400" height="400">
                            </div>
                        </div>
                        <br>

                        <!-- Product Gallery -->

                        <!-- Slideshow -->
                        <section class="jk-slider">
                            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                                <!-- Slide Indicator -->
                                <ol class="carousel-indicators">
                                    <?php $it=0; ?>
                                    <?php if($images!=null): ?>
                                            <?php if(sizeof($images)>1): ?>
                                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li data-target="#carousel-example" data-slide-to="<?php echo e($it); ?>" class="active"></li>
                                                    <?php $it++; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                </ol>
                                <!-- images -->
                                <div class="carousel-inner slideshow ">
                                    <?php if($images!=null): ?>
                                        <?php $it=0; ?>
                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($it==0): ?>
                                                    <div class="item active">
                                                        <div class="overlay"></div>

                                                        <a href="#"><img class="slide_image" src="/uploads/product_images/<?php echo e($image->img_path); ?>" /></a>

                                                    </div>
                                                <?php else: ?>
                                                    <div class="item">
                                                        <a href="#"><img class="slide_image" src="/uploads/product_images/<?php echo e($image->img_path); ?>" /></a>
                                                    </div>
                                                <?php endif; ?>

                                                <?php $it++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>

                                </div>
                            <?php if($images!=null): ?>
                                <?php if(sizeof($images)>1): ?>
                                    <!-- Switch Image buttons -->
                                        <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </section>


                        <br>
                        <div class="row">
                            <!-- Discount -->
                            <div class="col-md-5">
                                <button type="button">555€ - 20% = 400€</button>
                            </div>

                            <!-- Add to cart function -->
                            <div class="col-md-4">
                                <a href="<?php echo e(route('addProductToCart', ['' => $product])); ?>">Add to Cart!</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <br><br><br>
                        <br>
                        <br>
                        <div class="indent-box">
                            <div class="title-descriptor"><b>Developer: </b><?php echo e($product->developer); ?></div><br>
                            <div class="product-desc"><b>Publisher: </b><?php echo e($product->publisher); ?></div><br>
                            <div class="product-desc"><b>Release Date: </b><?php echo e($product->release_date); ?></div><br>

                            <!-- Rating -->
                            <div class="product-desc"><b>Rating:</b>
                                <?php $i=$avg_rating; ?>
                                <?php while($i>0): ?>
                                    <img src="/star_full.png" style="width:20px;" width="1969">
                                    <?php $i--; ?>
                                <?php endwhile; ?>
                            </div><br>

                            <!-- Operating System -->
                            <div class="product-desc">
                                <b>Systems:</b>
                                <?php if((strpos($product->operating_system, 'w') !== false)): ?>
                                    <img src="/os_images/windows_logo.png" style="width:20px;" width="420">
                                <?php endif; ?>
                                <?php if((strpos($product->operating_system, 'm') !== false)): ?>
                                    <img src="/os_images/ios_logo.png" style="width:20px;" width="420">
                                <?php endif; ?>
                                <?php if((strpos($product->operating_system, 'l') !== false)): ?>
                                    <img src="/os_images/linux_logo.png" style="width:20px;" width="420">
                                <?php endif; ?>

                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <br><br><br>

                        <!-- Product tags -->
                        <div class="product-title"><b>TAGS</b></div><br>
                        <?php if(isset($tags)): ?>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tag"><?php echo e($tag->tag_name); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div class="title-descriptor"><b>Description:</b></div><br>
                            <div class="title-descriptor indent-box">
                                <?php echo e($product->description); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- Reviews -->
                    <div class="col-md-4">
                        <?php if(isset($reviews)): ?>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <ul class="nav nav-tabs nav_tabs">
                                    <li class="active"><a href="#" data-toggle="tab">Reviews</a>
                                        <div class="white-box scrollbar-window2">
                                            <br>
                                            <div class="col-md-1">
                                                <img src="/uploads/profile_images/<?php echo e($review->img); ?>" style="width:20px;" width="256">
                                            </div>
                                            <div class="col-md-4"><?php echo e($review->username); ?></div>
                                            <div class="row">
                                                <!-- Rating -->
                                                <div class="product-desc"><b>Rating:</b>
                                                    <?php $i=$review->rating; ?>
                                                    <?php while($i>0): ?>
                                                        <img src="/star_full.png" style="width:10px;" width="1969">
                                                        <?php $i--; ?>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <p>
                                                   <?php echo e($review->comment); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-8">
                        <ul class="nav nav-tabs nav_tabs">
                            <li class="active"><a href="#" data-toggle="tab">Other Products</a>
                            </li>
                        </ul>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                        <div class="col-md-4">
                            <img src="/product.png" class="img-rounded" alt="Cinque Terre" style="width:170px;height: 170px;" width="400" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>