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
* HTML View class for the Omhelpdesk component
*
* @package	Omhelpdesk
* @subpackage	Ticket
*/
class OmhelpdeskCkViewTicket extends OmhelpdeskClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('ticket', 'ticketpublic');

	/**
	* Execute and display a template : Ticket
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayTicket($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.ticket');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= OmhelpdeskHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('OMHELPDESK_LAYOUT_TICKET'), $this->item, 'done');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the form (prevent from direct access)
		if (!$model->canEdit($item, true))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('ticket.save', "OMHELPDESK_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('ticket.save2new', "OMHELPDESK_JTOOLBAR_SAVE_NEW");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('ticket.apply', "OMHELPDESK_JTOOLBAR_SAVE");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('ticket.save2copy', "OMHELPDESK_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('ticket.cancel', "OMHELPDESK_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();
		$model_requester = CkJModel::getInstance('Requestors', 'OmhelpdeskModel');
		$model_requester->addGroupOrder("a.requesters_name");
		$lists['fk']['requester'] = $model_requester->getItems();

		$model_category = CkJModel::getInstance('Categories', 'OmhelpdeskModel');
		$model_category->addGroupOrder("a.desciption");
		$lists['fk']['category'] = $model_category->getItems();

		$model_pilot = CkJModel::getInstance('Pilots', 'OmhelpdeskModel');
		$model_pilot->addGroupOrder("a.pilots_name");
		$lists['fk']['pilot'] = $model_pilot->getItems();

		$model_sprint = CkJModel::getInstance('Sprints', 'OmhelpdeskModel');
		$model_sprint->addGroupOrder("a.sprint_name");
		$lists['fk']['sprint'] = $model_sprint->getItems();
	}

	/**
	* Execute and display a template : Ticket public
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayTicketpublic($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.ticketpublic');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= OmhelpdeskHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('OMHELPDESK_LAYOUT_TICKET_PUBLIC'), $this->item, 'done');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the form (prevent from direct access)
		if (!$model->canEdit($item, true))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('ticket.save', "OMHELPDESK_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('ticket.cancel', "OMHELPDESK_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();
		$model_category = CkJModel::getInstance('Categories', 'OmhelpdeskModel');
		$model_category->addGroupOrder("a.desciption");
		$lists['fk']['category'] = $model_category->getItems();
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskViewTicket')){ class OmhelpdeskViewTicket extends OmhelpdeskCkViewTicket{} }

