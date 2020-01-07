<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
            </div>

            <span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

            <div class="topbar-child2">
                <?php if(Auth::guard('user')->user() != null): ?>
                    <a href="<?php echo e(Route('index.logout.get')); ?>" class="topbar-email">
                        <?php echo e(Auth::guard('user')->user()->name); ?>

                    </a>
                <?php else: ?>
                    <a href="<?php echo e(Route('index.login.get')); ?>" class="topbar-email">
                        Register/Login
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?php echo e(Route('index.home.get')); ?>" class="logo">
                <img src="<?php echo e(asset('index_assets/images/icons/logo.png')); ?>" alt="IMG-LOGO">
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="<?php echo e(Route('index.home.get')); ?>">Home</a>
                        </li>

                        <li>
                            <a href="<?php echo e(Route('index.watches.get')); ?>">Watches</a>
                        </li>

                        <li>
                            <a href="#">Brands</a>
                            <ul class="sub_menu">
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('index.productBrand.get',[$detail->id])); ?>"><?php echo e($detail->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                
                                

                                
                                    
                                
                                
                                    
                                        
                                            
                                        
                                    
                                    
                                    
                                        
                                            
                                        
                                    
                                        
                                
                                
                                    
                                        
                                            
                                                
                                            
                                        
                                        
                                            
                                                
                                            
                                        
                                    
                                
                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo e(route('index.menWatches.get')); ?>">Mens watches</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('index.ladiesWatches.get')); ?>">Ladies watches</a>
                        </li>

                        <li class="sale-noti">
                            <a href="<?php echo e(route('index.sale.get')); ?>">Sale</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('index.contact.get')); ?>">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="<?php echo e(asset('index_assets/images/icons/icon-header-01.png')); ?>" class="header-icon1"
                         alt="ICON">
                </a>

                <span class="linedivide1"></span>
                <?php $count = 0 ?>
                <div class="header-wrapicon2">
                    <img src="<?php echo e(asset('index_assets/images/icons/icon-header-02.png')); ?>"
                         class="header-icon1 js-show-header-dropdown"
                         alt="ICON">


                    <!-- Header cart noti -->
                    <?php $total = 0 ?>
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <?php if(session('cart')): ?>
                                <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $total += $details['price'] * $details['quantity'];$count++; ?>
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="<?php echo e($details['img_link']); ?>" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name">
                                                <?php echo e($details['name']); ?>

                                            </a>

                                            <span class="header-cart-item-info">
											<?php echo e($details['quantity']); ?> x $ <?php echo e($details['price']); ?>

										</span>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </ul>

                        <div class="header-cart-total">
                            $<?php echo e($total); ?>

                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo e(Route('index.cart.get')); ?>"
                                   class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="<?php echo e(route('index.checkout.get')); ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>

                            </div>
                        </div>
                    </div>
                    <span class="header-icons-noti"><?php echo e($count); ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="<?php echo e(Route('index.home.get')); ?>" class="logo-mobile">
            <img src="index_assets/images/icons/logo.png" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <img src="index_assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="index_assets/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown"
                         alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="index_assets/images/item-cart-01.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="images/item-cart-02.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="index_assets/images/item-cart-03.jpg" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
                </li>

                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

                        <div class="topbar-language rs1-select2">
                            <select class="selection-1" name="time">
                                <option>USD</option>
                                <option>EUR</option>
                            </select>
                        </div>
                    </div>
                </li>

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Homepage V1</a></li>
                        <li><a href="home-02.html">Homepage V2</a></li>
                        <li><a href="home-03.html">Homepage V3</a></li>
                    </ul>
                    <i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
                </li>

                <li class="item-menu-mobile">
                    <a href="product.html">Shop</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="product.html">Sale</a>
                </li>

                <li class="item-menu-mobile">
                    <a href="cart.html">Features</a>
                </li>


                <li class="item-menu-mobile">
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>