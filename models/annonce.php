<?php

class announces
{

    public $id = 0;
    public $title = ' ';
    public $image = ' ';
    public $descriptive = ' ';
    public $brands = ' ';
    public $model = ' ';
    private $database = null;

    public function __construct()
    {

        /* $database = instance de l'objet PDO
    * try/catch permet de lever l'exception (erreur critique) et d'exécuter le code malgré l'erreur
    *
    */
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=valestim;charset=utf8', 'root', 'N2;[vPd8');
            /*
    * si une erreur est détectée, on la traite et on affiche un message d'erreur à l'utilisateur
    * $e est une variable dans laquelle on stocke l'erreur
    */
        } catch (Exception $e) {
            die('Impossible d\'accéder à la base de données.'
                . $e->getTraceAsString());
        }
    }

    public function checkIfAnnounceExistsById()
    {
        $queryCheckIfAnnounceExistsById = 'SELECT COUNT(`id`) AS `announceExistsById` '
            . 'FROM `iopmlk_announces` '
            . 'WHERE `id`=:id ';
        $statement = $this->database->prepare($queryCheckIfAnnounceExistsById);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
//VOIR CETTE METHODE
    public function addAnnounce()    {
        $queryAddAnnounce = 'INSERT INTO `iopmlk_announces` (`title`, `descriptive`, `id_members`, `nameImage`) '
            . 'VALUES (:title, :descriptive, :id_members, :nameImage) ';
        $statement = $this->database->prepare($queryAddAnnounce);
        //$variable->bindValue('identifiant du paramètre', la valeur à associer au paramètre, type de données)
        $statement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $statement->bindValue(':descriptive', $this->descriptive, PDO::PARAM_STR);
        $statement->bindValue(':id_members', $this->id_members, PDO::PARAM_INT);
        $statement->bindValue(':descriptive', $this->descriptive, PDO::PARAM_STR);
        $statement->bindValue(':nameImage', $this->descriptive, PDO::PARAM_STR);


        return $statement->execute();
    }

    public function getAnnouncesList() {
        $queryGetAnnouncesList = 'SELECT `id_members`, `memberName`, `title`, `descriptive`, `nameImage` '
            . 'FROM `iopmlk_announces` '
            . 'INNER JOIN `iopmlk_members` '
            . 'ON `members`.`id` = `announces`.`id_members`';
            $statement = $this->database->query($queryGetAnnouncesList);

            return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAnnounceById() {
        $queryGetAnnounceById = 'SELECT `id_members`, `memberName`, `title`, `descriptive`, `nameImage` '
        . 'FROM `iopmlk_announces`'
        . 'INNER JOIN `iopmlk_members` '
        . 'ON `iopmlk_announces`.`id_members` = `iopmlk_members`.`id` '
        . 'WHERE `iopmlk_announces`.`id` = :id ';
        $statement = $this->database->query($queryGetAnnounceById);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
    /*public function updateAnnounce()
    {
        $queryUpdateAnnounce = 'UPDATE `iopmlk_announces` '
            . 'SET `title`=:title, `descriptive`=:descriptive '
            . 'WHERE `id`=:id ';
        $statement = $this->database->prepare($queryUpdateAnnounce);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $statement->bindValue(':descriptive', $this->descriptive, PDO::PARAM_STR);


        return $statement->execute();
    }*/
    public function getAnnouncesListByMember() {
        $queryGetAnnouncesListByMember = 'SELECT `id_members`,`announces`.`id`, `id_itemSubcategory`, `brands`, `model`, `title`, `descriptive`, `nameImage`  '
        .'FROM `iopmlk_announces` '
        .'INNER JOIN `iopmlk_members`'
        .'ON `iopmlk_members`.`id` = `iopmlk_announces`.`id_members` '
        . 'WHERE `iopmlk_members`.`id`=:id ';
        $statement = $this->database->prepare($queryGetAnnouncesListByMember);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteAnnounce() {
    $queryDeleteAnnounce = 'DELETE FROM `iopmlk_announces`'
    .'WHERE `id`=:id';
    $statement = $this->database->prepare($queryDeleteAnnounce);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);

    return $statement->execute();
    }
}
