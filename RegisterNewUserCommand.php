<?php namespace Codeboard\Users;

class RegisterNewUserCommand {

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * Constructor
     *
     * @param string email
     * @param string password
     * @param string first_name
     * @param string last_name
     */
    public function __construct($email, $password, $first_name, $last_name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

}