<?php

namespace App\Services;

use App\Models\Sample;
use App\Repositories\SampleRepository;

class SampleService
{
    private $sample_repository;

    public function __construct(SampleRepository $sample_repository)
    {
        $this->sample_repository = $sample_repository;
    }

    public function getSample(int $id): Sample
    {
        return $this->sample_repository->find($id);
    }
}