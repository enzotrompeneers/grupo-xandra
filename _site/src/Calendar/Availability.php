<?php
/**
 * Date availablity class
 *
 * @author Daniel Beard <daniel@creativos.be>
 *
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class Availability {
	
    protected $db;
    protected $data;

	protected $table = 'reservas';
	
	/**
	 * @brief Constructor
	 *
	 * @param DbInterface $db
	 * @param Integer $id
	 */
	public function __construct(DbInterface $db){

		$this->db = $db;

    }
    
    /**
     * @brief Gets array of dates not available
     *
     * @param Integer $id
     * @param String $format
     * @return Array
     */
    public function getUnavailableDates($id, $format = 'Y-m-d')
    {

        $data = $this->getReservations($id);

        $output = [];

        foreach ($data as $dates) {

            $unavailableDates = $this->getDatesFromRange($dates['fecha_llegada'], $dates['fecha_salida'], $format);
            
            $output = array_merge($output, $unavailableDates);

        }

        return $output;

    }

    /**
     * @brief Gets class, "booked", "booked-byowner" or false
     *
     * @param Integer $propertyId
     * @param String $day Y-m-d
     * @return Mixed
     */
    public function getClass($propertyId, $day)
    {

        if (!$this->data) $this->getData();

        $reservations = $this->getReservations($propertyId);
        foreach ($reservations as $reservation){

            if ($day >= $reservation['fecha_llegada'] && $day < $reservation['fecha_salida']) {

                return ($reservation['propietario'] == 1) ? 'booked-byowner' : 'booked';

            }

        }
        
        return false;
    }

    /**
     * @brief Gets array of entry and departure dates
     *
     * @param Integer $id
     * @param String $format
     * @return Array ['entries' => [], 'departures' => []]
     */
    public function getHalfDays($id, $format = 'Y-m-d')
    {

        $data = $this->getReservations($id);

        $output = [];
        $output['entries'] = [];
        $output['departures'] = [];

        foreach ($data as $range) {
            $output['entries'][] = date($format, strtotime($range['fecha_llegada']));
            $output['departures'][] = date($format, strtotime($range['fecha_salida']));
        }

        return $output;

    }

    /**
     * @brief Gets all dates in given month
     *
     * @param Integer $month Jan = 1, Feb = 2, etc...
     * @param Integer $year
     * @return Array
     */
    public function getDaysOfMonth($month, $year)
    {

        $startDate = $year . '-' . $month . '-01';
        $startTime = strtotime($startDate);

        $endTime = strtotime("+1 month", $startTime);

        for($i = $startTime; $i < $endTime; $i += 86400) {
            $list[] = date('Y-m-d', $i);
        }

        return $list;

    }

    /**
     * @brief Gets list of reservations
     *
     * @param Integer $id
     * @return Array
     */
    public function getReservations($id)
    {
        
        if (!$this->data) $this->getData();

        $reservations =  array_filter($this->data, function($reservation) use($id) {
            return ($reservation['vivienda_id'] == $id);
        });

        return $reservations;

    }

    /**
     * @brief Gets array of arrival dates for a given property
     *
     * @param Integer $id
     * @return Array
     */
    public function getStartDates($id)
    {

        if (!$this->data) $this->getData();

        $startDates = [];
        $today = date('Y-m-d');

        $reservationDates = array_filter($this->data, function($reservation) use($id, $today) {
            return ($reservation['vivienda_id'] == $id && $reservation['fecha_llegada'] > $today);
        });

        foreach($reservationDates as $reservation){
            $startDates[] = $reservation['fecha_llegada'];
        }

        return $startDates;

    }

    /**
     * @brief Gets the ID of a reservation from property ID and given date
     *
     * @param Integer $id
     * @param String $arrivalDate Y-m-d
     * @return Integer
     */
    public function getReservationId($id, $arrivalDate)
    {

        if (!$this->data) $this->getData();

        $reservationDates = array_filter($this->data, function($reservation) use($id, $arrivalDate) {
            return ($reservation['vivienda_id'] == $id && $reservation['fecha_llegada'] == $arrivalDate);
        });
        $reservationDates = array_values($reservationDates);

        $reservationId = (isset($reservationDates[0]['id'])) ? $reservationDates[0]['id'] : false;

        return $reservationId;

    }

    /**
     * @brief Gets first current reservation of a property
     *
     * @param Integer $propertyId
     * @return Integer Id of reservation
     */
    public function getFirstReservation($propertyId)
    {

        if (!$this->data) $this->getData();

        $reservationDates = array_filter($this->data, function($reservation) use($propertyId) {
            return ($reservation['vivienda_id'] == $propertyId );
        });
        $reservationDates = array_values($reservationDates);
        $reservationId = (isset($reservationDates[0]['id'])) ? $reservationDates[0]['id'] : false;

        return $reservationId;
    }

    /**
     * @brief Is reservation confirmed?
     *
     * @param Integer $reservationId
     * @return Boolean
     */
    public function isConfirmed($reservationId)
    {

        $query = "SELECT confirmado FROM ".XNAME."_{$this->table} WHERE id = {$reservationId}";
        $sql = $this->db->record($query);

        return ($sql['confirmado'] == 1) ? true : false;

    }

    /**
     * @brief Reservation confirmation date
     *
     * @param Integer $reservationId
     * @return String
     */
    public function getConfirmedDate($reservationId)
    {

        $query = "SELECT fecha_confirmado FROM ".XNAME."_{$this->table} WHERE id = {$reservationId}";
        $sql = $this->db->record($query);
        
        return ($sql['fecha_confirmado']) ? $sql['fecha_confirmado'] : false;

    }

    public function confirm($reservationId)
    {

        $today = date('Y-m-d');
        $query = "
                    UPDATE ".XNAME."_{$this->table} 
                    SET confirmado = 1, fecha_confirmado = '{$today}' 
                    WHERE id = {$reservationId}";
        $sql = $this->db->query($query);

    }

    /**
     * @brief Remove confirmation
     *
     * @param Int $reservationId
     * @return Void
     */
    public function removeConfirmation($reservationId)
    {

        $query = "UPDATE ".XNAME."_{$this->table} SET confirmado = 0 WHERE id = {$reservationId}";
        $sql = $this->db->query($query);

    }

    /**
     * @brief Gets all reservations that are notin past
     *
     * @return Void
     */
    protected function getData()
    {

        if ($this->data) return $this->data;

        $today = date('Y-m-d');

        $query = "
                    SELECT id, fecha_llegada, fecha_salida, 
                    vivienda_id, propietario 
                    FROM ".XNAME."_{$this->table} 
                    WHERE fecha_salida >= '{$today}'
                    AND confirmado = 1
                    ORDER BY fecha_llegada
                   
                    ";
        $this->data = $this->db->dataset($query);
       
        return $this->data;

    }

    /**
     * @brief Gets array of dates from start & end dates
     *
     * @param String $startDate
     * @param String $endDate
     * @return Array
     */
	protected function getDatesFromRange($startDate, $endDate, $format = 'Y-m-d') {

        $today = date('Y-m-d');

        $oneMonthAgo = date("Y-m-d", strtotime("-1 month"));
        
        $dates = [];
        $current = strtotime($startDate);
        $last = strtotime($endDate);
    
        while( $current <= $last ) {

            $formattedDate = date($format, $current);

            if ($current >= $oneMonthAgo) {
                $dates[] = $formattedDate;
            }
            
            $current = strtotime('+ 1 day', $current);

        }
    
        return $dates;
	}

    /**
     * @brief Table setter
     *
     * @param String $table
     * @return Void
     */
    public function setTable($table)
    {

        $this->table = $table;

    }


}