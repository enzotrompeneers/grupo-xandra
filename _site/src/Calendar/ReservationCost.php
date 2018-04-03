<?php
/**
 * Calendar render tool
 *
 * Takes into account past dates and reservations
 *
 * @author Daniel Beard <daniel@brunel-encantado.com>
 *
 */

namespace Brunelencantado\Calendar;

use Brunelencantado\Database\DbInterface;

class ReservationCost
{

	const MINIMUM_STAY = 4;
	const MAXIMUM_STAY = 28;

	protected $id;
	protected $data;
	protected $db;

	public $totalCost = 0;
	public $rentCost = 0;
	public $extrasCost = 0;
	public $depositCost = 250;
	public $allCorrect;
	public $error;

	protected $fecha_llegada;
	protected $fecha_salida;
	protected $hora_llegada;
	protected $hora_salida;
	protected $personas;
	protected $adultos;
	protected $ninos;
	protected $bebes;
	protected $animales;
	
	protected $extras = [];
	protected $totalDays;
	protected $totalPrices;
	


	/**
	 * @brief Constructor
	 *
	 * @param Array $data
	 * @param DbInterface $db
	 */
	public function __construct(array $data, DbInterface $db){
		
		
		$this->data = filter_var_array($data, FILTER_SANITIZE_STRING);;
		$this->db = $db;
		$this->id = $data['id'];
	
		$this->fecha_llegada	= $data['fecha_llegada'];
		$this->fecha_salida		= $data['fecha_salida'];
		$this->hora_llegada		= $data['hora_llegada'];
		$this->hora_salida		= $data['hora_salida'];
		$this->adultos			= $data['adultos']; // + $data['ninos'];
		$this->ninos			= $data['ninos']; // + $data['ninos'];
		$this->bebes			= $data['bebes']; // + $data['ninos'];
		$this->personas			= $data['adultos'] + $data['ninos'] + $data['bebes'];
		// $this->bebes			= $data['bebes'];

		// Need to validate dates
		if (!$this->validateDate($this->fecha_llegada) || !$this->validateDate($this->fecha_salida) || !is_numeric($this->personas)) {
			$this->error =  trad('error_incorrecto');
		}
	
		if (!$this->correctSequence()) {
			$this->error =  trad('error_incorrecto');
		}
		
		// All is well!
		if (!$this->error) {
			$this->getData(); 		// Process data	and get basic rental price
			$this->rentCost			= (is_array($this->totalPrices))?ceil(array_sum($this->totalPrices)):0;
			$this->depositCost		= $this->getDeposit(); // Deposit 

			$this->totalCost		= $this->rentCost; // rental cost
			// $this->outOfHours();	// Out of hours extra?
			$this->extrasCost		= $this->calculateExtras(); // Get extras cost
			$this->totalCost		+= $this->extrasCost; // Total
		}
		
	}

	/**
	 * @brief Sets the sequence in action
	 *
	 * @return Void
	 */
	protected function getData(){
		
		// Get dates as an array
		$dateArray			= $this->dateRange('d/m/Y');
		$this->totalDays	= count($dateArray);
		
		// Minimum stay
		if ($this->totalDays < self::MINIMUM_STAY) {

			$this->error =  trad('error_estancia_minima');

		}

		// Maximum stay
		if ($this->totalDays > self::MAXIMUM_STAY) {

			$this->error =  trad('error_estancia_maxima');

		}

		// Walk through dates to get prices
		foreach ($dateArray as $v) {

			if (!$this->dateAvailable($this->isoDate($v, '/'))) {

				$this->error = trad('error_fecha_no_disponible');

			}

			$season	= $this->getSeason($this->isoDate($v, '/'));
			$season = ($season == 'autumn_season' || $season == 'spring_season') ? 'mid_season' : $season;
			
			$prices	= $this->getDayPrices($this->isoDate($v, '/'));
			$specialPrice = $this->getSpecialPrice($this->isoDate($v, '/'));
			
			$weekPrice = $prices[$season];
			$weekPrice = ($specialPrice) ? $specialPrice : $weekPrice;

			$dayPrice = $weekPrice / 7;
			$this->totalPrices[] = $dayPrice;
		}
	
	}

	/**
	 * @brief Make sure departure later than arrival
	 *
	 * @return Boolean
	 */
	protected function correctSequence() {

		$dateFromObject		= \DateTime::createFromFormat('d/m/Y', $this->fecha_llegada);
		$dateToObject		= \DateTime::createFromFormat('d/m/Y', $this->fecha_salida);

		if ($dateFromObject>$dateToObject) {

			return false;

		}

		return true;
	}
	
	/**
	 * @brief Make sure valid dates and not in past
	 *
	 * @param String $date
	 * @return String
	 */
	protected function validateDate($date) {

		$d 			= \DateTime::createFromFormat('d/m/Y', $date);
		$today		= date('d/m/Y');
		$t			= \DateTime::createFromFormat('d/m/Y', $today);

		if (!$date || $d < $t) {

			$this->error =  trad('error_pasado');

			return;

		}

		return $d->format('d/m/Y') . $date;
	}
	
	/**
	 * @brief Get date array
	 *
	 * @param String $outputFormat
	 * @param String $step
	 * @return Array
	 */
	protected function dateRange($outputFormat = 'Y-m-d', $step = '+1 day') {
		$dates 		= array();
		$current 	= strtotime(str_replace('/', '-', $this->fecha_llegada));
		$last 		= strtotime(str_replace('/', '-', $this->fecha_salida));
		
		while ($current<$last) {
			$dates[] 	= date($outputFormat, $current);
			$current 	= strtotime($step, $current);
		}
		
		return $dates;
	}



	/**
	 * @brief Get season from date
	 *
	 * @param String $date
	 * @return String
	 */
	protected function getSeason($date) {

		$query = "SELECT clave FROM ".XNAME."_temporadas WHERE '{$date}' BETWEEN fecha_comienzo AND fecha_fin";
		$sql = record($query);
		return $sql['clave'];

	}
	
	/**
	 * @brief Get daily price for each day
	 *
	 * @param String $date
	 * @return Array
	 */
	protected function getDayPrices($date) {
		global $xname,$language;
		$season							= $this->getSeason($date);
		$query							= "	SELECT precio_temp_alta, precio_temp_media, precio_temp_baja
											FROM {$xname}_viviendas 
											WHERE id = {$this->id} ";
		$sql							= record($query);
	
		$response						= array();
		$response['high_season']		= $sql['precio_temp_alta'];
		$response['mid_season']			= $sql['precio_temp_media'];
		$response['low_season']			= $sql['precio_temp_baja'];
		// printout($response);
		return $response;
	}
	
	/**
	 * @brief Get special season price if applies
	 *
	 * @param String $date
	 * @return Integer
	 */
	protected function getSpecialPrice($date)
	{

		$query = "SELECT temporadas_json FROM ".XNAME."_viviendas WHERE id = {$this->id}";
		$sql = $this->db->record($query);

		$specialDates = json_decode($sql['temporadas_json']);

		if ($specialDates) {
			
			foreach ($specialDates as $dateRange) {
				
				if ($date >= $dateRange->fechaComienzo && $date <= $dateRange->fechaFin) {
					
					return $dateRange->precio;
		
				}
	
			}

		}

	}

	/**
	 * @brief Get deposit for this property
	 *
	 * @return Integer
	 */
	protected function getDeposit()
	{
		$query = "SELECT deposito FROM ".XNAME."_viviendas WHERE id = {$this->id}";
		$sql = record($query);

		$deposito = ($sql['deposito']) ? $sql['deposito'] : $this->depositCost;

		return $deposito;
	}
	
	/**
	 * @brief Calculate extras
	 *
	 * @return Array
	 */
	protected function calculateExtras()
	{
		
		$selectedExtras = $this->getAllExtras();
		$extrasCosts = $this->getExtrasCostsThisProperty();
		$extrasInfo = $this->getExtrasInfo();

		$extrasTotal = 0;

		foreach ($selectedExtras as $key => $extra){

			$extraCost = $extrasCosts[$extra];

			$thisExtra = $extrasInfo[$extra];
			
			if ($thisExtra['no_contabilizar'] == 1) continue;

			if ($thisExtra['por_dia'] == 1) $extraCost = $extraCost * $this->totalDays;
			if ($thisExtra['por_semana'] == 1) $extraCost = $extraCost * $this->totalDays / 7;
			if ($thisExtra['por_persona'] == 1) $extraCost = $extraCost * $this->personas;
			if ($thisExtra['por_bebe'] == 1) $extraCost = $extraCost * $this->bebes;
			if ($thisExtra['por_animal'] == 1) $extraCost = $extraCost * $this->animales;
			
			$extrasTotal += round($extraCost);
	
		}

		return $extrasTotal;
		
	}

	/**
	 * @brief Get extras from post
	 *
	 * @return Array
	 */
	protected function getAllExtras()
	{

		$extras = [];
		
		foreach ($this->data as $k => $v) {

			if (mb_substr($k, 0, 6) == 'extra_') {
				
				$aExtra = explode('_', $k);

				// Jump the security deposit as it should not count in the final price
				if ($aExtra[1] == 6) continue; 

				$extras[] = $aExtra[1];

			}

		}

		return $extras;
		
	}

	/**
	 * @brief Get array for all extras costs
	 *
	 * @return Array
	 */
	protected function getExtrasCostsThisProperty()
	{

		$costQuery = "SELECT extras_json FROM ".XNAME."_viviendas WHERE id = {$this->id}";
		$costSql = $this->db->record($costQuery);
		$oCosts = json_decode($costSql['extras_json']);
		$aCosts = [];

		if ($oCosts) {
			foreach($oCosts as $cost) {
				$aCosts[$cost->id] = $cost->value;
			}
		}

		return ($aCosts);

	}

	/**
	 * @brief Get extras type
	 *
	 * @return Array
	 */
	protected function getExtrasInfo()
	{

		$query = "SELECT * FROM ".XNAME."_extras";
		$sql = $this->db->dataset($query);

		$extras = [];

		foreach ($sql as $k => $v) {

			$extras[$v['id']] = $v;

		}

		return $extras;

	}
	
	/**
	 * @brief Is date available?
	 *
	 * @param String $date ISO format
	 * @return Boolean
	 */
	protected function dateAvailable($date)
	{
		$query = "	SELECT vivienda_id 
					FROM ".XNAME."_reservas  
					WHERE '{$date}' > fecha_llegada AND '{$date}' < fecha_salida 
					AND vivienda_id = {$this->id} 
					AND confirmado = 1 
				";

		$sql = record($query);

		if (!$sql) return true;

	}
	
	/**
	 * @brief Do we have an extras cost?
	 *
	 * @return Void
	 */
	protected function outOfHours()
	{
		// validate times
		if (!$this->isTime($this->hora_llegada) || !$this->isTime($this->hora_salida)){
			$this->error =  trad('error_hora');
		}
		
		// Form data
		$aCheckIn 	= explode(':', $this->hora_llegada);
		$aCheckOut 	= explode(':', $this->hora_salida);
		$checkIn 	= new \DateTime();
		$checkOut 	= new \DateTime();
		$checkIn->setTime($aCheckIn[0], $aCheckIn[1]);
		$checkOut->setTime($aCheckOut[0], $aCheckOut[1]);
		
		// Limit times

		// Checkin limits
		$checkInLowerLimit 	= new \DateTime();
		$aCheckInLowerLimit = explode(':', webconfig('check_in_lower_limit'));
		$checkInLowerLimit->setTime($aCheckInLowerLimit[0], $aCheckInLowerLimit[1]);
		$checkInUpperLimit 	= new \DateTime();
		$aCheckInUpperLimit = explode(':', webconfig('check_in_upper_limit'));
		$checkInUpperLimit->setTime($aCheckInUpperLimit[0], $aCheckInUpperLimit[1]);

		// Checkout limits
		$checkOutLowerLimit 	= new \DateTime();
		$aCheckOutLowerLimit = explode(':', webconfig('check_out_lower_limit'));
		$checkOutLowerLimit->setTime($aCheckOutLowerLimit[0], $aCheckOutLowerLimit[1]);
		$checkOutUpperLimit 	= new \DateTime();
		$aCheckOutUpperLimit = explode(':', webconfig('check_out_upper_limit'));
		$checkOutUpperLimit->setTime($aCheckOutUpperLimit[0], $aCheckOutUpperLimit[1]);
		
		// Add extra cost if out of hours
		if ($checkOut < $checkOutLowerLimit || $checkOut > $checkOutUpperLimit) {
			$this->error = trad('error_hora_checkout');
		}
		if ($checkIn > $checkInUpperLimit || $checkIn < $checkInLowerLimit) {
			$this->error = trad('error_hora_checkin');
		}

	}
	
	/**
	 * @brief Is valid time?
	 *
	 * @param String $time Checks 17:00 format
	 * @return Boolean
	 */
	protected function isTime($time)
	{
		if (preg_match("/(2[0-3]|[01][0-9]):([0-5][0-9])/", $time))
		{

			return true;
			
		}
	}

	/**
	 * @brief Get date in ISO format
	 *
	 * @param String $date
	 * @param String $delimiter Default is /
	 * @return String Y-m-d format
	 */
	protected function isoDate($date, $delimiter='/') {

		$dateArray			= explode($delimiter, $date);
		$output				= $dateArray[2] . '-' . $dateArray[1] . '-'.$dateArray[0];

		return $output;

	}
	


}









// End file