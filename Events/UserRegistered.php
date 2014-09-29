<?php namespace Codeboard\Users\Events;

use Codeboard\Users\User;

class UserRegistered {

    /**
     * @var \Codeboard\Users\User
     */
    public $user;

    /**
     * @param User $user
     */
    function __construct(User $user)
    {
        var_dump('i was here');
        $this->user = $user;
    }

}