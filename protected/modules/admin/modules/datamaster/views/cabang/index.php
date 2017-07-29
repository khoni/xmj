<?php
$this->breadcrumbs=array(
	'Cabangs',
);

?>

<h2>Cabang<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Buat Cabang Baru',array('#pop_up_cabang'),array('class'=>'btn btn-sm blue-madison','data-toggle'=>"modal",'onclick'=>'return false;')); ?> 

<?php $this->renderPartial('_pop_up_cabang'); ?>
<?php $this->renderPartial('_pop_up_agensub'); ?>
<?php $this->renderPartial('_pop_up_agen'); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'cabang-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $cabang->search(),
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
			'name' => 'cabangID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->cabangID) ? '-' : $data->cabangID;
            },
		],		
		
		[
			'name' => 'nama_kantor',
			'header' => 'Nama Kantor',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kantor->nama_kantor) ? '-' : $data->kantor->nama_kantor;
            },
		],		
		[
			'name' => 'kode',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kantor->kode) ? '-' : $data->kantor->kode;
            },
		],		
		[
			'name' => 'nama',
			'header' => 'Penanggung Jawab',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	$nama=empty($data->kantor->user->nama) ? '-' : $data->kantor->user->nama;
				$email=empty($data->kantor->user->email) ? '-' : $data->kantor->user->email;
				$userid=empty($data->kantor->user->userID) ? '-' : $data->kantor->user->userID;
				return "$nama <br /> <small style='font-size:10px;color:#999999'>Email : $email<br />User ID : $userid</small>";
            },
		],		
		/*
		[
			'header' => '&nbsp;',
			'type' => 'raw',
			'value' => function($data){
            	return CHtml::link('+ Sub Agen',array('agenSub'),array('class'=>'btn btn-xs purple'))."<br />".CHtml::link('+ Agen',array('agen'),array('class'=>'btn btn-xs yellow'));
            },
		],
		*/				
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update}',
            'buttons' => array(
                'view' => array(
					'url' => 'array("view","id"=>$data->cabangID)',
                    //'options'=>array("target"=>"_blank"),
                ),
                'update' => array(
					'url' => 'array("update","id"=>$data->cabangID)',
                    //'options'=>array("target"=>"_blank"),
                ),
            ),
        ),
    ),
)); 
?>