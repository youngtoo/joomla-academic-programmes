<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * HelloWorld Form Field class for the HelloWorld component
 *
 * @since  0.0.1
 */
class JFormFieldAcademics extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var         string
	 */
	protected $type = 'Programmes';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,title');
		$query->from('kesra_programmmes');
		$db->setQuery((string) $query);
		$results = $db->loadObjectList();
		$options  = array();

		if ($results)
		{
			foreach ($results as $programme)
			{
				$options[] = JHtml::_('select.option', $programme->id, $programme->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}