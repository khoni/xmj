<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'id' => 'user-role-form',
	'type' => 'vertical',
	'clientOptions' => array(
		'validateOnSubmit' => true,
	),
	'htmlOptions' => array(
		'role' => 'form'
	),
));
?>
<br />
<?php //echo $form->errorSummary($model); ?>
<?php
$user_id = Yii::app()->user->id;
$roleUser = UserRole::model()->findAll(array('condition' => "userID='$user_id'"));
$arrRoleUser = array();
foreach ($roleUser as $data) {
    $arrRoleUser[] = $data->roleID;
    //echo $data->role_id;
}

$criteriaRole = new CDbCriteria();
$criteriaRole->addInCondition("roleID", $arrRoleUser);

//echo $form->dropDownListGroup($model, 'role_id', CHtml::listData(Role::model()->findAll($criteriaRole), 'id', 'label'), array('prompt'=>'Pilih Role',));
echo $form->dropDownListGroup(
	$model,
	'roleID',
	array(
		'wrapperHtmlOptions' => array(
			'class' => 'col-sm-5',
		),
		'widgetOptions' => array(
			'data' => CHtml::listData(Role::model()->findAll($criteriaRole), 'roleID', 'nama'),//array('Something ...', '1', '2', '3', '4', '5'),
			'htmlOptions' => array(),
		)
	)
);
?>

<div class="form-group">
    <div class="">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'id' => 'btn-changeRole',
            'url' => $this->createUrl('/profile/user/change_role/'),
            'buttonType' => 'ajaxSubmit',
            'context' => 'primary',
            'label' => 'Ganti Role',
            'ajaxOptions' => array(
                'success' => 'function(data){
                    var obj = $.parseJSON(data); 
                    if(obj.type=="success"){
                        alert("Role anda berhasil diubah!");
                        window.location="";
                    }else{
                        $.pnotify(obj);
                    }

                }'
            ),
        ));
        ?> 
    </div>
</div>

<?php $this->endWidget(); ?>