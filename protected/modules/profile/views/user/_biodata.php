<?php if (Yii::app()->user->hasFlash('success')) { ?>
	<div class="alert alert-success" role="alert">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>
<?php } else if (Yii::app()->user->hasFlash('error')) { ?>
	<div class="alert alert-danger" role="alert">
		<?php echo Yii::app()->user->getFlash('error'); ?>
	</div>
<?php }; ?>
<?php
	$form = $this->beginWidget(
		'CActiveForm',
		array(
			'id' => 'login-form',
			'action' => Yii::app()->createUrl('/mahasiswa/profile'),
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
<table border="0" cellpadding="5" cellspacing="0" class="detail-view table table-striped table-bordered">
<tbody>
<tr class="even">
	<th>Username</th>
	<td>
		<?php echo $model['username']; ?>
	</td>
</tr>
<tr class="even">
	<th>HP</th>
	<td>
		<input type="text" class="form-control" name="nohp" value="<?php echo $model['hp']; ?>">
	</td>
</tr>
<tr class="even">
	<td>&nbsp;</td>
	<td>
		<input type="submit" name="ok" value="Simpan" class="btn btn-primary btn btn-default">
	</td>
</tr>
</tbody>
</table>
<?php $this->endWidget(); ?>
