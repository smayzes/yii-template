<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_provider'); ?>
		<?php echo $form->textField($model,'social_provider',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'social_provider'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_identifier'); ?>
		<?php echo $form->textField($model,'social_identifier',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'social_identifier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'social_avatar'); ?>
		<?php echo $form->textField($model,'social_avatar',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'social_avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cts'); ?>
		<?php echo $form->textField($model,'cts'); ?>
		<?php echo $form->error($model,'cts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mts'); ?>
		<?php echo $form->textField($model,'mts'); ?>
		<?php echo $form->error($model,'mts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->