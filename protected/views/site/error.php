<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="row margin-bottom-40">
    <!-- BEGIN CONTENT -->
    <div class="col-md-12 col-sm-12">
        <div class="content-page page-404">
            <div class="number">
                <!-- error code -->
            </div>
            <div class="details">
                <div class="alert alert-warning">
                    <strong>Warning ! <?php //echo $code; ?></strong> <hr />
                    <h4><?php echo CHtml::encode($message); ?></h4>
                    <br />
					<small><a class='btn btn-xs blue' onclick="history.back();"> << Kembali</a></small>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
</div>