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
* @subpackage	Tickets
*/
class OmhelpdeskCkViewTickets extends OmhelpdeskClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'timereport', 'modal');

	/**
	* Execute and display a template : Tickets
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDefault($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_omhelpdesk', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= OmhelpdeskHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = OmhelpdeskHelper::addSubmenu('tickets', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('OMHELPDESK_LAYOUT_TICKETS'));

		

		//Filters
		// Team
		$modelPilot_team = CkJModel::getInstance('teams', 'OmhelpdeskModel');
		$modelPilot_team->set('context', $model->get('context'));
		$filters['filter_pilot_team']->jdomOptions = array(
			'list' => $modelPilot_team->getItems()
		);

		// Pilot
		$modelPilot = CkJModel::getInstance('pilots', 'OmhelpdeskModel');
		$modelPilot->set('context', $model->get('context'));
		$filters['filter_pilot']->jdomOptions = array(
			'list' => $modelPilot->getItems()
		);

		// Sprint
		$modelSprint = CkJModel::getInstance('sprints', 'OmhelpdeskModel');
		$modelSprint->set('context', $model->get('context'));
		$filters['filter_sprint']->jdomOptions = array(
			'list' => $modelSprint->getItems()
		);

		// Department
		$modelRequester_department = CkJModel::getInstance('sdepartments', 'OmhelpdeskModel');
		$modelRequester_department->set('context', $model->get('context'));
		$filters['filter_requester_department']->jdomOptions = array(
			'list' => $modelRequester_department->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('ticket.add', "OMHELPDESK_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('ticket.edit', "OMHELPDESK_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('tickets.publish', "OMHELPDESK_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('tickets.unpublish', "OMHELPDESK_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('tickets.trash', "OMHELPDESK_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('tickets.archive', "OMHELPDESK_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Tickets
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayModal($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_omhelpdesk', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= OmhelpdeskHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = OmhelpdeskHelper::addSubmenu('tickets', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('OMHELPDESK_LAYOUT_TICKETS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('ticket.add', "OMHELPDESK_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('ticket.edit', "OMHELPDESK_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('tickets.publish', "OMHELPDESK_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('tickets.unpublish', "OMHELPDESK_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('tickets.trash', "OMHELPDESK_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('tickets.archive', "OMHELPDESK_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Time report
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayTimereport($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_omhelpdesk', true);
		$state->set('context', 'layout.timereport');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= OmhelpdeskHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('timereport.filters');
		$this->menu = OmhelpdeskHelper::addSubmenu('tickets', 'timereport');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('OMHELPDESK_LAYOUT_TIME_REPORT'));

		

		//Filters
		// Assigned to
		$modelPilot = CkJModel::getInstance('pilots', 'OmhelpdeskModel');
		$modelPilot->set('context', $model->get('context'));
		$filters['filter_pilot']->jdomOptions = array(
			'list' => $modelPilot->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('timereport')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('ticket.add', "OMHELPDESK_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('ticket.edit', "OMHELPDESK_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('tickets.publish', "OMHELPDESK_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('tickets.unpublish', "OMHELPDESK_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('tickets.trash', "OMHELPDESK_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('tickets.archive', "OMHELPDESK_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Returns an array of fields the table can be sorted by.
	*
	* @access	protected
	* @param	string	$layout	The name of the called layout. Not used yet
	*
	*
	* @since	3.0
	*
	* @return	array	Array containing the field name to sort by as the key and display text as value.
	*/
	protected function getSortFields($layout = null)
	{
		return array(
			'done' => JText::_('OMHELPDESK_FIELD_DONE'),
			'ordering' => JText::_('OMHELPDESK_FIELD_ORDERING'),
			'title' => JText::_('OMHELPDESK_FIELD_TITLE'),
			'creation_date' => JText::_('OMHELPDESK_FIELD_CREATION_DATE'),
			'requester.requesters_name' => JText::_('OMHELPDESK_FIELD_REQUESTER'),
			'category.category' => JText::_('OMHELPDESK_FIELD_CATEGORY'),
			'pilot.pilots_username.name' => JText::_('OMHELPDESK_FIELD_PILOT')
		);
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskViewTickets')){ class OmhelpdeskViewTickets extends OmhelpdeskCkViewTickets{} }

