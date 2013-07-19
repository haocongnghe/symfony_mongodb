<?php
// src/Study/BlogBundle/Document/Invitation.php

namespace Study\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */

class Invitation
{
	/**
	 * @MongoDB\Id
	 */
	protected $code;
	
	/**
	 * @MongoDB\String
	 */
	protected $email;
	
	/**
	 * @MongoDB\Boolean
	 */
	protected $sent = false;
	
	/**
	 * @MongoDB\ReferenceOne(targetDocument="Member", mappedBy="invitation", cascade={"persist", "merge"})
	 */
	protected $user;
	
	public function __construct() {
		$this->code = substr(md5(uniqid(rand(), true)), 0, 6);
	}

    /**
     * Get code
     *
     * @return id $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sent
     *
     * @param boolean $sent
     * @return self
     */
    public function send()
    {
        $this->sent = true;
    }

    /**
     * Get sent
     *
     * @return boolean $sent
     */
    public function isSent()
    {
        return $this->sent;
    }

    /**
     * Set user
     *
     * @param Study\BlogBundle\Document\Member $user
     * @return self
     */
    public function setUser(\Study\BlogBundle\Document\Member $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return Study\BlogBundle\Document\Member $user
     */
    public function getUser()
    {
        return $this->user;
    }
}
