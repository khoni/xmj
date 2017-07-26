<!-- BEGIN PORTLET-->
<div class="portlet paddingless">
    <div class="portlet-title line">
        <div class="caption">
            <i class="fa fa-user"></i> My Profile<br /><br />
        </div>
        <div class="tools">
            <a href="" class="collapse">
            </a>
            <a href="" class="reload">
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <!--BEGIN TABS-->
        <div class="tabbable tabbable-custom">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab_1_1" data-toggle="tab">
                        Biodata </a>
                </li>
                <li>
                    <a href="#tab_1_2" data-toggle="tab">
                        Change Password </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_1_1">
					<div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible="0">
                    	<div class="row">
                        	<div class="col-md-6">
                            	<br />
	                            <?php $this->renderPartial('_biodata',array('model'=>$model)); ?>
                            </div>
                        	<div class="col-md-6">
                            	<?php $this->renderPartial('_changeRole',array('model'=>$changeRole)); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_1_2">
                    <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                        <!-- bagin change password -->
                            <?php $this->renderPartial('_changePwd', array('model'=>$changePwd)); ?>
                        <!-- end change password -->
                    </div>
                </div>
                <!--
                <div class="tab-pane" id="tab_1_3">
                    <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">
                        <?php //$this->renderPartial('_changeRole',array('model'=>$changeRole)); ?>
                    </div>
                </div>
                -->
            </div>
        </div>
        <!--END TABS-->
    </div>
</div>
<!-- END PORTLET-->