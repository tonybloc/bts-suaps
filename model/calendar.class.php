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
     * génère une instance de la classe tableau
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
    
    /*
     * 
     */
    public function _generate()
    {
        echo "<div id='content'>";
        echo "<table class='p' >";
        
        $dayTemp = $this->day;
        $tempNbL= 1;
        for($i = 1 ; $i < 76; $i++) 
        {
            
            //$dayTemp = $this->day+ $tempNbL-1;
            //générations des cases
            if( $dayTemp>$this->nbDays)
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
            if ($i == 1){
                    echo "<thead><tr><td class='plein'>".$this->getMonthYearToString()."</td>";
            }else if ($i%5==1 && $i > 1)
                    echo "<tr><td class='plein'>".$this->getDayToString($this->dayWeek)." ".$dayTemp."</td>";
                else if ($i%5==0 && $i > 5)
                {
                    echo "<td class='plein' id=j4-".$this->year."-".$this->month."-".$dayTemp."></td></tr>";
                    $tempNbL++;
                    $dayTemp ++;
                    
                }
                else if ($i == 5)
                    echo "<td class='plein'>Joueur ".($i-1)."</td></tr></thead>";
                else if ($i<6 && $i>1)
                    echo "<td class='plein'>Joueur ".($i-1)."</td>";
                else 
                    if ($i%5==2 )
                        echo "<td class='plein' id=j1-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    else if ($i%5==3 )
                        echo "<td class='plein' id=j2-".$this->year."-".$this->month."-".$dayTemp."></td>";
                    else if ($i%5==4 )
                        echo "<td class='plein' id=j3-".$this->year."-".$this->month."-".$dayTemp."></td>";
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
        $ap = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
        $tempMonth = $ap[$this->month-1] ." ".$this->year;
        if ($this->day+14 >$this->nbDays )
        {
            if ($this->month == 12)
                $tempMonth = $ap[11]."/".$ap[0] ." - ". $this->year."/".($this->year+1);
            else
                $tempMonth =$ap[$this->month]."/".$ap[$this->month+1] ." - ". $this->year;
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
