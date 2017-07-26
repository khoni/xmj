<?php
$this->breadcrumbs=array(
	'Sub Agen'=>array('index'),
	$agen_sub->agen_subID=>array('view','id'=>$agen_sub->agen_subID),
	'Update',
);

?>

<h2>Update<br /><small style="font-size:12px;color:#999999">Sub Agen :  <?php echo $agen_sub->agen_subID; ?></small></h1>
<hr />
<?php 
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
    echo CHtml::link('View',array('view','id'=>$agen_sub->agen_subID),array('class'=>'btn btn-sm green-meadow'));
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<?php echo $this->renderPartial('_form',array('user'=>$user)); ?>