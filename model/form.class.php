<?php
/**
 * Class Form
 * Permet de crée un formulaire
 */
class Form
{
    /**
     * @var array : données utilisées par le formulaire
     */
    private $data = array();
    /**
     * @var string : Tag utilisé pour entourer les champs
     */
    private $tag = 'p';
    
    /**
     * @param array : $data , donnée utilisées par le formulaire qui permet de préremplire la valeur des champs)
     */
    public function __construct($data = array())
    {
        $this->data = $data;    
    }
    /**
     * Permet d'entourer un contenu html
     * 
     * @param string : $htmlContent, contenu HTML à entourer
     * @return string
     */
    private function surround($htmlContent)
    {
        return '<'.$this->tag.'>' . $htmlContent . '<'.$this->tag.'>';
    }
    /**
     * @param int : $index, index de la valeur à récupèrer
     * @return string
     */
    private function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
    /**
     * Crée un label
     * @param string : $text, texte du label
     * @param string : $for, reférence à un champ de saisie
     * @return string
     */
    public function label($text, $class="", $for="")
    {
        return '<label for="'.$for.'" class="'.$class.'">'.$text.'</label>';
    }
    /**
     * Crée un champs de saisie de type 'email'
     * 
     * @param string : $name, nom du champ
     * @param string : $placeholder, 'placeholder' du champ
     * @return string 
     */
    public function email($name, $id="", $class="", $placeholder = "")
    {
        return '<input type="email" name="'.$name.'" id="'.$id.'" class="'.$class.'" placeholder="'.$placeholder.'" value="'.$this->getValue($name).'">';
    }
    /**
     * Crée un champs de saisie de type 'password'
     *
     * @param string : $name, nom du champ
     * @param string : $placeholder, 'placeholder' du champ
     * @return string
     */
    public function password($name, $id="", $class="", $placeholder="")
    {
        return '<input type="password" name="'.$name.'" id="'.$id.'" class="'.$class.'" placeholder="'.$placeholder.'" value="'.$this->getValue($name).'">';
    }
    /**
     * Crée un champs de saisie de type 'texte'
     *
     * @param string : $name, nom du champ
     * @param string : $placeholder, 'placeholder' du champ
     * @return string
     */
    public function input($name, $id="", $class="", $placeholder="")
    {
        return '<input type="text" name="'. $name .'" id="'.$id.'" class="'.$class.'" placeholder="'. $placeholder .'" value="'.$this->getValue($name).'">';
    }
    /**
     * Crée un bouton de validation de formulaire
     * 
     * @return string
     */
    public function submit($value, $id="", $class="")
    {
        return $this->surround('<button type="sumbit" id="'.$id.'" class="'.$class.'">'.$value.'</button>');
    }
}