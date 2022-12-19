<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\User\StoreUserRequest;
use App\Http\Resources\User\ShowUserResource;
use App\Http\Resources\User\StoreUserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * ユーザーを保存
     * 
     * @param  StoreUserRequest  $request
     * @return StoreUserResource|\Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();

        $user = new User($inputs);
        $user->save();

        return (new StoreUserResource($user))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param User $user
     * @return ShowUserResource|\Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        // TODO
        // Bearer Tokenに紐付いたユーザー と URLの末尾のuuidのユーザーが一致していない場合は例外

        return (new ShowUserResource($user))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
