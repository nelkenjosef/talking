<?php

namespace Entity;

/**
 * Entity Post
 *
 * @author  nelkenjosef <talking@nelkenjosef.de>
 * @version 1.0
 */
class Post
{
    /**
     * @var   int
     * @since 1.0
     */
    private $id;

    /**
     * @var   string
     * @since 1.0
     */
    private $title;

    /**
     * @var   string
     * @since 1.0
     */
    private $content;

    /**
     * @param  int $id
     * @return void
     * @since  1.0
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     * @since  1.0
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param  string $title
     * @return void
     * @since  1.0
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     * @since  1.0
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param  string $content
     * @return void
     * @since  1.0
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     * @since  1.0
     */
    public function getContent()
    {
        return $this->content;
    }
}
