<ul class="nav navbar-nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->    
    <!-- END NOTIFICATION DROPDOWN -->
    <!-- BEGIN INBOX DROPDOWN --
    <!-- END INBOX DROPDOWN -->
    <!-- BEGIN TODO DROPDOWN --
    <!-- END TODO DROPDOWN -->
    <!-- BEGIN USER LOGIN DROPDOWN -->
    <li class="dropdown dropdown-user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <img alt="" class="img-circle hide1" src=""/>
            <span class="username username-hide-on-mobile" style="color:#999999">
                <i class="glyphicon glyphicon-user"></i> <?php echo Yii::app()->user->id; ?> 
            </span>
            <i class="fa fa-angle-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="">
                    <i class="icon-user"></i> My Profile </a>
            </li>
            <li class="divider">
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('site/logout'); ?>">
                    <i class="icon-logout"></i> Log Out </a>
            </li>
        </ul>
    </li>
    <!-- END USER LOGIN DROPDOWN -->
</ul>