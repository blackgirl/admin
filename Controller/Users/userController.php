<?php
require_once('model/users/userModel.php');
require_once('model/users/usersRepository.php');

class userController{
    function __construct(){

    }
    //New post add to database//
    function auth($username, $password){
        // echo "Called userController->Auth()";
        $userToAuth = new Model_User($username, $password);
        return usersRepository::getInstance()->auth($userToAuth);
    }
    

    // function moveUser($id){
    //     $us = new userModel($id);
    //     return usersRepository::getInstance()->moveUser($us);
    // }
    // function sendProposal($name,$email,$proposal,$user_id){
    //     return usersRepository::getInstance()->sendProposal($name,$email,$proposal,$user_id);
    // }
    // function showProposal(){
    //     return usersRepository::getInstance()->showProposal();
    // }
    // function deletePr($id){
    //     return usersRepository::getInstance()->deletePr($id);
    // }
    // function sendAnswer($id, $answer){ 
    //     return usersRepository::getInstance()->sendAnswer($id, $answer);
    // }
    // function answerFM($id){
    //     return usersRepository::getInstance()->answerFM($id);
    // }
}




?>