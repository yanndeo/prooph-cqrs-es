<?php 
declare(strict_types=1);

namespace App\Model\Command;
use App\Infrastructure\UserRepository;
use App\Model\User;

class RegisterUserHandler 
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(RegisterUser $registerUser): void 
    {
        $user = User::registerWithData(
            $registerUser->id(),
            $registerUser->email(),
            $registerUser->password(),
        );

        $this->repository->save($user);
    }
}