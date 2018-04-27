<?php

class Calendar
{
    /**
     * contient le jour du calendrier
     * @var unknown
     */
    private $day;
    /**
     * contient le mois du calendrier
     * @var int
     */
    private $month;
    
    /**
     * contient l'année du calendrier
     * @var int
     */
    private $year;
    
    /**
     * nombre de jours dans le mois
     * @var int
     */
    private $nbDaysInMonth;
    
    /**
     * jour de la semaine
     * @var int
     */
    private $dayOfWeek;
    
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
        $this->nbDaysInMonth           = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);
    }
    
    /**
     * Ajoute un jour
     * @param int $_day
     */
    public function addDay($_day)
    {
        $customDate = new DateTime($this->day.'-'.$this->month .'-'.$this->year . " +".$_day . " day");
        
        $this->day = $customDate->format("j");
        $this->month = $customDate->format("n");
        $this->year = $customDate->format("Y");
    }
    /**
     * formatte l'affichage du numéro de jour (exp: '2' à '02')
     * @param int $day
     * @return string|string
     */
    public function formatNumberOfDay2($_day){
        if($_day >= 1 && $_day <= 9){
            return "0".$_day;
        }else{
            return "".$_day;
        }
        
    }
    /**
     * Génére le calendrier
     */
    public function generate()
    {
        echo "<div id='content'>";
        echo "<table class='calendrier' id='calendrier' >";
        
        $tempDay = $this->day;
        //$tempMonth;
        //$tempYear;
        $tempNbLigne= 1;
        $nbCaseAGenere = 80;
        
        // Génération des cases du tableau
        for($indexCase = 1 ; $indexCase <= $nbCaseAGenere; $indexCase++) 
        {            
            if($tempDay > $this->nbDaysInMonth){
                if ($this->month >= 12){
                    $this->month = 1;
                    $this->year++;
                    $this->day = 1;
                    $tempDay = 1;
                }
                else{
                    $this->month++;
                    $this->day =1;
                    $tempDay = 1;
                    $tempNbLigne = 1;
                }
                
                $this->nbDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
                $this->dateFormatter = cal_to_jd(CAL_GREGORIAN, $this->month, $this->day,$this->year);
            }
            else{
                $this->nbDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
                $this->dateFormatter = cal_to_jd(CAL_GREGORIAN, $this->month, $tempDay,$this->year);
            }           
            
            // met à jour les données
            $this->dayOfWeek = jddayofweek($this->dateFormatter);
            
            // Première ligne du calandrier          
            if ($indexCase<=5 && $indexCase>=0){
                if ($indexCase == 1){
                    echo "<thead><tr><th class='cel cel_month'></th>";
                }
                else if ($indexCase == 5){
                    echo "<th class='cel cel_joueur'>Joueur ".($indexCase-1)."</th></tr></thead>";
                }else{
                    echo "<th class='cel cel_joueur'>Joueur ".($indexCase-1)."</th>";
                }
            }      
            // Cellule de reservation : affichage Jour + Joueur 1,2,3,4
            else{
                //Affichage de la date (ex : "mercredi 20")
                if ($indexCase%5==1){
                    // jour de weekend
                    if( $this->dayOfWeek == 0 || $this->dayOfWeek == 6){
                        echo "<tr><td class='cel cel_date cel_weekend'>".$this->getDayToString($this->dayOfWeek)." ".$this->formatNumberOfDay2($tempDay)."</td>";
                    }else{
                        echo "<tr><td class='cel cel_date'>".$this->getDayToString($this->dayOfWeek)." ".$this->formatNumberOfDay2($tempDay)."</td>";
                    }
                }
                // Joueur 1
                if ($indexCase%5==2 ){
                    if ($this->dayOfWeek == 0 || $this->dayOfWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j1-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j1-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }
                // Joueur 2
                }else if ($indexCase%5==3 ){
                    if ($this->dayOfWeek == 0 || $this->dayOfWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j2-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j2-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }                     
                }
                // Joueur 3    
                else if ($indexCase%5==4 ){
                    if($this->dayOfWeek == 0 || $this->dayOfWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j3-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j3-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td>";
                    }
                }
                // Joueur 4 (Dernière celule d'une ligne Cellule)
                else if ($indexCase%5==0){
                    if( $this->dayOfWeek == 0 || $this->dayOfWeek == 6){
                        echo "<td class='cel cel_reserv cel_weekend' id=j4-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td></tr>";
                    }else{
                        echo "<td class='cel cel_reserv' id=j4-".$this->year."-".$this->formatNumberOfDay2($this->month)."-".$this->formatNumberOfDay2($tempDay)."></td></tr>";
                    }
                    $tempNbLigne ++;
                    $tempDay ++;
                }
            }
        }
        
        echo "</table>";
        echo "</div>";
        //on remplis le tableau dès sa génération avec les noms des utilisateurs qui on reservés 
        //initSessionUsersCalendar();
        //require_once (ROOT_FOLDER.DS.'asset'.DS.'js'.DS.'fill_calendar.php');
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
        return $this->nbDaysInMonth;
    }

    /**
     * @param number $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }
    /**
     * 
     * @return unknown
     */
    public function getDay(){
        return $this->day;
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
        $this->nbDaysInMonth = $nbDays;
    }
    
    /**
     * retourn le mois en String 
     * @return string
     */
    public function getMonthYearToString()
    {
        // Liste des Mois
        $listeDesMois = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
        
        $tempMonth = $listeDesMois[$this->month-1] ." ".$this->year;
       
        if ($this->day+14 >$this->nbDaysInMonth )
        {
            if ($this->month == 12)
                $tempMonth = $listeDesMois[11]."/".$listeDesMois[0] ." - ". $this->year."/".($this->year+1);
            else
                $tempMonth =$listeDesMois[intval($this->month)-1]."/".$listeDesMois[intval($this->month)] ." - ". $this->year;
        }
        return $tempMonth;
    }
    
    /**
     * Retourne le jour en String
     * @param unknown $nb
     * @return string
     */
    public function getDayToString($nb)
    {
       
        $ap = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
        return $ap[$nb];
    }
}
?>
