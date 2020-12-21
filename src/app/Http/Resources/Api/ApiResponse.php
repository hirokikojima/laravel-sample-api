<?php
namespace App\Http\Resources\Api;

use App\Libs\Constants;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResponse extends JsonResource
{
    /**
     * リクエスト成功時のAPIレスポンス
     *
     * @param mixed $data
     * @return ApiResponse
     */
    public static function success($data): ApiResponse
    {
        return new self([
            'status' => Constants::API_FAIL,
            'data' => $data,
            'errors' => []
        ]);
    }

    /**
     * リクエスト失敗時のAPIレスポンス
     *
     * @param mixed $errors
     * @return ApiResponse
     */
    public static function failed($errors): ApiResponse
    {
        return new self([
            'status' => Constants::API_FAIL,
            'data' => [],
            'errors' => $errors
        ]);
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'status' => $this['status'],
            'data' => $this['data'],
            'errors' => $this['errors']
        ];
    }
}