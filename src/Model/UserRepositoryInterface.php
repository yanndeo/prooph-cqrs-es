<?php 
declare(strict_types=1);

namespace App\Model;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function get(User $user): void;
}