<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div class="ccm-ui">
	<div class="bg-info" style="padding:10px; margin:0px 0px 20px 0px;">
		<?php  echo t("Type in the Location which weather you want to display (e.g. Austin, TX – or – Berlin, Germany)"); ?>
	</div>
	
	<?php $form = Loader::helper("form"); ?>
	<?php $fh = Core::make('helper/form/color'); ?>
	
	<?php  echo $form->label('location', t('Location')) ?>
	<?php  echo $form->text('location', $location); ?> 
	<br>
	<?php  echo $form->label('showLocation', t('Show location in frontend')) ?>
	<?php  echo $form->checkbox('showLocation', 0, $showLocation); ?>
	<br><br>
	<?php  echo $form->label('size', t('Font size of temperature and icon in px')) ?>
	<?php  echo $form->number('size', $size, array("type" => "number")); ?> 
	<br><br>
	<?php  echo $form->label('color', t('Color of temperature and icon')) ?>
	<?php  echo $form->hidden('color') ?>
	<?php  echo $fh->output("color", $color);  ?>
	<br><br><br>
	
	<?php  echo $form->label('unit', t('Unit of temperature')) ?>
	<?php  echo $form->select('unit', array("c" => "c", "f" => "f"), $unit); ?> 
	<br><br>	
</div>