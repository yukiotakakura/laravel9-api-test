<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\User\StoreUserRequest;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * ユーザーを保存
     * 
     * @param  StoreUserRequest  $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $inputs = $request->all();

        $user = new User($inputs);
        $user->save();

        return (new UserResource($user))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
