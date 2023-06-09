<?php
require_once('AbstractRepository.php');
class CommentaryRepository extends AbstractRepository
{
    public function addCommentary(Commentary $commentary, User $user, $idArticle){
        $sql = "INSERT INTO commentary (commentary , idUser, idArticle)
            VALUES (:commentary, :idUser, :idArticle)";
        $query = $this->db->prepare($sql);
        $query->execute([
            'commentary'=>$commentary->getCommentary(),
            'idUser'=>$user->getId(),
            'idArticle'=>$idArticle
        ]);
    }

    /**
     * @return Commentary[]
     */
    public function getAllCommentaries(): array
    {
        $sql = "SELECT * FROM commentary";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function deleteCommentary(int $commentaryId): void
    {
        $sql = "DELETE FROM commentary WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([
            'id' => $commentaryId
        ]);
    }
//cette fonction permet la suppression des commentaires lors de la suppression de l'article
    public function deleteCommentaryFromArticle(int $idArticle) :void
    {
        $sql = "DELETE FROM commentary WHERE idArticle = :idArticle";
        $query = $this->db->prepare($sql);
        $query->execute([
            'idArticle' => $idArticle
        ]);
    }


}