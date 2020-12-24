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

    /**
     * @OA\Get(
     *     path="/api/sample",
     *     summary="sample api",
     *     @OA\Response(
     *         response=200,
     *         description="A sample successful response.",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="status",
     *                 type="integer",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="data",
     *                 ref="#/components/schemas/Sample_IndexResource"
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="array",
     *                 @OA\Items(type="string")
     *             )
     *         )
     *     )
     * )
     *
     * @param IndexRequest $request
     * @return void
     */
    public function index(IndexRequest $request)
    {
        $sample = $this->sample_service->getSample($request->input('id'));

        return ApiResponse::success(new IndexResource($sample));
    }
}
