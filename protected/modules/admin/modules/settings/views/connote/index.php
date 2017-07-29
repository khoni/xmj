<?php $this->renderPartial('_pop_up_browse_cab'); ?>

<?php
$this->breadcrumbs=array(
	'Connotes',
);

?>

<h2>Connote<br /><small style="font-size:14px;color:#999999">Manage</small></h2>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'dosen-riwayat-aktifitasilmiah-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-btn">
            </span>
		    <input class="form-control input-sm" readonly="readonly" placeholder="Kantor Cabang" name="kantorID" id="kantorID" type="text">
            <span class="input-group-btn">
            <a class="btn btn-sm btn-info" href="#pop_up_browse_cab" data-toggle="modal" onclick='return false;'>Browse</a>
            </span>
        </div>
        <div class='col-md-12' id="div_kantor">---</div>
    </div>
    <div class="col-md-2">
        <div class="input-group">
		    <input class="span5 form-control input-sm" maxlength="50" placeholder="Jumlah Connote" name="jumlah" id="jumlah" type="text"><br />
        </div>
    </div>
    <div class="col-md-4">
			<?php $this->widget('booster.widgets.TbButton', array(
                'buttonType'=>'submit',
                'context'=>'primary',
                'label'=>'Generate Connote',
                'htmlOptions'=>array(
                    'class'=>'btn-sm',
                    'onclick'=>'return confirm("Generate Connote ?");',
                ),
            )); ?>
    </div>
    <br />
	<div style="clear:both"><hr /></div>

<?php $this->endWidget(); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'connote-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $model->connote_cabang(),
    //'filter' => $model,
    'pager' => array(
        'header' => '',
        'htmlOptions' => array(
            'class' => 'pagination'
        )
    ),
    'columns'=>array(
				array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
		[
			'name' => 'kantorID',
			'type' => 'raw',
			'value' => function($data){
            	return empty($data->kantor->fullnama) ? '-' : $data->kantor->fullnama;
            },
		],		
		[
			'name' => 'total',
			'type' => 'raw',
			'value' => function($data){
            	return CHtml::link($data->total,array('view','id'=>$data->kantorID));
            },
		],		
		[
			'name' => 'terpakai',
			'type' => 'raw',
			'value' => function($data){
            	return CHtml::link($data->terpakai,array('view','id'=>$data->kantorID,'connote_statusID'=>1));
            },
		],		
    ),
)); 
?>
