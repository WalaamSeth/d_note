<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\StoreSectionRequest;
use App\Http\Requests\Section\UpdateSectionRequest;
use App\Models\Section;
use App\Services\Section\SectionService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    use AuthorizesRequests;
    protected $service;

    public function __construct(SectionService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        return $this->service->list($request->user());
    }

    public function store(StoreSectionRequest $request)
    {
        return response()->json(
            $this->service->create($request->user(), $request->validated()),
            201
        );
    }

    public function show(Section $section)
    {
        $this->authorize('view', $section);
        return $section;
    }

    public function update(UpdateSectionRequest $request, Section $section)
    {
        $this->authorize('update', $section);
        return $this->service->update($section, $request->validated());
    }

    public function destroy(Section $section)
    {
        $this->authorize('delete', $section);
        $this->service->delete($section);
        return response()->noContent();
    }
}
