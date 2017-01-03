<?php
function select_dyadic($unsort, $order)
{
	$num = count($unsort);
	for($i = 0; $i < floor(count($unsort)/2); $i++)
	{
		$minIndex = $i;
		$maxIndex = $num -$i -1;
		select($unsort, $minIndex, $maxIndex);
		$tmpFirst = $unsort[$i];
		$tmpLast = $unsort[$num-$i-1];
		switch($order)
		{
			case 'asc':
				$unsort[$i] = $unsort[$minIndex];
				$unsort[$num-$i-1] = $unsort[$maxIndex];
				$unsort[$minIndex] = $tmpFirst;
				$unsort[$maxIndex] = $tmpLast;
				break;
			case 'desc':
				$unsort[$i] = $unsort[$maxIndex];
				$unsort[$num-$i-1] = $unsort[$minIndex];
				$unsort[$minIndex] = $tmpLast;
				$unsort[$maxIndex] = $tmpFirst;
				break;
		}
		var_dump(json_encode($unsort));
	}
}

function select(&$unsort, &$minIndex, &$maxIndex)
{
	$begin = $minIndex;
	$end = $maxIndex;
	for($begin;$begin<=$end;$begin++)
	{
		if($unsort[$begin] > $unsort[$maxIndex])
		{
			$maxIndex = $begin;
		}
		else if($unsort[$begin] < $unsort[$minIndex])
		{
			$minIndex = $begin;
		}
		else
		{
			//do nothing
		}
	}
}

$unsort = array(4,3,5,7,6,9,8,1,2);

var_dump("正序:");
select_dyadic($unsort, 'asc');
var_dump("反序:");
select_dyadic($unsort, 'desc');

