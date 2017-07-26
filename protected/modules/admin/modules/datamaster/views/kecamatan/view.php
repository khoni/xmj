<?php
$this->breadcrumbs=array(
	'Kecamatan'=>array('index'),
	$model->kecamatanID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Kecamatan :  <?php echo $model->kecamatanID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->kecamatanID),array('class'=>'btn btn-sm blue'));
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
    	'value' => empty($model->kabupaten->propinsi->negara->nama) ? '-' : $model->kabupaten->propinsi->negara->nama,
    ],	

    [
    	'name' => 'nama_propinsi',
    	'type' => 'raw',
    	'value' => empty($model->kabupaten->propinsi->nama) ? '-' : $model->kabupaten->propinsi->nama,
    ],	

    [
    	'name' => 'nama_kabupaten',
    	'type' => 'raw',
    	'value' => empty($model->kabupaten->nama) ? '-' : $model->kabupaten->nama,
    ],	
	
    [
    	'name' => 'nama',
    	'type' => 'raw',
    	'value' => empty($model->nama) ? '-' : $model->nama,
    ],	
	
    [
    	'name' => 'kecamatanID',
    	'type' => 'raw',
    	'value' => empty($model->kecamatanID) ? '-' : $model->kecamatanID,
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
