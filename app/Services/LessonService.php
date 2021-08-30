<?php

namespace App\Services;

use App\Repositories\LessonRepository;
use App\Repositories\ModuleRepository;

class LessonService
{
    protected $repository;
    protected $moduleRepository;

    public function __construct(
        LessonRepository $lessonRepository,
        ModuleRepository $moduleRepository
    ) {
        $this->repository = $lessonRepository;
        $this->moduleRepository = $moduleRepository;
    }

    public function getLessonsByCourse(string $module)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->repository->getLessonsByModule($module->id);
    }

    public function createLesson(array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);

        return $this->repository->createNewLesson($module->id, $data);
    }

    public function updateLesson(string $identify, array $data)
    {
        $module = $this->moduleRepository->getModuleByUuid($data['module']);

        return $this->repository->updatedLessonByUuid($module->id, $identify, $data);
    }

    public function getLessonByModule(string $module, string $identify)
    {
        $module = $this->moduleRepository->getModuleByUuid($module);

        return $this->repository->getLessonByModule($module->id, $identify);
    }

    public function deleteLesson(string $identify)
    {
        return $this->repository->deleteLessonByUuid($identify);
    }
}
