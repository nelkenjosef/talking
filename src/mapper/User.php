<?php

namespace Mapper;

/**
 * Mapper for User
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.2
 */
class User
{
    /**
     * @var    array
     * @since  1.0
     */
    private $mapping = array(
        'id' => 'id',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'gender' => 'gender',
        'namePrefix' => 'name_prefix',
    );

    /**
     * Returns the index column used in DB
     *
     * @return string
     * @since  1.2
     */
    public function getIdColumn()
    {
        return 'id';
    }

    /**
     * Gets data from given Entity User
     *
     * @param  \Entity\User $user
     * @return array
     * @since  1.1
     */
    public function extract(\Entity\User $user)
    {
        $data = array();

        foreach ($this->mapping as $keyObject => $keyColumn) {

            if ('id' != $keyColumn) {
                $data[$keyColumn] = call_user_func(
                    array($user, 'get' . ucfirst($keyObject))
                );
            }
        }

        return $data;
    }

    /**
     * Gets data from DB and store in Entity
     *
     * @param  array $data
     * @param  \Entity\User $user
     * @return \Entity\User
     * @since  1.0
     */
    public function populate($data, \Entity\User $user)
    {
        $mappingsFlipped = array_flip($this->mapping);

        foreach ($data as $key => $value) {
            if (isset($mappingsFlipped[$key])) {
                call_user_func_array(
                    array($user, 'set' . ucfirst($mappingsFlipped[$key])),
                    array($value)
                );
            }
        }

        return $user;
    }
}
