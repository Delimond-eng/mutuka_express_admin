<!DOCTYPE html>
<html lang="fr">

<head>
    <title>MUTUKA Express</title>
    <link rel="icon" href="assets2/imagesicon.png" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Rentaly - Multipurpose Vehicle Car Rental Website Template" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- CSS Files
    ================================================== -->
    <link href="assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="assets2/css/mdb.min.css" rel="stylesheet" type="text/css" id="mdb">
    <link href="assets2/css/plugins.css" rel="stylesheet" type="text/css">
    <link href="assets2/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets2/css/coloring.css" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="assets2/css/colors/scheme-01.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrapper">
        
        <!-- page preloader begin -->
        <div id="de-preloader"></div>
        <!-- page preloader close -->

        <!-- page content -->
       @yield("content")
        <!-- end Page content -->

        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        @include("components.public.footer")
        <!-- footer close -->
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="assets2/js/plugins.js"></script>
    <script src="assets2/js/designesia.js"></script>

</body>

</html>