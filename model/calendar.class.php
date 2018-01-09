<?php
namespace model;

class Calendar
{
    
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
    public function __construct($_month, $_year)
    {
        $this->month            = $_month;
        $this->year             = $_year;
        $this->nbDays           = cal_days_in_month(CAL_GREGORIAN, $_month, $_year);
        
    }
    
    /*
     * 
     */
    public function _generate()
    {
        echo "<table class='p' >";
        
        for($i = 1 ; $i < 76; $i++) 
        {
            //générations des cases
            $this->dateFormatter   = cal_to_jd(CAL_GREGORIAN, $this->month, $i,$this->year);
            $this->dayWeek         = jddayofweek($this->dateFormatter);
            //if( $x<14)
            //{
                if ($i == 1)
                    echo "<tr><td class ='plein'>".$this->getMonthToString($this->month)."</td>";
                else if ($i%5==1)
                    echo "<tr><td class ='plein'>".$this->dayWeek."</td>";
                else if ($i%5==0 && $i>5)
                    echo "<td class ='plein'>".$this->dayWeek."</td></tr>";
                else if ($i<6 && $i>1)
                    echo "<td class ='plein'>Joueur ".($i-1)."</td>";
                else 
                    echo "<td class ='plein'></td>";
            //}
        }
        echo "</table>";
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

    public function getMonthToString($nb)
    {
        $key = $nb-1;
        $ap = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
        return $ap[$key];
    }
    
}
?>
