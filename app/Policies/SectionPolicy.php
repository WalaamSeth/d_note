<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SectionPolicy
{
    public function create(User $user) { return true; }

    public function view(User $user, Section $section)
    {
        return $user->id === $section->user_id;
    }

    public function update(User $user, Section $section)
    {
        return $user->id === $section->user_id;
    }

    public function delete(User $user, Section $section)
    {
        return $user->id === $section->user_id;
    }
}
