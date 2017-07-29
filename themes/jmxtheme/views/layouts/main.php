<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo str_replace("_", " ", CHtml::encode($this->pageTitle)); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        -->

        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
        <link id="style_color" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/css/themes/grey.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" id="style_color" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" />

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
        <!-- END THEME STYLES --
        <link rel="shortcut icon" href="favicon.ico" />
        -->
        <style>
            .grid-view table.items tr.selected td {
                background: #EEE;
            }
            .container-liquid{
                padding-left:10px;
                padding-right: 10px;
            }
            .pagination .selected a{
                color : #000 !important;
                font-weight: bold;
            }
        </style> 
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
    <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
    <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
    <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
    <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
    <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
    <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
    <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

    <!--<body class="page-header-fixed page-quick-sidebar-over-content page-boxed page-sidebar-closed-hide-logo page-sidebar-fixed page-footer-fixed">-->

    <!--<body class="page-header-fixed page-quick-sidebar-over-content page-boxed page-sidebar-closed-hide-logo">-->

    <body class="page-header-fixed page-quick-sidebar-over-content" >
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top" style="background-color:#ffffff; border-bottom:2px solid #eeeeee">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner" style="background-color:#ffffff">
                    <!-- BEGIN LOGO -->
                    <a href=""><img style="margin-top:12px;" width="200px;" src="<?php echo Yii::app()->baseUrl; ?>/images/logo_jmx.jpg" alt="Logo"></a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <?php include 'tpl_top_menu.php'; ?>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <div class="clearfix">
            </div>
            <!--
            <div class="container">
            -->
                <!-- BEGIN CONTAINER -->
                <div class="page-container">
                    <!-- BEGIN SIDEBAR -->
                    <?php include 'tpl_sidebar_menu.php'; ?>
                    <!-- END SIDEBAR -->
                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <div class="page-content">
                            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                            <?php echo $content; ?>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
                <!--
            </div>
                -->
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                &nbsp;<?php echo date("Y"); ?> &copy; 
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]> -->
        <script>
            var assetsPath = '<?php echo Yii::app()->createUrl("themes/jmxthemes/assets"); ?>/';
        </script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
        <?php
        $this->widget('application.extensions.PNotify.PNotify', array(
            'scriptFileOnly' => true)
        );
        ?>
        <script>
            jQuery(document).ready(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                Demo.init(); // init demo features
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>

    <!-- END BODY -->

</html>