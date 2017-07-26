<?php
$this->breadcrumbs=array(
	'Kelurahan'=>array('index'),
	$model->kelurahanID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Kelurahan :  <?php echo $model->kelurahanID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->kelurahanID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'nama_negara',
    	'type' => 'raw',
    	'value' => empty($model->kecamatan->kabupaten->propinsi->negara->nama) ? '-' : $model->kecamatan->kabupaten->propinsi->negara->nama,
    ],
    [
    	'name' => 'nama_propinsi',
    	'type' => 'raw',
    	'value' => empty($model->kecamatan->kabupaten->propinsi->nama) ? '-' : $model->kecamatan->kabupaten->propinsi->nama,
    ],
    [
    	'name' => 'nama_kabupaten',
    	'type' => 'raw',
    	'value' => empty($model->kecamatan->kabupaten->nama) ? '-' : $model->kecamatan->kabupaten->nama,
    ],	
			
    [
    	'name' => 'nama_kecamatan',
    	'type' => 'raw',
    	'value' => empty($model->kecamatan->nama) ? '-' : $model->kecamatan->nama,
    ],	
			
    [
    	'name' => 'nama',
    	'type' => 'raw',
    	'value' => empty($model->nama) ? '-' : $model->nama,
    ],	
    [
    	'name' => 'kelurahanID',
    	'type' => 'raw',
    	'value' => empty($model->kelurahanID) ? '-' : $model->kelurahanID,
    ],	
	
    [
    	'name' => 'kodepos',
    	'type' => 'raw',
    	'value' => empty($model->kodepos) ? '-' : $model->kodepos,
    ],	
	
    [
    	'name' => 'updated_at',
    	'type' => 'raw',
    	'value' => empty($model->updated_at) ? '-' : $model->updated_at,
    ],	
	
    [
    	'name' => 'updated_by',
    	'type' => 'raw',
    	'value' => empty($model->updated_by) ? '-' : $model->updated_by,
    ],	
	    /*
    [
    	'value' => function($data){
        	return 1;
        },
    ],
    */
	),
)); 

?>
