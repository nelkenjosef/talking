<?php

namespace Mapper;

/**
 * Mapper for Post
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 */
class Post
{
    /**
     * @var    array
     * @since  1.0
     */
    private $mapping = array(
        'id' => 'id',
        'title' => 'title',
        'content' => 'content',
    );

    /**
     * Returns the index column used in DB
     *
     * @return string
     * @since  1.0
     */
    public function getIdColumn()
    {
        return 'id';
    }

    /**
     * Gets data from DB and store in Entity
     *
     * @param  array $data
     * @param  \Entity\Post $post
     * @return \Entity\Post
     * @since  1.0
     */
    public function populate($data, \Entity\Post $post)
    {
        $mappingsFlipped = array_flip($this->mapping);

        foreach ($data as $key => $value) {
            if (isset($mappingsFlipped[$key])) {
                call_user_func_array(
                    array($post, 'set' . ucfirst($mappingsFlipped[$key])),
                    array($value)
                );
            }
        }

        return $post;
    }
}
