<?php
class Session
{
    const SESSION_STARTED = TRUE;
    const SESSION_STOPED = FALSE;
    
    private $sessionStatus = self::SESSION_STOPED;
    private static $instance;
    
    private function __construct() {}
    
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self;
        }
        
        self::$instance->startSession();
        
        return self::$instance;
    }
    
    public function startSession()
    {
        if($this->sessionStatus == self::SESSION_STOPED)
        {
            $this->sessionStatus = session_start();
        }
        
        return $this->sessionStatus;
    }
    
    public function __set( $name , $value )
    {
        $_SESSION[$name] = $value;
    }
    
    public function __get( $name )
    {
        if(isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
    }
    
    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }
    
    
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }
    
    public function destroy()
    {
        if($this->sessionStatus == self::SESSION_STARTED)
        {
            $this->sessionStatus = session_destroy();
            unset($_SESSION);
            return $this->sessionStatus;
        }
        
        return FALSE;
    }

    public function restart()
    {
        if(self::$instance->destroy())
        {
		self::$instance->startSession();
        }
    }
    
    public function reset()
    {
        session_reset();
    }
    
}
?>
