<?php

namespace App\Services;

use App\Repositories\CourseRepository;
use App\Repositories\ModuleRepository;

class ModuleService
{
    protected $repository;
    protected $courseRepository;

    public function __construct(
        ModuleRepository $moduleRepository,
        CourseRepository $courseRepository
    ) {
        $this->repository = $moduleRepository;
        $this->courseRepository = $courseRepository;
    }

    public function getModulesByCourse(string $course)
    {
        $course = $this->courseRepository->getCourseByUuid($course);

        return $this->repository->getModulesByCourse($course->id);
    }

    public function createModule(array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);

        return $this->repository->createNewModule($course->id, $data);
    }

    public function updateModule(string $identify, array $data)
    {
        $course = $this->courseRepository->getCourseByUuid($data['course']);

        return $this->repository->updatedModuleByUuid($course->id, $identify, $data);
    }

    public function getModuleByCourse(string $course, string $identify)
    {
        $course = $this->courseRepository->getCourseByUuid($course);

        return $this->repository->getModuleByCourse($course->id, $identify);
    }

    public function deleteModule(string $identify)
    {
        return $this->repository->deleteModuleByUuid($identify);
    }
}
