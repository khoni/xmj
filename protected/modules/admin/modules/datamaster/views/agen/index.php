<?php
$this->breadcrumbs=array(
	'Agen',
);

?>

<h2>Agen<br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo CHtml::link('Buat Agen Baru',array('#pop_up_agen'),array('class'=>'btn btn-sm blue-madison','data-toggle'=>"modal",'onclick'=>'return false;')); ?> 

<?php $this->renderPartial('_pop_up_agen'); ?>
<?php //$this->renderPartial('_pop_up_agen'); ?>

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'agen-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $agen->search(),
    'filter' => $agen,
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
			'name' => 'agenID',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->agenID) ? '-' : $data->agenID;
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
			'name' => 'nama_kantor',
			'header' => 'Nama Kantor',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	return empty($data->kantor->nama_kantor) ? '-' : $data->kantor->nama_kantor;
            },
		],		
		[
			'name' => 'nama',
			'header' => 'Nama Pengguna',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function($data){
            	$nama=empty($data->kantor->user->nama) ? '-' : $data->kantor->user->nama;
				$email=empty($data->kantor->user->email) ? '-' : $data->kantor->user->email;
				$userid=empty($data->kantor->user->userID) ? '-' : $data->kantor->user->userID;
				return "$nama <br /> <small style='font-size:10px;color:#999999'>Email : $email<br />User ID : $userid</small>";
            },
		],		
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update}',
            'buttons' => array(
                'view' => array(
					'url' => 'array("view","id"=>$data->agenID)',
                    //'options'=>array("target"=>"_blank"),
                ),
                'update' => array(
					'url' => 'array("update","id"=>$data->agenID)',
                    //'options'=>array("target"=>"_blank"),
                ),
            ),
        ),
    ),
)); 
?>