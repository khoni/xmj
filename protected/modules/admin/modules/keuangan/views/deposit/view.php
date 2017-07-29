<?php
$this->breadcrumbs=array(
	'Deposit'=>array('index'),
	$model->depositID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Deposit :  <?php echo $model->depositID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->depositID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'depositID',
    	'type' => 'raw',
    	'value' => empty($model->depositID) ? '-' : $model->depositID,
    ],	
	
    [
    	'name' => 'kantorID',
    	'type' => 'raw',
    	'value' => empty($model->kantorID) ? '-' : $model->kantorID,
    ],	
	
    [
    	'name' => 'tanggal_transfer',
    	'type' => 'raw',
    	'value' => empty($model->tanggal_transfer) ? '-' : $model->tanggal_transfer,
    ],	
	
    [
    	'name' => 'is_transfer',
    	'type' => 'raw',
    	'value' => empty($model->is_transfer) ? '-' : $model->is_transfer,
    ],	
	
    [
    	'name' => 'nama_bank_asal',
    	'type' => 'raw',
    	'value' => empty($model->nama_bank_asal) ? '-' : $model->nama_bank_asal,
    ],	
	
    [
    	'name' => 'norek_bank_asal',
    	'type' => 'raw',
    	'value' => empty($model->norek_bank_asal) ? '-' : $model->norek_bank_asal,
    ],	
	
    [
    	'name' => 'nama_bank_tujuan',
    	'type' => 'raw',
    	'value' => empty($model->nama_bank_tujuan) ? '-' : $model->nama_bank_tujuan,
    ],	
	
    [
    	'name' => 'norek_bank_tujuan',
    	'type' => 'raw',
    	'value' => empty($model->norek_bank_tujuan) ? '-' : $model->norek_bank_tujuan,
    ],	
	
    [
    	'name' => 'rp_jumlah',
    	'type' => 'raw',
    	'value' => empty($model->rp_jumlah) ? '-' : $model->rp_jumlah,
    ],	
	
    [
    	'name' => 'verified_flag',
    	'type' => 'raw',
    	'value' => empty($model->verified_flag) ? '-' : $model->verified_flag,
    ],	
	
    [
    	'name' => 'verified_time',
    	'type' => 'raw',
    	'value' => empty($model->verified_time) ? '-' : $model->verified_time,
    ],	
	
    [
    	'name' => 'verified_userID',
    	'type' => 'raw',
    	'value' => empty($model->verified_userID) ? '-' : $model->verified_userID,
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
