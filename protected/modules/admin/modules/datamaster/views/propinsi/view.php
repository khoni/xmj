<?php
$this->breadcrumbs=array(
	'Propinsi'=>array('index'),
	$model->propinsiID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Propinsi :  <?php echo $model->propinsiID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->propinsiID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'propinsiID',
    	'type' => 'raw',
    	'value' => empty($model->propinsiID) ? '-' : $model->propinsiID,
    ],	
	
    [
    	'name' => 'nama_negara',
    	'type' => 'raw',
    	'value' => empty($model->negara->nama) ? '-' : $model->negara->nama,
    ],	
	
    [
    	'name' => 'nama',
    	'type' => 'raw',
    	'value' => empty($model->nama) ? '-' : $model->nama,
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
