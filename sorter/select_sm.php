<?php

function select_sort($unsort, $order)
{
	for($i = 0; $i<count($unsort)-1; $i ++)
	{
		$index = select($unsort, $i, $order);
		$tmp = $unsort[$i];
		$unsort[$i] = $unsort[$index];
		$unsort[$index] = $tmp;
		var_dump(json_encode($unsort));
	}
}

function select(&$unsort, $index, $order)
{
	switch($order)
	{
		case 'asc':
			$min = $unsort[$index];
			for($i=$index; $i<count($unsort); $i++)
			{
				if($unsort[$i] < $min)
				{
					$min = $unsort[$i];
					$index = $i;
				}
			}
			break;
		case 'desc':
			$max = $unsort[$index];
			for($i = $index; $i<count($unsort); $i++)
			{
				if($unsort[$i] > $max)
				{
					$max = $unsort[$i];
					$index = $i;
				}
			}
			break;
	}
	return $index;
}

$unsort = array(4,3,5,7,6,9,8,1,2);
var_dump("正序:");
select_sort($unsort, 'asc');
var_dump("反序:");
select_sort($unsort, 'desc');
