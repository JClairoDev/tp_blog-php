<?php
session_start();
require_once ('classes/Commentary.php');
require_once ('classes/Repository/CommentaryRepository.php');
require_once ('classes/User.php');

$user = User::isLogged();

if($user === false) {
    header('Location: login.php');
}

$commentaryRepository=new CommentaryRepository();

$commentaryId = $_GET['idCom'];
$articleId=$_GET['idArticle'];
var_dump($commentaryId);
$commentaryRepository->deleteCommentary($commentaryId);
header('Location: show-article.php?id='.$articleId );
