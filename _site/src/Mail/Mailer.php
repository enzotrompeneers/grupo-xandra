<?php

namespace Brunelencantado\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Brunelencantado\Database\DbInterface;

/**
 * Mailer class
 * 
 * Uses PHPMailer and wraps it into an easy to use interface.
 * 
 * @author Daniel Beard <daniel@creativos.be>
 *  
 */
class Mailer
{

    protected $debug = false;

    protected $mailer;
    protected $db;
    protected $config;
    protected $template;
    protected $viewData;
    protected $message;
    protected $dataTable;
    protected $subject = 'Contact';
    protected $body;
    protected $logo ;

    /**
     * Constructor
     *
     * @param PHPMailer $mailer
     * @param DbInterface $db
     * @param array $config
     */
    public function __construct(PHPMailer $mailer, DbInterface $db, array $config)
    {

        $this->mailer = $mailer;
        $this->db = $db;
        $this->config = $config;

        $this->logo = dirname(__FILE__) . '/../../images/logo.png';

        $this->setupMailer();
        $this->withTemplate('default');

    }

    /**
     * Mailer Factory
     *
     * @param DbInterface $db
     * @param array $emailConfig
     * @return new Mailer object
     */
    public static function createMailer(DbInterface $db, array $emailConfig)
    {

        $phpMailer = new PHPMailer(true);

        return new Mailer($phpMailer, $db, $emailConfig);

    }

    /**
     * Collects current subject and message, and sends the email
     *
     * @return void
     */
    public function send()
    {

        $this->mailer->Subject = $this->subject;
        $this->mailer->Body = $this->getMessageBody();

        // Send the mail!
        try {
            
            $this->mailer->send();

        } catch (Exception $e) {

            echo 'Message not sent.';
            echo 'Mailer error: ' . $this->mailer->ErrorInfo;

        }
        
    }

    /**
     * Adds address to the PHPMailer object
     *
     * @param string $email
     * @param string $name
     * @return Mailer
     */
    public function to($email, $name = null)
    {

        $this->mailer->addAddress($email, $name);

        return $this;

    }

    /**
     * Adds CC address to the PHPMailer object
     *
     * @param string $email
     * @param string $name
     * @return Mailer
     */
    public function addCC($email, $name = null)
    {

        $this->mailer->addCC($email, $name);

        return $this;

    }

    /**
     * Adds BCC address to the PHPMailer object
     *
     * @param string $email
     * @param string $name
     * @return Mailer
     */
    public function addBCC($email, $name = null)
    {

        $this->mailer->addBCC($email, $name);

        return $this;

    }

    /**
     * Sets from address & name
     *
     * @param string $email
     * @param string $name
     * @return Mailer
     */
    public function from($email, $name = null)
    {

        $this->mailer->setFrom($email, $name);

        return $this;

    }

    /**
     * Sets email subject
     *
     * @param string $subject
     * @return Mailer
     */
    public function subject($subject)
    {

        $this->mailer->Subject = $subject;

        return $this;

    }

    /**
     * Sets email message
     *
     * @param string $message
     * @return Mailer
     */
    public function message($message)
    {

        $this->message = $message;

        return $this;

    }

    /**
     * Adds view data
     *
     * @param array $viewData
     * @return Mailer
     */
    public function with(array $viewData = [])
    {

        $this->viewData = $viewData;
        
        return $this;

    }

    /**
     * Adds content form database, allowing for %%VARIABLE%% substitution
     *
     * @param [type] $key
     * @param array $data
     * @param boolean $language
     * @return Mailer
     */
    public function addContentByKey($key, $data = [], $language = null)
    {

        $lang = ($language) ? $language : LANGUAGE;

        $query = "SELECT asunto_{$lang} AS asunto, texto_{$lang} AS texto FROM ".XNAME."_emails WHERE clave = '{$key}'";
        $sql = $this->db->record($query);

        $asunto = $sql['asunto'];
        $texto = $sql['texto'];


        if (!empty($data)) {

            foreach ($data as $k => $v) {

                $asunto = str_replace($k, $v, $asunto);
                $texto = str_replace($k, $v, $texto);

            }

        }

        $this->subject = $asunto;
        $this->message = $texto;

        return $this;

    }

    /**
     * Converts data to an HTML table to add totheemail body, after the message. Some keys can be ignored.
     *
     * @param array $data
     * @param array $ignores
     * @return Mailer
     */
    public function addDataTable(array $data, array $ignores = [])
    {

        // Create table from POST data, minus $ignores fields
        $output = '<table>';

        foreach ($data as $k => $v) {

            if (in_array($k, $ignores)) continue;
            if ($v == '') continue;
            if ($k == 'link') $v = '<a href="' . $v . '">' . $v . '</a>';

            $output .= '<tr><td><strong>' . trad($k) . ':</strong>&nbsp;</td><td>' . $v . '</td></tr>';

        }

        $output .= '</table>';

        $this->dataTable = $output;

        return $this;

    }

    /**
     * Set a file to be attached
     *
     * @param [type] $file
     * @return Mailer
     */
    public function attach($file)
    {

        $this->mailer->addAttachment($file); 

        return $this;

    }

    /**
     * Sets template to be used. Templates located in src/Mail/Templates. default.template.php is default.
     *
     * @param [type] $template
     * @return Mailer
     */
    public function withTemplate($template)
    {

        $template = dirname(__FILE__) . '/Templates/' . $template . '.template.php';

        if (file_exists($template)) {

            $this->template = $template;

            return;

        }

        throw new Exception('Mail template does not exist.');

    }

    /**
     * Setsdebug mode
     *
     * @param int $debug
     * @return Mailer
     */
    public function debug($debug)
    {

        $this->debug = $debug;

        return $this;

    }

    /**
     * Gets dataTable
     *
     * @return string
     */
    public function getDataTable()
    {

        return $this->dataTable;

    }

    /**
     * Sets up & configures PHPMailer object.
     *
     * @return void
     */
    protected function setupMailer()
    {

        // Make variables local
        $mailer = $this->mailer;
        $config = $this->config;

        // Basic settings
        $mailer->SMTPDebug     = $this->debug;
        $mailer->SMTPAuth      = true;
        // $mailer->SMTPSecure    = 'tls';
        $mailer->CharSet       = 'UTF-8';
        $mailer->WordWrap      = 50;
        $mailer->IsSMTP(true);
        $mailer->isHTML(true);

        // Server settings
        $mailer->Host       = $config['host'];
        $mailer->Username   = $config['user'];
        $mailer->Password   = $config['pass'];
        $mailer->Port       = $config['port'];
      
        // From settings
        $mailer->setFrom($config['default_from_address'], $config['default_from_name']);

        // Content
        $mailer->Subject = $this->subject;
        $mailer->Body = $this->body;

        // Attach logo for embedding
        if (file_exists($this->logo)) $mailer->AddStringEmbeddedImage(file_get_contents($this->logo), 'mailheader'); 

        $this->mailer = $mailer;

    }

    /**
     * Interprets template with the data
     *
     * @return string
     */
    protected function getMessageBody()
    {

        ob_start(); 

            $header = (file_exists($this->logo)) ? '<img src="cid:mailheader" />' : '<h1>' . webConfig('nombre') . '</h1>'; 
            $message = $this->message;
            $dataTable = $this->dataTable;

            require $this->template;

            $emailBody = ob_get_contents();

        ob_end_clean();

        return $emailBody;

    }

}