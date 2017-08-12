<?php 

	# 递归算法：
	
	 function binaryRecursive($arr,$low,$top,$target){    
	  if($low<=$top){      
	   		$mid = floor(($low+$top)/2);  
	   		#如果中间值等于目标值 返回目标值在数组中的下标
		    if($arr[$mid] == $target){         
		    	return $mid;      
		    }
		    #如果中间值比目标值还小，往中间值所在位置并向数组右边找
		    if($arr[$mid]<$target){      
		    	return	binaryRecursive($arr,$mid+1,$top,$target);      
		    }
		    #如果中间值比目标值还大，往中间值所在位置并向数组左边找
		    if($arr[$mid]>$target){        
		    	 return binaryRecursive($arr,$low,$top-1,$target);    
		    }    
	   }else{ return -1; } 
	} 
	$a = [1,2,3,4,5,6,7,8];
	$hight = count($a)-1;
	var_dump(binaryRecursive($a,0,$hight,9));
 ?>