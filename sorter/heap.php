<?php
function heap_sort($unsort, $order)
{
	$num = count($unsort);
	for($i = floor($num/2)-1; $i >= 0; $i--)
	{
		adjust($unsort, $i, $num, $order);
	}
	for($i =1; $i < $num; $i++)
	{
		swap($unsort[0], $unsort[$num-$i]);
		adjust($unsort, 0, $num-$i, $order);
		var_dump(json_encode($unsort));
	}	
}

function adjust(&$unsort, $node, $num, $order)
{
	$son = 2*$node+1;
	if($son >= $num)
	{
		return;
	}
	switch($order)
	{
		case 'asc':
			if(($son+1) < $num && $unsort[$son] < $unsort[$son+1])
			{
				$son ++;
			}
			if($unsort[$son]>$unsort[$node])
			{
				swap($unsort[$son], $unsort[$node]);
				adjust($unsort, $son, $num, $order);
			}
			break;
		case 'desc':
			if(($son+1) < $num && $unsort[$son] > $unsort[$son+1])
			{
				$son++;
			}
			if($unsort[$son] < $unsort[$node])
			{
				swap($unsort[$son], $unsort[$node]);
				adjust($unsort, $son, $num, $order);
			}
			break;
	}
}

function swap(&$x, &$y)
{
	$tmp = $x;
	$x = $y;
	$y = $tmp;
}

$unsort = array(4,3,5,7,6,9,8,1,2);
var_dump("正序:");
heap_sort($unsort, 'asc');
var_dump("反序:");
heap_sort($unsort, 'desc');

