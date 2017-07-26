<?php $this->renderPartial('_pop_up_browse_cab'); ?>

<?php
$this->breadcrumbs=array(
	'Kabupatens',
);

?>

<h2>Wilayah Kerja Cabang<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php //echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> 

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'dosen-riwayat-aktifitasilmiah-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>


<input class="span5" readonly="readonly" maxlength="50" placeholder="Kantor Cabang" name="kantorID" id="kantorID" type="text">
<a class="btn btn-xs btn-info" href="#pop_up_browse_cab" data-toggle="modal" onclick='return false;'>Browse</a>
<div id="div_kantor" style="clear:both"></div>
<br />

<div>
<?php $this->widget('booster.widgets.TbButton', array(
	'buttonType'=>'submit',
	'context'=>'primary',
	'label'=>'Set Wilayah Pengiriman Cabang',
	'htmlOptions'=>array(
		'onclick'=>'return confirm("Yakin di Set ?");',
	),
)); ?>
</div>

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'kabupaten-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $model->search(),
    'filter' => $model,
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
		array(
			'id' => 'id',
			//'name' => 'nim',
			'class' => 'CCheckBoxColumn',
			'selectableRows' => '2',
			'checkBoxHtmlOptions' => [
				'class' => 'checkSingle'
			]
		),
		[
			'name' => 'nama_negara',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->propinsi->negara->nama) ? '-' : $data->propinsi->negara->nama;
            },
		],		
		[
			'name' => 'nama_propinsi',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->propinsi->nama) ? '-' : $data->propinsi->nama;
            },
		],		
		
		[
			'name' => 'nama',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->nama) ? '-' : $data->nama;
            },
		],		
		
		[
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'wilayah_kantorID',
			'filter' => $this->kantor,
			'value' => 'empty($data->wilayahKantor->nama_kantor) ? "---" : $data->wilayahKantor->fullnama',
			'editable' => [
				'type' => 'select',
				'url' => $this->createUrl('setKabupaten'),
				'source' => $this->kantor,
			],
		],

		/*
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update}',
            'buttons' => array(
                'view' => array(
                    'options'=>array("target"=>"_blank"),
                ),
            ),
        ),
		*/
    ),
)); 
?>

<?php $this->endWidget(); ?>

<script>
    $(document).ready(function () {
        $("#id_all").click(function () {
            if (this.checked) {
                $('.checker').find('span').addClass('checked');
            } else {
                $('.checker').find('span').removeClass();
            }
        });

        $("#btn-cancel").click(function () {
            $('.checker').find('span').removeClass();
        });
        $(".checkSingle").click(function () {
            if ($(this).is(":checked")) {
                var isAllChecked = 0;
                $(".checkSingle").each(function () {
                    if (!this.checked)
                        isAllChecked = 1;
                })
                if (isAllChecked == 0) {
                    $('#uniform-id_all').find('span').removeClass('checked');
                }
            } else {
                $('#uniform-id_all').find('span').removeClass('checked');
            }
        });
	});
</script>