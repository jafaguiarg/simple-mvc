<?php

class UserModel extends Database
{
    /**
     * UserModel constructor.
     */
    public function __construct()
    {
        $connection = Database::$instance;
    }

    /**
     * @var $name
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}