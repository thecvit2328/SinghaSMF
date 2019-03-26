<?php
/***********************************************************************************
************************************************************************************
************************************* PHP pagination class ******************************
****************** Ref. http://www.phpsnaps.com/snaps/view/php-pagination-class/ *************

:: Usage::

Simple and raw. No theory, plain code. This is it, PHP pagination class, one of the most wanted snippets for web applications.
How to use it:

Istantiate the class (PHP5 version):

$p = new pagination();

Run the first query to select the number of total rows and call the first function,
with arguments the total rows number, how many rows to show per page and current page number:


$arr = $p->calculate_pages(70, 10, 1);

This function will call the second one in the class to get the surrounding pages of the page
we are requesting.
The returned result should look like this:

Array
(
    [limit] => LIMIT 0,10
    [current] => 1
    [previous] => 1
    [next] => 2
    [last] => 7
    [info] => Page (1 of 7)
    [pages] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => 4
            [4] => 5
        )
)
************************************************************************************/
class pagination
{
	public function __construct()
	{
	}
	public function calculate_pages($total_rows, $rows_per_page, $page_num)
	{
		$arr = array();
		// calculate last page
		$last_page = ceil($total_rows / $rows_per_page);
		// make sure we are within limits
		$page_num = (int) $page_num;
		if ($page_num < 1)
		{
		   $page_num = 1;
		} 
		elseif ($page_num > $last_page)
		{
		   $page_num = $last_page;
		}
		$upto = ($page_num - 1) * $rows_per_page;
		$arr['limit'] = 'LIMIT '.$upto.',' .$rows_per_page;
		$arr['current'] = $page_num;
		if ($page_num == 1)
			$arr['previous'] = $page_num;
		else
			$arr['previous'] = $page_num - 1;
		if ($page_num == $last_page)
			$arr['next'] = $last_page;
		else
			$arr['next'] = $page_num + 1;
		$arr['last'] = $last_page;
		$arr['info'] = 'Page ('.$page_num.' of '.$last_page.')';
		$arr['pages'] = $this->get_surrounding_pages($page_num, $last_page, $arr['next']);
		return $arr;
	}
	
	public function calculate_pages_sorting($total_rows, $rows_per_page, $page_num)
	{
		$arr = array();
		// calculate last page
		$last_page = ceil($total_rows / $rows_per_page);
		// make sure we are within limits
		$page_num = (int) $page_num;
		if ($page_num < 1)
		{
		   $page_num = 1;
		} 
		elseif ($page_num > $last_page)
		{
		   $page_num = $last_page;
		}
		$upto = ($page_num - 1) * $rows_per_page;
		$upto = ($upto == 0) ? $upto : ($upto-1);
		$rows_per_page	=	($page_num>1) ? $rows_per_page+1 : $rows_per_page;
		$arr['limit'] = 'LIMIT '.$upto.',' .$rows_per_page;
		$arr['current'] = $page_num;
		$arr['order'] = ($upto == 0) ? 1 : ($upto+1);
		if ($page_num == 1)
			$arr['previous'] = $page_num;
		else
			$arr['previous'] = $page_num - 1;
		if ($page_num == $last_page)
			$arr['next'] = $last_page;
		else
			$arr['next'] = $page_num + 1;
		$arr['last'] = $last_page;
		$arr['info'] = 'Page ('.$page_num.' of '.$last_page.')';
		$arr['pages'] = $this->get_surrounding_pages($page_num, $last_page, $arr['next']);
		return $arr;
	}
	
	
	function get_surrounding_pages($page_num, $last_page, $next)
	{
		$arr = array();
		$show = ($page_num == 1 || $page_num == $last_page) ? 5 : 3; // how many boxes
		// at first
		if ($page_num == 1)
		{
			
			// case of 1 page only
			if ($next == $page_num) return array(1);
			for ($i = 0; $i < $show; $i++)
			{
				if ($i == $last_page) break;
				array_push($arr, $i + 1);
			}
			return $arr;
		}
		// at last
		if ($page_num == $last_page)
		{
			
			$start = $last_page - $show;
			if ($start < 1) $start = 0;
			for ($i = $start; $i < $last_page; $i++)
			{
				array_push($arr, $i + 1);
			}
			return $arr;
		}
		// at middle
		$start = $page_num - $show;
		if ($start < 1) $start = 0;
		for ($i = $start; $i < $page_num; $i++)
		{
			array_push($arr, $i + 1);
		}
		for ($i = ($page_num + 1); $i < ($page_num + $show); $i++)
		{
			if ($i == ($last_page + 1)) break;
			array_push($arr, $i);
		}
		return $arr;
	}
	
	function	calculate_pagination($arrPages){
		$arrPagination 			= array();
		$arrPagination[1]		=	($arrPages['previous']==1&&$arrPages['current']==1)?'0':$arrPages['previous']; //PreviousLink
		$arrPagination[2]		=	($arrPages['previous']==1&&$arrPages['current']==1)?'-hiden':''; //PreviousIMG
		$arrPagination[3]		=	$arrPages['current'].'/'.$arrPages['last']; //PagesActives
		$arrPagination[4]		=	($arrPages['next']==$arrPages['last']&&$arrPages['current']==$arrPages['last'])?'0':$arrPages['next']; //NextLink
		$arrPagination[5]		=	($arrPages['next']==$arrPages['last']&&$arrPages['current']==$arrPages['last'])?'-hiden':''; //NextIMG
		return $arrPagination;
	}
	
	function	calculate_nextpage($arrPages){
		$result	=	($arrPages['current']>=$arrPages['last'])?0:$arrPages['next'];
		return $result;
	}
}
?>