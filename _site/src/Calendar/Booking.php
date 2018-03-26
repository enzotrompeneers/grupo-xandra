<?php
/**
 * Rental booking class
 *
 * @author Daniel Beard <daniel@brunel-encantado.com>
 *
 */

namespace Brunelencantado\Calendar;


class Booking {
	
	protected 		$id;
	protected		$reservationCost;
	protected		$propertyRef;
	protected		$extras;

	public			$clientDetails;
	public			$db;

	protected		$error = [];
	
	public function __construct($id, ReservationCost $reservationCost, array $clientDetails, $db){

		$this->id					= $id;
		$this->reservationCost		= $reservationCost;
		$this->clientDetails		= $clientDetails;
		$this->db					= $db;

	}
	
	public function validate() {
		// Error handling
		
		if (empty($this->clientDetails['nombre'])) 				{	$this->error['nombre']			= trad('introduzca_nombre'); }
		if (empty($this->clientDetails['apellido'])) 			{	$this->error['apellido']		= trad('introduzca_apellido'); }
		// if (empty($this->clientDetails['identificacion'])) 	{	$this->error['identificacion']	= trad('introduzca_identificacion'); }
		if (empty($this->clientDetails['direccion'])) 			{	$this->error['direccion']		= trad('introduzca_direccion'); }
		if (empty($this->clientDetails['codigo_postal'])) 		{	$this->error['codigo_postal']	= trad('introduzca_codigo_postal'); }
		if (empty($this->clientDetails['localidad'])) 			{	$this->error['localidad']		= trad('introduzca_localidad'); }
		if (empty($this->clientDetails['pais'])) 				{	$this->error['pais']			= trad('introduzca_pais'); }
		if (!valid_email($this->clientDetails['email'])) 		{	$this->error['email']			= trad('introduzca_email'); }
		if (empty($this->clientDetails['telefono'])) 			{	$this->error['telefono']		= trad('introduzca_telefono'); }
		// if (empty($this->clientDetails['condiciones'])) 		{	$this->error['condiciones']		= trad('acepte_condiciones'); }
		
		if ($this->error) return false;
			
		return true;

	}
	
	public function insert() {

		// Insert data into database
		$insert							= array();
		
		// Client data
		$insert['nombre']				= $this->clientDetails['nombre'];
		$insert['apellido']				= $this->clientDetails['apellido'];
		$insert['identificacion']		= $this->clientDetails['identificacion'];
		$insert['direccion']			= $this->clientDetails['direccion']."\n".$this->clientDetails['codigo_postal'] . "\n" . 
										  $this->clientDetails['localidad']."\n".$this->clientDetails['pais'] . "\n";
		$insert['email']				= $this->clientDetails['email'];
		$insert['telefono']				= $this->clientDetails['telefono'];
		$insert['mensaje']				= $this->clientDetails['mensaje'];
		
		// Reservation data
		$insert['vivienda_id']			= $this->reservationCost->id;
		$insert['fecha_llegada']		= $this->reservationCost->isoDate($this->reservationCost->fecha_llegada);
		$insert['fecha_salida']			= $this->reservationCost->isoDate($this->reservationCost->fecha_salida);
		$insert['hora_llegada']			= $this->reservationCost->hora_llegada;
		$insert['hora_salida']			= $this->reservationCost->hora_salida;
		$insert['personas']				= $this->reservationCost->personas;
		$insert['extras']				= ($this->reservationCost->extras) ? implode(', ', $this->reservationCost->extras) : null;
		$insert['coste_alquiler']		= $this->reservationCost->rentCost;
		$insert['coste_extras']			= $this->reservationCost->extrasCost;
		$insert['total']				= $this->reservationCost->totalCost; 
		
		// Meta data
		$insert['fecha']				= date('Y-m-d');
		$insert['ip']					= $_SERVER['REMOTE_ADDR'];
		$insert['hash']					= md5(uniqid(mt_rand(), true));
		$insert['confirmado']			= 0;
		
		// Plop it into the database
		$this->db->insertQuery($insert, XNAME . '_reservas');

	}
	
	// Returns errors in json format
	public function jsonErrors()
	{

		$errors = array();

		$errors['errors'] = $this->error;
		$errors['message'] = 'error';

		header('Content-Type: application/json');

		return json_encode($errors);

	}
	
	public function sendEmails($mailVariables, $data) {

		$mailContent 				= mail_content('booking');
		$mailOptions 				= array();
		$mailOptions['to'] 			= $this->clientDetails['email'];
		$mailOptions['variables'] 	= $mailVariables;
		$mailOptions['asunto'] 		= $mailContent['asunto'];
		$mailOptions['template']	= 'lib/mods/contacto/templates/template_contacto.php';
		$mailOptions['fromName']	= webConfig('nombre');
		$mailOptions['from']		= webConfig('email');
		
		$mailOptions['ignores'] 	= array('submit', 'code', 'role', 'id', 'reserva', 'condiciones', 'mailing_list');

		// Form data
		$fullEmail = '<table>';
		
		$fullEmail .= $this->setPostData($data, $mailOptions['ignores']);

	
		
		// Property data
		$referencia					= $this->getPropertyRef();
		$fullEmail 					.= '<tr><td>'.trad('vivienda').':&nbsp;</td><td>'.$referencia.'</td></tr>';

		// Price info
		$fullEmail 					.= '<tr><td>' . trad('precio_alquiler') . ':&nbsp;</td><td>' . $this->reservationCost->rentCost . ' &euro;</td></tr>';
		$fullEmail 					.= '<tr><td>' . trad('precio_extras') . ':&nbsp;</td><td>' . $this->reservationCost->extrasCost . ' &euro;</td></tr>';
		$fullEmail 					.= '<tr><td>' . trad('precio') . ':&nbsp;</td><td>' . $this->reservationCost->totalCost . ' &euro;</td></tr>';
		$fullEmail 					.= '<tr><td>' . trad('deposit') . ':&nbsp;</td><td>' . $this->reservationCost->depositCost . ' &euro;</td></tr>';
		
		$fullEmail 					.= '</table>';
		$nombre						= $this->clientDetails['nombre'] . ' ' . $this->clientDetails['apellido'];
		$message 					= str_replace('%%NOMBRE%%', $nombre, $mailContent['mensaje']);
		
		$mailOptions['mensaje'] 	= $message . $fullEmail;
		$mailOptions['embeddeds'] 	= array('mailheader' => 'images/logo.png'); 
		// printout($mailOptions);
		
		// Send client email
		if (send_mail($mailOptions)){

			// Send owner email
			$mailOptions['asunto'] 		= 'Web booking';
			$mailOptions['to'] 			= webConfig('email');
			$mailOptions['fromName']	= $nombre;
			$mailOptions['from']		= $this->clientDetails['email'];

			send_mail($mailOptions);

			return true;

		} 
	
		echo 'Error';

	}

	// Puts POST data into tabole format
	protected function setPostData($data, $ignores)
	{

		$setData = '';

		foreach ($data as $k => $v){
			
				if(in_array($k, $ignores)) continue;
				if ($v == '') continue;
				if ($k == 'formulario') $v = trad($v);
	
				$v = ($v == 'on') ? trad('si') : $v;
	
				$label = trad($k);
				$label = ($this->isExtra($k)) ?  $this->getExtraName($k) : $label;
				
				$setData .= '<tr><td>' . $label . ':&nbsp;</td><td>' . $v . '</td></tr>';
	
			}	

			return $setData;

	}

	protected function getPropertyRef() {

		$query		= "SELECT referencia FROM ".XNAME."_viviendas WHERE id = {$this->reservationCost->id}";
		$sql		= $this->db->record($query);
		
		return $sql['referencia'];

	}




	protected function isExtra($name)
	{
		if (mb_substr($name, 0, 6, 'utf-8') == 'extra_') return true;

	}
	
	protected function getExtraName($name)
	{

		$extraId = 	ltrim($name, 'extra_');

		if (empty($this->extras)){

			$query = "SELECT * FROM ".XNAME."_extras";
			$sql = $this->db->dataset($query);

			$extras = [];

			if ($sql){

				foreach($sql as $k => $v){

					$extras[$v['id']] = $v['nombre_' . LANGUAGE];

				}

			$this->extras = $extras;

			}

		}

		return $this->extras[$extraId];

	}
	

	
}