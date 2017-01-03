<?php

function insert_sort($unsort, $order = 'asc')
{
	for($i = 1; $i < count($unsort); $i++)
	{
		switch($order)
		{
			case 'asc':
				if($unsort[$i] < $unsort[$i-1])
				{
					insert($unsort, $i, 'asc');
				}
				break;
			case 'desc':
				if($unsort[$i] > $unsort[$i-1])
				{
					insert($unsort, $i, 'desc');
				}
				break;
		}
		var_dump(json_encode($unsort));
	}
}

function insert(&$data, $index, $order)
{
	$sentry = $data[$index];
	switch($order)
	{
		case 'asc':
			while($index > 0 && $sentry < $data[$index-1])
			{
				$data[$index] = $data[$index-1];
				$index --;
			}
			break;
		case 'desc':
			while($index >0 && $sentry > $data[$index-1])
			{
				$data[$index] = $data[$index-1];
				$index --;
			}
			break;
	}
	$data[$index] = $sentry;
}	
$unsort = array(4,3,5,7,6,9,8,1,2);

var_dump("正序:");
insert_sort($unsort);
var_dump("反序:");
insert_sort($unsort, 'desc');


