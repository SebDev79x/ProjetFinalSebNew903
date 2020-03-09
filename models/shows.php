<?php

class shows {

    public $id = 0;
    public $title = '';
    public $performer = '';
    public $date = '1900-01-01';
    public $showTypesId = false;
    public $firstGenresId = 0;
    public $secondGenreId = 0;
    public $duration = '00:00:00';
    public $startTime = '00:00:00';
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
     * Cette méthode permet de retourner la liste des spectacles avec le nom de l'artiste, la durée et l'heure 
     * par ordre alphabétique
     * @return array
     */
    public function getShowPerformerDateHourByAlphabOrder() {
        // requête SQL : récupérer titre, artiste, date, heure de début, par ordre alphan (titre)
        $sql = 'SELECT `title`,
                `performer`, 
                DATE_FORMAT(`date`, "%d/%m/%Y") AS `date`,
                `startTime`
                    FROM `shows`
                ORDER BY `title`';
        /* appel à la méthode query, à laquelle on donne la requête SQL, 
         * elle nous retourne une instance de l'objet PDOStatement 
         */
        $request = $this->db->query($sql);

//méthode fetchAll PDO FETCH OBJ permet de retourner un tableau d'objets des résultats de la requête SQL
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
