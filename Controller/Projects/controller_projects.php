<?php
require_once('model/projects/model_project.php');
require_once('model/projects/projects_repository.php');

class Controller_Projects {
    function __construct() {

    }
    function allProjects() {
        return projectsRepository::getInstance()->allProjects();
    }
    function deleteProjects($idsArray){
        return projectsRepository::getInstance()->deleteProjects($idsArray);
    }
    function addProject($title,$link,$desc,$keyftrs,$tech,$exp){
        $newProject = new model_project($title,$desc,implode('|',$keyftrs),[],$exp,$tech,'',$link);
        return projectsRepository::getInstance()->addProject($newProject);
    }
    function getLastId() {
        return projectsRepository::getInstance()->getLastId();
    }
    function getTechnologies() {
        return projectsRepository::getInstance()->getTechnologies();
    }
    function editProject($project){
        $changedProject = new model_project($project->title);
        return projectsRepository::getInstance()->editProject($changedProject);
    }
    function hideProject($id){
        return projectsRepository::getInstance()->hideProject($id);
    }
    
    // function allBooks() {
    //     return projectsRepository::getInstance()->allBooks();
    // }
    // function allBooksPure() {
    //     return projectsRepository::getInstance()->allBooksPure();
    // }
    // function allBooksRich() {
    //     return projectsRepository::getInstance()->allBooksRich();
    // }
    // function takeBook($id, $value) {
    //     return projectsRepository::getInstance()->takeBook($id, $value);
    // }
    // function removeBook($id, $value) {
    //     return projectsRepository::getInstance()->removeBook($id, $value);
    // }
    // function myBooks($id) {
    //     return projectsRepository::getInstance()->myBooks($id);
    // }
    // function newBook($author, $title, $price, $year, $about) {
    //     $bk = new Model_Project($author, $title, $price, $year, $about);
    //     return projectsRepository::getInstance()->newBook($bk);
    // }
    // function allAuthors() {
    //     return projectsRepository::getInstance()->allAuthors();
    // }
}
?>