<?php
/**
 * Form processing tool
 *
 * @author Daniel Beard <daniel@brunel-encantado.com>
 */

namespace Brunelencantado\Formularios;

use \Brunelencantado\Database\DbInterface;

class Formulario
{
	protected $campos = array();
	protected $requiredFields = array();
	protected $errores = array();
	protected $db;
	protected $archivos_permitidos = array('png', 'jpg', 'jpeg', 'doc', 'docx', 'pdf');

	protected $ignores = array('submit','condiciones', 'id', 'code', 'g-recaptcha-response');
	protected $claveRecaptcha = '6LfyvjQUAAAAACS3sAsKlt2PA55xT1kSvGMBl5gM';

    public function __construct(array $campos, array $requiredFields, DbInterface $db)
    {
		$this->campos = $campos;
		$this->requiredFields = $requiredFields;
		$this->db = $db;
    }
	
	/**
	 *  @brief Validates all required fields
	 *  
	 *  @return boolean, validates or not
	 *  
	 */
	public function hasErrors()
	{
		
		// Check all required fields
		foreach ($this->requiredFields as $k=>$v){
			
			$valor = (!empty($this->campos[$k]))?$this->campos[$k]:'';
			$tipo = $v;
			$error = $this->fieldHasError($k, $valor, $tipo);
			
			if ($error){
				$this->errores[$k] = trad($error);
			}
			
		}
		
		if ($this->errores){
		
			return $this->errores;
			
		}
		
		
	}
	
	/**
	 *  @brief saves form to database
	 * 
	 *  @param array Values to ignore in full email
	 *  
	 *  @return boolean, true if successful, false if not
	 *  
	 */
	public function save(array $ignores)
	{

		// Get full POST
		$cleanStrings = $this->sanitize($this->campos);
		$fullEmail = $this->data2Table($cleanStrings, $ignores);
		
		// Prepare data for saving
		$insert = array();
		$insert['nombre'] 			= (!empty($cleanStrings['nombre'])) ? $cleanStrings['nombre'].' '.$cleanStrings['apellido'] : $cleanStrings['nombre_asegurado'];
		$insert['telefono'] 		= $cleanStrings['telefono'];
		$insert['email'] 			= $cleanStrings['email'];
		$insert['mensaje'] 			= (!empty($cleanStrings['mensaje'])) ? $cleanStrings['mensaje'] : '';
		$insert['idioma'] 			= LANGUAGE;
		$insert['email_completo'] 	= $fullEmail;
		$insert['fecha']	 		= date('Y-m-d H:i:s');
		$insert['ip']	 			= $_SERVER['REMOTE_ADDR'];
		
		// Insert into database
		$this->db->insertQuery($insert, XNAME . '_contactos');
		
	}

	/**
	 * Sanitizes array
	 *
	 * @param array $array
	 * @return array
	 */
	public function sanitize(array $array)
	{

		$cleanStrings = [];

		foreach ($array as $k => $v) {

			$cleanStrings[$k] = filter_var($v, FILTER_SANITIZE_STRING);

		}

		return $cleanStrings;

	}

	/**
	 * Converts data to HTML table,minus $ignores fields
	 *
	 * @param array $data
	 * @param array $ignores
	 * @return string
	 */
	public function data2Table(array $data, array $ignores = [])
	{

		$fullEmail = '<table>';

		foreach ($data as $k=>$v){
			if (in_array($k, $ignores)) continue;
			if ($v=='') continue;
			$fullEmail .= ($v!='') ? '<tr><td><strong>'.trad($k).':</strong>&nbsp;</td><td>'.$v.'</td></tr>'."\n":'';
		}

		$fullEmail .= '</table>';

		return $fullEmail;

	}

	/**
	 * Recaptcha key setter
	 *
	 * @param string $clave
	 * @return void
	 */
	public function setRecaptchaClave($clave)
	{

		$this->claveRecaptcha = $clave;

	}

	/**
	 * Recaptcha key getter
	 *
	 * @return string
	 */
	public function getRecaptchaClave()
	{

		return $this->claveRecaptcha;

	}

	/**
	 *  Checks file extensions to see if valid
	 *  
	 *  @param array $archivos array of file names
	 *  @return string error if not accepted extension
	 *  
	 */
	protected function checkFiles(array $archivos)
	{
		foreach ($archivos as $archivo){

			$extension = pathinfo($archivo, PATHINFO_EXTENSION);

			if (!in_array($extension, $this->archivos_permitidos)){

				return 'error_archivo';

			}
		}
	}
	
	/**
	 * Says if value is valid, depending on type
	 *  
	 *  @param string $key 
	 *  @param string $value 
	 *  @return Error if not valid
	 *  
	 */
	protected function fieldHasError($key, $value, $type = 'texto')
	{
		
		// Text
		if ($type == 'texto') {
			if ($value == '') {
				return $key;
			}
		}

		// URL
		if ($type == 'url') {
			if (filter_var($value, FILTER_VALIDATE_URL == false)){
				return 'error_'.$key;
			}
		}
		
		// Email
		if ($type == 'email') {
			if (!valid_email($value)){
				return 'error_'.$key;
			}
		}
		
		// Captcha
		if ($type == 'captcha') {
			if (!chk_crypt($value)){
				return 'error_'.$key;
			}
		}
		
		// Clave
		if ($type == 'clave') {
			if (strlen($value) < 6){
				return 'error_'.$key;
			}
		}
		
		// Checkbox
		if ($type == 'checkbox') {
			if (strtolower($value!='on')) {
				
				return 'error_'.$key;
			}
		}

		// Recaptcha
		if ($type == 'recaptcha') {

			if (!$this->testRecaptcha($value)) {

				return 'error_' . $key;

			}
		}

		return false;
	}

	/**
	 * Tests Recaptcha 
	 *
	 * @param string $value
	 * @return boolean
	 */
	protected function testRecaptcha($value)
	{

		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => $this->claveRecaptcha,
			'response' => $value
		);
		
		$options = array(
			'http' => array (
				'header' => 'Content-Type: application/x-www-form-urlencoded',
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captchaSuccess = json_decode($verify);

		return $captchaSuccess->success;

	}

}


// End of file