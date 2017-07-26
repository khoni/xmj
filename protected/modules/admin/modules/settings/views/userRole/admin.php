<?php
$this->breadcrumbs=array(
	'User Role'=>array('index'),
	'Manage',
);
 ?>
<h1>Manage User Role</h1>
<hr />

<?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'user-role-grid',
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
                'userID',
'status',
'updated_at',
'updated_by',
                array(
                    'class'=>'booster.widgets.TbButtonColumn',
                ),
    ),
    )); 
?>
