<?php namespace Codeboard\Users\Repositories;

interface UserRepository {

    /**
     * Register a new User.
     *
     * @param $userData
     * @return mixed
     */
    public function registerNewUser($userData);

    /**
     * Update an existing user.
     *
     * @param $userId
     * @param $userData
     * @return mixed
     */
    public function updateUser($userId, $userData);

    public function save($user);

}