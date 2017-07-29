<?php
$this->breadcrumbs=array(
	'Harga'=>array('index'),
	$model->hargaID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Harga :  <?php echo $model->hargaID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->hargaID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'hargaID',
    	'type' => 'raw',
    	'value' => empty($model->hargaID) ? '-' : $model->hargaID,
    ],	
	
    [
    	'name' => 'negaraID',
    	'type' => 'raw',
    	'value' => empty($model->negara->nama) ? '-' : $model->negara->nama,
    ],	
	
    [
    	'name' => 'propinsiID',
    	'type' => 'raw',
    	'value' => empty($model->propinsi->nama) ? '-' : $model->propinsi->nama,
    ],	
	
    [
    	'name' => 'kabupatenID',
    	'type' => 'raw',
    	'value' => empty($model->kabupaten->nama) ? '-' : $model->kabupaten->nama,
    ],	
	
    [
    	'name' => 'kecamatanID',
    	'type' => 'raw',
    	'value' => empty($model->kecamatan->nama) ? '-' : $model->kecamatan->nama,
    ],	
	
    [
    	'name' => 'kelurahanID',
    	'type' => 'raw',
    	'value' => empty($model->kelurahan->nama) ? '-' : $model->kelurahan->nama,
    ],	
	
    [
    	'name' => 'origin_kantorID',
    	'type' => 'raw',
    	'value' => empty($model->originKantor->fullnama) ? '-' : $model->originKantor->fullnama,
    ],	
	
    [
    	'name' => 'jenis_serviceID',
    	'type' => 'raw',
    	'value' => empty($model->jenisService->nama) ? '-' : $model->jenisService->nama . " - " .$model->jenisService->keterangan,
    ],	
	
    [
    	'name' => 'hari_estimasi',
    	'type' => 'raw',
    	'value' => empty($model->hari_estimasi) ? '-' : $model->hari_estimasi ." Hari",
    ],	
	
    [
    	'name' => 'rp_transit_kgp',
    	'type' => 'raw',
    	'value' => number_format(empty($model->rp_transit_kgp) ? '-' : $model->rp_transit_kgp),
    ],	
	
    [
    	'name' => 'rp_transit_kgs',
    	'type' => 'raw',
    	'value' => number_format(empty($model->rp_transit_kgs) ? '-' : $model->rp_transit_kgs),
    ],	
	
    [
    	'name' => 'rp_transit_lainnya',
    	'type' => 'raw',
    	'value' => number_format(empty($model->rp_transit_lainnya) ? '-' : $model->rp_transit_lainnya),
    ],	
	
    [
    	'name' => 'rp_bp_kgp',
    	'type' => 'raw',
    	'value' => number_format(empty($model->rp_bp_kgp) ? '-' : $model->rp_bp_kgp),
    ],	
	
    [
    	'name' => 'rp_bp_kgs',
    	'type' => 'raw',
    	'value' => number_format(empty($model->rp_bp_kgs) ? '-' : $model->rp_bp_kgs),
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
