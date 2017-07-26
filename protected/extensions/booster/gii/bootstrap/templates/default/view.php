<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

?>

<h2>View<br /><small style="font-size:12px;color:#999999"><?php echo $this->modelClass ." : " . " <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></small></h1>
<hr />
<?php echo "<?php \n"; ?>
	echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison'));
	echo CHtml::link('update',array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),array('class'=>'btn btn-sm blue'));
	echo CHtml::link('Manage',array('index'),array('class'=>'btn btn-sm yellow'));
?>

<div class="row"></div>
<br />

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	<?php
    foreach ($this->tableSchema->columns as $column) {
	//echo "\t\t'" . $column->name . "',\n";
	echo "
    [
    	'name' => '".$column->name."',
    	'type' => 'raw',
    	'value' => empty(\$model->".$column->name.") ? '-' : \$model->".$column->name.",
    ],	
	";
	}
	?>
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
