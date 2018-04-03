<?php
/**
 * Reservation statistics class
 *
 * @author Daniel Beard / BE Creativos <daniel@creativos.be>
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class Timeline
{

    protected $db;
    protected $monthNames;
    protected $reservations;

    /**
     * @brief Construtor
     *
     * @param DbInterface $db
     */
    public function __construct(DbInterface $db)
    {

        $this->db = $db;

    }

    /**
     * @brief Gets array of months
     *
     * @param DateTime $startDate
     * @param Array $monthNames
     * @return Array
     */
    public function getMonths($startDate, $monthNames)
    {

        $thisMonth = $startDate->modify('first day of this month');
        

        $months = [];

        for ($i = 1; $i <= 12; $i++){
        
            $monthIndex = $thisMonth->format('n') - 1;
            
            // Month names
            $months['names'][] = mb_substr($monthNames[$monthIndex], 0, 3);

            // Month days
            $year = $thisMonth->format('Y');
            
            $months['days'][] = $this->getDaysOfMonth($thisMonth->format('m'), $thisMonth->format('Y'));
            $thisMonth->modify('+1 month');
        
        }       


        return $months;

    }



    public function getDaysOfMonth($month, $year) {

        $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $datesMonth = [];
    
        for ($i = 1; $i <= $num; $i++) {
            $mktime = mktime(0, 0, 0, $month, $i, $year);
            $date = date("Y-m-d", $mktime);
            $datesMonth[$i] = $date;
        }
    
        return $datesMonth;

    }



    /**
     * @brief Gets listof properties
     *
     * @return Array
     */
    public function getProperties($claseId = 3)
    {

        $properties = $this->getPropertyData($claseId);

        return $properties;

    }

    /**
     * @brief Queries db for properties
     *
     * @return Array
     */
    protected function getPropertyData($claseId)
    {

        $query = "
                    SELECT id, referencia, 
                    titulo_".LANGUAGE." AS titulo
                    FROM ".XNAME."_viviendas 
                    WHERE visible = 1
                    AND clase_id = {$claseId}
                    ";
        $sql = $this->db->dataset($query);

        return $sql;

    }

    /**
     * @brief Gets list of confirmed reservations
     *
     * @return Array
     */
    public function getReservations()
    {

        $today = date('Y-m-m');
        $query = "
                    SELECT * 
                    FROM ".XNAME."_reservas 
                    WHERE confirmado = 1 
                    ORDER BY fecha_llegada";
        $sql = $this->db->dataset($query);

        return $sql;

    }


}