<?php 
require_once (__DIR__.'/../config.php');
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
     * @var int : nombre de ticket total utilisé
     */
    private $_nbTicketTotal;
    /**
     * @var array : données de l'utilisateur
     */
    private $data;
    public function __construct($data_user)
    {
        
        if(isset($data_user))
        {
            if(array_key_exists("EMAIL", $data_user && array_key_exists("FIRSTNAME_UTIL", $data_user)
                && array_key_exists("LASTNAME_UTIL", $data_user) && array_key_exists("PASSWORD_UTIL", $data_user)
                    && array_key_exists("NB_TICKETS_SEMAINE", $data_user) && array_key_exists("NB_TICKETS_WEEKEND", $data_user)
                        && array_key_exists("NB_TICKETS_TOTAL_UTIL", $data_user)))
            {
                
                $this->_email = $myUser['EMAIL'];
                $this->_firstName = $myUser['FIRSTNAME_UTIL'];
                $this->_lastName = $myUser['LASTNAME_UTIL'];
                $this->_password = $myUser['PASSWORD_UTIL'];
                $this->_nbTicketSemaine = $myUser['NB_TICKETS_SEMAINE'];
                $this->_nbTicketWeek = $myUser['NB_TICKETS_WEEKEND'];
                $this->_nbTicketTotal = $myUser['NB_TICKETS_TOTAL_UTIL'];
            }
            
        }
    }
   
    ##### AUTRE METHODES #####
        
    /**
     * Mes à jour les informations de l'utilisatateur dans la bdd
     */
    public function updateUser()
    {
        
    }
    
    ##### ACCESSEURS #####
    
    public function getfirstName()
    {
        return $this->_firstName;
    }
    public function getlastName()
    {
        return $this->_lastName;
    }
    public function getEmail()
    {
        return $this->_email;
    }
    public function getNbTicketWeek()
    {
        return $this->_nbTicketWeek;
    }
    public function getNbTicketSemaine()
    {
        return $this->_nbTicketSemaine;
    }
    public function getNbTicketTotal()
    {
        return $this->_nbTicketTotal;
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
    public function setTicketTotal($nbTicketUtilise)
    {
        if(is_int($nbTicketUtilise))
        {
            $this->_nbTicketWeek += $nbTicketUtilise;
        }
        else
        {
            return null;
        }
    }
    
}