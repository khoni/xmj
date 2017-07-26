<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'biaya-pusat-form',
        'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'biaya_pusatID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'rp_perawatan_sistem',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return event.charCode <= 57')))); ?>

	<?php echo $form->textFieldGroup($model,'persen_ppn',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return event.charCode <= 57')))); ?>

	<?php echo $form->textFieldGroup($model,'persen_royalti',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return event.charCode <= 57')))); ?>

	<?php echo $form->textFieldGroup($model,'persen_standart_diskon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return event.charCode <= 57')))); ?>

	<?php echo $form->textFieldGroup($model,'rp_standart_delivery',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return event.charCode <= 57')))); ?>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Perbarui',
	  )); ?>
</div>

<?php $this->endWidget(); ?>
