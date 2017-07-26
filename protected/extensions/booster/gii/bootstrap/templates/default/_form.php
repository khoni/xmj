<?php echo "<?php \$form=\$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'" . $this->class2id($this->modelClass) . "-form',
        'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>\n"; ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php echo "<?php //echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php
foreach ($this->tableSchema->columns as $column) {
	if ($column->autoIncrement) {
		continue;
	}
	?>
	<?php echo "<?php echo " . $this->generateActiveGroup($this->modelClass, $column) . "; ?>\n"; ?>

<?php
}
?>
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	<?php echo "<?php \$this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>\$model->isNewRecord ? 'Simpan' : 'Perbarui',
	  )); ?>\n"; 
    echo " &nbsp; <?php echo CHtml::link('Batal',array('index'),array('class'=>'btn btn-default')); ?>";
	?>
    </div>
</div>

<?php echo "<?php \$this->endWidget(); ?>\n"; ?>
