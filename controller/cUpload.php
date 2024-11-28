<?php
	class myfile{
		public function upload($name, $tmp_name, $folder){
			if($name != ''){
				//$name = rand()."_".$name;
				$des = $folder . "/" . $name;
				if(move_uploaded_file($tmp_name, $des)){
					return 1;	
				}else{
					return 0;	
				}
			}else{
				return -1;	
			}
		}
	}
?>