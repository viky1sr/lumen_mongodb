<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserApiController extends Controller
{
    private $userService;

    public function __construct(
        UserService $userService
    ){
        $this->userService = $userService;
    }

    public function users(Request $request){
        $users = $this->userService->getAll();
        return response()->json($users);
    }

    public function user($_id){
        return $this->userService->find($_id);
    }

    public function destroy($_id) {
        $this->userService->destroy($_id);
        return response()->json([
            'status' => true,
            'messages' => 'Success delete data.'
        ], 200);
    }

    public function register(Request $request){
        $validated= userValidation($request->all());
        if($validated->fails()){
            return response()->json([
                'status' => false,
                'messages' => $validated->errors()->first()
            ], 422);
        } else {
            if($user = $this->userService->create($request->except('_token','submit'))){
                $token = JWTAuth::fromUser($user);
                return response()->json(compact('user','token'),201);
            }
        }
    }

    public function update(Request $request, $_id){
        $validated= userUpdateValidation($request->all());
        if($validated->fails()){
            return response()->json([
                'status' => false,
                'messages' => $validated->errors()->first()
            ], 422);
        } else {
            if($user = $this->userService->update($request->except('_token','submit'), $request->id)){
                return response()->json(compact('user'),201);
            }
        }
    }
}
