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



/**
* Form field for Omhelpdesk.
*
* @package	Omhelpdesk
* @subpackage	Form
*/
class OmhelpdeskCkClassFormFieldModal extends JFormField
{
	/**
	* The modal height in pixels
	*
	* @var integer
	*/
	protected $height = 450;

	/**
	* The modal width in pixels
	*
	* @var integer
	*/
	protected $width = 400;

	/**
	* Method to get the field input markup.
	*
	* @access	protected
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	protected function getInput()
	{
		$dom = JDom::getInstance();
		$dom->set('extension', 'com_omhelpdesk');


		$html =  JDom::_('html.form.input.select.modalpicker', array(
			'dataKey' => $this->id,
			'domName' => $this->name,
			'dataValue' => $this->value,
			'nullLabel' => $this->_nullLabel,
			'title' => $this->_title,

			'width' => $this->width,
			'height' => $this->height,

			'route' => array(
				'option' => $this->_option,
				'view' => $this->_view,
				'layout' => 'modal',
				'object' => $this->id

			),

			'tasks' => $this->getTasks(),

		));

		return $html;
	}

	/**
	* Method to extend the buttons in the picker.
	*
	* @access	protected
	*
	*
	* @since	Cook 2.5.8
	*
	* @return	array	An array of tasks
	*/
	protected function getTasks()
	{
		return array();

	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskClassFormFieldModal')){ class OmhelpdeskClassFormFieldModal extends OmhelpdeskCkClassFormFieldModal{} }

