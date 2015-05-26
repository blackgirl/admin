<?php
session_start();
ini_set('display_errors', 1);
require_once('controller/userController.php');
require_once('controller/projects/controller_projects.php');
require_once('model/projects/data_formatter.php');
?>
<!-- <!DOCTYPE html> -->
<html>
<head>
    <meta charset="utf-8">
    <title>| UniRoot |</title>
    <!-- Favicon -->
    <link href="view/img/favicon.png" rel="icon" type="image/png">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="view/js/bootstrap-table.js"></script>
    <script src="view/js/jquery.flexslider-min.js"></script>
    <script src="view/js/admin_onload.js"></script>
    <script src="view/js/dropzone.js"></script>
    <!-- // <script src="view/css/dropzone.css"></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/bootstrap-table.css">
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/offer-page.css">
    <link rel="stylesheet" href="view/css/admin_page.css">
</head>
<body class="body-padding" id="AdminPage">
    <?php include 'view/includes/admin_header.php';
if(isset($_GET['route'])) { // Authorization
    $route = $_GET['route'];
    switch($route){
        case "auth": {
            // echo "Came into case:AUTH of index.php Router";
            if($_POST['login']!="" && $_POST['password']!="") { 
                $uc = new userController();
                if($array = $uc->auth($_POST['login'], $_POST['password'])) {
        			$user_id = $array['id'];
        			$_SESSION['id'] = $user_id;
        			$_SESSION['name'] = $array['username'];
        			$_SESSION['password'] = $array['password'];
                    // ($_SESSION['id']!="" && $_SESSION['name']!='')?include('View/index.html'):include('view/users/auth.php');
        			($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
                } else include('view/users/auth.php');
            }
            // else include('view/users/auth.php');
        } break;
        case "projects": 
        case "offers": {
            ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
        } break;
        case "exit": {
            if(isset($_SESSION['id'],$_SESSION['name'],$_SESSION['password']))
                unset($_SESSION['name'],$_SESSION['id'],$_SESSION['password']);
            include('view/users/auth.php');
        } break;
        // case "offers": {
        //     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/offerspage.php'):include('view/users/auth.php');
        // } break;
        // case "site": {
        //     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/unicreo_com.php'):include('view/users/auth.php');
        // } break;
        default: if(!isset($_SESSION['name'])) include('view/users/auth.php');
    }
}
elseif(!isset($_SESSION['name'])) include('view/users/auth.php');
    
    if(isset($_POST['btn-all-projects'])) {
        $uc = new Controller_Projects();
        $df = new Data_Formatter();
        $array = $uc->allProjects();
        include ('view/includes/form_top_button_panel.php');
        $view = $df->GetFormTable($array);
        echo $view;
    }
    // TODO !!!! delete-offers
    if(isset($_POST['deleteProjects']) && (isset($_POST['project']))) {
        $idsArray = $_POST['project'];
        $uc = new Controller_Projects();
        if($uc->deleteProjects($idsArray)) include 'view/includes/reloader.php';
    }

    if(isset($_POST['add-new-project'])) {
        $uc = new Controller_Projects();
       
       
        if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'],$_FILES)) {
            var_dump($_FILES);
            $ds          = DIRECTORY_SEPARATOR;
            $storeFolder = 'uploads';
            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
                $targetFile =  $targetPath. $_FILES['file']['name'];
                move_uploaded_file($tempFile,$targetFile);
                insert('file_table',array('file_name' => $fileName));
            }

            include 'view/includes/reloader.php';
            // $file = fopen($date.".html", 'a');
            // $news = preg_replace("/[\r\n]+/", "</p><p>", trim($_POST['new-project']));
            // $lines = file('fish.html');
            // foreach ($lines as $line) {
                // if(trim($line)=="<!-- /Text block -->"){
                    // $newPost = "<h1>".$_POST['new-project-title']."</h1>"."<span><p>".$news."</p></span>"; 
                    // $test = fwrite($file, $newPost); 
                // }
                // $test = fwrite($file, $line);
            // }
            // fclose($file);
        }
    }
//-----------   КНОПКИ    -----------//
/*if(isset($_POST['delUser'])){//удалить свой аккаунт
    $uc = new userController();
    if($uc->remove($_SESSION['name'], $_SESSION['password']) == 1){
	echo "<h1 style='text-align: center;'>Account was deleted!</h1>";
    } else "Error_Delete!";
}
if(isset($_POST['editUser'])){//форма для изменения данных пользователя
    include('view/users/userPage.php');
    echo '<form style="margin:0 auto; width:250px" action="'.$_SERVER['REQUEST_URI'].'" method="post">';
    echo '<input name="newLogin" placeholder="New Login" type="text" style="margin:0 auto; width:200px">';
    echo '<input name="newPassword" placeholder="New Password" type="text" style="margin:0 auto; width:200px">';
    echo '<input name="eddUser" type="submit" value="Edit Your login/password" style="margin:0 auto; width:200px">';
    echo '</form>';
}
if(isset($_POST['eddUser'])){//изменить свои данные
	if ((!empty($_POST['newLogin']) and !empty($_POST['newPassword']))){
	    $uc = new userController();
	    if($uc->edit($_POST['newLogin'], $_POST['newPassword'], $_SESSION['id'])){
		unset($_SESSION['name']); 
		$_SESSION['name'] = $_POST['newLogin'];
		include('view/users/userPage.php');
	        echo "<h1 style='text-align: center;'>ACCOUNT EDITED</h1>";
	    } else die("ERROR_EDIT");
}   	}
if(isset($_POST['newBook'])){//форма добавления новой книги в БД(админ)
    include('view/users/adminPage.php');
    echo '<form style="margin:0 auto; width:250px" action="index.php" method="post">
    <input name="book_author" placeholder="author" type="text" style="margin:0 auto; width:200px">
    <input name="book_title" placeholder="title" type="text" style="margin:0 auto; width:200px">
    <input name="book_year" placeholder="year" type="text" style="margin:0 auto; width:200px">
    <input name="book_price" placeholder="price" type="text" style="margin:0 auto; width:200px">
    <input name="book_about" placeholder="about" type="text" style="margin:0 auto; width:200px">
    <input name="addBook" type="submit" value="Add Book" style="margin:0 auto; width:200px">
    </form>';
}
if(isset($_POST['addBook'])){//добавить новую книгу в БД(админ)
    if((!empty($_POST['book_author'])) and (!empty($_POST['book_title']))and (!empty($_POST['book_year']))){
        $bk = new wordsController();
        $about = '<p><a href="'.$_POST['book_about'].'" target="_blank">About</a></p>';
        if($bk->newBook($_POST['book_author'], $_POST['book_title'], $_POST['book_price'], $_POST['book_year'], $about))
            include('view/users/adminPage.php');
    }
}
if(isset($_POST['allAuthors'])){//показать всех авторов и кол-во их книг
    ($_SESSION['name'] == 'admin')?include('view/users/adminPage.php'):include('view/users/userPage.php');
    $bk = new wordsController();
    $arr = $bk->allAuthors();
    echo '<form style="margin:15 auto; width:250px" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px width="200px" CELLPADDING=4px>';
    echo "<tr>\n<th>Author</th>\n<th>Books</th></tr>\n<br>";
    for ($i=0; $i<count($arr); $i++) {
        echo "<tr>\n<td width='150px' bgcolor='#FFFF99'>".$arr[$i]."</td>\n<td align=center>".$arr[++$i]."</tr>\n";
    }
    echo '</table></form>';
}

if(isset($_POST['showUsers'])){//список зарегистрированных пользователей(админ) 
    include('view/users/adminPage.php');
    $uc = new userController();
    $arr = $uc->allUsers();
    echo '<form style="margin:0 auto; width:400px" action="index.php?route=users_show" method="post"><table BORDER=1px width="400px" CELLPADDING=3px>';
    echo "<tr>\n<th>name</th>\n<th>password</th>\n<th>select</th>\n<th>view</th></tr>\n<br>";
    for ($i=0; $i<count($arr); $i++) {
	echo $arr[$i]->ToString1();
    }
    echo '</table><input name="moveUsers" type="submit" value="Delete selected users" style="margin:5px 200px; width:200px">';
    echo '</form>';
}
if(isset($_POST['usersWords'])){ //показать книги пользователя(админ)
    include('view/users/adminPage.php'); 
    $uW = array();
    $uW = $_POST['usersWords'];
    foreach($uW as $key=>$value){
	$id = $key;
    }
    $uc = new wordsController();
    $arr = $uc->myBooks($id);
    echo '<form style="margin:0 auto; width:400px" action="'.$_SERVER['REQUEST_URI'].'"method="post"><table BORDER=1px width="400px" CELLPADDING=3px>';
    echo "<tr>\n<th>Author</th>\n<th>Title</th></tr>\n<br>";
    for ($i=0; $i<count($arr); $i++) {
        echo $arr[$i]->ToString1();
    }
    echo '</table></form>';
}
if(isset($_POST['showBooks'])){ //показать все книги БД
    ($_SESSION['name'] == 'admin')?include('view/users/adminPage.php'):include('view/users/userPage.php');
    $uc = new wordsController();
    $arr = $uc->allBooks();
    echo '<form style="margin:15 auto; width:500px" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px width="500px" CELLPADDING=3px>';
    echo "0.00 - 30.00$<input type='radio' name='sortPrice' value='1' />
    30.00 - 100.00$<input type='radio' name='sortPrice' value='2' /><input name='makeSort' type='submit' value='Sort by price' style='margin:5 10px; width:250px'>";
    echo "<tr>\n<th>Author</th>\n<th>Title</th>\n<th>Price</th>\n<th>Year</th>\n<th>About</th>\n<th>select</th></tr>\n<br>";
    for ($i=0; $i<count($arr); $i++) {
        echo $arr[$i]->ToString();
    }
    echo '</table><input name="takeBook" type="submit" value="Get selected to wishlist" style="margin:5px 300px; width:200px">';
    echo '</form>';
}
if(isset($_POST['sortPrice']) && isset($_POST['makeSort'])){//сортируем по диапазону цены
    ($_SESSION['name'] == 'admin')?include('view/users/adminPage.php'):include('view/users/userPage.php');
    if($_POST['sortPrice'] == '1'){
        $uc = new wordsController();
        $arr = $uc->allBooksPure();
        echo '<form style="margin:15 auto; width:500px" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px width="500px" CELLPADDING=3px>';
        echo "<tr>\n<th>Author</th>\n<th>Title</th>\n<th>Price</th>\n<th>Year</th>\n<th>About</th>\n<th>select</th></tr>\n<br>";
        for ($i=0; $i<count($arr); $i++) {
        echo $arr[$i]->ToString();
    }
    echo '</table><input name="takeBook" type="submit" value="Get selected to wishlist" style="margin:5px 300px; width:200px">';
    echo '</form>';
    }
    elseif($_POST['sortPrice'] == '2'){
        $uc = new wordsController();
        $arr = $uc->allBooksRich();
        echo '<form style="margin:15 auto; width:500px" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px width="500px" CELLPADDING=3px>';
        echo "<tr>\n<th>Author</th>\n<th>Title</th>\n<th>Price</th>\n<th>Year</th>\n<th>About</th>\n<th>select</th></tr>\n<br>";
        for ($i=0; $i<count($arr); $i++) {
        echo $arr[$i]->ToString();
    }
    echo '</table><input name="takeBook" type="submit" value="Get selected to wishlist" style="margin:5px 300px; width:200px">';
    echo '</form>';
    }
}
if(isset($_POST['takeBook']) and isset($_POST['book'])){ //добавить книгу себе в лист
    ($_SESSION['name'] == 'admin')?include('view/users/adminPage.php'):include('view/users/userPage.php');
    $wrd = $_POST['book'];
    for($j=0;$j<=count($wrd);$j++){    
	$v = $wrd[$j];
	$uc = new wordsController();
	$uc->takeBook($_SESSION['id'], $v);
   }
}
if(isset($_POST['moveUsers']) and isset($_POST['user'])){//удалить пользователя(админ)
    include('view/users/adminPage.php');
    $usr = $_POST['user'];
    for($i=0;$i<=count($usr);$i++)
    {
	$u = $usr[$i];
	$uc = new userController();
	$uc->moveUser($u);
    }
}
if(isset($_POST['myBooks']) and isset($_SESSION['id'])){//показать мои лист книг
    include('view/users/userPage.php');
    $uc = new wordsController();
    $arr = $uc->myBooks($_SESSION['id']);
    echo '<form style="margin:0 auto; width:500px" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px width="500px" CELLPADDING=3px>';
    echo "<tr>\n<th>Author</th>\n<th>Title</th>\n<th>Price</th>\n<th>Year</th>\n<th>About</th>\n<th>select</th></tr>\n<br>";
    for ($i=0; $i<count($arr); $i++) {
        echo $arr[$i]->ToString();
    }
    echo '</table><input name="removeBook" type="submit" value="Delete selected from wishlist" style="margin:5px 300px; width:200px">';
    echo '</form>';
}
if(isset($_POST['removeBook']) and isset($_POST['book'])){ //удалить книгу из своего листа
    include('view/users/userPage.php');
    $usr = $_POST['book'];
    for($i=0;$i<=count($usr);$i++)
    { 
	$w = $usr[$i];
	$uc = new wordsController();
	$uc->removeBook($_SESSION['id'], $w);
    } 
}
if(isset($_POST['sendProposal'])){//aорма отправки предложения
    include('view/users/userPage.php');
    include('view/users/proposal.php');
}
if((isset($_POST['sendPr']) && (!empty($_POST['name']) and !empty($_POST['email'])))){//отправка предложения
        $snd = new userController();
        $snd->sendProposal($_POST['name'],$_POST['email'],$_POST['proposal'],$_SESSION['id']);
        include('view/users/userPage.php');
}
if(isset($_POST['showPr'])){//показать все предложения(админ)
    include('view/users/adminPage.php');
    $snd = new userController();
    $arr = $snd->showProposal();
    echo '<center><form style="margin:0 auto;" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table BORDER=1px CELLPADDING=3px>';
    echo "<tr>\n<th></th>\n<th>SendAnswer</th>\n<th>Select</th>\n<th>Time</th>\n<th>Name</th>\n<th>e-mail</th>\n<th>Proposal</th>\n<br></tr>";
    for ($i=0; $i<count($arr); $i++) {
     echo "<tr>\n<td>".'<textarea placeholder="Your text" name="answer['.$arr[$i].']" rows=2 cols=50></textarea>'."</td>\n<td>".
     '<input name="sendAnswer['.$arr[$i].']" type="submit" value="Answer for proposal" width:200px>'.
     "</td>\n<td align=center>".'<input type="checkbox" name="propos[]" value="'.$arr[$i].'" />'.
     "</td>\n<td align=center width='150px'>".$arr[++$i]."</td>\n<td align=center width='100px'>".$arr[++$i].
     "</td>\n<td align=center width='150px'>".$arr[++$i]."</td>\n<td align=center bgcolor='#FFFF99' width='350px'>".$arr[++$i].
     "</td>\n<br>"."</tr>";
    }
    echo '</table><input name="deletePr" type="submit" value="Delete selected proposals" style="margin:5px auto; width:200px">';
    echo '</form>';
}
if(isset($_POST['deletePr']) and isset($_POST['propos'])){//удалить предложения(админ)
    include('view/users/adminPage.php');
    $prp = $_POST['propos'];
    for($i=0;$i<=count($prp);$i++){ 
        $p = $usr[$i];
        $uc = new userController();
        $uc->deletePr($p);
    } 
}
if(isset($_POST['sendAnswer'])){//ответить на предожение(админ)
    include('view/users/adminPage.php');
    $prp_id = array();
    $answ = array();
    $answ = $_POST['answer'];
    $prp_id = $_POST['sendAnswer'];
    foreach($prp_id as $key=>$value){
        $id = $key;
    }
    $answer = $answ[$id];
    $uc = new userController();
    $uc->sendAnswer($id, $answer);   
}
if(isset($_POST['answerFM'])){//посмотреть ответы на мои предложения
    include('view/users/userPage.php');
    $uc = new userController();
    $ans = $uc->answerFM($_SESSION['id']);
    echo '<center><form style="margin:0 auto;" action="'.$_SERVER['REQUEST_URI'].'" method="post"><table width="350px" BORDER=1px CELLPADDING=3px>';
    echo "<tr>\n<th>Time</th>\n<th>Answer</th><br></tr>";
    for ($i=0; $i<count($ans); $i++) {
        echo "<tr>\n<td align=center width='150px'>".$ans[$i]."</td>\n<td bgcolor='#FFFF99' align=center width='200px'>".$ans[++$i]."</td>\n<br></tr>";
    }
    echo '</table></form>';
}
*/
include 'view/includes/admin_footer.php'; ?>
</body>
</html>