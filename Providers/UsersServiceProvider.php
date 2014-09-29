<?php  namespace Codeboard\Users\Providers;

use Codeboard\Users\Repositories\UserEloquentRepository;
use Codeboard\Users\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->app->bind(UserRepository::class, UserEloquentRepository::class);
    }
}