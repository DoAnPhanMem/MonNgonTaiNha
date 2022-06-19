<!doctype html>
<html class="no-js" lang="vi-vn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Món Ngon Tại Nhà</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="public/img/icon.png">

    <link rel="apple-touch-icon" href="public/apple-touch-icon.png">
    <link rel="stylesheet" href="public/fonts/fontawesome-free-6.1.1-web/css/all.css">
    <!-- Place icon.png in the root directory -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <!-- all css here -->
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <!-- Root CSS -->
    <link rel="stylesheet" href="public/css/roots/grid.css">
    <link rel="stylesheet" href="public/css/roots/reset.css">
    <link rel="stylesheet" href="public/css/roots/rule.css">
    <link rel="stylesheet" href="public/css/roots/common.css">
    <!-- owl.carousel css -->
    <!-- <link rel="stylesheet" href="public/css/owl.carousel.css"> -->
 
    <!-- style css -->
    <link rel="stylesheet" href="public/css/styles/footer.css">
    <link rel="stylesheet" href="public/css/styles/header.css">
    <link rel="stylesheet" href="public/css/styles/home.css">
    <link rel="stylesheet" href="public/css/styles/personal.css">
    <link rel="stylesheet" href="public/css/styles/myrecipe.css">
    <link rel="stylesheet" href="public/css/styles/login.css">
    <link rel="stylesheet" href="public/css/styles/register.css">
    <link rel="stylesheet" href="public/css/styles/list-product.css">
    <script src="public/library/Toast-Messages/messages.js"></script>
    <link rel="stylesheet" href="public/library/Toast-Messages/messages.css">
  

    <!-- responsive css -->
    <!-- <link rel="stylesheet" href="public/css/responsive.css"> -->
    
</head>

<body>
    <div class="toast-group">
    </div>
    <!-- header section start -->
    <!-- <div class="wrapper grid wide"> -->
        <?php
        if ((isset($_GET['act']) && $_GET['act'] == 'personal')) {
        } else {
            require_once("header_footer/header.php");
        }

        ?>
        <!-- header section end -->

        <!-- slider-section-start -->
        <?php
        require_once("navigation.php")
        ?>
        <!-- slider section end -->

        
    <!-- </div> -->
   <!-- footer section start -->
   <?php
        require_once("header_footer/footer.php")
        ?>

        <!-- footer section end -->
     </div> 

    <!-- all js here -->


    <!-- main js -->
    <script src="public/js/main.js"></script>
    
</body>

</html>