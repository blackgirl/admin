<?php
function GetFileType($file_name) {
   $tmp = explode('.',$file_name);
   return end($tmp);
}
function RemoveFileType($file_name) {
	$position = strpos($file_name,'.'.GetFileType($file_name));
	return strtolower(substr($file_name,0,$position));
}
if(function_exists('lcfirst') === false) {
    function lcfirst($str) {
        $str[0] = strtolower($str[0]);
        return $str;
    }
}
/*function validate() {
    if ($('#img').attr('src') === '../static/img/placeholder.png') {
        return false;
    }
}

$(document).ready(function() {
    $('#url').on('keyup', function() {
        $('#img').attr('src', $('#url').val());
    });
});

*/
?>