<?php
$this->breadcrumbs=array(
	'Cabang'=>array('index'),
	$cabang->cabangID=>array('view','id'=>$cabang->cabangID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Cabang :  <?php echo $cabang->cabangID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$cabang->cabangID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('user'=>$user)); ?>