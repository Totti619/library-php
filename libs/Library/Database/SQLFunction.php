<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 21/01/2018
 * Time: 14:23
 */

namespace Library\Database;


class SQLFunction
{
    private $function, $arg;

    /**
     * SQLFunction constructor.
     * @param string $function
     * @param string $arg
     */
    public function __construct($function, $arg=null)
    {
        $this->function = $function;
        $this->arg = $arg;
    }

    /**
     * @return string
     */
    public function getFunction(): string
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction(string $function)
    {
        $this->function = $function;
    }

    /**
     * @return string
     */
    public function getArg(): string
    {
        return $this->arg;
    }

    /**
     * @param string $arg
     */
    public function setArg(string $arg)
    {
        $this->arg = $arg;
    }

    public function __toString()
    {
        return $this->getFunction()."('".$this->getArg()."')";
    }


}