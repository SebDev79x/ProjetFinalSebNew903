<?php

class clients {

    public $id = 0;
    public $firstname = '';
    public $lastname = '';
    public $birthdate = '1900-01-01';
    public $card = false;
    public $cardNumber = 0;
    private $db = null;


    public function __construct() {
        /* $DB = instance de l'objet PDO
         * try / catch permet de lever l'exception (erreur critique) 
         * permet de continuer à executer le code malgré l'erreur
         */
        try {
            // dans 'pdo' : phrase de connexion
            //Creation d'une instance de l'objet pdo
            $this->db = new PDO('mysql:host=localhost; dbname=colyseum; charset=utf8', 'root', 'N2;[vPd8');
            // Test : si une exception est levée (bug etc.), on la traite et on affiche un message d'erreur à l'utilisateur
            // $e = variable qui stock l'exception
        } catch (PDOException $e) {
            die('Impossible d\'accéder à la base de données. Message d\'erreur : "'
                    //appel de la méthode de l'objet
                    . $e->getMessage() . '".');
        }
    }
/**
 * Cette méthode permet de retourner la liste des clients commençant par la lettre m et 
 * par ordre alphabétique
 * @return array
 */
    public function getUsersListFilteredByExo7Order() {
        // requête SQL : récupérer les noms et prénoms de la table clients qui commence par la lettre M
       $sql = 'SELECT
                UPPER(`clients`.`lastName`) AS `lastname`,
                `clients`.`firstName`,
                DATE_FORMAT(`clients`.`birthDate`, "%d/%m/%Y") AS `birthDate`,
                CASE 
                    WHEN `cards`.`cardTypesId` = 1 THEN "Oui" 
                    ELSE "Non"
                END AS `Carte_de_Fidélité`,
                CASE 
                   WHEN `cards`.`cardTypesId` = 1 THEN `clients`.`cardNumber`
                   ELSE ""
                END AS `Numéro_de_carte_de_fidélité`
        FROM `clients`
            LEFT JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber`
            LEFT JOIN `cardTypes` ON `cards`.`cardTypesId` = `cardTypes`.`id`';
        /* appel à la méthode query, à laquelle on donne la requête SQL, 
         * elle nous retourne une instance de l'objet PDOStatement 
         */
        $request = $this->db->query($sql);

//méthode fetchAll PDO FETCH OBJ permet de retourner un tableau d'objets des résultats de la requête SQL
        return $request->fetchAll(PDO::FETCH_OBJ) ;
    }

}
