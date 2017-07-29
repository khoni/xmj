<?php
$this->breadcrumbs=array(
	'Pengiriman'=>array('index'),
	$model->pengirimanID,
);

?>

<h2>View<br /><small style="font-size:12px;color:#999999">Pengiriman :  <?php echo $model->pengirimanID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model->pengirimanID),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />
<div class="col-md-6">
	<div class="note note-success">Informasi Resi</div>
	<?php 
    $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        
        [
            'name' => 'pengirimanID',
            'type' => 'raw',
            'value' => empty($model->pengirimanID) ? '-' : $model->pengirimanID,
        ],	
        
        [
            'name' => 'connoteID',
            'type' => 'raw',
            'value' => empty($model->connote->nomer) ? '-' : $model->connote->nomer."<br /><small style='font-size:11px; color:#aaaaaa;'>".$model->connote->kantor->fullnama."</h6>",
        ],	
        
        [
            'name' => 'origin_kantorID',
            'type' => 'raw',
            'value' => empty($model->originKantor->fullnama) ? '-' : $model->originKantor->fullnama,
        ],	
        
        [
            'name' => 'destination_kantorID',
            'type' => 'raw',
            'value' => empty($model->destinationKantor->fullnama) ? '-' : $model->destinationKantor->fullnama,
        ],	
        
        [
            'name' => 'transit_kantorID',
            'type' => 'raw',
            'value' => empty($model->transitKantor->fullnama) ? '-' : $model->transitKantor->fullnama,
        ],	
        
        [
            'name' => 'pengiriman_viaID',
            'type' => 'raw',
            'value' => empty($model->pengirimanVia->nama) ? '-' : $model->pengirimanVia->nama,
        ],	
        
        [
            'name' => 'jenis_serviceID',
            'type' => 'raw',
            'value' => empty($model->jenisService->nama) ? '-' : $model->jenisService->nama,
        ],	
        
        [
            'name' => 'jenis_barangID',
            'type' => 'raw',
            'value' => empty($model->jenisBarang->nama) ? '-' : $model->jenisBarang->nama,
        ],	
        
        [
            'name' => 'instruksi',
            'type' => 'raw',
            'value' => empty($model->instruksi) ? '-' : $model->instruksi,
        ],	
        
        [
            'name' => 'deskripsi',
            'type' => 'raw',
            'value' => empty($model->deskripsi) ? '-' : $model->deskripsi,
        ],	
        
        [
            'name' => 'is_cash',
            'type' => 'raw',
            'value' => empty($model->is_cash) ? '-' : Pengiriman::model()->cara_pembayaran($model->is_cash),
        ],		
        ),
    )); 
    
    ?>
    
    <br />
    <div class="note note-success">Detail Pengiriman Barang</div>
    <h6>Under Contructed</h6>

    <br />
    <div class="note note-success">Total Biaya</div>
    <h6>Under Contructed</h6>
</div>
<div class="col-md-6">
	<div class="note note-success">Pengirim</div>
    <?php 
    $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(        
        [
            'name' => 'pengirim_no_identitas',
            'type' => 'raw',
            'value' => empty($model->pengirim_no_identitas) ? '-' : $model->pengirim_no_identitas,
        ],	
        
        [
            'name' => 'pengirim_nama',
            'type' => 'raw',
            'value' => empty($model->pengirim_nama) ? '-' : $model->pengirim_nama,
        ],	
        
        [
            'name' => 'pengirim_alamat',
            'type' => 'raw',
            'value' => empty($model->pengirim_alamat) ? '-' : $model->pengirim_alamat,
        ],	
        
        [
            'name' => 'pengirim_telepon',
            'type' => 'raw',
            'value' => empty($model->pengirim_telepon) ? '-' : $model->pengirim_telepon,
        ],	
        ),
    )); 
    
    ?>
    
	<div class="note note-success">Penerima</div>
    <?php 
	$kelurahan=Kelurahan::model()->findByPk($model->penerima_kelurahanID);
	
    $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        
        [
            'name' => 'penerima_nama',
            'type' => 'raw',
            'value' => empty($model->penerima_nama) ? '-' : $model->penerima_nama,
        ],	
        
        [
            'name' => 'penerima_telepon',
            'type' => 'raw',
            'value' => empty($model->penerima_telepon) ? '-' : $model->penerima_telepon,
        ],	
        
        [
            'name' => 'penerima_negaraID',
            'type' => 'raw',
            'value' => empty($kelurahan->kecamatan->kabupaten->propinsi->negara->nama) ? '-' : $kelurahan->kecamatan->kabupaten->propinsi->negara->nama,
        ],	
        
        [
            'name' => 'penerima_propinsiID',
            'type' => 'raw',
            'value' => empty($kelurahan->kecamatan->kabupaten->propinsi->nama) ? '-' : $kelurahan->kecamatan->kabupaten->propinsi->nama,
        ],	
        
        [
            'name' => 'penerima_kabupatenID',
            'type' => 'raw',
            'value' => empty($kelurahan->kecamatan->kabupaten->nama) ? '-' : $kelurahan->kecamatan->kabupaten->nama,
        ],	
        
        [
            'name' => 'penerima_kecamatanID',
            'type' => 'raw',
            'value' => empty($kelurahan->kecamatan->nama) ? '-' : $kelurahan->kecamatan->nama,
        ],	
        
        [
            'name' => 'penerima_kelurahanID',
            'type' => 'raw',
            'value' => empty($kelurahan->nama) ? '-' : $kelurahan->nama,
        ],	
        
        [
            'name' => 'penerima_alamat',
            'type' => 'raw',
            'value' => empty($model->penerima_alamat) ? '-' : $model->penerima_alamat,
        ],	
        ),
    )); 
    
    ?>
</div>