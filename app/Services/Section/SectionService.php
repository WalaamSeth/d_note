<?php

namespace App\Services\Section;

use App\Models\Section;
use App\Models\User;

class SectionService
{
    public function list(User $user)
    {
        return $user->sections()->get();
    }

    public function create(User $user, array $data)
    {
        return $user->sections()->create($data);
    }

    public function update(Section $section, array $data)
    {
        $section->update($data);
        return $section;
    }

    public function delete(Section $section)
    {
        $section->delete();
    }
}
