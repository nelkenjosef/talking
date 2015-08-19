<?php

namespace Repository;

include_once '../entity/User.php';
include_once '../mapper/User.php';

use Mapper\User as UserMapper;
use Entity\User as UserEntity;

/**
 * Repository for User
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.2
 */
class User
{
    /**
     * @var    \EntityManager
     * @since  1.0
     */
    private $em;

    /**
     * @var   \Mapper\User
     * @since 1.0
     */
    private $mapper;

    /**
     * @var   array of \Entity\User
     * @since 1.2
     */
    private $identityMap;

    /**
     * Constructor
     *
     * @param  \EntityManager $em
     * @return void
     * @since  1.0
     */
    public function __construct(\EntityManager $em)
    {
        $this->mapper = new UserMapper();
        $this->em = $em;
        $this->identityMap = array('users' => array());
    }

    /**
     * Find one entry in DB by given id
     *
     * @param  int $id
     * @return \Entity\User
     * @since  1.0
     */
    public function findOneById($id)
    {
        $userData = $this->em
                         ->query('SELECT * FROM users WHERE id = ' . $id . ';')
                         ->fetch();

        return $this->registerUserEntity($id, $this->mapper->populate($userData, new UserEntity()));
    }

    /**
     * Saves Entity User in DB
     *
     * @param  \Entity\User $user
     * @return \PDOStatement
     * @since  1.1
     */
    public function saveUser(\Entity\User $user)
    {
        $userMapper = new UserMapper();
        $data = $userMapper->extract($user);

        $userId = call_user_func(array($user, 'get' . ucfirst($userMapper->getIdColumn())));

        if (array_key_exists($userId, $this->identityMap['users'])) {
            return $this->em->update('users', $data, $userId, $userMapper->getIdColumn());
        }

        return $this->em->insert('users', $data);
    }

    /**
     * Adds user to identity map
     *
     * @param  int          $id
     * @param  \Entity\User $user
     * @return \Entity\User
     * @since  1.2
     */
    protected function registerUserEntity($id, \Entity\User $user)
    {
        $this->identityMap['users'][$id] = $user;
        return $user;
    }

}
