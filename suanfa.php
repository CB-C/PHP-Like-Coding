<?php 

	function eatPeach( $n ){
		if( $n==1 ){
			return 1;
		}
		return 2*(eatPeach($n-1)+1);
	}
	$day = 10 ;

	echo eatPeach($day);

	echo "<pre/>";
	#冒泡排序
	$arr = [20,13,34,69,12,100,100];
	$count = count($arr)-1;
	#比较的总次数
	for( $j=0; $j<$count-1; $j++){
		#每次跟数组中的值比较的次数
		for ( $i=0; $i < $count-$j-1; $i++ ) { 

			if( $arr[$i] > $arr[$i+1]){

				$temp = $arr[$i+1];

				$arr[$i+1] = $arr[$i];

				$arr[$i] = $temp;
			}
		}
	}
	var_dump($arr);
	echo "<hr>";
	#快速排序
	$arrX = [13,8,25,48,18,36,48,10,10,48];

	function quickSort($arr){
		if( count($arr)<=1){
			return $arr;
		}
		$first = current($arr);
		$mid = [];
		$Left_arr = [];
		$Right_arr = [];
		 foreach ($arr as $key => $value) {
			if( $value < $first ){
				$Left_arr[] = $value; 
		 	}elseif( $value > $first ){
		 		$Right_arr[] = $value;
		 	}else{
		 		$mid[] = $value;
		 	}
		 }
		var_dump($Left_arr);
		var_dump($Right_arr);
		var_dump($mid);

		echo "<hr>";
		$Left_arr = quickSort($Left_arr);
		$Right_arr = quickSort($Right_arr);

		
		$result = array_merge($Left_arr,$mid,$Right_arr);
		return $result;
	}
	var_dump(quickSort($arrX));
 ?>