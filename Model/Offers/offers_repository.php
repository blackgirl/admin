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
		$arr = array();
		require_once('model/offers/model_offer.php');

		while($row = mysqli_fetch_array($query)){
			array_push($arr, new Model_Offer($row['title'], $row['description'], $row['cases'],$row['attachments'],$row['estimate'], $row['id'],$row['link']));
		}
		return $arr;
	}
	function getOfferImgs($id) {
		$query = mysqli_query($this->link,"SELECT * FROM uni_imgs WHERE project_id = '".$id."'");
		$result = [];
		while($imgs = mysqli_fetch_array($query)) {
		     $result[] = $imgs['file_name'];
		}
		return $result;
	}
	function getOfferLink($id) {

	}
	function addOffer($offer) {
		if(isset($offer)) {
			$query = mysqli_query($this->link,"INSERT INTO uni_offers (title,description,link) 
		 					VALUES ('".$offer->title."','".$offer->description."', '".$offer->link."')");
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
		return mysqli_affected_rows($this->link);
	}
}
?>