<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pre-alert-form',
        'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'pre_alertID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'manifestID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'no_resi_moda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'no_angkutan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'moda_angkutanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'nama_angkutan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'jenis_angkutanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'to_kantorID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'berat_pre_alert_kg',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'updated_at',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'updated_by',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

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
