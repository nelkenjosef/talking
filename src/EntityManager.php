<?php

include_once 'repository/User.php';

use Repository\User as UserRepository;

/**
 * Entity Manager
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 */
class EntityManager
{
    /**
     * @var  string
     * @since 1.0
     */
    private $path;

    /**
     * @var   \PDO
     * @since 1.0
     */
    private $connection;

    /**
     * @var   \Repository\User
     * @since 1.0
     */
    private $userRepository;

    /**
     * Constructor
     *
     * @param  string $path
     * @return void
     * @since  1.0
     */
    public function __construct($path)
    {
        $this->path = $path;

        $this->connection = new \PDO('sqlite:' . $path);

        $this->userRepository = null;
    }

    /**
     * Submits a given query in DB
     *
     * @param  string $statement
     * @return \PDOStatement
     * @since  1.0
     */
    public function query($statement)
    {
        return $this->connection->query($statement);
    }

    /**
     * Returns the User repository
     *
     * @return \Repository\User
     * @since  1.0
     */
    public function getUserRepository()
    {
        if (is_null($this->userRepository)) {
            $this->userRepository = new UserRepository($this);
        }

        return $this->userRepository;
    }
}
