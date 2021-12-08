<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

Class UserService {
    private $userRepo;

    public function __construct(
        UserRepositoryInterface $userRepo
    ){
        $this->userRepo = $userRepo;
    }

    /*
    * Get Data Users from Repository
    * */
    public function getAll(){
        $users = $this->userRepo->getAll();
        return $users;
    }

    /*
    * Create Data User for Model User
    * */
    public function create(array $inputs){
        $inputs['password'] = Hash::make($inputs['password']);
        $user = $this->userRepo->create($inputs);
        return $user;
    }

    /*
    * Update Data User by {id} from Model User
    * */
    public function update(array $inputs, $_id) {
        $user = $this->find($_id);
        $user['name'] = $inputs['name'];
        $user['email'] = $inputs['email'];

        return $user->save();
    }


    /*
    * Delete Data User by {id} from Model User
    * */
    public function destroy($_id){
        return $this->userRepo->delete($_id);
    }

    public function find($_id){
        return $this->userRepo->getById($_id);
    }
}
