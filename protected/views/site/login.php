<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>
<section class="bck white padding text-shadow" id="about">
	<div class="container">
		<div class="hero-content">
			<h1>Login</h1>
			<?php 
			if ( Yii::app()->user->hasFlash('register') ) {
				echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('register'));
			}
			?>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
			
				<p class="note">Fields with <span class="required">*</span> are required.</p>
			
				<div class="row">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username'); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>
			
				<div class="row">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password'); ?>
					<?php echo $form->error($model,'password'); ?>
				</div>
				
				<div class="row buttons">
					<?php echo CHtml::submitButton('Login'); ?>
				</div>
			
			<?php $this->endWidget(); ?>
			</div><!-- form -->
		</div>
	</div>
</section>