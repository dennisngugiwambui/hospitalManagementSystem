<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Denno Hospital </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    

	<!-- CSS here -->
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/owl.carousel.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/slicknav.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/gijgo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/animated-headline.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/magnific-popup.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/fontawesome-all.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/themify-icons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/slick.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/nice-select.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('homepages/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo e(asset('homepages/assets/img/logo/loder.png')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<?php echo $__env->make('homepages.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<main>
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo Toastr::message(); ?>

</main>
    <?php echo $__env->make('homepages.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->



    <script src="<?php echo e(asset('./homepages/assets/js/vendor/modernizr-3.5.0.min.js')); ?>"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./homepages/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./homepages/assets/js/popper.min.js"></script>
    <script src="./homepages/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./homepages/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./homepages/assets/js/owl.carousel.min.js"></script>
    <script src="./homepages/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./homepages/assets/js/wow.min.js"></script>
    <script src="./homepages/assets/js/animated.headline.js"></script>
    <script src="./homepages/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./homepages/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./homepages/assets/js/jquery.nice-select.min.js"></script>
    <script src="./homepages/assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="./homepages/assets/js/jquery.counterup.min.js"></script>
    <script src="./homepages/assets/js/waypoints.min.js"></script>
    <script src="./homepages/assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./homepages/assets/js/contact.js"></script>
    <script src="./homepages/assets/js/jquery.form.js"></script>
    <script src="./homepages/assets/js/jquery.validate.min.js"></script>
    <script src="./homepages/assets/js/mail-script.js"></script>
    <script src="./homepages/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./homepages/assets/js/plugins.js"></script>
    <script src="./homepages/assets/js/main.js"></script>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel1\HospitalManagementSystem\resources\views/homepages/app.blade.php ENDPATH**/ ?>