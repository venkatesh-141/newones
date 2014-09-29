<?php  namespace Codeboard\Users\Repositories;

use Codeboard\Users\User;

class UserEloquentRepository implements UserRepository {

    /**
     * Register a new User.
     *
     * @param $userData
     * @return mixed
     */
    public function registerNewUser($userData)
    {
        $user = User::registerNewUser(
            $userData['email'],
            $userData['password'],
            $userData['first_name'],
            $userData['last_name']
        );
        return $user;
    }

    /**
     * Update an existing user.
     *
     * @param $userId
     * @param $userData
     * @return mixed
     */
    public function updateUser($userId, $userData)
    {
        $user = User::findOrFail($userId);
        $user->update($userData);
        return $user;
    }
}