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



/**
* Omhelpdesk Controller.
*
* @package	Omhelpdesk
* @subpackage	Controller.
*/
class OmhelpdeskCkController extends OmhelpdeskClassController
{
	/**
	* The default view.
	*
	* @var string
	*/
	protected $default_view = 'cpanel';

	/**
	* Method to display a view.
	*
	* @access	public
	* @param	boolean	$cachable	If true, the view output will be cached.
	* @param	array	$urlparams	An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}..
	*
	*
	* @since	Cook 1.0
	*
	* @return	void
	*/
	public function display($cachable = false, $urlparams = false)
	{
		$jinput = JFactory::getApplication()->input;

		$this->_parentDisplay();

		//If page is called through POST, reconstruct the url
		if ($jinput->getMethod(null, null) == 'POST')
		{
			//Kill the post and rebuild the url
			$this->setRedirect(OmhelpdeskHelper::urlRequest());
			return;
		}

		return $this;
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskController')){ class OmhelpdeskController extends OmhelpdeskCkController{} }

