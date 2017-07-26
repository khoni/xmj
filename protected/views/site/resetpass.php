<?php
	$form = $this->beginWidget(
		'CActiveForm',
		array(
			'id' => 'login-form',
			'action' => Yii::app()->createUrl('/site/resetpass	'),
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
			'htmlOptions' => array(
				'class' => 'form-horizontal',
				'role' => 'form'
			)
		)
	);
?>

<?php if (Yii::app()->user->hasFlash('success')) { ?>

    <div class="alert alert-success" role="alert">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php } else if (Yii::app()->user->hasFlash('error')) { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php }; ?>

<table border="0" cellpadding="5" cellspacing="0">
<tr>
	<td>Username</td>
	<td>:</td>
	<td>
		<input type="text" class="form-control" name="uname">
	</td>
</tr>
<tr>
	<td>Kode Reset Password</td>
	<td>:</td>
	<td>
		<input type="text" class="form-control" name="kode_reset">
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>
		<input type="submit" name="ok" value="Reset" class="btn btn-primary btn btn-default">
		<input type="submit" name="ok_kode" value="Validasi Kode" class="btn btn-primary btn btn-default">
		<input type="button" name="ok2" value="Kembali" class="btn btn-primary btn btn-default" onclick="location.href='<?php echo Yii::app()->createUrl('site/login'); ?>';">
	</td>
</tr>
</table>
<?php $this->endWidget(); ?>

<div class="modal fade in" id="myModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <strong>PENGUMUMAN</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
        $('#password').attr('autocomplete', 'off');
        //$('.modal').modal('show');
        //$('#myModal').modal('show');
    });
</script>