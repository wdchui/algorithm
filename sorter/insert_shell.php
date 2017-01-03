<?php
function insert_shell($unsort, $order = 'asc')
{
	for($step = floor(count($unsort)/2); $step > 0; $step = floor($step/2))
	{
		shell($unsort, $step, $order);
		var_dump($step . ":" . json_encode($unsort));
	}
}

function shell(&$unsort, $d, $order)
{
	for($i = $d; $i< count($unsort); $i += $d)
	{
		switch($order)
		{
			case 'asc':
				if($unsort[$i]<$unsort[$i-$d])
				{
					insert($unsort, $i, $d, $order);
				}
				break;
			case 'desc':
				if($unsort[$i]>$unsort[$i-$d])
				{
					insert($unsort, $i, $d, $order);
				}
				break;
		}
	}
}

function insert(&$unsort, $index, $d, $order)
{
	$entry = $unsort[$index];
	switch($order)
	{
		case 'asc':
			while($index > 0 && $entry < $unsort[$index-$d])
			{
				$unsort[$index] = $unsort[$index-$d];
				$index -= $d;
			}
			break;
		case 'desc':
			while($index > 0 && $entry > $unsort[$index-$d])
			{
				$unsort[$index] = $unsort[$index-$d];
				$index -= $d;
			}
			break;
	}
	$unsort[$index] = $entry;
}

$unsort = array(4,3,5,7,6,9,8,1,2);
var_dump("正序:");
insert_shell($unsort, 'asc');
var_dump("反序:");
insert_shell($unsort, 'desc');
