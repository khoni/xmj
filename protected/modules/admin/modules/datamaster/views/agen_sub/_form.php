<?php $this->renderPartial('_pop_up_browse_cab'); ?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'agen-sub-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

<b><?php echo empty($user->errors) ? '' : '<div class="alert alert-danger"><strong>Warning ! </strong> Data form isian kurang lengkap</div>' ?></b>

<p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($user); ?>

	<div class="note note-success">
    	Data Pengguna / Pemilik Usaha
    </div>
	<?php //echo $form->textFieldGroup($user,'userID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php //echo $form->textFieldGroup($user,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php //echo $form->textFieldGroup($user,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($user,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($user,'nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($user,'hp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php echo $form->textFieldGroup($user,'telepon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php echo $form->textFieldGroup($user,'fax',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php echo $form->textFieldGroup($user,'npwp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php echo $form->textFieldGroup($user,'ktp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    

    <div class="note note-success">
        Data Kantor Cabang (Induk)
    </div>
    <div class="col-sm-8">
        <?php echo $form->textFieldGroup($user,'cabangID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?> 
    </div>
    <div class="col-sm-4">
        <label class="col-sm-3" >&nbsp;</label>
        <a class="btn btn-info" href="#pop_up_browse_cab" data-toggle="modal" onclick='return false;'>Browse</a>
    </div>
    <div align="center" id="div_kantor" style="clear:both"></div>

	<div class="note note-success">
    	Lokasi Kantor Sub Agen
    </div>
	<?php //echo $form->textFieldGroup($user,'ktr_alamat_negaraID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php
    echo $form->dropDownListGroup(
        $user,
        'ktr_alamat_negaraID',
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
                        'update'=>'#User_ktr_alamat_propinsiID',
                        'data'=>array('neg_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php //echo $form->textFieldGroup($user,'ktr_alamat_propinsiID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php
    echo $form->dropDownListGroup(
        $user,
        'ktr_alamat_propinsiID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
               'data' => CHtml::listData(Propinsi::model()->findAllByAttributes(array('negaraID'=>empty($user->ktr_alamat_negaraID) ? '' : $user->ktr_alamat_negaraID)), 'propinsiID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih Propinsi',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkabupaten'),
                        'update'=>'#User_ktr_alamat_kabupatenID',
                        'data'=>array('prop_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php //echo $form->textFieldGroup($user,'ktr_alamat_kabupatenID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php
    echo $form->dropDownListGroup(
        $user,
        'ktr_alamat_kabupatenID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
               'data' => CHtml::listData(Kabupaten::model()->findAllByAttributes(array('propinsiID'=>empty($user->ktr_alamat_propinsiID) ? '' : $user->ktr_alamat_propinsiID)), 'kabupatenID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih Kabupaten',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkecamatan'),
                        'update'=>'#User_ktr_alamat_kecamatanID',
                        'data'=>array('kab_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php //echo $form->textFieldGroup($user,'ktr_alamat_kecamatanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php
    echo $form->dropDownListGroup(
        $user,
        'ktr_alamat_kecamatanID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
               'data' => CHtml::listData(Kecamatan::model()->findAllByAttributes(array('kabupatenID'=>empty($user->ktr_alamat_kabupatenID) ? '' : $user->ktr_alamat_kabupatenID)), 'kecamatanID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih Kecamatan',
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadkelurahan'),
                        'update'=>'#User_ktr_alamat_kelurahanID',
                        'data'=>array('kec_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),					
                ),						
            )
        )
    );
    ?>

	<?php //echo $form->textFieldGroup($user,'ktr_alamat_kelurahanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
	<?php
    echo $form->dropDownListGroup(
        $user,
        'ktr_alamat_kelurahanID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
               'data' => CHtml::listData(Kelurahan::model()->findAllByAttributes(array('kecamatanID'=>empty($user->ktr_alamat_kecamatanID) ? '' : $user->ktr_alamat_kecamatanID)), 'kelurahanID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Pilih Kelurahan',
					/*
                    'ajax' => array(
                        'type'=>'POST', 
                        'url'=>Yii::app()->createUrl('daerah/loadjalan'),
                        'update'=>'#User_ktr_alamat_jalanID',
                        'data'=>array('kel_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                    ),
					*/					
                ),						
            )
        )
    );
    ?>

	<?php echo $form->textFieldGroup($user,'ktr_alamat_jalan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>    
	<?php echo $form->textFieldGroup($user,'koordinat_maps',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>    
	<div class="note note-success">
	    Data Kantor Sub Agen
    </div>
	<?php echo $form->textFieldGroup($user,'kode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($user,'nama_kantor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($user,'discount',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
    <?php echo $form->textFieldGroup($user,'awalan_connote',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
    <hr />
    
<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$user->isNewRecord ? 'Simpan' : 'Perbarui',
	  )); ?>
 &nbsp; <?php echo CHtml::link('Batal',array('index'),array('class'=>'btn btn-default')); ?>    </div>
</div>

<?php $this->endWidget(); ?>
