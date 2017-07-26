<?php
$this->breadcrumbs=array(
	'Jenis Barang'=>array('index'),
	$model->jenis_barangID=>array('view','id'=>$model->jenis_barangID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">JenisBarang :  <?php echo $model->jenis_barangID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$model->jenis_barangID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>