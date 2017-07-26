<?php
$this->breadcrumbs=array(
	'Biaya Pusat'=>array('index'),
	$model->biaya_pusatID=>array('view','id'=>$model->biaya_pusatID),
	'Update',
);

?>

<h2>Update Biaya Manajemen<br /><small style="font-size:12px;color:#999999">BiayaPusat :  <?php echo $model->biaya_pusatID; ?></small></h1>
<hr />
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>