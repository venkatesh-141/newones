<?php namespace Codeboard\Users;

use Codeboard\Users\Repositories\UserRepository;
use Raymondidema\Commandee\CommandHandler;
use Raymondidema\Commandee\Events\EventDispatcher;

class RegisterNewUserCommandHandler implements CommandHandler {

    /**
     * @var \Codeboard\Users\Repositories\UserRepository
     */
    private $repository;
    /**
     * @var \Raymondidema\Commandee\Events\EventDispatcher
     */
    private $dispatcher;

    function __construct(UserRepository $repository, EventDispatcher $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $user = $this->repository->registerNewUser((array) $command);

        $this->dispatcher->dispatch($user->releaseEvents($user));

        return $user;
    }

}