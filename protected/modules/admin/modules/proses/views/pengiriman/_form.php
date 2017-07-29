<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pengiriman-form',
        'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php echo (empty($model->errors)?'' : '<div class="alert alert-danger"><strong>Warning ! </strong> Ada inputan yang belum terisi, cek kembali.</div>'); //echo $form->errorSummary($model); ?>	

	<?php $this->renderPartial('_pop_up_browse_kantor'); ?>
    <?php $this->renderPartial('_pop_up_browse_connote'); ?>
    
	<?php echo $this->renderPartial('_form_pelanggan', array('model'=>$model,'form'=>$form)); ?>
	<?php echo $this->renderPartial('_form_resi', array('model'=>$model,'form'=>$form)); ?>
    
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Perbarui',
	  )); ?>
 &nbsp; <?php echo CHtml::link('Batal',array('index'),array('class'=>'btn btn-default')); ?>    </div>
</div>

<?php $this->endWidget(); ?>
