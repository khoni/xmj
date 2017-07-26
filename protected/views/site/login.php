<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'login-form',
    'errorMessageCssClass' => 'alert alert-error',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal'
    )
        ));
?>
<div class="form-group">
    <label for="username" class="col-lg-5 control-label">Username <span class="require">*</span></label>
    <div class="col-lg-5">
        <input type="text" class="form-control" id="username" name="LoginForm[username]" autofocus>
        <?php echo $form->error($model, 'username'); ?>
    </div>
</div>

<div class="form-group">
    <label for="password" class="col-lg-5 control-label">Password <span class="require">*</span></label>
    <div class="col-lg-5">
        <input type="password" class="form-control" id="password" name="LoginForm[password]" autocomplete="off">
        <input type="hidden" class="form-control" id="secure">
        <?php echo $form->error($model, 'password'); ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-md-offset-5 padding-left-0 padding-top-20">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'ajaxSubmit',
            'htmlOptions' => array(
                'class' => 'btn btn-primary'
            ),
            'label' => 'Login',
            'ajaxOptions' => array(
                'data' => 'js:{"ajax":"true", "LoginForm[username]":$("#username").val(), "LoginForm[password]":$("#password").val(), "YII_CSRF_TOKEN":$("input[name=YII_CSRF_TOKEN]").val()}',
                'success' => 'function(data){
					//alert(data);
					if (data == "Role Salah")
					{
						alert("Setting Role Salah");
					}
					else if (data == "mahasiswa nonaktif")
					{
						alert("Akun Anda dinonaktifkan, silakan menghubungi BAAK.");
					}
					else if (data == "User Tidak Aktif")
					{
						alert("Akun Anda dinonaktifkan.");
					}
					else
					{
						var obj = $.parseJSON(data);
						//alert(obj.page);
						if(obj.page!="login"){
							window.location = ""+obj.page;
						}else{
							alert("Username / password salah");
						}
					}
                }'
            ),
        ));
        ?>
		<input type="button" name="ok" value="Reset Password" class="btn btn-primary btn btn-default" onclick="location.href='<?php echo Yii::app()->createUrl('site/resetpass'); ?>';">
    </div>
</div>

<div class="modal fade in" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
<script>
    $(document).ready(function () {
        
        $('#password').attr('autocomplete', 'off');
        //$('.modal').modal('show');
        //$('#myModal').modal('show');
    });
</script>