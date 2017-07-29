<?php
$this->breadcrumbs=array(
	'Packing'=>array('index'),
	$model->packingID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Packing :  <?php echo $model->packingID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->packingID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'packingID',
    	'type' => 'raw',
    	'value' => empty($model->packingID) ? '-' : $model->packingID,
    ],	
	
    [
    	'name' => 'transaksiID',
    	'type' => 'raw',
    	'value' => empty($model->transaksiID) ? '-' : $model->transaksiID,
    ],	
	
    [
    	'name' => 'to_kantorID',
    	'type' => 'raw',
    	'value' => empty($model->to_kantorID) ? '-' : $model->to_kantorID,
    ],	
	
    [
    	'name' => 'jenis_serviceID',
    	'type' => 'raw',
    	'value' => empty($model->jenis_serviceID) ? '-' : $model->jenis_serviceID,
    ],	
	
    [
    	'name' => 'berat_packing_kg',
    	'type' => 'raw',
    	'value' => empty($model->berat_packing_kg) ? '-' : $model->berat_packing_kg,
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
