<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    protected $repository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->repository = $courseRepository;
    }

    public function getCourses()
    {
        return $this->repository->getAllCourses();
    }

    public function createCourse(array $data)
    {
        return $this->repository->createNewCourse($data);
    }

    public function updateCourse(string $identify, array $data)
    {
        return $this->repository->updatedCourseByUuid($identify, $data);
    }

    public function getCourse(string $identify)
    {
        return $this->repository->getCourseByUuid($identify);
    }

    public function deleteCourse(string $identify)
    {
        return $this->repository->deleteCourseByUuid($identify);
    }
}
