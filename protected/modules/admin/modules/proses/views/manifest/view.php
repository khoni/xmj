<?php
$this->breadcrumbs=array(
	'Manifest'=>array('index'),
	$model->manifestID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Manifest :  <?php echo $model->manifestID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->manifestID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'manifestID',
    	'type' => 'raw',
    	'value' => empty($model->manifestID) ? '-' : $model->manifestID,
    ],	
	
    [
    	'name' => 'packingID',
    	'type' => 'raw',
    	'value' => empty($model->packingID) ? '-' : $model->packingID,
    ],	
	
    [
    	'name' => 'to_kantorID',
    	'type' => 'raw',
    	'value' => empty($model->to_kantorID) ? '-' : $model->to_kantorID,
    ],	
	
    [
    	'name' => 'berat_manifest_kg',
    	'type' => 'raw',
    	'value' => empty($model->berat_manifest_kg) ? '-' : $model->berat_manifest_kg,
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
