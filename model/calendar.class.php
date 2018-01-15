<?php

class Calendar
{
    /**
     * 
     * @var unknown
     */
    private $day;
    /**
     * contient le mois du calendrier
     * @var int
     */
    private $month;
    
    /**
     * contient le jour du calendrier
     * @var int
     */
    private $year;
    
    /**
     * nombre de jours dans le mois
     * @var int
     */
    private $nbDays;
    
    /**
     * jour de la semaine
     * @var int
     */
    private $dayWeek;
    
    /**
     * formateur de date
     * @ unknown
     */
    private $dateFormatter;
    
    /**
     * Génère une instance de la classe Calendar
     * @param int $_month
     * @param int $_year
     */
    public function __construct($_day,$_month, $_year)
    {
        $this->day              = $_day;
        $this->month            = $_month;
        $this->year             = $_year;
        $this->nbDays           = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);
    }
    
    /**
     * Génére le calendrier
     */
    public function _generate()
    {
       
        /*-- GENERATION DU CALENDRIER --*/
        
        echo "<div id='content'>";
        echo "<table class='calendrier' >";
        
        $dayTemp = $this->day;
        $tempNbL= 1;
        // Génération des case du tableau
        for($i = 1 ; $i < 76; $i++) 
        {
            
            if($dayTemp > $this->nbDays)
            {
                if ($this->month == 12)
                {
                    $this->month = 1;
                    $this->year++;
                    $this->day =1;
                    $dayTemp = 1;
                }
                else
                {
                    $this->month++;
                    $this->day =1;
                    $dayTemp = 1;
                    $tempNbL = 1;
                }
                $this->dateFormatter   = cal_to_jd(CAL_GREGORIAN, $this->month, $this->day,$this->year);
            }
            else
            {
                if ($i == 6)
                    $this->dateFormatter   = cal_to_jd(CAL_GREGORIAN, $this->month,$this->day,$this->year);
                else
                {
                    $this->dateFormatter   = cal_to_jd(CAL_GREGORIAN, $this->month, $dayTemp,$this->year);
                }
            }
            
            $this->dayWeek = jddayofweek($this->dateFormatter);
            
            // Première cellule : Mois acctuel
            if ($i == 1)
            {
                    echo "<thead><tr><td class='cel cel_month'></td>";
            }
            // Cellule date
            else if ($i%5==1 && $i > 1)
            {    
                // Si le jour est un weekend alors on ajoute une class "cel_weekend" 
                if( $this->dayWeek == 0 || $this->dayWeek == 6){
                    echo "<tr><td class='cel cel_date cel_weekend'>".$this->getDayToString($this->dayWeek)." ".$dayTemp."</td>";
                }else{
                    echo "<tr><td class='cel cel_date'>".$this->getDayToString($this->dayWeek)." ".$dayTemp."</td>";
                }
            }
            // Joueur 4 (Dernière celule d'une ligne Cellule) 
            else if ($i%5==0 && $i > 5)
            {
                if( $this->dayWeek == 0 || $this->dayWeek == 6){
                    echo "<td class='cel cel_reserv cel_weekend' id=j4-".$this->year."-".$this->month."-".$dayTemp."></td></tr>";
                }else{
                    echo "<td class='cel cel_reserv' id=j4-".$this->year."-".$this->month."-".$dayTemp."></td></tr>";
                }
                
                $tempNbL++;
                $dayTemp ++;
                
            }
            // Titre des cellules
            else if ($i == 5)
                echo "<th class='cel cel_joueur'>Joueur ".($i-1)."</th></tr></thead>";
            else if ($i<6 && $i>1)
                echo "<th class='cel cel_joueur'>Joueur ".($i-1)."</th>";
            // Cellule de reservation : Joueur 1,2,3
            else{
                // Joueur 1
                if ($i%5==2 ){
                    if ($this->dayWeek == 0 || $this->dayWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j1-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j1-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }
                }
                // Joueur 2
                else if ($i%5==3 ){
                    if ($this->dayWeek == 0 || $this->dayWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j2-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j2-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }                     
                }
                // Joueur 3    
                else if ($i%5==4 ){
                    if($this->dayWeek == 0 || $this->dayWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j3-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j3-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    }
                }
                    
            }
            
        }
        
        echo "</table>";
        echo "</div>";
    }
    
    /**
     * @return number
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return number
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return number
     */
    public function getNbDays()
    {
        return $this->nbDays;
    }

    /**
     * @param number $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * @param number $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @param number $nbDays
     */
    public function setNbDays($nbDays)
    {
        $this->nbDays = $nbDays;
    }
    public function getMonthYearToString()
    {
        // Liste des Mois
        $listeDesMois = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
        
        $tempMonth = $listeDesMois[$this->month-1] ." ".$this->year;
        
        if ($this->day+14 >$this->nbDays )
        {
            if ($this->month == 12)
                $tempMonth = $listeDesMois[11]."/".$listeDesMois[0] ." - ". $this->year."/".($this->year+1);
            else
                $tempMonth =$listeDesMois[$this->month]."/".$listeDesMois[$this->month+1] ." - ". $this->year;
        }
        return $tempMonth;
    }
    public function getDayToString($nb)
    {
       
        $ap = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
        return $ap[$nb];
    }
}
?>
