<?php
require_once('AbstractRepository.php');
class CommentaryRepository extends AbstractRepository
{
    public function addCommentary(Commentary $commentary, User $user){
        $sql = "INSERT INTO commentary (commentary , idUser)
            VALUES (:commentary, :idUser)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'commentary'=>$commentary->getCommentary(),
            'idUser'=>$user->getId()
        ]);
    }
}