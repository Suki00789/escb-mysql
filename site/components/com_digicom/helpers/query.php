<?php
/**
 * @package		DigiCom
 * @author 		ThemeXpert http://www.themexpert.com
 * @copyright	Copyright (c) 2010-2015 ThemeXpert. All rights reserved.
 * @license 	GNU General Public License version 3 or later; see LICENSE.txt
 * @since 		1.0.0
 */

defined('_JEXEC') or die;

/**
 * Content Component Query Helper
 *
 * @since  1.5
 */
class DigiComSiteHelperQuery
{
	/**
	 * Translate an order code to a field for primary category ordering.
	 *
	 * @param   string  $orderby  The ordering code.
	 *
	 * @return  string  The SQL field(s) to order by.
	 *
	 * @since   1.5
	 */
	public static function orderbyPrimary($orderby)
	{
		switch ($orderby)
		{
			case 'alpha' :
				$orderby = 'c.path, ';
				break;

			case 'ralpha' :
				$orderby = 'c.path DESC, ';
				break;

			case 'order' :
				$orderby = 'c.lft, ';
				break;

			default :
				$orderby = '';
				break;
		}

		return $orderby;
	}

	/**
	 * Translate an order code to a field for secondary category ordering.
	 *
	 * @param   string  $orderby    The ordering code.
	 * @param   string  $orderDate  The ordering code for the date.
	 *
	 * @return  string  The SQL field(s) to order by.
	 *
	 * @since   1.5
	 */
	public static function orderbySecondary($orderby, $orderDate = 'created')
	{
		$queryDate = self::getQueryDate($orderDate);

		switch ($orderby)
		{
			case 'date' :
				$orderby = $queryDate;
				break;

			case 'rdate' :
				$orderby = $queryDate . ' DESC ';
				break;

			case 'alpha' :
				$orderby = 'a.title';
				break;

			case 'ralpha' :
				$orderby = 'a.title DESC';
				break;

			case 'hits' :
				$orderby = 'a.hits DESC';
				break;

			case 'rhits' :
				$orderby = 'a.hits';
				break;

			case 'order' :
				$orderby = 'a.ordering';
				break;

			case 'author' :
				$orderby = 'author';
				break;

			case 'rauthor' :
				$orderby = 'author DESC';
				break;

			case 'front' :
				$orderby = 'a.featured DESC, a.ordering, ' . $queryDate . ' DESC ';
				break;

			default :
				$orderby = 'a.ordering';
				break;
		}

		return $orderby;
	}

	/**
	 * Translate an order code to a field for secondary category ordering.
	 *
	 * @param   string  $orderby    The ordering code.
	 * @param   string  $orderDate  The ordering code for the date.
	 *
	 * @return  string  The SQL field(s) to order by.
	 *
	 * @since   1.5
	 */
	public static function orderbyDownload($orderby, $orderDate = 'created', $select='p', $name='name')
	{
		$queryDate = self::getQueryDate($orderDate, 'p');

		switch ($orderby)
		{
			case 'date' :
				$orderby = $queryDate;
				break;

			case 'rdate' :
				$orderby = $queryDate . ' DESC ';
				break;

			case 'alpha' :
				$orderby = $select.'.'.$name.' ASC';
				break;

			case 'ralpha' :
				$orderby = $select.'.'.$name.' DESC';
				break;

			case 'hits' :
				$orderby = $select.'.hits DESC';
				break;

			case 'rhits' :
				$orderby = $select.'.hits';
				break;

			case 'order' :
				$orderby = $select.'.ordering DESC';
				break;

			case 'author' :
				$orderby = 'author';
				break;

			case 'rauthor' :
				$orderby = 'author DESC';
				break;

			default :
				$orderby = $select.'.ordering';
				break;
		}

		return $orderby;
	}
	/**
	 * Translate an order code to a field for primary category ordering.
	 *
	 * @param   string  $orderDate  The ordering code.
	 *
	 * @return  string  The SQL field(s) to order by.
	 *
	 * @since   1.6
	 */
	public static function getQueryDate($orderDate, $select='a')
	{
		$db = JFactory::getDbo();

		switch ($orderDate)
		{
			case 'modified' :
				$queryDate = ' CASE WHEN '.$select.'.modified = ' . $db->quote($db->getNullDate()) . ' THEN '.$select.'.created ELSE '.$select.'.modified END';
				break;

			// Use created if publish_up is not set
			case 'published' :
				$queryDate = ' CASE WHEN '.$select.'.publish_up = ' . $db->quote($db->getNullDate()) . ' THEN '.$select.'.created ELSE '.$select.'.publish_up END ';
				break;

			case 'created' :
			default :
				$queryDate = ' '.$select.'.created ';
				break;
		}

		return $queryDate;
	}

	/**
	 * Get join information for the voting query.
	 *
	 * @param   \Joomla\Registry\Registry  $params  An options object for the Product.
	 *
	 * @return  array  A named array with "select" and "join" keys.
	 *
	 * @since   1.5
	 */
	public static function buildVotingQuery($params = null)
	{
		if (!$params)
		{
			$params = JComponentHelper::getParams('com_content');
		}

		$voting = $params->get('show_vote');

		if ($voting)
		{
			// Calculate voting count
			$select = ' , ROUND(v.rating_sum / v.rating_count) AS rating, v.rating_count';
			$join = ' LEFT JOIN #__digicom_products_rating AS v ON a.id = v.content_id';
		}
		else
		{
			$select = '';
			$join = '';
		}

		$results = array ('select' => $select, 'join' => $join);

		return $results;
	}

	/**
	 * Method to order the intro products array for ordering
	 * down the columns instead of across.
	 * The layout always lays the introtext products out across columns.
	 * Array is reordered so that, when products are displayed in index order
	 * across columns in the layout, the result is that the
	 * desired Product ordering is achieved down the columns.
	 *
	 * @param   array    &$products   Array of intro text products
	 * @param   integer  $numColumns  Number of columns in the layout
	 *
	 * @return  array  Reordered array to achieve desired ordering down columns
	 *
	 * @since   1.6
	 */
	public static function orderDownColumns(&$products, $numColumns = 1)
	{
		$count = count($products);

		// Just return the same array if there is nothing to change
		if ($numColumns == 1 || !is_array($products) || $count <= $numColumns)
		{
			$return = $products;
		}
		// We need to re-order the intro products array
		else
		{
			// We need to preserve the original array keys
			$keys = array_keys($products);

			$maxRows = ceil($count / $numColumns);
			$numCells = $maxRows * $numColumns;
			$numEmpty = $numCells - $count;
			$index = array();

			// Calculate number of empty cells in the array

			// Fill in all cells of the array
			// Put -1 in empty cells so we can skip later
			for ($row = 1, $i = 1; $row <= $maxRows; $row++)
			{
				for ($col = 1; $col <= $numColumns; $col++)
				{
					if ($numEmpty > ($numCells - $i))
					{
						// Put -1 in empty cells
						$index[$row][$col] = -1;
					}
					else
					{
						// Put in zero as placeholder
						$index[$row][$col] = 0;
					}

					$i++;
				}
			}

			// Layout the products in column order, skipping empty cells
			$i = 0;

			for ($col = 1; ($col <= $numColumns) && ($i < $count); $col++)
			{
				for ($row = 1; ($row <= $maxRows) && ($i < $count); $row++)
				{
					if ($index[$row][$col] != - 1)
					{
						$index[$row][$col] = $keys[$i];
						$i++;
					}
				}
			}

			// Now read the $index back row by row to get products in right row/col
			// so that they will actually be ordered down the columns (when read by row in the layout)
			$return = array();
			$i = 0;

			for ($row = 1; ($row <= $maxRows) && ($i < $count); $row++)
			{
				for ($col = 1; ($col <= $numColumns) && ($i < $count); $col++)
				{
					$return[$keys[$i]] = $products[$index[$row][$col]];
					$i++;
				}
			}
		}

		return $return;
	}
}
