<?php
/* @var $this SiteController */
/* @var $model Users */
/* @var $form CActiveForm  */
$this->pageTitle=Yii::app()->name . ' - Register';
?>

<section class="bck white padding text-shadow" id="about">
	<div class="container">
		<div class="hero-content">
			<h1>Register</h1>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			
				<div class="row">
					<?php echo $form->labelEx($model,'email'); ?>
					<?php echo $form->textField($model,'email'); ?>
					<?php echo $form->error($model,'email'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password',array('maxlength'=>255)); ?>
			        <?php echo $form->labelEx($model,'repeat_password'); ?>
			        <?php echo $form->passwordField($model,'repeat_password',array('maxlength'=>255)); ?>
					<?php echo $form->error($model,'password'); ?>            
				</div>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton('Register'); ?>
				</div>
			
			<?php $this->endWidget(); ?>
		</div>
	</div>
</section>