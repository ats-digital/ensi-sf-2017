<?php

namespace DemoBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use \JsonSerializable;

/**
 * @ODM\Document
 */

class User implements JsonSerializable
{

    /**
     * @ODM\Id
     */

    protected $id;

    /**
     * @ODM\String
     */

    protected $name;

    /**
     * @ODM\String
     */

    protected $username;

    /**
     * @ODM\String
     */

    protected $email;

    /**
     * Get id
     * @return
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     * @return
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get email
     * @return
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get username
     * @return
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function jsonSerialize()
    {
        return (object) [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
        ];
    }

}
