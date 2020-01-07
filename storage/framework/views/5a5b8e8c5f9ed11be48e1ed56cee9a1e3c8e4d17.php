<!DOCTYPE html>
<html lang="en">
<head>

    <?php echo $__env->yieldContent('title'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('index_assets/images/icons/favicon.png')); ?>"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/fonts/themify/themify-icons.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/fonts/elegant-font/html-css/style.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/animate/animate.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/css-hamburgers/hamburgers.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/animsition/css/animsition.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/select2/select2.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/daterangepicker/daterangepicker.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/slick/slick.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/noui/nouislider.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/vendor/lightbox2/css/lightbox.min.css')); ?>">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/css/util.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('index_assets/css/main.css')); ?>">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>
    <!--===============================================================================================-->
</head>
<body class="animsition">

<!-- Header -->
<?php echo $__env->make('index.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent("content"); ?>
<!-- Instagram -->
<section class="instagram p-t-20">
    
        
            
        
    

    
        
        
            

            
					
						
						
					

                
                    
                        
                    

                    
							
						
                
            
        

        
        
            

            
					
						
						
					

                
                    
                        
                    

                    
							
						
                
            
        

        
        
            

            
					
						
						
					

                
                    
                        
                    

                    
							
						
                
            
        

        
        
            

            
					
						
						
					

                
                    
                        
                    

                    
							
						
                
            
        

        
        
            

            
					
						
						
					

                
                    
                        
                    

                    
							
						
                
            
        
    
</section>

<!-- Shipping -->
<section class="shipping bgwhite p-t-62 p-b-46">
    <div class="flex-w p-l-15 p-r-15">
        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Free Delivery Worldwide
            </h4>

            <a href="#" class="s-text11 t-center">
                Click here for more info
            </a>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
            <h4 class="m-text12 t-center">
                30 Days Return
            </h4>

            <span class="s-text11 t-center">
					Simply return it within 30 days for an exchange.
				</span>
        </div>

        <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
            <h4 class="m-text12 t-center">
                Store Opening
            </h4>

            <span class="s-text11 t-center">
					Shop open from Monday to Sunday
				</span>
        </div>
    </div>
</section>


<!-- Footer -->
<?php echo $__env->make('index.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/animsition/js/animsition.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/bootstrap/js/popper.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/select2/select2.min.js')); ?>"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/slick/slick.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('index_assets/js/slick-custom.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/countdowntime/countdowntime.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/lightbox2/js/lightbox.min.js')); ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/sweetalert/sweetalert.min.js')); ?>"></script>
<script type="text/javascript">
    // $('.block2-btn-addcart').each(function(){
    //     var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
    //     $(this).on('click', function(){
    //         swal(nameProduct, "is added to cart !", "success");
    //     });
    // });

    $('.block2-btn-addwishlist').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>
<script type="text/javascript">
    // $(document).on('click','.as',function (e) {
    //     alert("dd");
    // });
    $(document).on('click','.btn-addcart, .btn-addcart2 ',function (event){
        event.preventDefault();
        var nameProduct = $(this).parent().parent().parent().parent().find('.block2-name').html();
        if(nameProduct == null){
            nameProduct = $(this).parent().parent().parent().parent().find('.product-detail-name').html();
        }
        var qty = 1;
        if ($(this).hasClass('btn-addcart2')) {
            qty = Number($('.num-product').val());
        }
        $.ajax({
            url: '<?php echo e(route("index.addToCart.get",[''])); ?>'+"/"+$(this).attr('data-for'),
            dataType: "json",
            type: "GET",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),id: $(this).attr('data-for'), qty: qty}
            ,success: function(response) {
                swal(nameProduct, "is added to cart !", "success");
                $(".header-cart-wrapitem").html(response[0]);
                $(".header-cart-total").text("$"+response[1]);
                $(".header-icons-noti").text(response[2]);


                //alert(response);
            },
            error: function(xhr, textStatus, error){

                alert(error + "\r\n" + xhr.responseText);
            },
        });
        return false; //for good measure
    });
</script>
<script type="text/javascript" src="<?php echo e(asset('index_assets/vendor/noui/nouislider.min.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('index_assets/js/main.js')); ?>"></script>
<!--===============================================================================================-->
<script src="<?php echo e(asset('js/pagination.js')); ?>"></script>

<script>
    $(document).ready(function () {
        $('#price-sort').on('change', function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var value = parseInt(this.value);
            $.ajax({
                url: "<?php echo e(route('index.sort')); ?>",
                type: "post",
                data: {
                    _token: CSRF_TOKEN, value: value},
                success: function (response) {
                    //alert(response[0]);
                    $('.filter-result').html(response);

                },
                error: function(xhr, textStatus, error){
                    alert(error + "\r\n" + xhr.responseText);
                },
            });
        });
    })

</script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
