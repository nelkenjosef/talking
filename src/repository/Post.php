<?php

namespace Repository;

include_once '../entity/Post.php';
include_once '../mapper/Post.php';

use Mapper\Post as PostMapper;
use Entity\Post as PostEntity;

/**
 * Repository for Post
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 */
class Post
{
    /**
     * @var    \EntityManager
     * @since  1.0
     */
    private $em;

    /**
     * @var   \Mapper\Post
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
        $this->mapper = new PostMapper();
        $this->em = $em;
    }

    /**
     * Find entrie in DB by given user
     *
     * @param  \Entity\User $user
     * @return array of \Entity\Post
     * @since  1.0
     */
    public function findByUser($user)
    {
        $postsData = $this->em
                          ->query('SELECT * FROM posts WHERE user_id = ' . $user->getId() . ';')
                          ->fetchAll();

        $posts = array();

        foreach ($postsData as $postData) {
            $newPost = new PostEntity();
            $posts[] = $this->mapper->populate($postData, $newPost);
        }

        return $posts;
    }
}
