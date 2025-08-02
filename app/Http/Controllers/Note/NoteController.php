<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use App\Models\Note;
use App\Services\Note\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    protected $service;

    public function __construct(NoteService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->list($request->get('section_id'));
    }

    public function store(StoreNoteRequest $request)
    {
        return response()->json(
            $this->service->create($request->validated()),
            201
        );
    }

    public function show(Note $note)
    {
        return $note;
    }

    public function update(UpdateNoteRequest $request, Note $note)
    {
        return $this->service->update($note, $request->validated());
    }

    public function destroy(Note $note)
    {
        $this->service->delete($note);
        return response()->noContent();
    }
}
