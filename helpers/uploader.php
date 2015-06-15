<?php
require_once('config.php');
require_once('controller/projects/controller_projects.php');
require_once('controller/offers/controller_offers.php');
$link = mysqli_connect(SERVER, LOGIN, PASSWORD, DATABASE);

if(isset($_FILES['files'])){
    $errors= array();
    $upload_status = false;
	
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        
        if($file_size > 3097152) {
			$errors[]='File size must be less than 3 MB';
        }
        
        if(isset($_GET['route'])) {
            $type = $_GET['route'];
            $controller_name = "Controller_".ucfirst($type);
        }
        $uc = new $controller_name;
        $ins_id = $uc->getOwnerId();
        $tableName = ($type == 'projects')?'uni_imgs':'uni_offer_cases';
        $colName = substr($type, 0, (strlen($type)-1));

        $query = "INSERT INTO ".$tableName." (`file_name`,`file_size`,`file_type`,`".$colName."_id`) VALUES('$file_name','$file_size','$file_type',".$ins_id."); ";
        
        $desired_dir="uni_imgs";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false) {
                mkdir("$desired_dir"); // Create directory if it does not exist
            }

            if(is_dir("$desired_dir/".$file_name)==false) {
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            } else {
                $new_dir="$desired_dir/".$file_name.time();
                rename($file_tmp,$new_dir); // rename the file if another one exist				
            }

    		mysqli_query($link,$query);
            $upload_status = true;

        } else {
            $upload_status = false;
            print_r($errors);
        }
    }
	if(empty($error)) {
		// echo "Success";
        return $upload_status;
	}
}
?>