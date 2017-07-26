<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cabang-form',
    'type' => 'vertical',
	'enableAjaxValidation'=>false,
)); ?>

    <b><?php echo empty($kantor->errors) ? '' : '<div class="alert alert-danger"><strong>Warning ! </strong> Data form isian kurang lengkap</div>' ?></b>
    <p class="help-block" style="font-size:11px">Fields with <span class="required">*</span> are required.</p>

	<div style="clear:both"></div>
    <div class="col-md-4">
        <div class="note note-success">
            Data Pengguna / Pemilik Usaha
        </div>
        <?php $this->widget('booster.widgets.TbDetailView',array(
        'data'=>$user,
        'attributes'=>array(
            'userID',
            [
                'label' => 'Email',
                'type' => 'raw',
                'value' => empty($user->email) ? '-' : $user->email,
            ],	
            [
                'label' => 'Nama Pengguna',
                'type' => 'raw',
                'value' => empty($user->nama) ? '-' : $user->nama,
            ],	
            [
                'label' => 'HP',
                'type' => 'raw',
                'value' => empty($user->hp) ? '-' : $user->hp,
            ],	
            [
                'label' => 'Telepon',
                'type' => 'raw',
                'value' => empty($user->telpon) ? '-' : $user->telpon,
            ],	
            [
                'label' => 'FAX',
                'type' => 'raw',
                'value' => empty($user->fax) ? '-' : $user->fax,
            ],	
            
            [
                'name' => 'updated_at',
                'type' => 'raw',
                'value' => empty($user->updated_at) ? '-' : date('d M Y H:i:s',$user->updated_at),
            ],	
            
            [
                'name' => 'updated_by',
                'type' => 'raw',
                'value' => empty($user->updated_by) ? '-' : $user->updated_by,
            ],	
        ),
        ));    
        ?>
	</div>
    <div class="col-md-8">    
        <div class="note note-success">
            Lokasi Kantor Cabang
        </div>
        <?php //echo $form->textFieldGroup($kantor,'alamat_negaraID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
        <?php
        echo $form->dropDownListGroup(
            $kantor,
            'alamat_negaraID',
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
                            'update'=>'#Kantor_alamat_propinsiID',
                            'data'=>array('neg_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),					
                    ),						
                )
            )
        );
        ?>
    
        <?php //echo $form->textFieldGroup($kantor,'alamat_propinsiID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
        <?php
        echo $form->dropDownListGroup(
            $kantor,
            'alamat_propinsiID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                   'data' => CHtml::listData(Propinsi::model()->findAllByAttributes(array('negaraID'=>empty($kantor->alamat_negaraID) ? '' : $kantor->alamat_negaraID)), 'propinsiID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Propinsi',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkabupaten'),
                            'update'=>'#Kantor_alamat_kabupatenID',
                            'data'=>array('prop_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),					
                    ),						
                )
            )
        );
        ?>
    
        <?php //echo $form->textFieldGroup($kantor,'alamat_kabupatenID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
        <?php
        echo $form->dropDownListGroup(
            $kantor,
            'alamat_kabupatenID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                   'data' => CHtml::listData(Kabupaten::model()->findAllByAttributes(array('propinsiID'=>empty($kantor->alamat_propinsiID) ? '' : $kantor->alamat_propinsiID)), 'kabupatenID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Kabupaten',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkecamatan'),
                            'update'=>'#Kantor_alamat_kecamatanID',
                            'data'=>array('kab_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),					
                    ),						
                )
            )
        );
        ?>
    
        <?php //echo $form->textFieldGroup($kantor,'alamat_kecamatanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
        <?php
        echo $form->dropDownListGroup(
            $kantor,
            'alamat_kecamatanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                   'data' => CHtml::listData(Kecamatan::model()->findAllByAttributes(array('kecamatanID'=>empty($kantor->alamat_kecamatanID) ? '' : $kantor->alamat_kecamatanID)), 'kecamatanID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Kecamatan',
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadkelurahan'),
                            'update'=>'#Kantor_alamat_kelurahanID',
                            'data'=>array('kec_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),					
                    ),						
                )
            )
        );
        ?>
    
        <?php //echo $form->textFieldGroup($kantor,'alamat_kelurahanID',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50,'onkeypress'=>'return event.charCode <= 57')))); ?>    
        <?php
        echo $form->dropDownListGroup(
            $kantor,
            'alamat_kelurahanID',
            array(
                'wrapperHtmlOptions' => array(
                    'class' => 'col-sm-5',
                ),
                'widgetOptions' => array(
                   'data' => CHtml::listData(Kelurahan::model()->findAllByAttributes(array('kelurahanID'=>empty($kantor->alamat_kelurahanID) ? '' : $kantor->alamat_kelurahanID)), 'kelurahanID', 'nama'),
                    'htmlOptions'=>array(
                        'prompt'=>'Pilih Kelurahan',
                        /*
                        'ajax' => array(
                            'type'=>'POST', 
                            'url'=>Yii::app()->createUrl('daerah/loadjalan'),
                            'update'=>'#Kantor_alamat_jalanID',
                            'data'=>array('kel_id' => 'js:this.value', 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
                        ),
                        */					
                    ),						
                )
            )
        );
        ?>
    
        <?php echo $form->textFieldGroup($kantor,'alamat_jalan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>    
        <?php echo $form->textFieldGroup($kantor,'koordinat_maps',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>    
        <div class="note note-success">
            Data Kantor Cabang
        </div>
        <?php echo $form->textFieldGroup($kantor,'kode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->textFieldGroup($kantor,'nama_kantor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <!--
        <div class="form-group">
            <label class="col-sm-3 control-label required" for="Cabang_daerahID">Data Daerah <span class="required">*</span></label>
            <div class="col-sm-6">
                <input class="span5 form-control" placeholder="Data Daerah" name="Cabang[daerahID]" id="Cabang_daerahID" type="text" value="213">
                <?php //echo empty($kantor->errors['daerahID']) ? '' : '<div class="help-block error">Data Daerah cannot be blank.</div>' ?>
            </div>
            <div class="col-sm-3"><a class="btn btn-info" href="#pop_up_window" data-toggle="modal" onclick='return false;'>Browse</a></div>
        </div>
        -->
        <hr />
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
            <?php $this->widget('booster.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'context'=>'primary',
                    'label'=>$kantor->isNewRecord ? 'Simpan' : 'Perbarui',
              )); ?>
         &nbsp; <?php echo CHtml::link('Batal',array('index'),array('class'=>'btn btn-default')); ?>    </div>
        </div>
	</div>
    
<?php $this->endWidget(); ?>
