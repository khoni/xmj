<!DOCTYPE html>
<html lang="en">
    <!-- Head BEGIN -->
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta content="JMX, PT Cipta Niaga Permata, CV Jaya Mandiri" name="description">
        <meta content="JMX, PT Cipta Niaga Permata, CV Jaya Mandiri" name="keywords">

        <meta property="og:site_name" content="JMX Express Xtra Solution">
        <meta property="og:title" content="JMX Ekspedisi">
        <meta property="og:description" content="JMX melayani angkutan darat, laut dan juga melayani angkutan udara ke seluruh Indonesia dan internasional">
        <meta property="og:type" content="website">
        <meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'] ?>/images/logo_jmx.jpg"><!-- link to image for socio -->
        <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'] ?>">

        <link rel="shortcut icon" href="../img/icon.ico">

        <script src="/themes/jmxtheme/assets/global/scripts/sha1.js" type="text/javascript"></script>
        <!-- Fonts END -->

        <!-- Global styles START -->          
        <link href="/themes/jmxtheme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Global styles END --> 

        <!-- Page level plugin styles START -->
        <link href="/themes/jmxtheme/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
        <!-- Page level plugin styles END -->

        <!-- Theme styles START -->
        <link href="/themes/jmxtheme/assets/global/css/components.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
        <link href="/themes/jmxtheme/assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="/themes/jmxtheme/assets/frontend/layout/css/themes/green.css" rel="stylesheet" id="style-color">
        <link href="/themes/jmxtheme/assets/frontend/layout/css/custom.css" rel="stylesheet">
        <!-- Theme styles END -->
    </head>
    <!-- Head END -->

    <!-- Body BEGIN -->
    <body class="corporate">
        <!-- BEGIN HEADER -->
        <div class="header">
            <div class="container">
                <a class="site-logo" href="<?php echo Yii::app()->createUrl(''); ?>">
                    <img src="<?php echo Yii::app()->baseUrl; ?>/images/logo_jmx.jpg" alt="Logo">
                </a>

                <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>


                <!-- BEGIN NAVIGATION -->
                <?php include 'tpl_navigation.php'; ?>
                <!-- END NAVIGATION -->
            </div>
        </div>
        <!-- Header END -->

        <div class="main">
            <div class="container">
                <!-- BEGIN SERVICE BOX -->   
                <?php echo $content; ?>
                <!-- END CLIENTS -->
            </div>
        </div>

        <!-- BEGIN PRE-FOOTER -->
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <!-- BEGIN BOTTOM ABOUT BLOCK -->
                    <div class="col-md-3 col-sm-6 pre-footer-col">
                        <h2>Selamat Datang</h2>
                        <p>
                        	JMX didirikan pada tahun 2004 semula JMX hanya melayani angkutan darat dan laut 
                            dengan beberapa daerah yang di anggap sangat potensial. Sehubungan dengan berkembangnya 
                            arus globalisasi maka JMX melebarkan sayapnya, melayani angkutan udara ke seluruh Indonesia dan internasional. 
                            Kedepan JMX berharap bisa memberi pelayanan yang terbaik kepada konsumen. JMX dengan badan usaha 
                            bertempat di Jakarta PT. Cipta Niaga Permata dan CV Jaya Mandiri dapat memberi pelayanan dan kemudahan kepada konsumen 
                            dengan mengakses www.jmx.co.id 
                         </p>
                    </div>
                    <!-- END BOTTOM ABOUT BLOCK -->

                    <!-- BEGIN BOTTOM CONTACTS -->
                    <div class="col-md-3 col-sm-6 pre-footer-col">
                        <h2>Pelayanan</h2>
                        <address class="margin-bottom-40">
                            Senin - Sabtu, 8 AM - 5 PM<br />
                            Telp. 021-29335560 / 29335561<br>
                            Fax. (021)-5601304<br>
                            email: info@jmx.co.id <br />
                            Website: <a href="http://www.jmx.co.id" target="_blank">http://www.jmx.co.id</a> <br />
                        </address>                    	
                    </div>
                    <!-- END BOTTOM CONTACTS -->

                    <!-- BEGIN BOTTOM HELPDESK-->
                    <div class="col-md-3 col-sm-6 pre-footer-col">
                        <h2>HELP DESK SUPPORT</h2>
                        <address class="margin-bottom-40">
                            Helpdesk I : 021-29335560<br />
                        </address>
                    </div>
                    <!-- END BOTTOM HELPDESK -->

                    <!-- BEGIN BOTTOM HELPDESK background-->
                    <div class="col-md-3 col-sm-6 pre-footer-col">
                        <h2>Kantor Pusat</h2>
                        <address class="margin-bottom-40">
                            Komplek Ruko Daan Mogot no. 33 G <br />
                            Tanjung Duren - Jakarta Barat. <br /><br>
                        </address>
                    </div>
                    <!-- END BOTTOM HELPDESK -->
                </div>
                <!-- END TWITTER BLOCK -->
            </div>
        </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- BEGIN COPYRIGHT -->
                <div class="col-md-6 col-sm-6 padding-top-10">
                    <?php echo date("Y"); ?> &copy; JMX Express Xtra Solution. ALL Rights Reserved. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                </div>
                <!-- END COPYRIGHT -->
                <!-- BEGIN PAYMENTS -->
                <div class="col-md-6 col-sm-6">
                    <ul class="social-footer list-unstyled list-inline pull-right">
                        <li><a href="https://www.facebook.com/www.jmx.co.id/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>  
                </div>
                <!-- END PAYMENTS -->
            </div>
        </div>
    </div>
    <!-- END FOOTER -->
    <script src="/themes/jmxtheme/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/themes/jmxtheme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- -->
    <script src="/themes/jmxtheme/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            Layout.init();
        });
    </script>
    <noscript>
    <div class="noscriptmsg">
        You don't have javascript enabled.  Good luck with that.
    </div>
    </noscript>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    <!--Start of Tawk.to Script-->
    <!--
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/55df585fa499b32d0ddae726/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    -->
    <!--End of Tawk.to Script-->
</body>

<!-- END BODY -->
</html>