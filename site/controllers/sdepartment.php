<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1
* @package		OM Helpdesk
* @subpackage	Departments
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
* Omhelpdesk Sdepartment Controller
*
* @package	Omhelpdesk
* @subpackage	Sdepartment
*/
class OmhelpdeskCkControllerSdepartment extends OmhelpdeskClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'sdepartment';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'sdepartment';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'sdepartments';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		parent::__construct($config);
		$app = JFactory::getApplication();

	}

	/**
	* Method to add an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function add()
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::add();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				), array(
			
				));
				break;

			case 'modal.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				));
				break;
		}
	}

	/**
	* Method to cancel an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	*
	* @return	void
	*/
	public function cancel($key = null)
	{
		$this->_result = $result = parent::cancel();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'deppartment.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartments.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartments.default'
				));
				break;
		}
	}

	/**
	* Method to edit an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	* @param	string	$urlVar	The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	*
	* @return	void
	*/
	public function edit($key = null, $urlVar = null)
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::edit();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				), array(
			
				));
				break;

			case 'modal.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				));
				break;
		}
	}

	/**
	* Return the current layout.
	*
	* @access	protected
	* @param	bool	$default	If true, return the default layout.
	*
	* @return	string	Requested layout or default layout
	*/
	protected function getLayout($default = null)
	{
		if ($default === 'edit')
			return 'deppartment';

		if ($default)
			return 'deppartment';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'deppartment', 'CMD');
	}

	/**
	* Method to save an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	* @param	string	$urlVar	The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	*
	* @return	void
	*/
	public function save($key = null, $urlVar = null)
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		//Check the ACLs
		$model = $this->getModel();
		$item = $model->getItem();
		$result = false;
		if ($model->canEdit($item, true))
		{
			$result = parent::save();
			//Get the model through postSaveHook()
			if ($this->model)
			{
				$model = $this->model;
				$item = $model->getItem();	
			}
		}
		else
			JError::raiseWarning( 403, JText::sprintf('ACL_UNAUTORIZED_TASK', JText::_('OMHELPDESK_JTOOLBAR_SAVE')) );

		$this->_result = $result;

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'deppartment.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartments.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'deppartment.apply':
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartment.deppartment'
				), array(
					'cid[]' => $model->getState('sdepartment.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_omhelpdesk.sdepartments.default'
				));
				break;
		}
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskControllerSdepartment')){ class OmhelpdeskControllerSdepartment extends OmhelpdeskCkControllerSdepartment{} }

