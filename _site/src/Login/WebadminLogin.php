<?php
/**
 * Login handler
 *
 * @author Daniel Beard <daniel@creativos.be>
 */

namespace Brunelencantado\Login;

class WebadminLogin
{
	protected $db;
    protected $user;
    protected $superPasswordHash= '$2y$10$eiqQQa7TiEGv.WKyXb6oWOcUahbCDCXmw4M42/LkeW9gxjjdpYa.u'; // MD5
	
	/**
	 * Create a new Instance
	 */
	public function __construct($db)
	{
		$this->db = $db;
		
	}
	
	/**
	 *  @brief Validate credentials agains database
	 *  
	 *  @param [in] $email 
	 *  @param [in] $password 
	 *  @return Boolean
	 *  
	 */
	public function login($username, $password)
	{
		$username = $this->db->sanitize($username);
        $password = $this->db->sanitize($password);

		$query = "SELECT id, username, password, rol FROM " . XNAME . "_admins WHERE username = '{$username}'";
		$sql = $this->db->record($query);

        // Hydrate user object
		$this->user = new \stdClass();
		$this->user->id 		= $sql['id'];
		$this->user->username 	= $sql['username'];
		$this->user->rol 		= $sql['rol'];

		$superUser = $this->isSuperUser($username, $password);

		if (($sql['username'] == $username && $sql['password'] == $password) || $superUser){

			if ($superUser) $this->rol = 'superuser';

			$_SESSION['Admin'] = $this->user;
			return true;
		}
		
	}
	
	/**
	 *  @brief Tells if user is logged in or not
	 *  
	 *  @return Boolean
	 *  
	 */
	public function isLoggedIn()
	{
		if (!empty($_SESSION['Admin'])){
			return true;
		}
    }
    

    /**
     * Checks if credentials are for super user
     *
     * @param [string] $username
     * @param [string] $password
     * @return boolean
     */
    protected function isSuperUser($username, $password)
    {
        return ($username == 'admin' && password_verify($password, $this->superPasswordHash));

    }
}


// End of file