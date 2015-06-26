<?php
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
				if(isset($row['id']) && $row['estimation'] != NULL) $row['estimation'] = $this->getEstimation($row['id']);
				array_push($arr, new Model_Offer($row['title'],$row['link'],$row['description'], $row['estimation'], $row['id'],$this->getOfferCases($row['id']),$this->getOfferattachments($row['id'])));
			}
		}
		return $arr;
	}
	function addOffer($offer) {
		if(isset($offer)) {
			if($offer->estimation) {
				$query = mysqli_query($this->link,"INSERT INTO uni_offers (title,description,link) 
	 					VALUES ('".$offer->title."','".$offer->description."','".$offer->link."')");
				if($query) {
					$lastId = $this->getLastId();
					$this->addOfferAttachments($offer->cases,$lastId);
					$this->addEstimation($offer->estimation,$lastId);
				}
			}
		}
		return $query;
	}
	function addOfferAttachments($attached,$id) {
		$queryPrepare = '';
        foreach($attached as $key=>$val) {
	        $queryPrepare .= ($key=='0')?'':',';
        	$queryPrepare .= '("'.$val.'","'.$id.'")';
	    }
		if(!strlen($queryPrepare)) return;
			$rqv = 'INSERT INTO `uni_offer_attachments` (`src`,`file_owner_id`) VALUES'.$queryPrepare;
		    $query = mysqli_query($this->link, $rqv);
	}
	function addEstimation($estim, $id) {
		if(isset($estim) && isset($id)) {
			$queryPrepare = '("'; $i = 0; $len = count($estim); $total = 0;
            foreach($estim as $key=>$val) {
				$queryPrepare .= $val.'","';
                if(++$i % 3 === 0) {
                	$queryPrepare .= $id.'")';
					if ($i != $len)
						$queryPrepare .= ',("';
				}
			}
			if(!strlen($queryPrepare)) return;
			$rqv = 'INSERT INTO `uni_offer_estimate` (`task`,`hrs`,`cost`,`offer_id`) VALUES '.$queryPrepare;
		    $query = mysqli_query($this->link, $rqv);
			if($query) $this->makeCouple($id,$this->getLastId());
		}
	}
	function makeCouple($id1,$id2) {
		$r = "UPDATE uni_offers SET estimation='".$id2."' WHERE id='".$id1."'";
		return mysqli_query($this->link, $r);
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
	function getOfferCases($id) {
		$result = [];
		$query = mysqli_query($this->link,"SELECT * FROM uni_offers_cases WHERE file_owner_id = '".$id."'");
		if($query) {
			while($case = mysqli_fetch_array($query)) {
			    if(!empty($case['file_name']) && !empty($case['file_type'])) {
			    	$case['file_type'] = GetFileType($case['file_name']);
			    	$result[] = $case;
				}
			    // array_push($result,$imgs);
			}
		}
		return $result;
	}
	// function getOfferFileType($id) {
	// 	$query = mysqli_query($this->link,"SELECT * FROM uni_offer_cases WHERE offer_id = '".$id."'");
	// 	$resultTypes = [];
	// 	if($query) {
	// 		while($type = mysqli_fetch_array($query)) {
	// 		    if(!empty($type['file_type'])) array_push($resultTypes,$type['file_type']);
	// 		}
	// 	}
	// 	return $resultTypes;
	// }
	function getOfferAttachments($id) {
		$query = mysqli_query($this->link,"SELECT * FROM uni_offer_attachments WHERE file_owner_id = '".$id."'");
		$result = [];
		if($query) {
			while($src = mysqli_fetch_array($query)) {
			     if(!empty($src['src'])) array_push($result,$src['src']);
			}
		}
		return $result;
	}
	function getEstimation($id) {
		if(isset($id)) {
			$query = mysqli_query($this->link,"SELECT * FROM uni_offer_estimate WHERE offer_id = '".$id."'");
			if($query) {
				$result = []; $total = 0;
				while($task = mysqli_fetch_array($query)) {
					if(isset($task)&&!empty($task)>0)
			    	array_push($result, $t = [$task['id'],$task['task'],$task['hrs'],$task['cost'],$task['offer_id']]);
				}
			return $result;
			}
		}
	}
	function getId() {
		$q = mysqli_query($this->link,"SELECT id FROM uni_offers ORDER BY id DESC LIMIT 1");
		while ($row = mysqli_fetch_array($q)) {
	        return $row['id'];
	    }
	}
	function getLastId() {
		return mysqli_insert_id($this->link);
	}
	function getOfferData($id) {
		$query = mysqli_query($this->link,"SELECT * FROM uni_offers WHERE id = '".$id."'");
		$arr = [];
		if($query) {
			require_once('model/offers/model_offer.php');
			while($row = mysqli_fetch_array($query)){
				if(isset($row['id']) && $row['estimation'] != NULL) $row['estimation'] = $this->getEstimation($row['id']);
				$arr = new Model_Offer($row['title'],$row['link'],$row['description'], $row['estimation'], $row['id'],$this->getOfferCases($row['id']),$this->getOfferAttachments($row['id']));
			}
		}
		return $arr;
	}
}
?>