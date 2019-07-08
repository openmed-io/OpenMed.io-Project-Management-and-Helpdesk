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
* Omhelpdesk List Model
*
* @package	Omhelpdesk
* @subpackage	Classes
*/
class OmhelpdeskCkModelTickets extends OmhelpdeskClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'ticket';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'ticket';

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
		//Define the sortables fields (in lists)
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.done', 'done',
				'a.title', 'title',
				'a.creation_date', 'creation_date',
				'_requester_.requesters_name', 'requester.requesters_name',
				'_category_.category', 'category.category',
				'_pilot_pilots_username_.name', 'pilot.pilots_username.name',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'pilot_team' => 'cmd',
			'pilot' => 'cmd',
			'sprint' => 'cmd',
			'requester_department' => 'cmd',
			'done' => 'cmd',
			'finish_date_n_time_from' => 'varchar',
			'finish_date_n_time_to' => 'varchar',
			'overtime' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('created_by', // name
			'.users', // foreignModelClass
			'created_by', // localKey
			'id' // foreignKey
		);

		$this->hasOne('modified_by', // name
			'.users', // foreignModelClass
			'modified_by', // localKey
			'id' // foreignKey
		);

		$this->hasOne('category', // name
			'categories', // foreignModelClass
			'category', // localKey
			'id' // foreignKey
		);

		$this->hasOne('sprint', // name
			'sprints', // foreignModelClass
			'sprint', // localKey
			'id' // foreignKey
		);

		$this->hasOne('pilot', // name
			'pilots', // foreignModelClass
			'pilot', // localKey
			'id' // foreignKey
		);

		$this->hasOne('requester', // name
			'requestors', // foreignModelClass
			'requester', // localKey
			'id' // foreignKey
		);
	}

	/**
	* Method to get the layout (including default).
	*
	* @access	public
	*
	* @return	string	The layout alias.
	*/
	public function getLayout()
	{
		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'default', 'STRING');
	}

	/**
	* Method to get a store id based on model configuration state.
	* 
	* This is necessary because the model is used by the component and different
	* modules that might need different sets of data or differen ordering
	* requirements.
	*
	* @access	protected
	* @param	string	$id	A prefix for the store id.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function getStoreId($id = '')
	{
		// Compile the store id.

		$id	.= ':'.$this->getState('sortTable');
		$id	.= ':'.$this->getState('directionTable');
		$id	.= ':'.$this->getState('limit');
		$id	.= ':'.$this->getState('search.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.pilot_team');
		$id	.= ':'.$this->getState('filter.pilot');
		$id	.= ':'.$this->getState('filter.sprint');
		$id	.= ':'.$this->getState('filter.requester_department');
		$id	.= ':'.$this->getState('filter.done');
		$id	.= ':'.$this->getState('filter.finish_date_n_time');
		$id	.= ':'.$this->getState('filter.overtime');
		return parent::getStoreId($id);
	}

	/**
	* Predefined query for the search plugin.
	*
	* @access	protected
	*
	*
	* @since	Cook 3.1.4
	*
	* @return	void
	*/
	protected function ormSearchPlugin()
	{
		$method = $this->getState('search.plugin.method');
		$ordering = $this->getState('search.plugin.ordering');

		switch ( $ordering )
		{
			// Oldest first
			case 'oldest':
				$orderField = 'a.creation_date';
				$orderDir = 'ASC';
				break;

			// Newest first
			case 'newest':
				$orderField = 'a.creation_date';
				$orderDir = 'DESC';
				break;

			//Alphabetic, ascending
			case 'alpha':
			default:
				$orderField = 'a.done';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'done' => 'title',
				"{done} {title} {pilot.pilots_name}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{done} {title} {pilot.pilots_name}' => $method,
					),
				),
			),
			'order' => array(
				$orderField => $orderDir
			),
		));
	}

	/**
	* Populate the required fields for the search plugin.
	*
	* @access	protected
	* @param	object	&$item	The object to populate.
	*
	* @return	void
	*/
	protected function populateSearchResult(&$item)
	{
		$item->section = JText::_('OMHELPDESK') . ' - ' . JText::_('OMHELPDESK_VIEW_TICKET');
		$item->href = $this->getRoute($item->id);
	}

	/**
	* Preparation of the list query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	*
	* @return	void
	*/
	protected function prepareQuery(&$query)
	{
		//FROM : Main table
		$query->from('#__omhelpdesk_tickets AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'category',
					'category.category',
					'creation_date',
					'done',
					'pilot',
					'pilot.pilots_username',
					'pilot.pilots_username.name',
					'requester',
					'requester.requesters_name',
					'sprint',
					'sprint.sprint_name',
					'title'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'sprint.sprint_name' => 'ASC'
				));
				break;

			case 'layout.timereport':

				$this->orm->select(array(
					'done',
					'finish_date_n_time',
					'hours_of_work',
					'overtime',
					'title'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'done'
				));
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);
				break;
		}

		// SELECT required fields for all profiles
		$this->orm->select(array(
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Search
		$this->orm->search('search', array(
			'on' => array(
				'title' => 'like',
				'pilot.pilots_name' => 'like'
			)
		));

		//WHERE - FILTER : Publish state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
		{
			$allowAuthor = '';
			if (($published == 1) && !$acl->get('core.edit.state')) //ACL Limit to publish = 1
			{
				//Allow the author to see its own unpublished/archived/trashed items
				if ($acl->get('core.edit.own') || $acl->get('core.view.own'))
					$allowAuthor = ' OR a.created_by = ' . (int)JFactory::getUser()->get('id');
			}
			$query->where('(a.published = ' . (int) $published . $allowAuthor . ')');
		}
		elseif (!$published)
		{
			$query->where('(a.published = 0 OR a.published = 1 OR a.published IS NULL)');
		}

		// FILTER : Team
		if($filter_pilot_team = $this->getState('filter.pilot_team'))
		{
			$this->addJoin("`#__omhelpdesk_pilots` AS _pilot_ ON _pilot_.id = a.pilot", 'LEFT');
			if ($filter_pilot_team > 0){
				$this->addWhere("_pilot_.team = " . (int)$filter_pilot_team);
			}
		}

		// FILTER : Assigned to
		if($filter_pilot = $this->getState('filter.pilot'))
		{
			if ($filter_pilot > 0){
				$this->addWhere("a.pilot = " . (int)$filter_pilot);
			}
		}

		// FILTER : Sprint
		if($filter_sprint = $this->getState('filter.sprint'))
		{
			if ($filter_sprint > 0){
				$this->addWhere("a.sprint = " . (int)$filter_sprint);
			}
		}

		// FILTER : Department
		if($filter_requester_department = $this->getState('filter.requester_department'))
		{
			$this->addJoin("`#__omhelpdesk_requestors` AS _requester_ ON _requester_.id = a.requester", 'LEFT');
			if ($filter_requester_department > 0){
				$this->addWhere("_requester_.department = " . (int)$filter_requester_department);
			}
		}

		// FILTER : Done
		$filter_done = $this->getState('filter.done');

		if ($filter_done !== null){
			$this->addWhere("a.done = " . (int)$filter_done);
		}

		// FILTER (Range) : Finish date n time
		if($filter_finish_date_n_time_from = $this->getState('filter.finish_date_n_time_from'))
		{
			if ($filter_finish_date_n_time_from !== null){
				$this->addWhere("a.finish_date_n_time >= " . $this->_db->Quote($filter_finish_date_n_time_from));
			}
		}

		// FILTER (Range) : Finish date n time
		if($filter_finish_date_n_time_to = $this->getState('filter.finish_date_n_time_to'))
		{
			if ($filter_finish_date_n_time_to !== null){
				$this->addWhere("a.finish_date_n_time <= " . $this->_db->Quote($filter_finish_date_n_time_to));
			}
		}

		// FILTER : Overtime
		$filter_overtime = $this->getState('filter.overtime');

		if ($filter_overtime !== null){
			$this->addWhere("a.overtime = " . (int)$filter_overtime);
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'done');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}


}

// Load the fork
OmhelpdeskHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('OmhelpdeskModelTickets')){ class OmhelpdeskModelTickets extends OmhelpdeskCkModelTickets{} }

