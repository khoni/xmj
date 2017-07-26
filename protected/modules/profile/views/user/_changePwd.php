<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
            'id' => 'user-form',
            'type' => 'horizontal',
            //'enableAjaxValidation' => true,
            //'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions' => array(
                'role' => 'form'
            )
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<?php //echo $form->textFieldGroup($model, 'username', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 64)))); ?>
<?php echo $form->passwordFieldGroup($model, 'current_password', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16)))); ?>                        
<?php echo $form->passwordFieldGroup($model, 'new_password', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16)))); ?>
<?php echo $form->passwordFieldGroup($model, 'retype_new_password', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 16)))); ?>                        
<?php //echo $form->passwordFieldGroup($model, 'password', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 1024)))); ?>

<div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'id' => 'btn-changePwd',
            'url' => $this->createUrl('profile/change_password/id/' . Yii::app()->user->id),
            'buttonType' => 'ajaxSubmit',
            'context' => 'primary',
            'label' => 'Submit',
            'ajaxOptions' => array(
                'success' => 'function(data){
                    var obj = $.parseJSON(data); 
                    $.pnotify(obj);

                }'
            ),
        ));
        ?>                                
        <?php
        /*
          $this->widget('booster.widgets.TbButton', array(
          'buttonType' => 'submit',
          'context' => 'primary',
          'label' => $changePassword->isNewRecord ? 'Create' : 'Save',
          'htmlOptions'=>array(
          //'class'=>'btn green'
          )
          ));
         * 
         */
        ?>
    </div>
</div>

<?php $this->endWidget(); ?>