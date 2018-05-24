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
                        <div class="row">
                            <!-- Product Gallery -->
                            <div class="col-md-3">
                                <img src="/dropbox2.png" style="width:70px;height: 70px;" class="img-rounded" alt="Cinque Terre" width="294" height="172">
                            </div>
                            <div class="col-md-3">
                                <img src="/dropbox3.png" style="width:70px;height: 70px;" class="img-rounded" alt="Cinque Terre" width="960" height="691">
                            </div>
                            <div class="col-md-3">
                                <img src="/dropbox4.png" class="img-rounded" alt="Cinque Terre" width="70" height="70">
                            </div>
                        </div>
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
                            <div class="title-descriptor"><b>Developer:</b><?php echo e($product->developer); ?></div><br>
                            <div class="product-desc"><b>Publisher:</b><?php echo e($product->publisher); ?></div><br>
                            <div class="product-desc"><b>Release Date:</b><?php echo e($product->release_date); ?></div><br>

                            <!-- Rating -->
                            <div class="product-desc"><b>Rating:</b>
                                <img src="/star_full.png" style="width:20px;" width="1969">
                                <img src="/star_full.png" style="width:20px;" width="1969">
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
                        <ul class="nav nav-tabs nav_tabs">
                            <li class="active"><a href="#" data-toggle="tab">Reviews</a>
                                <br>
                                <div class="col-md-1">
                                    <img src="/uploads/profile_images/default.png" style="width:20px;" width="256">
                                </div>
                                <div class="col-md-4">Janedoe</div>
                                <div class="col-md-4">
                                    <img src="/star_full.png" style="width:10px;" width="1969">
                                    <img src="/star_full.png" style="width:10px;" width="1969">
                                    <img src="/star_full.png" style="width:10px;" width="1969">
                                </div>
                            </li>
                        </ul>
                        <div class="row">
                            <br>
                            <div class="col-md-12"><p>
                                    Vry good<br>
                                    The product, I mean. Issa good product. <br>
                                    Recommend it vry much to frens and family.<br>

                                    Kthnx
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
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