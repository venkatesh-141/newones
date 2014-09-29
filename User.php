<?php namespace Codeboard\Users;

use Codeboard\Users\Events\UserRegistered;
use Illuminate\Auth\UserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\Remindable as RemindableContract;
use Illuminate\Support\Facades\Hash;
use Raymondidema\Commandee\Events\EventGenerator;

class User extends Model implements UserContract, RemindableContract {

	use UserTrait, RemindableTrait, EventGenerator;

	/**x§x§§
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $fillable = ['email', 'password', 'first_name', 'last_name'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Assign Role to user.
     *
     * @param $role
     */
    public function assignRole($role)
    {
        $this->roles()->attach($role);
    }

    /**
     * Revoke Role from user.
     *
     * @param $role
     */
    public function revokeRole($role)
    {
        $this->roles()->detach($role);
    }

    /**
     * User has role.
     *
     * @param $name
     * @return bool
     */
    public function hasRole($name)
    {
        foreach($this->roles->lists('name') as $roleName)
        {
            if($roleName == $name)
                return true;
        }
        return false;
    }

    /**
     * @param $email
     * @param $password
     * @param $first_name
     * @param $last_name
     * @return static
     */
    public static function registerNewUser($email, $password, $first_name, $last_name)
    {
        $user = new static(compact('email', 'password', 'first_name', 'last_name'));

        $user->raise(new UserRegistered($user));

        return $user;
    }

}