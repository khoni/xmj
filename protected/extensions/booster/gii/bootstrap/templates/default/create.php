<?php
echo "<?php\n";
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Create',
);\n";
?>

?>

<?php echo "<?php \n"; ?>
    echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<h2>Create</h2>
<hr />

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
