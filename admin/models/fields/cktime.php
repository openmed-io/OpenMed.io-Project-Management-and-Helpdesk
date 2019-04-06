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

if (!class_exists('OmhelpdeskHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_omhelpdesk/helpers/loader.php');


/**
* Form field for Omhelpdesk.
*
* @package	Omhelpdesk
* @subpackage	Form
*/
class OmhelpdeskCkFormFieldCktime extends OmhelpdeskClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'cktime';

	/**
	* Method to get the field input markup.
	*
	* @access	public
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	public function getInput()
	{

		$this->input = JDom::_('html.form.input.clock', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'dataValue' => $this->value,
				'filter' => $this->getOption('filter'),
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'size' => 6,
				'suffix' => $this->getOption('suffix'),
				'timeFormat' => $this->getOption('format'),
				'timezone' => $this->getOption('filter')
			), $this->jdomOptions));

		return parent::getInput();
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldCktime')){ class JFormFieldCktime extends OmhelpdeskCkFormFieldCktime{} }

