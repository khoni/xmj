<?php
$this->breadcrumbs=array(
	'Kabupaten'=>array('index'),
	$model->kabupatenID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Kabupaten :  <?php echo $model->kabupatenID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->kabupatenID),array('class'=>'btn btn-sm blue'));
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
    	'value' => empty($model->propinsi->negara->nama) ? '-' : $model->propinsi->negara->nama,
    ],	

    [
    	'name' => 'nama_propinsi',
    	'type' => 'raw',
    	'value' => empty($model->propinsi->nama) ? '-' : $model->propinsi->nama,
    ],	

    [
    	'name' => 'nama',
    	'type' => 'raw',
    	'value' => empty($model->nama) ? '-' : $model->nama,
    ],	
	
    [
    	'name' => 'kabupatenID',
    	'type' => 'raw',
    	'value' => empty($model->kabupatenID) ? '-' : $model->kabupatenID,
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
