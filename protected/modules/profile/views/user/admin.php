<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	'Manage',
);
 ?>
<h1>Manage User</h1>
<hr />

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'user-grid',
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
                array(
                    'header' => 'No.',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                ),    
                'username',
'password',
'name',
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                ),
    ),
    )); 
?>
