<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Http\Resources\LessonResource;
use App\Services\LessonService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $module
     * @return AnonymousResourceCollection
     */
    public function index(string $module): AnonymousResourceCollection
    {
        $lessons = $this->lessonService->getLessonsByCourse($module);

        return LessonResource::collection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdateLesson $request
     * @param string $module
     * @return LessonResource
     */
    public function store(StoreUpdateLesson $request, string $module): LessonResource
    {
        $lesson = $this->lessonService->createLesson($request->validated());

        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param string $module
     * @param string $identify
     * @return LessonResource
     */
    public function show(string $module, string $identify): LessonResource
    {
        $lesson = $this->lessonService->getLessonByModule($module, $identify);

        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdateLesson $request
     * @param string $module
     * @param string $identify
     * @return JsonResponse
     */
    public function update(StoreUpdateLesson $request, string $module, string $identify): JsonResponse
    {
        $this->lessonService->updateLesson($identify, $request->validated());

        return response()->json(['message' => 'Updated Success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $module
     * @param string $identify
     * @return JsonResponse
     */
    public function destroy(string $module, string $identify): JsonResponse
    {
        $this->lessonService->deleteLesson($identify);

        return response()->json([], 204);
    }
}
