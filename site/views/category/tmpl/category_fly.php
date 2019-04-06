<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	Categories
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

<fieldset class="fieldsfly fly-horizontal">
	<legend><?php echo JText::_('OMHELPDESK_FIELDSET_METADATA') ?></legend>

	<div class="control-group field-_created_by_name">
    	<div class="control-label">
			<label><?php echo JText::_( "OMHELPDESK_FIELD_CREATED_BY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_created_by_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-creation_date">
    	<div class="control-label">
			<label><?php echo JText::_( "OMHELPDESK_FIELD_CREATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'creation_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i'
			));?>
		</div>
    </div>
	<div class="control-group field-_modified_by_name">
    	<div class="control-label">
			<label><?php echo JText::_( "OMHELPDESK_FIELD_MODIFIED_BY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_modified_by_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-modification_date">
    	<div class="control-label">
			<label><?php echo JText::_( "OMHELPDESK_FIELD_MODIFICATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'modification_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i'
			));?>
		</div>
    </div>
</fieldset>