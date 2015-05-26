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

	//All posts from database in blog//
	function allProjects() {
		$query = mysqli_query($this->link,"SELECT * FROM uni_projects");
		$arr = array();
		require_once('model/projects/model_project.php');

		while($row = mysqli_fetch_array($query)){
			array_push($arr, new Model_Project($row['title'], $row['description'], $row['keyftrs'],$this->getProjectImgs($row['id']),$this->getProjectExpertises(explode(",", $row['expertises'])), $this->getProjectTecnologies(explode(",", $row['technologies'])), $row['id'],$row['link']));
		}
		return $arr;
	}
	function getProjectImgs($id) {
		$query = mysqli_query($this->link,"SELECT url FROM uni_portfolio WHERE project_id = '".$id."'");
		$result = [];
		while($imgs = mysqli_fetch_array($query)) {
		     $result[] = $imgs['url'];
		}
		return $result;
	}
	function getProjectTecnologies($idsArray) {
		if(isset($idsArray)) {
			$rqvst = "SELECT * FROM uni_technologies WHERE id=".implode(" OR id=", $idsArray);
			$query = mysqli_query($this->link, $rqvst);
			$result = [];
			if($query)
				while($tech = mysqli_fetch_array($query)) {
				     array_push($result,$tech);
				}
			return $result;
		}
	}
	function getProjectExpertises($idsArray) {
		if(isset($idsArray)) {
			$rqvst = "SELECT * FROM uni_expertises WHERE id=".implode(" OR id=", $idsArray);
			$query = mysqli_query($this->link, $rqvst);
			$result = [];
			if($query)
				while($exp = mysqli_fetch_array($query)) {
				    array_push($result,$exp);
				}
			return $result;
		}
	}
	
	// function hideProjects($id) {
	// 	// Wrap project with tag after action complete <s>This line of text is meant to be treated as no longer accurate.</s>
	// 	// Wrap project with tag on hover '<del>This line of text is meant to be treated as deleted text.</del>'
	// 	mysqli_query($this->link,"UPDATE uni_projects SET dnv='true' WHERE id= '".$id.' "');
	// }
			
	// function editProject($id,$changedProject) {
	// 	// $changedProject = $this->getProject($id);
	// 	mysqli_query($this->link,"UPDATE uni_projects SET id=".$changedProject->id.",dnv=".$changedProject->dns.",title=".$changedProject->title.",link=".$changedProject->link.",description=".$changedProject->description.",keyftrs=".$changedProject->keyftrs.",expertises=".$changedProject->expertises.",technologies=".$changedProject->technologies." WHERE id= '".$id.' "');
	// }
	function deleteProjects($idsArray){
		echo "DELETE";
		$idsToDelete = [];
		foreach ($idsArray as $key => $value) {
			array_push($idsToDelete, $value);
		}
		$qweryDelete = '';
		$qweryDelete = "DELETE FROM uni_projects WHERE id=".implode(' OR id=', $idsToDelete);
		mysqli_query($this->link,$qweryDelete);
		return mysqli_affected_rows($this->link);
	}

	function addProject($project) {
		$query = mysqli_query($this->link,"INSERT INTO uni_projects (title,description,link,keyftrs) 
	 					VALUES ('".$project->title."','".$project->description."', '".$project->link."','".$project->keyftrs."')");
		return $query;
	}
	// function getProject($id) {
	// 	return mysqli_query($this->link,"SELECT * FROM `uni_projects` WHERE id='".$id.'"');
	// }
	// function sendProposal($name,$email,$proposal,$user_id){
	// 	$time = date("d/m/Y - H:i",time());
	// 	$send = mysql_query("INSERT INTO proposal (time, name, email, proposal, user_id) 
	// 						VALUES('".$time."','".$name."','".$email."','".$proposal."','".$user_id."')",$this->link);
	// 	return $send;
	// }
	// function allAuthors() {
	// 	$query = mysqli_query($this->link,"SELECT DISTINCT author,COUNT(title) FROM books GROUP BY author ORDER BY author");
	// 	$arr = array();
	// 		while($row = mysql_fetch_assoc($query)){
	// 			array_push($arr, $row['author'],$row['COUNT(title)']);
	// 		}
	// 		return $arr;
	// }
}
?>