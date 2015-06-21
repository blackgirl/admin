<?php
function GetFileType($file_name) {
   $tmp = explode('.',$file_name);
   return end($tmp);
}
function RemoveFileType($file_name) {
	$position = strpos($file_name,'.'.GetFileType($file_name));
	return strtolower(substr($file_name,0,$position));
}


?>