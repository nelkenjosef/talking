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
 * @version 1.0
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
    }

    /**
     * Find one entry in DB by given id
     *
     * @param  int $id
     * @return \Entity\User
     * @since  1.0
     */
    public function findByOne($id)
    {
        $userData = $this->em
                         ->query('SELECT * FROM users WHERE id = ' . $id)
                         ->fetch();

        return $this->mapper->populate($userData, new UserEntity());
    }

}
