<?php
$this->breadcrumbs=array(
	'Saldo'=>array('index'),
	$model->saldoID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Saldo :  <?php echo $model->saldoID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->saldoID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'saldoID',
    	'type' => 'raw',
    	'value' => empty($model->saldoID) ? '-' : $model->saldoID,
    ],	
	
    [
    	'name' => 'kantorID',
    	'type' => 'raw',
    	'value' => empty($model->kantorID) ? '-' : $model->kantorID,
    ],	
	
    [
    	'name' => 'jenis_pencatatanID',
    	'type' => 'raw',
    	'value' => empty($model->jenis_pencatatanID) ? '-' : $model->jenis_pencatatanID,
    ],	
	
    [
    	'name' => 'keterangan',
    	'type' => 'raw',
    	'value' => empty($model->keterangan) ? '-' : $model->keterangan,
    ],	
	
    [
    	'name' => 'tanggal',
    	'type' => 'raw',
    	'value' => empty($model->tanggal) ? '-' : $model->tanggal,
    ],	
	
    [
    	'name' => 'rp_debet',
    	'type' => 'raw',
    	'value' => empty($model->rp_debet) ? '-' : $model->rp_debet,
    ],	
	
    [
    	'name' => 'rp_kredit',
    	'type' => 'raw',
    	'value' => empty($model->rp_kredit) ? '-' : $model->rp_kredit,
    ],	
	
    [
    	'name' => 'rp_saldo',
    	'type' => 'raw',
    	'value' => empty($model->rp_saldo) ? '-' : $model->rp_saldo,
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
