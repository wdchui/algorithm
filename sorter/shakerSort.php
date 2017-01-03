<?php

function shakerSort(&$unsort, $order)
{
	$left = 0;
	$right = count($unsort)-1;
	while($left<$right)
	{
		for($i = $left; $i < $right; $i++)
		{
			switch($order)
			{
				case 'asc':
					if($unsort[$i] > $unsort[$i+1])
					{
						swap($unsort[$i], $unsort[$i+1]);
					}
					break;
				case 'desc':
					if($unsort[$i] < $unsort[$i+1])
					{
						swap($unsort[$i], $unsort[$i+1]);
					}
					break;
			}
		}
		$right --;
		for($j= $right; $j > $left; $j --)
		{
			switch($order)
			{
				case 'asc':					
					if($unsort[$j] < $unsort[$j-1])
					{
						swap($unsort[$j], $unsort[$j-1]);
					}
					break;
				case 'desc':
					if($unsort[$j] > $unsort[$j-1])
					{
						swap($unsort[$j], $unsort[$j-1]);
					}
					break;
			}
		}		
		$left ++;
	}
}

function swap(&$x, &$y)
{
	$tmp = $x;
	$x = $y;
	$y = $tmp;
}

$unsort = array(4,3,5,7,6,9,8,1,2,11,0,20,18,12,16,15,17,19,14);
var_dump("原始序列:");
var_dump(json_encode($unsort));
var_dump("正序:");
shakerSort($unsort, 'asc');
var_dump(json_encode($unsort));
var_dump("反序:");
shakerSort($unsort, 'desc');
var_dump(json_encode($unsort));
