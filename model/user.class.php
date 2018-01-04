<?php 
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
    
    
    
    public function __construct($data = array())
    {
        $this->_firstName = $this->getValue('firstName');
        $this->_lastName = $this->getValue('lastName');
        $this->_email = $this->getValue('email');
        $this->_password = $this->getValue('password');
        $this->_nbTicketSemaine = 0;     // à modifier si besoin (prochaine fonctionalité)
        $this->_nbTicketWeek = 0;        // à modifier si besoin (prochaine fonctionalité)
    }
   
    ##### AUTRE METHODES #####
    
    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    /**
     * Methode permettant 
     */
    public function updateUser(){
        
    }
    
    
    
    ##### ACCESSEURS #####
    
    public  function getUser()
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
            // Exception
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
            // Exception
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
            // Exception
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
            // Exception
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
            // Exception
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
            // Exception
        }
    }
    
}