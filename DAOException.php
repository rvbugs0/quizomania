<?php
class DAOException extends Exception
{
    private $doExceptionMessage="";
// Redefine the exception so message isn't optional
    public function __construct($message, $code = 0, Exception $previous = null) {
        $this->doExceptionMessage=$message;
// make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }
// custom string representation of object
    public function __toString() {
        return $this->doExceptionMessage;
    }
}
?>