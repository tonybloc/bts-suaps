<?php 
/**
 * Class User
 */
class User
{
    private $firstName;
    private $lastName;
    private $password;
    private $email;
    
    private $data = array();
    public function __construct($data = array())
    {
        $this->firstName = $this->getValue();    
    }
    
    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
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
}