<?php
// help : http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/ 
/**
 * Class de connection à une base de donée
 *
 */
  class Connection
  {
	/**
	 * Moteur de la bdd
	 * @var string
	 */
    private $_moteur        = DB_MOTEUR;
    /**
     * Host de la bdd
     * @var string
     */
    private $_host 			= DB_HOST_NAME;
    /**
     * Nom de la bdd
     * @var string
     */
    private $_dbname       	= DB_DATABASE_NAME;
    /**
     * identifiant de connexion à la bdd
     * @var string
     */
    private $_user		 	= DB_USER_NAME;
    /**
     * Mot de passe de connexion à la bdd
     * @var string
     */
    private $_password      = DB_PASSWORD;
    /**
     * Connexion PDO à la base de donée
     * @var string
     */
    private $_bdh 			= '';
    /** 
     * Etat de la connexion (requete)
     * @var unknown
     */
	private $stmt			= '';
	
	/**
	 * Constructeur de la classe : Connexion aux serveur de base de donnée
	 */
    public function __construct()
    {	
		$dsn = $this->_moteur.':host='.$this->_host.';dbname='.$this->_dbname.';charset=utf8';
		// PDO::ATTR_PERSISTENT : Augmente les performances en vérifiant si une connexion à la bdd existe déjà
		$options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
        );
		// Connexion à la base de donnée
		try{
			$this->_bdh = new PDO($dsn, $this->_user, $this->_password, $options);	
		}	
		catch(PDOException $e){
			die( 'Erreur de connexion : '.$e->getMessage());
		}
    }
	
	/** 	
	 *	Prépare une requête 
	 *  @param string : $query, requête à préparer.
	 */
	public function query($query)
	{
		$this->stmt = $this->_bdh->prepare($query);
	}
	/** 
	 * 	Attributer une valeur à un paramètre de la requête préparée
	 * 	@param  string : $param, paramètre de la requête de préparation.
	 * 	@param  unknown : $value, valeur de ce paramètre.
	 * 	@param  unknown : $type, type du paramètre.
	 */
	public function bind($param, $value, $type = null)
	{	
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
				break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	/**
	 * Execution d'une requête préparé
	 * @return unknown
	 */
	public function execute(){
		return $this->stmt->execute();
	}	
	/**
	 * Affiche tout les réponses d'une requete.
	 * @return unknown
	 */
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	/**
	 * Affiche la première ligne des réponses
	 * @return unknown
	 */
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	/**
	 * Retourne le nombre de ligne affécté par la requête
	 * @return unknown
	 */
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	/**
	 * Retourne l'identifiant de la dérnière ligne inséré
	 * @return string
	 */
	public function lastInsertId(){
		return $this->_bdh->lastInsertId();
	}	
	/**
	 * Démarre une transaction, désactivation de l'auto-commit
	 * @return boolean
	 */
	public function beginTransaction(){
		return $this->_bdh->beginTransaction();
	}
	/**
	 * Terminer une transaction, on applique les modifications
	 * @return boolean
	 */
	public function endTransaction(){
		return $this->_bdh->commit();
	}
	/**
	 * On annule les modifications dans une transaction
	 * @return boolean
	 */
	public function cancelTransaction(){
		return $this->_bdh->rollBack();
	}
	
	/**
	 * Affichage détailler de la requête préparer 
	 * @return unknown
	 */
	public function debugDumpParams(){
		return $this->stmt->debugDumpParams();
	}
	/**
	 * Fermeture de la connexion
	 */
	public function close(){
		$this->_bdd = null;
	}
  }
?>