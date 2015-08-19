<?php

namespace Mapper;

use Entity;
/**
 * Mapper for User
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 *
 */
class User
{
    /**
     * @var    array
     * @since  1.0
     */
    private $mapping = [
        'id' => 'id',
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'gender' => 'gender',
        'namePrefix' => 'name_prefix',
    ];

    /**
     * @param  array $data
     * @param  Entity\User $user
     * @return Entity\User
     * @since  1.0
     */
    public function populate($data, Entity\User $user)
    {
        $mappingsFlipped = array_flip($this->mapping);

        foreach ($data as $key => $value) {
            if (isset($mappingsFlipped[$key])) {
                call_user_func_array(
                    [$user, 'set' . ucfirst($mappingsFlipped[$key])],
                    [$value]
                );
            }
        }

        return $user;
    }
}
