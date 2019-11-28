<?php
require_once("cms_preferences/config.php");
// *********** ARTICLE OVERVIEW ***************** //
function overviewArticles($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $dbTablef) {
	// Connect to database
	$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
	if (mysqli_connect_errno()) {
		$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
		header('Location: 404.php');
		}
	// Formulate a Query-String
	$query = "SELECT article_id,article_timestamp,article_title,article_picture,article_content FROM $dbTablef";
	// Send Query
	$result = mysqli_query($con,$query);
	// get result als associative array
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// free memory
	mysqli_free_result($result);
	// close DB connection
	mysqli_close($con);
	return $row;
}
// *********** READ ARTICLE ***************** //
function readSingleArticle($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $dbTablef, $articleIdf) {
	// Connect to database
	$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
	if (mysqli_connect_errno()) {
		$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
		header('Location: 404.php');
		}
	// Formulate a Query-String
	$query = "SELECT article_title,article_picture,article_content,article_timestamp FROM $dbTablef WHERE `articles`.`article_id` = $articleIdf";
	// Send Query
	$result = mysqli_query($con,$query);
	// get result als associative array
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	// free memory
	mysqli_free_result($result);
	// close DB connection
	mysqli_close($con);
	return $row;
}
// *********** DELETE ARTICLE ***************** //
function deleteArticles($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $dbTablef, $deleteArticlef) {
	// Connect to database
	$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
	if (mysqli_connect_errno()) {
		echo "Konnte keine DB-Verbindung aufbauen: ".mysqli_connect_error();
		}
	// Formulate a Query-String
	$query = "DELETE FROM `articles` WHERE `articles`.`article_id` = $deleteArticlef";
	// Send Query
	$result = mysqli_query($con,$query);
}
// *********** NEW ARTICLE ***************** //
function newArticle($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $titlef, $pictureUrlf, $contentf, $timestampf) {
		// Connect to database
		$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
		if (mysqli_connect_errno()) {
			$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
			header('Location: 404.php');
			}
	// Formulate a Query-String
		$query = "INSERT INTO `articles` (article_title, article_picture, article_content, article_timestamp) VALUES ('$titlef', '$pictureUrlf', '$contentf', '$timestampf')";
	// Send Query
		$result = mysqli_query($con,$query);
}
// *********** EDIT ARTICLE ***************** //
function editArticle($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $dbTablef, $dbArticlef) {
		// Connect to database
		$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
		if (mysqli_connect_errno()) {
			$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
			header('Location: 404.php');
			}
		// Formulate a Query-String
		$query = "SELECT article_title,article_picture,article_content,article_id FROM $dbTablef WHERE `articles`.`article_id` = $dbArticlef";
		// Send Query
		$result = mysqli_query($con,$query);
		// get result als associative array
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		// free memory
		mysqli_free_result($result);
		// close DB connection
		mysqli_close($con);
		return $row;
}
// *********** UPDATE ARTICLE ***************** //
function updateArticle($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $titlef, $pictureUrlf, $contentf, $articleIdf) {
		// Connect to database
		$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
		if (mysqli_connect_errno()) {
			$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
			header('Location: 404.php');
			}
		// Formulate a Query-String
		$query = "UPDATE `articles` SET `article_content` = '$contentf', `article_title` = '$titlef', `article_picture` = '$pictureUrlf' WHERE `article_id` = '$articleIdf'";
		// Send Query
		$result = mysqli_query($con,$query);
}
// *********** ADD IMAGE TO FOLDER ***************** //
function addImageToFolder($pictureFolderf) {
	if(isset($_FILES['image'])){
		 $errors= array();
		 $file_name = $_FILES['image']['name'];
		 $file_size =$_FILES['image']['size'];
		 $file_tmp =$_FILES['image']['tmp_name'];
		 $file_type=$_FILES['image']['type'];
		 $exploded = explode('.',$_FILES['image']['name']);
		 $file_ext=strtolower(end($exploded));
		 // Validation
		 $extensions = array("jpeg","jpg","png", "mov", "mp4", "gif");
		 if(in_array($file_ext,$extensions)=== false){
				$errors[]="1";
				$_SESSION['error_image'] = "Only JPEG, JPEG, PNG, GIF, MOV or MP4 allowed";
		 		}
		 if(empty($errors)==true){
				move_uploaded_file($file_tmp,$pictureFolderf . $file_name);
				// echo "Success";
		 		}
		}
}
// *********** ADD UPDATED IMAGE TO FOLDER ***************** //
function addUpdateImageToFolder($pictureFolderf) {
	if(isset($_FILES['update_image'])){
		 $errors= array();
		 $file_name = $_FILES['update_image']['name'];
		 $file_size =$_FILES['update_image']['size'];
		 $file_tmp =$_FILES['update_image']['tmp_name'];
		 $file_type=$_FILES['update_image']['type'];
		 $exploded = explode('.',$_FILES['update_image']['name']);
		 $file_ext=strtolower(end($exploded));
		 // Validation
		 $extensions = array("jpeg","jpg","png", "mov", "mp4", "gif");
		 if(in_array($file_ext,$extensions)=== false){
				$errors[]="1";
				$_SESSION['error_image'] = "Only JPEG, JPEG, PNG, GIF, MOV or MP4 allowed";
		 		}
		 if(empty($errors)==true){
				move_uploaded_file($file_tmp,$pictureFolderf . $file_name);
		 		}
		}
}
// ***********DELETE IMAGE FROM FOLDER ***************** //
function deleteArticlesFolder($dbHostf, $dbUserf, $dbPasswordf, $dbNamef, $dbTablef, $deleteArticlef) {
	// Connect to database
	$con = mysqli_connect($dbHostf, $dbUserf, $dbPasswordf, $dbNamef);
	// Error message if connection fails
	if (mysqli_connect_errno()) {
		$_SESSION['errormessage'] = "Couldnt connect to DB: ".mysqli_connect_error();
		header('Location: 404.php');
		}
	// Formulate a Query-String
	$query2 ="SELECT article_picture FROM `articles` WHERE `article_id` = $deleteArticlef";
	// Send Query
	$result2 = mysqli_query($con,$query2);
	// get result als associative array
	$row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
	// free memory
	mysqli_free_result($result2);
	// close DB connection
	mysqli_close($con);
	return $row;
}
?>
