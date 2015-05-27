<?php
require_once('config.php');
require_once('controller/projects/controller_projects.php');
$link = mysqli_connect(SERVER, LOGIN, PASSWORD, DATABASE);

if(isset($_FILES['files'])){
    $errors= array();
    $upload_status = false;
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $key.$_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }
        $uc = new Controller_Projects();
        $ins_id = $uc->getLastId();
        $query="INSERT into uni_imgs (`file_name`,`file_size`,`file_type`,`project_id`) VALUES('$file_name','$file_size','$file_type',".$ins_id."); ";
        $desired_dir="uni_imgs";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir");      // Create directory if it does not exist
                            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		mysqli_query($link,$query);
        $upload_status = true;		
        }else{
                $upload_status = false;
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
        return $upload_status;
	}
}
?>



