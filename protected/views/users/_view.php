<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_token')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_token), array('view', 'id'=>$data->user_token)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('social_provider')); ?>:</b>
	<?php echo CHtml::encode($data->social_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('social_identifier')); ?>:</b>
	<?php echo CHtml::encode($data->social_identifier); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('social_avatar')); ?>:</b>
	<?php echo CHtml::encode($data->social_avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cts')); ?>:</b>
	<?php echo CHtml::encode($data->cts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mts')); ?>:</b>
	<?php echo CHtml::encode($data->mts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>