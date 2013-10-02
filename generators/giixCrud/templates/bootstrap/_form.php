<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php $ajax = ($this->enable_ajax_validation) ? 'true' : 'false'; ?>

<?php echo '<?php '; ?>
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => '<?php echo $this->class2id($this->modelClass); ?>-form',
	'enableAjaxValidation' => <?php echo $ajax; ?>,
));
<?php echo '?>'; ?>


	<p class="help-block">
		<?php echo "<?php echo Yii::t('app', 'Fields with'); ?> <span class=\"required\">*</span> <?php echo Yii::t('app', 'are required'); ?>"; ?>.
	</p>

	<?php echo "<?php echo \$form->errorSummary(\$model); ?>\n"; ?>

<?php foreach ($this->tableSchema->columns as $column): ?>
<?php if (!$column->autoIncrement): ?>
	<?php echo "<?php echo " . $this->generateActiveControlGroup($this->modelClass, $column) . "; ?>\n"; ?>
<?php endif; ?>
<?php endforeach; ?>

<div class="form-actions">
    <?php echo "<?php echo TbHtml::submitButton(\$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),array(
	    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
	    'size'=>TbHtml::BUTTON_SIZE_LARGE,
	)); ?>\n"; ?>
</div>
<?php echo "<?php \$this->endWidget(); ?>\n"; ?>

</div><!-- form -->