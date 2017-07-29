<?php
$this->breadcrumbs=array(
	'Sub Agen'=>array('index'),
	'Create',
);

?>

<?php 
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<h2>Create</h2>
<hr />

<?php echo $this->renderPartial('_form', array('user'=>$user)); ?>