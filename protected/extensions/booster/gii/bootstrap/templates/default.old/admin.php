<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n ?>";
?>

<h1>Manage <?php echo $this->class2name($this->modelClass); //echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>
<hr />

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
                echo "'" . $column->name . "',\n";
            }
        }
        if ($count >= 7) {
            echo "\t\t*/\n";
        }
    ?>
                array(
                    'class'=>'booster.widgets.TbButtonColumn',
                ),
    ),
    )); 
?>
