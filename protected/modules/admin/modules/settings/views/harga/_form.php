<?php $this->renderPartial('_pop_up_browse_cab'); ?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'harga-form',
        'type' => 'vertical',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>
<div class="row">
	<div class="col-md-4">
        <div class="note note-success">
            Lokasi Pengiriman
        </div>

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
                            'update'=>'#Harga_propinsiID',
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
                    'data' => CHtml::listData(Propinsi::model()->findAll("negaraID='".$model->negaraID."'"), 'propinsiID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih negara terlebih dahulu...',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkabupaten'),
                            'update'=>'#Harga_kabupatenID',
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
                    'data' => CHtml::listData(Kabupaten::model()->findAll("propinsiID='".$model->propinsiID."'"), 'kabupatenID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih propinsi terlebih dahulu...',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadWilayah_kantor'),
                            'update'=>'#div_kantor',
                            'data'=>array('kab_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),					
                    ),						
                )
            )
        );
        ?>
        <div id="div_kantor"><hr /></div>

        <?php
		/*
        echo $form->dropDownListGroup(
            $model,
            'kecamatanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Kecamatan::model()->findAll("kabupatenID='".$model->kabupatenID."'"), 'kecamatanID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih kabupaten terlebih dahulu...',
                        
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkelurahan'),
                            'update'=>'#Harga_kelurahanID',
                            'data'=>array('kec_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),
                                            
                    ),						
                )
            )
        );
        ?>
    
        <?php
        echo $form->dropDownListGroup(
            $model,
            'kelurahanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(Kelurahan::model()->findAll("kecamatanID='".$model->kecamatanID."'"), 'kelurahanID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Kecamatan terlebih dahulu...',
                    ),						
                )
            )
        );
        */
		?>

	</div>

	<div class="col-md-4">
        <div class="note note-success">
            Origin
        </div>

		<div class="row">
            <div class="col-md-8">
				<?php echo $form->textFieldGroup($model,'origin_kantorID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?> 
                <div style="clear:both; margin-top:-8px;" id="div_origin"><?= empty($model->originKantor->fullnama) ? '-' : $model->originKantor->fullnama ?></div>
            </div>
            <div class="col-md-4">
				<div class="form-group">
                	<label class="control-label" >&nbsp;</label>
	                <button class="btn btn-xs btn-info span5 form-control" href="#pop_up_browse_cab" data-toggle="modal" onclick='return false;'>Browse</button>
    			</div>
            </div>
        </div>
		<br />    
        
		<?php //echo $form->textFieldGroup($model,'jenis_serviceID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
		<?php
        echo $form->dropDownListGroup(
            $model,
            'jenis_serviceID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    'data' => CHtml::listData(JenisService::model()->findAll(), 'jenis_serviceID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Negara',
                    ),						
                )
            )
        );
        ?>
    

        <?php echo $form->textFieldGroup($model,'hari_estimasi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	</div>

    <div class="col-md-4">
        <div class="note note-success">
            Harga dasar kantor Cabang
        </div>
        
        <?php echo $form->textFieldGroup($model,'rp_transit_kgp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    
        <?php echo $form->textFieldGroup($model,'rp_transit_kgs',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    
        <?php echo $form->textFieldGroup($model,'rp_transit_lainnya',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    
        <?php echo $form->textFieldGroup($model,'rp_bp_kgp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    
        <?php echo $form->textFieldGroup($model,'rp_bp_kgs',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
            
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <?php $this->widget('booster.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'context'=>'primary',
                    'label'=>$model->isNewRecord ? 'Simpan' : 'Perbarui',
              )); ?>
         &nbsp; <?php echo CHtml::link('Batal',array('index'),array('class'=>'btn btn-default')); ?>    </div>
        </div>
	
    </div>
    
</div>

<?php $this->endWidget(); ?>
