<?php
require_once('model/offers/model_offer.php');
require_once('model/offers/offers_repository.php');

class Controller_Offers {
    function __construct() {

    }
    function allOffers() {
        return offersRepository::getInstance()->allOffers();
    }
    function deleteOffers($idsArray){
        return offersRepository::getInstance()->deleteOffers($idsArray);
    }
    function addOffer($title,$link,$desc,$estim) {
        $newOffer = new Model_Offer($title,$link,$desc,$estim);
        return offersRepository::getInstance()->addOffer($newOffer);
    }
    function getOwnerId() {
        return offersRepository::getInstance()->getId();
    }
    function getLastId() {
        return offersRepository::getInstance()->getLastId();
    }
    function editOffer($offer){
        $changedOffer = new Model_Offer($offer->title);
        return offersRepository::getInstance()->editOffer($changedOffer);
    }
    function hideOffer($id){
        return offersRepository::getInstance()->hideOffer($id);
    }
    function addTask($task,$hrs,$cost,$total) {
        $newOffer = new Model_Estimate($task,$hrs,$cost,$total);
    }
}
?>