<?php 
include_once(ROOT_FOLDER . DS .'model'. DS .'connect.class.php');


/**
 * Class User
 */
class User
{
    /**
     * @var string : nom de l'utilisateur
     */
    private $_firstName;
    /**
     * @var string : prénom de l'utilisateur
     */
    private $_lastName;
    /**
     * @var string : mots de passe de l'utilisateur (pour l'instant non crypté)
     */
    private $_password;
    /**
     * @var string : email de l'utilisateur
     */
    private $_email;
    /**
     * @var int : nombre de ticket weekend disponible;
     */
    private $_nbTicketWeek;
    /**
     * @var int : nombre de ticket semaine disponible
     */
    private $_nbTicketSemaine;
    /**
     * @var array : Donnée utilisée lors de l'inscription d'un utilisateur
     */
    private $_data;
    /**
     * Crée une connexion avec la bdd
     * @var unknown
     */
    private $_myConnection;
    
    
    public function __construct($data = array())
    {
        if(!empty($data))
        {
            $this->_firstName = $this->getValue('firstName');
            $this->_lastName = $this->getValue('lastName');
            $this->_email = $this->getValue('email');
            $this->_password = $this->getValue('password');
            $this->_nbTicketSemaine = 0;     // à modifier si besoin (prochaine fonctionalité)
            $this->_nbTicketWeek = 0;        // à modifier si besoin (prochaine fonctionalité)
        }
        else 
        {
               
        }        
    }
   
    ##### AUTRE METHODES #####
    
    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    
    private function initConnection()
    {
        $this->_myConnection = new Connection();
    }
    
    /**
     * Mes à jour les informations de l'utilisatateur dans la bdd
     */
    public function updateUser()
    {
        
    }
    
    
    
    ##### ACCESSEURS #####
    
    public static function getUser($email)
    {
        $lastName = "malanie";
        $firstName = "Jean";
        
    }
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getNbTicketWeek()
    {
        return $this->nbTicketWeek;
    }
    public function getNbTicketSemaine()
    {
        return $this->nbTicketSemaine;
    }
    
    
    ##### MUTTATEURS ######
    
    public function setLastName($lastName)
    {
        if(is_string($lastName))
        {
            $this->_lastName = $lastName;
        }
        else
        {
            return null;
        }
    }
    public function setFirstName($firstName)
    {
        if(is_string($firstName))
        {
            $this->_firstName = $firstName;
        }
        else
        {
            return null;
        }
    }
    public function setEmail($email)
    {
        if(is_string($email))
        {
            $this->_email = $email;
        }
        else
        {
            return null;
        }
    }
    public function setPassword($password)
    {
        if(is_string($password))
        {
            $this->_password = $password;
        }
        else
        {
            return null;
        }
    }
    public function addTicketWeek($nbTicket)
    {
        if(is_int($nbTicket))
        {
            $this->_nbTicketWeek += $nbTicket;
        }
        else
        {
            return null;
        }
    }
    public function addTicketSemaine($nbTicket)
    {
        if(is_int($nbTicket))
        {
            $this->_nbTicketWeek += $nbTicket;
        }
        else
        {
            return null;
        }
    }
    public function delTicketWeek($nbTicket)
    {
        if(is_int($nbTicket))
        {
            $this->_nbTicketWeek -= $nbTicket;
        }
        else
        {
            return null;
        }
    }
    public function delTicketSemain($nbTicket)
    {
        if(is_int($nbTicket))
        {
            $this->_nbTicketWeek -= $nbTicket;
        }
        else
        {
            return null;
        }
    }
    
}