<?php $__env->startSection('styles'); ?>
    <!-- DataTables -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <title>Home</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!-- Slide1 -->
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item-slick1 item1-slick1" style="background-image: url('<?php echo e($detail->img); ?>');">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 l-text1 t-center animated visible-false m-b-37 " data-appear="fadeInDown">
							<?php echo e($detail->name); ?>

						</span>

                        <h2 class="caption2-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInUp">
                            <?php echo e($detail->des); ?>

                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="<?php echo e(route('index.watches.get')); ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class=" banner-image img-thumbnail "  src="images/men_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="<?php echo e(route('index.menWatches.get')); ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Men's watches
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail " src="images/back_in_stock_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Back in stock
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="images/ladies_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="<?php echo e(route('index.ladiesWatches.get')); ?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Ladies watches
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail " src="images/on_sale_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                On sale
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="images/couple_watches_background.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Couple watches
                            </a>
                        </div>
                    </div>

                    <!-- block2 -->
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img class="banner-image img-thumbnail" src="index_assets/images/icons/bg-01.jpg" alt="IMG">

                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                Sign up & get 20% off
                            </h4>

                            <p class="t-center w-size4">
                                Be the frist to know about the latest watch news and get exclu-sive offers
                            </p>

                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="<?php echo e(route('index.login.get')); ?>" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Featured Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">

                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <?php if($detail->discount > 0): ?>
                                <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelsale ">
                                    <?php else: ?>
                                        <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                            <?php endif; ?>
                                <img class="responsive-image img-thumbnail "  src="<?php echo e($detail->img_link); ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <button data-for="<?php echo e($detail->id); ?>" class="btn-addcart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="<?php echo e(route('index.productDetail.get',[$detail->id])); ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo e($detail->name); ?>

                                </a>

                                <?php if($detail->discount > 0): ?>
                                    <span class="block2-oldprice m-text7 p-r-5">
										$<?php echo e($detail->price); ?>

									    </span>

                                    <span class="block2-newprice m-text8 p-r-5">
										$<?php echo e($detail->price * (1-$detail->discount)); ?>

									    </span>
                                <?php else: ?>
                                    <span class="block2-price m-text6 p-r-5">
										$<?php echo e($detail->price); ?>

									    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								
                            
                        
                    

                    
                        
                        
                            
                                

                                
                                    
                                        
                                        
                                    

                                    
                                        
                                        
                                            
                                        
                                    
                                
                            

                            
                                
                                    
                                

                                
									
								

                                
									
								
                            
                        
                    
                </div>
            </div>

        </div>
    </section>

    <!-- Blog -->
    
        
            
                
                    
                
            

            
                
                    
                    
                        
                            
                        

                        
                            
                                
                                    
                                
                            

                            
                            

                            
                                
                            
                        
                    
                

                
                    
                    
                        
                            
                        

                        
                            
                                
                                    
                                
                            

                            
                            

                            
                                
                            
                        
                    
                

                
                    
                    
                        
                            
                        

                        
                            
                                
                                    
                                
                            

                            
                            

                            
                                
                            
                        
                    
                
            
        
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("index.layout.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>