<?php
$this->breadcrumbs=array(
	'Kantors',
);

?>

<h2>Kantor<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'kantor-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $cabang->korelasi_kantor(),
    'filter' => $cabang,
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
			'name' => 'nama_kantor_cabang',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$ktr=empty($data->nama_kantor_cabang) ? '-' : $data->nama_kantor_cabang;
				$kode=empty($data->kode_cabang) ? '' : '['.$data->kode_cabang.']';
				$id=empty($data->cabangID) ? '' : $data->cabangID;
            	return $ktr." $kode <br /><small>$id</small>";
            },
		],			
		[
			'name' => 'nama_kantor_agensub',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$ktr=empty($data->nama_kantor_agensub) ? '-' : $data->nama_kantor_agensub;
				$kode=empty($data->kode_agensub) ? '' : '['.$data->kode_agensub.']';
				$id=empty($data->agen_subID) ? '' : $data->agen_subID;
            	return $ktr." $kode <br /><small>$id</small>";
            },
		],			
		[
			'name' => 'nama_kantor_agen',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
				$ktr=empty($data->nama_kantor_agen) ? '-' : $data->nama_kantor_agen;
				$kode=empty($data->kode_agen) ? '' : '['.$data->kode_agen.']';
				$id=empty($data->agenID) ? '' : $data->agenID;
            	return $ktr." $kode <br /><small>$id</small>";
            },
		],

    ),
)); 
?>
