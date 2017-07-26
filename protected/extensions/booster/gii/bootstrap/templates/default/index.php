<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label',
);\n";
?>

?>

<h2><?php echo $this->class2name($this->modelClass); //echo $this->pluralize($this->class2name($this->modelClass)); ?><br /><small style="font-size:14px;color:#999999">Manage</small></h2>
<hr />

<?php echo "<?php echo CHtml::link('Create',array('create'),array('class'=>'btn btn-sm blue-madison')); ?> \n" ?>

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
    'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
    'type' => 'hover condensed striped',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'pager' => array(
        'header' => '',
        'htmlOptions' => array(
            'class' => 'pagination'
        )
    ),
    'columns'=>array(
			<?php
	$count = 0;
	foreach ($this->tableSchema->columns as $column) {
		if (++$count == 7) {
			echo "\t\t/*\n";
		}
		if ($column->isPrimaryKey) {
			?>
	array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),    
			<?php
		} else {
		//echo "\t\t'" . $column->name . "',\n";
		echo "
		[
			'name' => '".$column->name."',
			'type' => 'raw',
			//'filter' => CHtml::listData(Role::model()->findAll(),'roleID','nama'),
			'value' => function(\$data){
            	return empty(\$data->".$column->name.") ? '-' : \$data->".$column->name.";
            },
		],		
		";
		}
	}
	if ($count >= 7) {
		echo "\t\t*/\n";
	}
			?>
        array(
            'class'=>'booster.widgets.TbButtonColumn',
            'template' => '{view} {update} {delete}',
			/*
            'buttons' => array(
                'view' => array(
                    'options'=>array("target"=>"_blank"),
                ),
            ),
			*/
        ),
    ),
)); 
?>
