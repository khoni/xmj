<?php $this->beginContent('//layouts/main'); ?>    
<div class="main">
    <div class="container">
        <!--
      <ul class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Pages</a></li>
          <li class="active">Login</li>
      </ul>
        -->
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR --
            <div class="sidebar col-md-3 col-sm-3">
              
              <ul class="list-group margin-bottom-25 sidebar-menu">
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Login</a></li>
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Reset Password</a></li>
                <!--<li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Address book</a></li>
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Wish list</a></li>
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Returns</a></li>
                <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Newsletter</a></li>
              </ul>
              
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>Reset Password</h1>
                <div class="content-form-page">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <?php echo $content; ?>
                        </div>

                        <div class="col-md-5 col-sm-5 pull-right">
                            <div class="form-info">
                                <h2>PENGUMUMAN</h2>
                                <strong><u>Kalender Hari Ini</u></strong>
                                <p></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>
<?php $this->endContent(); ?>

