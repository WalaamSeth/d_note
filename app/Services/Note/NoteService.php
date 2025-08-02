<?php

namespace App\Services\Note;

use App\Models\Note;
use App\Models\Section;

class NoteService
{
    public function list($sectionId = null)
    {
        $query = Note::query();
        if ($sectionId) {
            $query->where('section_id', $sectionId);
        }
        return $query->get();
    }

    public function create(array $data)
    {
        $section = Section::findOrFail($data['section_id']);
        return $section->notes()->create($data);
    }

    public function update(Note $note, array $data)
    {
        $note->update($data);
        return $note;
    }

    public function delete(Note $note)
    {
        $note->delete();
    }
}
