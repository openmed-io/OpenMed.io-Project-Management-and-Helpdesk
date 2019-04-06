<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	OM Helpdesk
* @copyright	
* @author		Marcin Krasucki - openmed.io - marcin.krasucki@at@intuigo.pl
* @license		GNU GPL
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');



?>

<?php
// Initialize variables
$field = $displayData['field'];
?>

<?php if (OmhelpdeskHelperForm::canView($field)): ?>

	<?php if ($field->hidden): ?>
		<?php echo $field->input; ?>

	<?php else: ?>
		<div class="control-group field-<?php echo $field->id . $field->responsive; ?>">

			<div class="control-label">
				<?php echo $field->label; ?>
			</div>

			<?php $selectors = (($field->type == 'Editor') ? ' style="clear: both; margin: 0;"' : ''); ?>
			<div class="controls"<?php echo $selectors; ?>>
				<?php echo $field->input; ?>
			</div>

		</div>

		<?php echo(OmhelpdeskHelperHtmlValidator::loadValidator($field)); ?>

	<?php endif; ?>


<?php endif; ?>