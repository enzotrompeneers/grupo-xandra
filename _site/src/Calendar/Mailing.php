<?php
namespace Brunelencantado\Calendar;

use Noodlehaus\Config;

use Brunelencantado\Database\DbInterface;
use Brunelencantado\Content\Menu;
use Brunelencantado\Mail\Mailer;

/**
 * Mailing class
 * 
 * Sends out various mailings
 * 
 * @author Daniel Beard <daniel@creativos.be>
 *  
 */
class Mailing
{

    protected $db;
    protected $mailer;
    protected $menu;
    protected $defaultLanguage;
    protected $reservations;

    /**
     * @brief Constructor
     *
     * @param DbInterface $db
     * @param Mailer $mailer
     */
    public function __construct(DbInterface $db, Mailer $mailer, Menu $menu)
    {

        $this->db = $db;
        $this->mailer = $mailer;
        $this->menu = $menu;

        // Default language
        $config = new Config([dirname(__FILE__) . '/../../config/config.yaml']); 
        $this->defaultLanguage = $config->get('default_locale');

    }

    /**
     * @brief Sends clients and client's partners a birthday email, if it is today
     *
     * @return Void
     */
    public function sendBirthdayMails()
    {

        $today = date('m-d');
        $query = "  SELECT *
                    FROM ".XNAME."_clientes
        ";
        $sql = $this->db->dataset($query);

        foreach ($sql AS $client) {

            // Send client birthday email
            if ($client['fecha_nacimiento'] && date('m-d', strtotime($client['fecha_nacimiento'])) == $today)
            {
                $this->sendBirthdayMail($client, 'birthday');
            }

            // Send client's partner birthday email
            if ($client['fecha_nacimiento_pareja'] && date('m-d', strtotime($client['fecha_nacimiento_pareja'])) == $today){

                $client['nombre'] = $client['nombre_pareja'];
                $client['apellido'] = $client['apellido_pareja'];
                $client['email'] = $client['email_pareja'];

                $this->sendBirthdayMail($client, 'birthday');

            }
        }

        // Add owner's emails too
        $ownerQuery = "SELECT * FROM ".XNAME."_propietarios";
        $ownerSql = $this->db->dataset($ownerQuery);

        foreach($ownerSql as $owner){
            if ($owner['fecha_nacimiento'] && date('m-d', strtotime($owner['fecha_nacimiento'])) == $today) {
                $owner['apellido'] = '';
                $this->sendBirthdayMail($owner, 'birthday');
             }           
        }


    }

    /**
     * @brief Sends & logs the actual email
     *
     * @param Array $client
     * @param String $clave
     * @return Void
     */
    protected function sendBirthdayMail($client, $clave)
    {

        $fullName = $client['nombre'] . ' ' . $client['apellido'];
        $language = ($client['idioma']) ? strtolower($client['idioma']) : $this->defaultLanguage;

        $this->mailer->to($client['email'], $fullName)
                      ->addContentByKey('birthday', ['%%NOMBRE%%' => $client['nombre']], $language)
                      ->send()
                      ->to(webConfig('email'), webConfig('nombre'))
                      ->send()
                      ->log($clave);

    }

    /**
     * @brief Sends out emails with info 1 week before arrival
     *
     * @return Void
     */
    public function sendWelcomeEmails()
    {

        if (!$this->reservations) $this->getReservations();

        $oneWeekFromToday = date('Y-m-d', strtotime('+1 week'));

        foreach ($this->reservations as $reservation)
        {

            if ($reservation['fecha_llegada'] == $oneWeekFromToday) {
                
                // Send email with info
                $fullName = $reservation['nombre'] . ' ' . $reservation['apellido'];
                $language = ($reservation['idioma']) ? strtolower($reservation['idioma']) : $this->defaultLanguage;
                $this->mailer->to($reservation['email'], $fullName)
                             ->addContentByKey('week_before', ['%%NOMBRE%%' => $fullName], $language)
                             ->send()
                             ->log('week_before');
            }

        }

    }

    /**
     * @brief Sends email 1 week after client departs, with link to comment form
     *
     * @return Void
     */
    public function sendFollowUpMails()
    {

        if (!$this->reservations) $this->getReservations();

        $oneWeekAgo = date('Y-m-d', strtotime('-1 week'));

        foreach ($this->reservations as $reservation){

            if ($reservation['fecha_salida'] == $oneWeekAgo){

                $link =  $this->createCommentLink($reservation);

                // Send email with link
                $fullName = $reservation['nombre'] . ' ' . $reservation['apellido'];
                $language = ($reservation['idioma']) ? strtolower($reservation['idioma']) : $this->defaultLanguage;
                $this->mailer->to($reservation['email'], $fullName)
                             ->addContentByKey('week_after', ['%%NOMBRE%%' => $fullName, '%%LINK%%' => $link], $language)
                             ->send()
                             ->log('week_after');

           }

        }

    }

    /**
     * @brief Creates link with hash for comment
     *
     * @param Array $reservation
     * @return String
     */
    protected function createCommentLink($reservation)
    {
        $data = [];
        $data['reserva_id'] = $reservation['id'];
        $data['fecha_creado'] = date('Y-m-d');
        $data['hash'] = uniqid();

        $this->db->insertQuery($data, XNAME.'_comentarios');

        $language = ($reservation['idioma']) ? strtolower($reservation['idioma']) : $this->defaultLanguage;
        $link = $this->menu->getUrl('comentarios', $language) . $data['hash'] . '/';
        
printout($link);

        return $link;

    }

    /**
     * @brief Gets all reservations from DB
     *
     * @return Void
     */
    protected function getReservations()
    {

        $query = "  SELECT *, res.id AS id
                    FROM ".XNAME."_reservas res
                    LEFT OUTER JOIN ".XNAME."_clientes cli
                        ON res.cliente_id = cli.id
                    ";
        $sql = $this->db->dataset($query);

        $this->reservations = $sql;

    }


    /** Todo */
    protected function markAsSent()
    {
        
    }

    /** Todo */
    protected function hasBeenSent()
    {

    }

    protected function getMap($propertyId)
    {

        /// Get coordinates

        // Get map
        // http://maps.googleapis.com/maps/api/staticmap?center=38.288884489573924,-0.5500140253906238&zoom=14&size=362x254&maptype=roadmap &markers=color:orange%7C38.288884489573924,-0.5500140253906238&sensor=false


    }



}