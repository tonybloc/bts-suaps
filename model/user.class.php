<?php 
require_once (__DIR__.'/../config.php');
include_once(ROOT_FOLDER . DS .'model'. DS .'connect.class.php');


/**
 * Class User
 */
class User
{
    /**
     * 
     * @var string : identifiant de l'utilisateur
     */
    private $_id;
    /**
     * @var unknown : Role de l'utilisateur
     */
    private $_role;
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
     * 
     * @var int : nombre d'annulation total;
     */
    private $_nbAnnulation;
    
    /**
     * @var array : données de l'utilisateur
     */
    private $data;
    public function __construct($data_user = array())
    {
        if(!empty($data_user))
        {
            if(array_key_exists("ID_UTIL", $data_user) && array_key_exists("ID_ROLE", $data_user)
                && array_key_exists("EMAIL", $data_user) && array_key_exists("FIRSTNAME_UTIL", $data_user)
                    && array_key_exists("LASTNAME_UTIL", $data_user) && array_key_exists("PASSWORD_UTIL", $data_user)
                        && array_key_exists("NB_TICKETS_SEMAINE", $data_user) && array_key_exists("NB_TICKETS_WEEKEND", $data_user)
                            && array_key_exists("NB_TICKETS_TOTAL_UTIL", $data_user) && array_key_exists("NB_ANNULATION_TOTAL", $data_user))
            {
                echo "EXISTE";
                $this->_id = $data_user['ID_UTIL'];
                $this->_role = $data_user['ID_ROLE'];
                $this->_email = $data_user['EMAIL'];
                $this->_firstName = $data_user['FIRSTNAME_UTIL'];
                $this->_lastName = $data_user['LASTNAME_UTIL'];
                $this->_password = $data_user['PASSWORD_UTIL'];
                $this->_nbTicketSemaine = $data_user['NB_TICKETS_SEMAINE'];
                $this->_nbTicketWeek = $data_user['NB_TICKETS_WEEKEND'];
                $this->_nbTicketTotal = $data_user['NB_TICKETS_TOTAL_UTIL'];
                $this->_nbAnnulation = $data_user['NB_ANNULATION_TOTAL'];
            }
            
        }
    }
   
    ##### AUTRE METHODES #####
        
    
    
    ##### ACCESSEURS #####
    public function getId()
    {
        return $this->_id;
    }
    public function getRole()
    {
        // 1 : Administrateur
        // 2 : Membre
        // 4 : Adhérant
        // 3 : invité
        
        return $this->_role;
    }
    public function getRoleLib()
    {
        switch ($this->_role){
            case 1:
                return "Administrateur";
                break;
            case 2:
                return "Membre";
                break;
            case 3:
                return "Invité";
                break;
            case 4:
                return "Adhérant";
                break;
            
            default:
                return null;
        }
    }
    public function getFirstName()
    {
        return $this->_firstName;
    }
    public function getLastName()
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
    public function getNbAnnulation()
    {
        return $this->_nbAnnulation;
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
    public function setAnnulation($nbAnnul)
    {
        if(is_int($nbAnnul))
        {
            $this->_nbAnnulation += $nbAnnul;
        }
        else
        {
            return null;
        }
    }
    
}