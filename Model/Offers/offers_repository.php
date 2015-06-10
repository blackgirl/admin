<?php
require_once('config.php');

class offersRepository {
	private static $instance = null;
	private $link;
	private function __construct() { 
		($this->link = mysqli_connect(SERVER, LOGIN, PASSWORD, DATABASE));
	}
	
	static function getInstance() {
		if(self::$instance == null)
		self::$instance = new offersRepository;
		return self::$instance;
	}

	function allOffers() {
		$query = mysqli_query($this->link,"SELECT * FROM uni_offers");
		$arr = [];
		if($query) {
			require_once('model/offers/model_offer.php');
			while($row = mysqli_fetch_array($query)){
				array_push($arr, new Model_Offer($row['title'],$row['link'],$row['description'], $row['estimation'], $row['total'], $row['id']));
			}
		}
		return $arr;
	}
	function getOfferImgs($id) {
		$query = mysqli_query($this->link,"SELECT * FROM uni_imgs WHERE project_id = '".$id."'");
		$result = [];
		if($query) {
			while($imgs = mysqli_fetch_array($query)) {
			     $result[] = $imgs['file_name'];
			}
		}
		return $result;
	}
	function getOfferLink($id) {

	}
	function getLastId() {
		return mysqli_insert_id($this->link);
	}
	function addOffer($offer) {
		if(isset($offer)) {
			if(isset($offer->estimation)) 
				// if($this->addEstimation($offer->estimation)) {
					$query = mysqli_query($this->link,"INSERT INTO uni_offers (title,description,link, estimation,total) 
		 					VALUES ('".$offer->title."','".$offer->description."', '".$offer->link."', '".$offer->total."', '".$offer->total."')");
					return $query;
				// }
		}
	}
	function addEstimation($estim) {
		if(isset($estim)) {
			$query = mysqli_query($this->link,"INSERT INTO uni_offer_estimate (task,hours,cost,) 
		 					VALUES ('".$estim['esti-task']."','".$estim['esti-hrs']."', '".$estim['esti-cost']."')");
			return $query;
		}
	}
	function deleteOffers($idsArray){
		$idsToDelete = [];
		foreach ($idsArray as $key => $value) {
			array_push($idsToDelete, $value);
		}
		$qweryDelete = '';
		$qweryDelete = "DELETE FROM uni_offers WHERE id=".implode(' OR id=', $idsToDelete);
		mysqli_query($this->link,$qweryDelete);
		echo mysqli_affected_rows($this->link);
	}
}
?>