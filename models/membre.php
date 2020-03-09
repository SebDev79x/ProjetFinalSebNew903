<?php

//fetch ou fetchAll = select (on récupère des infos)
//execute = insert, delete, update
class members {

    public $id = 0;
    public $email = ' ';
    public $memberName = ' ';
    public $password = ' ';
    public $abouts = ' ';
    public $messageContact = ' ';
    private $database = null;

    public function __construct() {

        /* $database = instance de l'objet PDO
         * try / catch permet de lever l'exception (erreur critique) et d'exécuter le code malgré l'erreur
         *
         */
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=valestim;charset=utf8', 'root', 'N2;[vPd8');
        } catch (Exception $e) {
            die('Impossible d\'accéder à la base de données.'
                    . $e->getTraceAsString());
        }
    }

    /**
     * Requête pour ajouter un membre
     */
    public function addMember() {
        $queryAddMember = 'INSERT INTO `iopmlk_members` (`email`, `memberName`, `password`, `abouts`) '
                . 'VALUES (:email, :memberName, :password, :abouts) ';
        $statement = $this->database->prepare($queryAddMember);
        //$variable->bindValue('identifiant du paramètre', la valeur à associer au paramètre, type de données)
        $statement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $statement->bindValue(':memberName', $this->memberName, PDO::PARAM_STR);
        $statement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $statement->bindValue(':abouts', $this->abouts, PDO::PARAM_STR);
        return $statement->execute();
    }

    /**
     * requête pour récupérer la liste des membres
     */
    public function getMembersList() {
        $queryGetMembersList = 'SELECT `id`, `email`, `memberName`, `abouts`'
                . 'FROM `iopmlk_members` ';
        $statement = $this->database->query($queryGetMembersList);

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * requête pour récupérer le profil complet d'un membre
     */
    public function getMemberProfile() {
        $queryGetMemberProfile = 'SELECT `id`, `email`, `memberName`, `abouts`'
                . 'FROM `iopmlk_members` '
                . 'WHERE `id` = :id ';
        $statement = $this->database->prepare($queryGetMemberProfile);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * requête pour vérifier si un membre existe ou pas par son ID
     */
    public function checkIfAMemberExistsById() {
        $queryCheckIfAMemberExistsById = 'SELECT COUNT(`id`) AS `memberExistsById` '
                . 'FROM `iopmlk_members` '
                . 'WHERE `id` = :id ';
        $statement = $this->database->prepare($queryCheckIfAMemberExistsById);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    /**
     * requête permettant de vérifier l'existence d'un membre lors d'une inscription
     */
    public function checkIfAMemberExists() {
        $queryToCheckIfAMemberExists = 'SELECT COUNT(`id`) AS `memberExists` FROM `iopmlk_members` WHERE `email`=:email'
                . ' AND `memberName`=:memberName'
                . ' AND `password`=:password';
        $request = $this->database->prepare($queryToCheckIfAMemberExists);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':memberName', $this->memberName, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    /**
     * requête pour que le membre puisse mettre à jour son profil
     */
    public function updateMemberProfile() {
        $queryUpdateMember = 'UPDATE `iopmlk_members` '
                . 'SET `memberName`=:memberName,`email`=:email, `password`=:password, `abouts`=:abouts '
                . 'WHERE `id`=:id ';
        $statement = $this->database->prepare($queryUpdateMember);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $statement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $statement->bindValue(':memberName', $this->memberName, PDO::PARAM_STR);
        $statement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $statement->bindValue(':abouts', $this->abouts, PDO::PARAM_STR);

        return $statement->execute();
    }

    /**
     * requête pour que le membre puisse supprimer son compte
     */
    public function deleteProfileMember() {
        $queryDeleteProfileMember = 'DELETE FROM `iopmlk_members` '
                . 'WHERE `id`=:id ';
        $statement = $this->database->prepare($queryDeleteProfileMember);
        $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $statement->execute();
    }

    /**
     * requête pour la pagination
     */
    public function countPaginationNumberPages() {
        $queryPaginationListMembers = 'SELECT COUNT(id)/10 AS `numberPages` '
                . 'FROM `iopmlk_members`';
        $statement = $this->database->prepare($queryPaginationListMembers);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_NUM[0]);
    }

    public function getShowMembersList($offset = 0) {
        $queryMembersList = 'SELECT `id`, `abouts`, `memberName` '
                . ' FROM `iopmlk_members` '
                . ' ORDER BY `memberName` LIMIT 10 OFFSET :offset';
        $statement = $this->database->prepare($queryMembersList);
        $statement->bindValue(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * requête permettant de rechercher un membre dans la barre de recherche
     */
    public function getMemberBySearchField() {
        $querySearchMember = 'SELECT `id`, `abouts`, `memberName` '
                . 'FROM `iopmlk_members` '
                . 'WHERE `memberName` LIKE :memberName ';
        $statement = $this->database->prepare($querySearchMember);
        $statement->bindValue(':memberName', $this->memberName, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     *    requête permettant de récupérer les infos lors de la connexion
     */
    public function getMemberInfo() {
        $queryMemberInfo = 'SELECT `password`, `id`,`memberName` '
                . 'FROM `iopmlk_members` '
                . 'WHERE `email` = :email';
        $statement = $this->database->prepare($queryMemberInfo);
        $statement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}
