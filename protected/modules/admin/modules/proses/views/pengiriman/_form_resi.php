	<div class="note note-success">Informasi Resi</div>

	<div class="form-group">
    	<?php $attr="connoteID"; $lbl="Connote"; ?>
		<label class="col-sm-3 control-label required"> <?= $lbl ?>  <span class="required">*</span></label>
		<div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-btn">
                </span>
                <input class="form-control input-sm" readonly="readonly" placeholder="Nomer Connote" name="Pengiriman[<?= $attr ?>]" id="Pengiriman_<?= $attr ?>" type="text" value="<?php echo $model->connoteID ?>">
                <span class="input-group-btn">
                <a class="btn btn-sm btn-info" href="#pop_up_browse_connote" data-toggle="modal" onclick='return false;'>Browse</a>
                </span>
            </div>
			<?php echo $form->hiddenField($model,'nomer_connote'); ?>
            <div style="padding-left:8px;" id="div_nomer_connote"><?= $model->nomer_connote?></div>
            <?= empty($model->errors[$attr]) ? '' : '<div class="help-block error">'. $lbl.' cannot be blank.</div>' ?>
		</div>        
    </div>

	<div class="form-group">
		<?php echo $form->hiddenField($model,'origin_cabangID'); ?>
        <?php echo $form->hiddenField($model,'origin_agensubID'); ?>
        <?php echo $form->hiddenField($model,'origin_agenID'); ?>
    
    	<?php $attr="origin_kantorID"; $lbl="Origin"; ?>
		<label class="col-sm-3 control-label required"> <?= $lbl ?> <span class="required">*</span></label>
		<div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-btn">
                </span>
                <input class="form-control input-sm" readonly="readonly" placeholder=" <?= $lbl ?>" name="Pengiriman[<?= $attr ?>]" id="Pengiriman_<?= $attr ?>" type="text" value="<?php echo $model->origin_kantorID ?>">
                <span class="input-group-btn">
                <a class="btn btn-sm btn-info" href="#pop_up_browse_kantor" data-toggle="modal" onclick='$("#pilihan").html("origin");'>Browse</a>
                </span>
            </div>
			<?php echo $form->hiddenField($model,'nama_kantor_pengirim'); ?>
            <div style="padding-left:8px;" id="div_kantor_origin"><?= $model->nama_kantor_pengirim ?></div>
            <?= empty($model->errors[$attr]) ? '' : '<div class="help-block error">'. $lbl.' cannot be blank.</div>' ?>
		</div>        
    </div>

    <div class="form-group">
        <?php $attr="destination_kantorID"; $lbl="Destination"; ?>
        <label class="col-sm-3 control-label required"> <?= $lbl ?> <span class="required">*</span> </label>
        <div class="col-sm-9">
        	<div class="row">
            	<div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-btn">
                        </span>
                        <input class="form-control input-sm" readonly="readonly" placeholder=" <?= $lbl ?>" name="Pengiriman[<?= $attr ?>]" id="Pengiriman_<?= $attr ?>" type="text"  value="<?php echo $model->destination_kantorID ?>" />
                        <span class="input-group-btn">
                        <a class="btn btn-sm btn-info" href="#pop_up_browse_kantor" data-toggle="modal" onclick='$("#pilihan").html("destination");'>Browse</a>
                        </span>
                    </div>
                    <?php echo $form->hiddenField($model,'nama_kantor_penerima'); ?>
                    <div style="padding-left:8px;" id="div_kantor_penerima"><?= $model->nama_kantor_penerima ?></div>
                    <?= empty($model->errors[$attr]) ? '' : '<div class="help-block error">'. $lbl.' cannot be blank.</div>' ?>
                </div>
            	<div class="col-md-6">
                    <div class="form-group">
                        <?php $attr="transit_kantorID"; $lbl="Transit"; ?>
                        <label class="col-sm-3 control-label required"> <?= $lbl ?> </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-btn">
                                </span>
                                <input class="form-control input-sm" readonly="readonly" placeholder=" <?= $lbl ?>" name="Pengiriman[<?= $attr ?>]" id="Pengiriman_<?= $attr ?>" type="text" value="<?php echo $model->transit_kantorID ?>" />
                                <span class="input-group-btn">
                                <a class="btn btn-sm btn-info" href="#pop_up_browse_kantor" data-toggle="modal" onclick='$("#pilihan").html("transit");'>Browse</a>
                                </span>
                            </div>
                            <?php echo $form->hiddenField($model,'nama_kantor_transit'); ?>
                            <div style="padding-left:8px;" id="div_kantor_transit"><?= $model->nama_kantor_transit ?></div>
                            <?= empty($model->errors[$attr]) ? '' : '<div class="help-block error">'. $lbl.' cannot be blank.</div>' ?>
                        </div>        
                    </div>                    
                </div>
            </div>
        </div>        
    </div>    
    
	<?php echo $form->dropDownListGroup(
        $model,
        'pengiriman_viaID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(PengirimanVia::model()->findAll(" 1 order by nama "), 'pengiriman_viaID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Jenis Barang',
                ),						
            )
        )
    ); ?>

	<?php echo $form->dropDownListGroup(
        $model,
        'jenis_serviceID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(JenisService::model()->findAll(" 1 order by nama "), 'jenis_serviceID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Jenis Barang',
                ),						
            )
        )
    ); ?>

	<?php echo $form->dropDownListGroup(
        $model,
        'jenis_barangID',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(JenisBarang::model()->findAll(" 1 order by nama "), 'jenis_barangID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Jenis Barang',
                ),						
            )
        )
    ); ?>

	<?php echo $form->dropDownListGroup(
        $model,
        'is_cash',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(Pengiriman::model()->isCashList(), 'code', 'carabayar'),//CHtml::listData(Negara::model()->findAll(), 'negaraID', 'nama'),
                'htmlOptions'=>array(
                    'prompt'=>'Cara Pembayaran',
                ),						
            )
        )
    ); ?>

	<?php echo $form->textFieldGroup($model,'instruksi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

	<?php echo $form->textFieldGroup($model,'deskripsi',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
