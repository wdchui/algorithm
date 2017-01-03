<?php

function bubbleSort(&$unsort, $order)
{
	for($i = 0; $i <= count($unsort)-1; $i++)
	{
		$exchange = false;
		for($j = 0; $j <(count($unsort)-1-$i); $j++)
		{
			switch($order)
			{
				case 'asc':
					if($unsort[$j] > $unsort[$j+1])
					{
						$exchange = true;
						swap($unsort[$j], $unsort[$j+1]);
					}
					break;
				case 'desc';
					if($unsort[$j] < $unsort[$j+1])
					{
						$exchange = true;
						swap($unsort[$j], $unsort[$j+1]);
					}
					break;
			}
		}
		if(!$exchange)
		{
			break;
		}
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
bubbleSort($unsort, 'asc');
var_dump(json_encode($unsort));
var_dump("反序:");
bubbleSort($unsort, 'desc');
var_dump(json_encode($unsort));
