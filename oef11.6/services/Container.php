<?php
class Container
{
    private $logfile;
    private $dbconfig;

    private $messageService;
    private $dbManager;
    private $logger;


    public function __construct( string $logfile, $dbconfig)
    {
        $this->logfile = $logfile;
        $this->dbconfig = $dbconfig;
    }

    public function getMessageService()
    {
        if ( $this->messageService === null ) {
            $this->messageService = new MessageService();
        }

        return $this->messageService;
    }

    public function getLogger()
    {
        if ( $this->logger === null ) {
            $this->logger = new Logger( $this->logfile );
        }

        return $this->logger;
    }

    public function getDBManager()
    {
        if ( $this->dbManager === null ) {
            $this->dbManager = new DBManager( $this->getLogger(), $this->dbconfig );
        }

        return $this->dbManager;
    }

}