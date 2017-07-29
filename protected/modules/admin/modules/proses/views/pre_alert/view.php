<?php
$this->breadcrumbs=array(
	'Pre Alert'=>array('index'),
	$model->pre_alertID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">PreAlert :  <?php echo $model->pre_alertID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->pre_alertID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'pre_alertID',
    	'type' => 'raw',
    	'value' => empty($model->pre_alertID) ? '-' : $model->pre_alertID,
    ],	
	
    [
    	'name' => 'manifestID',
    	'type' => 'raw',
    	'value' => empty($model->manifestID) ? '-' : $model->manifestID,
    ],	
	
    [
    	'name' => 'no_resi_moda',
    	'type' => 'raw',
    	'value' => empty($model->no_resi_moda) ? '-' : $model->no_resi_moda,
    ],	
	
    [
    	'name' => 'no_angkutan',
    	'type' => 'raw',
    	'value' => empty($model->no_angkutan) ? '-' : $model->no_angkutan,
    ],	
	
    [
    	'name' => 'moda_angkutanID',
    	'type' => 'raw',
    	'value' => empty($model->moda_angkutanID) ? '-' : $model->moda_angkutanID,
    ],	
	
    [
    	'name' => 'nama_angkutan',
    	'type' => 'raw',
    	'value' => empty($model->nama_angkutan) ? '-' : $model->nama_angkutan,
    ],	
	
    [
    	'name' => 'jenis_angkutanID',
    	'type' => 'raw',
    	'value' => empty($model->jenis_angkutanID) ? '-' : $model->jenis_angkutanID,
    ],	
	
    [
    	'name' => 'to_kantorID',
    	'type' => 'raw',
    	'value' => empty($model->to_kantorID) ? '-' : $model->to_kantorID,
    ],	
	
    [
    	'name' => 'berat_pre_alert_kg',
    	'type' => 'raw',
    	'value' => empty($model->berat_pre_alert_kg) ? '-' : $model->berat_pre_alert_kg,
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
