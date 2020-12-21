<?php
namespace Tests\Unit\Services;

use App\Models\Sample;
use App\Services\SampleService;

use TestCase;

class SampleServiceTest extends TestCase
{
    private $sample_service;

    public function setUp(): void
    {
        parent::setUp();

        $this->sample_service = app('App\Services\SampleService');
    }

    public function testGetSample()
    {
        $sample = factory(Sample::class)->create();

        $result = $this->sample_service->getService($sample->id);

        $this->assertNotNull($result);
    }
}