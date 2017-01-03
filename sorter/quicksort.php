<?php
function quickSort(&$unsort, $order)
{
	division($unsort, 0, count($unsort)-1, $order);		
}

function division(&$unsort, $left, $right, $order)
{
	$standard = $right;
	$start = $left;
	$right --;
	if($left > $right)
	{
		return;
	}
	while($left <= $right)
	{
		switch($order)
		{
			case 'asc':
				if($unsort[$left] > $unsort[$standard])
				{
					swap($unsort[$left], $unsort[$right]);
					$right --;
				}
				else
				{
					$left ++;
				}
				break;
			case 'desc':
				if($unsort[$left] < $unsort[$standard])
				{
					swap($unsort[$left], $unsort[$right]);
					$right --;
				}
				else
				{
					$left ++;
				}
				break;
		}

	}
	swap($unsort[$left], $unsort[$standard]);
	division($unsort, $start, $left-1, $order);
	division($unsort, $left+1, $standard, $order);
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
quickSort($unsort, 'asc');
var_dump(json_encode($unsort));
var_dump("反序:");
quickSort($unsort, 'desc');
var_dump(json_encode($unsort));
