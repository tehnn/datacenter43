<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->username),array('view','id'=>$data->username)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amp')); ?>:</b>
	<?php echo CHtml::encode($data->amp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office')); ?>:</b>
	<?php echo CHtml::encode($data->office); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel')); ?>:</b>
	<?php echo CHtml::encode($data->tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastlogin')); ?>:</b>
	<?php echo CHtml::encode($data->lastlogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countlogin')); ?>:</b>
	<?php echo CHtml::encode($data->countlogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ispermission')); ?>:</b>
	<?php echo CHtml::encode($data->ispermission); ?>
	<br />

	*/ ?>

</div>