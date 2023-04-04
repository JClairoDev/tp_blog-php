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

//je récupère l'id du commentaire
$commentaryId = $_GET['idCom'];
//je récupère l'id de l'article
$articleId=$_GET['idArticle'];
//je supprime le commentaire
$commentaryRepository->deleteCommentary($commentaryId);
//je redirige vers l'article concerné
header('Location: show-article.php?id='.$articleId );
