<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	Tickets
* @copyright	
* @author		Marcin Krasucki - openmed.io - marcin.krasucki@intuigo.pl
* @license		GNU GPL
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');


if (!$this->form)
	return;

$fieldSets = $this->form->getFieldsets();
?>

<?php $fieldSet = $this->form->getFieldset('ticket.form');?>
<fieldset class="fieldsform form-horizontal">

	<?php
	// Title
	$field = $fieldSet['jform_title'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Pilot
	$field = $fieldSet['jform_pilot'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['pilot']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Requester
	$field = $fieldSet['jform_requester'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['requester']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Category
	$field = $fieldSet['jform_category'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['category']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Done
	$field = $fieldSet['jform_done'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Sprint
	$field = $fieldSet['jform_sprint'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['sprint']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Description
	$field = $fieldSet['jform_description'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Attachment
	$field = $fieldSet['jform_attachment'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Hours of work
	$field = $fieldSet['jform_hours_of_work'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Overtime
	$field = $fieldSet['jform_overtime'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Finish date n time
	$field = $fieldSet['jform_finish_date_n_time'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>

</fieldset>