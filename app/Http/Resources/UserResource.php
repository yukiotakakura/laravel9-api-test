<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private const TOKEN_NAME = 'app_api_token';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'token' => $this->getToken($this->createToken(self::TOKEN_NAME)->plainTextToken),
        ];
    }

    /**
     * トークン部分のみを取得する
     *
     * @param string $plain_text_token
     * @return string トークン
     */
    private function getToken(string $plain_text_token): string
    {
        return explode('|', $plain_text_token, 2)[1];
    }
}
