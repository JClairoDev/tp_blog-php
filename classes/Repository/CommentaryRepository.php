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

    public function deleteArticle(int $commentaryId): void
    {
        $sql = "DELETE FROM commentary WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->execute([
            'id' => $commentaryId
        ]);
    }


}