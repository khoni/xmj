<?php $this->beginContent('//layouts/main'); ?> 
<!-- BEGIN STYLE CUSTOMIZER -->
<!-- END STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
    <?php
    if (isset($this->breadcrumbs)) {
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'tagName' => 'ul', // container tag
            'links' => $this->breadcrumbs,
            'separator' => '&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;',
            'htmlOptions' => array(
                'class' => 'page-breadcrumb'
            ),
            'homeLink' => '<li> <i class="fa fa-home"></i> <a href="">Home</a></li>',
        ));
    }
    ?>
</div>
<!-- END PAGE HEADER-->

<!-- BEGIN PAGE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <?php echo $content; ?>
    </div>
    <div>
        &nbsp;
    </div>
</div>
<!-- END PAGE CONTENT -->
<?php $this->endContent(); ?>