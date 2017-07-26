<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kelurahan-form',
        'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

	<?php
    echo $form->dropDownListGroup(
        $model,
        'negaraID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(Negara::model()->findAll(), 'negaraID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih Negara',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadpropinsi'),
                        'update'=>'#Kelurahan_propinsiID',
                        'data'=>array('neg_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php
    echo $form->dropDownListGroup(
        $model,
        'propinsiID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                //'data' => CHtml::listData(Propinsi::model()->findAll(), 'negaraID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih negara terlebih dahulu...',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkabupaten'),
                        'update'=>'#Kelurahan_kabupatenID',
                        'data'=>array('prop_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php
    echo $form->dropDownListGroup(
        $model,
        'kabupatenID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                //'data' => CHtml::listData(Kecamatan::model()->findAll(), 'kecamatanID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih propinsi terlebih dahulu...',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkecamatan'),
                        'update'=>'#Kelurahan_kecamatanID',
                        'data'=>array('kab_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php
    echo $form->dropDownListGroup(
        $model,
        'kecamatanID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                //'data' => CHtml::listData(Kabupaten::model()->findAll(), 'negaraID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih kabupaten terlebih dahulu...',
					/*
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkecamatan'),
                        'update'=>'#Kelurahan_kecamatanID',
                        'data'=>array('kec_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),
					*/					
                ),						
            )
        )
    );
    ?>

	<?php echo $form->textFieldGroup($model,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'kodepos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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
