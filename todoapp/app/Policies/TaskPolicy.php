<?php

namespace App\Policies;

use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Task $Task)
    {
        return $user->id === $Task->user_id;
    }

    public function __construct()
    {
        //
    }
}
