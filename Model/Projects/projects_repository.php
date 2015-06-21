<?php
require_once('config.php');

class projectsRepository {
	private static $instance = null;
	private $link;
	private function __construct() { 
		($this->link = mysqli_connect(SERVER, LOGIN, PASSWORD, DATABASE));
	}
	
	static function getInstance() {
		if(self::$instance == null)
		self::$instance = new projectsRepository;
		return self::$instance;
	}

	function allProjects() {
		$query = mysqli_query($this->link,"SELECT * FROM uni_projects");
		$arr = array();
		require_once('model/projects/model_project.php');
		while($row = mysqli_fetch_array($query)) {
			array_push($arr, new Model_Project($row['title'], $row['description'], array_filter(explode("|",$row['keyftrs'])),$this->getProjectImgs($row['id']),array_filter(explode(",", $row['expertises'])), array_filter(explode(",", $row['technologies'])), $row['id'],$row['link'],$row['nda']));
		}
		return $arr;
	}
	function getProjectImgs($id) {
		$query = mysqli_query($this->link,"SELECT * FROM uni_projects_cases WHERE file_owner_id = '".$id."'");
		$result = [];
		while($imgs = mysqli_fetch_array($query)) {
		     $result[] = $imgs['file_name'];
		}
		return $result;
	}
	function addProject($p) {
		$query = '';
		$project = $p;
		$query = mysqli_query($this->link,"INSERT INTO uni_projects (title,description,link,keyftrs,expertises,technologies) 
	 					VALUES ('".$project->title."','".$project->description."', '".$project->link."','".$project->keyftrs."','".$project->expertises."','".$project->technologies."')");
		return $query;
	}
	
	
	function deleteProjects($idsArray){
		$idsToDelete = [];
		foreach ($idsArray as $key => $value) {
			array_push($idsToDelete, $value);
		}
		$qweryDelete = '';
		$qweryDelete = "DELETE FROM uni_projects WHERE id=".implode(' OR id=', $idsToDelete);
		mysqli_query($this->link,$qweryDelete);
		echo mysqli_affected_rows($this->link);
	}

	function hideProject($id) {
		mysqli_query($this->link,"UPDATE `uni_projects` SET `nda`=`nda`^1 WHERE `id`='".$id."'");
		echo mysqli_affected_rows($this->link);
	}


	function getLastId() {
		return mysqli_insert_id($this->link);
	}

	function getId() {
		$q = mysqli_query($this->link,"SELECT id FROM uni_projects ORDER BY id DESC LIMIT 1");
		while ($row = mysqli_fetch_array($q)) {
	        return $row['id'];
	    }
	}

	// function getTechnologies() {
	// 	$query = '';
	// 	$query = mysqli_query($this->link,"SELECT * FROM uni_technologies");
	// 	$arr = array();
	// 	while($row = mysqli_fetch_array($query)){
	// 		array_push($arr, $row['text']);
	// 	}
	// 	return $arr;
	// }
	// function editProject($id,$changedProject) {
	// 	// $changedProject = $this->getProject($id);
	// 	mysqli_query($this->link,"UPDATE uni_projects SET id=".$changedProject->id.",dnv=".$changedProject->dns.",title=".$changedProject->title.",link=".$changedProject->link.",description=".$changedProject->description.",keyftrs=".$changedProject->keyftrs.",expertises=".$changedProject->expertises.",technologies=".$changedProject->technologies." WHERE id= '".$id.' "');
	// }
	// function getProjectTecnologies($tech) {
	// 	if(isset($tech) && count($tech) != 0) {
	// 		$rqvst = "SELECT `text` FROM `uni_technologies` WHERE `value`=".implode(" OR `value`=",$tech);
	//  		$query = mysqli_query($this->link, $rqvst);
	//  		// print_r($rqvst);
	// 		$result = [];
 // 			if($query)
 // 				while($t = mysqli_fetch_row($query)) {
 // 					// print_r($t);
	// 		     	array_push($result,$t);
	// 		}
	// 		print_r($result);
	// 		return $result;
	// 	}
	// }
		// if(isset($idsArray)) {
		// 	$rqvst = "SELECT * FROM uni_technologies WHERE id=".implode(" OR id=", $idsArray);
		// 	$query = mysqli_query($this->link, $rqvst);
		// 	$result = [];
		// 	if($query)
		// 		while($tech = mysqli_fetch_array($query)) {
		// 		     array_push($result,$tech);
		// 		}
		// 	return $result;
		// }
	// function getProjectExpertises($idsArray) {
	// 	if(isset($idsArray)) {
	// 		$rqvst = "SELECT * FROM uni_expertises WHERE id=".implode(" OR id=", $idsArray);
	// 		$query = mysqli_query($this->link, $rqvst);
	// 		$result = [];
	// 		if($query)
	// 			while($exp = mysqli_fetch_array($query)) {
	// 			    array_push($result,$exp);
	// 			}
	// 		return $result;
	// 	}
	// }
}
?>