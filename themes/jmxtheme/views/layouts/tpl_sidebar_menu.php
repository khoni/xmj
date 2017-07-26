<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->    
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="title" style="color:#fff;"><?= strtoupper(Yii::app()->user->roles) ?></h3>
            </li>
        </ul>
        <!-- BEGIN SIDEBAR MENU -->
        <?php
			$role=Yii::app()->user->roles;
			if(file_exists(Yii::app()->basePath."/../".Yii::app()->theme->baseUrl."/views/layouts/menu/".$role.".php"))
				include("menu/".$role.".php");
			else
				include("menu/index.php");
			
            $this->widget('zii.widgets.CMenu', array(
                'htmlOptions' => array(
                    'class' => 'page-sidebar-menu'
                ),
                'encodeLabel' => false,
                'submenuHtmlOptions' => array(
                    'class' => 'submenu',
                ),
                'encodeLabel' => false,
                'activeCssClass' => 'active',
                'activateParents' => true,
                'items' => $menu
            ));
        ?>
        <!-- END SIDEBAR MENU -->
    </div>
</div>