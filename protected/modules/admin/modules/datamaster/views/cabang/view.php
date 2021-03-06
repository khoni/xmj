<?php
$this->breadcrumbs=array(
	'Cabang'=>array('index'),
	$model->cabangID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Cabang :  <?php echo $model->cabangID; ?></small></h1>
<hr />
<?php $this->renderPartial('_pop_up_cabang'); ?>

<?php	
	echo CHtml::link('Update',array('update','id'=>$model->cabangID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />
<h3>Data Pengguna</h3>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
    [
    	'label' => 'Email',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->email) ? '-' : $model->kantor->user->email,
    ],	
    [
    	'label' => 'Nama Pengguna',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->nama) ? '-' : $model->kantor->user->nama,
    ],	
    [
    	'label' => 'HP',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->hp) ? '-' : $model->kantor->user->hp,
    ],	
    [
    	'label' => 'Telepon',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->telepon) ? '-' : $model->kantor->user->telepon,
    ],	
    [
    	'label' => 'FAX',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->fax) ? '-' : $model->kantor->user->fax,
    ],	
	
    [
    	'name' => 'updated_at',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->updated_at) ? '-' : date('d M Y H:i:s',$model->kantor->user->updated_at),
    ],	
	
    [
    	'name' => 'updated_by',
    	'type' => 'raw',
    	'value' => empty($model->kantor->user->updated_by) ? '-' : $model->kantor->user->updated_by,
    ],	
),
)); 

?>

<h3>Data Kantor Cabang</h3>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	
    [
    	'name' => 'cabangID',
    	'type' => 'raw',
    	'value' => empty($model->cabangID) ? '-' : $model->cabangID,
    ],
    [
    	'name' => 'nama_kantor',
    	'type' => 'raw',
    	'value' => empty($model->kantor->nama_kantor) ? '-' : $model->kantor->nama_kantor,
    ],		
    [
    	'label' => 'Kode Cabang',
    	'type' => 'raw',
    	'value' => empty($model->kantor->kode) ? '-' : $model->kantor->kode,
    ],	
    [
    	'label' => 'Awalan Connote',
    	'type' => 'raw',
    	'value' => empty($model->kantor->awalan_connote) ? '-' : $model->kantor->awalan_connote,
    ],	
    [
    	'name' => 'discount',
    	'type' => 'raw',
    	'value' => empty($model->kantor->discount) ? '-' : $model->kantor->discount." %",
    ],		
    [
    	'label' => 'Is Aktif',
    	'type' => 'raw',
    	'value' => ($model->kantor->is_aktif==1) ? 'Aktif' : "Non Aktif",
    ],	
    [
    	'name' => 'updated_at',
    	'type' => 'raw',
    	'value' => empty($model->kantor->updated_at) ? '-' : date('d M Y H:i:s',$model->kantor->updated_at),
    ],	
	
    [
    	'name' => 'updated_by',
    	'type' => 'raw',
    	'value' => empty($model->kantor->updated_by) ? '-' : $model->kantor->updated_by,
    ],	

),
)); 

?>

<h3>Lokasi Kantor Cabang</h3>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
    [
    	'label' => 'Negara',
    	'type' => 'raw',
    	'value' => empty($model->kantor->negara->nama) ? '-' : $model->kantor->negara->nama,
    ],	
    [
    	'label' => 'Propinsi',
    	'type' => 'raw',
    	'value' => empty($model->kantor->propinsi->nama) ? '-' : $model->kantor->propinsi->nama,
    ],	
    [
    	'label' => 'Kabupaten',
    	'type' => 'raw',
    	'value' => empty($model->kantor->kabupaten->nama) ? '-' : $model->kantor->kabupaten->nama,
    ],	
    [
    	'label' => 'Kecamatan',
    	'type' => 'raw',
    	'value' => empty($model->kantor->kecamatan->nama) ? '-' : $model->kantor->kecamatan->nama,
    ],	
    [
    	'label' => 'Kelurahan',
    	'type' => 'raw',
    	'value' => empty($model->kantor->kelurahan->nama) ? '-' : $model->kantor->kelurahan->nama,
    ],	
    [
    	'label' => 'Alamat Kantor',
    	'type' => 'raw',
    	'value' => empty($model->kantor->alamat_jalan) ? '-' : $model->kantor->alamat_jalan,
    ],	
    [
    	'label' => 'Koordinat',
    	'type' => 'raw',
    	'value' => empty($model->kantor->koordinat_maps) ? '-' : $model->kantor->koordinat_maps,
    ],	

),
)); 

?>
