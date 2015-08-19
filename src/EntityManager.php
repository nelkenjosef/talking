<?php

include_once 'repository/User.php';
include_once 'repository/Post.php';
include_once 'mapper/User.php';

use Repository\User as UserRepository;
use Repository\Post as PostRepository;
use Mapper\User as UserMapper;

/**
 * Entity Manager
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.3
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
     * @var   \Repository\Post
     * @since 1.3
     */
    private $postRepository;

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
     * Inserts data array into DB
     *
     * @param  string $table
     * @param  array  $data
     * @return \PDOStatement
     * @since  1.1
     */
    public function insert($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = implode('", "', $data);

        return $this->query('INSERT INTO ' . $table . ' (' . $columns . ') VALUES ("' . $values . '");');
    }

    /**
     * Inserts data array into DB
     *
     * @param  string $table
     * @param  array  $data
     * @param  int    $id
     * @param  string $where  default 'id'
     * @return \PDOStatement
     * @since  1.2
     */
    public function update($table, $data, $id, $where = 'id')
    {
        $setString = '';

        foreach ($data as $column => $value) {
            $setString .= '`' . $column . '` = "' . $value . '", ';
        }

        return $this->query('UPDATE ' . $table . ' SET ' . substr($setString, 0, -2) . ' WHERE ' . $where . ' = ' . $id . ';');
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

    /**
     * Returns the Post repository
     *
     * @return \Repository\Post
     * @since  1.3
     */
    public function getPostRepository()
    {
        if (is_null($this->postRepository)) {
            $this->postRepository = new PostRepository($this);
        }

        return $this->postRepository;
    }
}
