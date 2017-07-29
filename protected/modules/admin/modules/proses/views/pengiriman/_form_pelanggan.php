	<div class="note note-success">Pengirim</div>
    
	<div class="form-group">
		<label class="col-sm-3 control-label required" for="Pengiriman_pengirimanID"> &nbsp; </label>
		<div class="col-sm-9">
        	<a href="#" class="btn btn-sm btn-info" onclick="$('.fr_non_member').toggle(); return false;">Non Member</a>
        	<a href="#" class="btn btn-sm btn-info" onclick="alert('Under Contructed'); return false;">Member</a>
		</div>        
    </div>	

    <div class="fr_non_member" style="display:none;">
		<?php echo $form->textFieldGroup($model,'pengirim_nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->textFieldGroup($model,'pengirim_alamat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->textFieldGroup($model,'pengirim_telepon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->textFieldGroup($model,'pengirim_no_identitas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	</div>
    
	<div class="note note-success">Penerima</div>

    <div class="fr_non_member" style="display:none;">
        <?php echo $form->textFieldGroup($model,'penerima_nama',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->textFieldGroup($model,'penerima_telepon',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
		<hr />
		<?php
        echo $form->dropDownListGroup(
            $model,
            'penerima_negaraID',
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
                            'update'=>'#Pengiriman_penerima_propinsiID',
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
            'penerima_propinsiID',
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
                            'update'=>'#Pengiriman_penerima_kabupatenID',
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
            'penerima_kabupatenID',
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
                            'update'=>'#Pengiriman_penerima_kecamatanID',
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
            'penerima_kecamatanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    //'data' => CHtml::listData(Kabupaten::model()->findAll(), 'negaraID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih kabupaten terlebih dahulu...',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkelurahan'),
                            'update'=>'#Pengiriman_penerima_kelurahanID',
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
            'penerima_kelurahanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                    //'data' => CHtml::listData(Kabupaten::model()->findAll(), 'negaraID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih kecamatan terlebih dahulu...',
                    ),						
                )
            )
        );
        ?>
    
		<?php echo $form->textFieldGroup($model,'penerima_alamat',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	</div>
