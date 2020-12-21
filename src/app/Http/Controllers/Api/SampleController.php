<?php

namespace App\Http\Controllers\Api;

use Api\Libs\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Sample\IndexRequest;
use App\Http\Resources\Api\ApiResponse;
use App\Http\Resources\Api\Sample\IndexResource;
use App\Services\SampleService;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    private $sample_service;

    public function __construct(SampleService $sample_service)
    {
        $this->sample_service = $sample_service;
    }

    public function index(IndexRequest $request)
    {
        $sample = $this->sample_service->getSample($request->input('id'));

        return ApiResponse::success(new IndexResource($sample));
    }
}
