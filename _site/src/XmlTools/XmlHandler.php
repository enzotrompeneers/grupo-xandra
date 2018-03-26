<?php
/**
 * Xml to Json class
 *
 * Converts Xml file to Json 
 *
 * @author Daniel Beard <daniel@creativos.be>
 */

namespace Brunelencantado\XmlTools;


class XmlHandler
{

    protected $xmlFile;
    protected $xml;

    public function __construct($xmlFile)
    {

        $this->xmlFile = $xmlFile;


    }

    public function getXml()
    {

        $this->xml = $this->loadFile($this->xmlFile);

        return $this->xml;

    }
    	
	/**
	 *  @brief Loads  XML file
	 *  
	 *  @return void
	 *  
	 */
	protected function loadFile($xmlFile)
	{

        return simplexml_load_file($xmlFile, 'SimpleXMLElement');
		
	}

}