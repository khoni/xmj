<?php
$this->breadcrumbs=array(
	'Cabang'=>array('index'),
	'Create',
);

?>

<?php 
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<h2>Menambahkan Kantor Pengguna</h2>
<hr />

<?php echo $this->renderPartial('_addkantor', array(
	'user'=>$user,
	'kantor'=>$kantor,
)); ?>