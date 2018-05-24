<?php $__env->startSection('content'); ?>
    <div id="myDIV" class="container">
        <div class="wrapper">
            <?php echo $__env->make('layouts.tag_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-10">
                <div class="content">
                    <div class="row" style="margin-top: 10px">
                        <div class="col-xs-12">
                            <div class="panel-heading">
                                <h3 class="panel-title">Products Lists</h3>
                            </div>
                            <ul class="list-group">


                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item">
                                        <div class="row toggle horizontal-scrollbar-window" id="dropdown-detail-1" data-toggle="detail-1">

                                            <div class="col-sm-4 col-md-2 col-lg-2 col-lg-offset-1">
                                                <?php echo e($product->name); ?>

                                                <br>
                                                <a href="<?php echo e(route('product', ['product_id' => $product->product_id])); ?>">
                                                    <img alt="<?php echo e($product->name); ?>" src="/uploads/product_images/<?php echo e($product->logo_path); ?>"
                                                         width="100" class="product_logo">
                                                </a>
                                            </div>
                                            <div class="col-sm-8 col-md-8 col-lg-6">
                                                <table class="white-box table table-user-information">
                                                    <tbody>
                                                    <tr>
                                                        <td>Product Name:</td>
                                                        <td><?php echo e($product->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Release Date:</td>
                                                        <td><?php echo e($product->release_date); ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>O.S.</td>
                                                        <td><?php echo e($product->operating_system); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Price
                                                        <!-- if discount, change this parameter -->
                                                        </td>
                                                        <td><?php echo e($product->price); ?><br></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>