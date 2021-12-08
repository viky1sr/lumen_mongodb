<?php

namespace App\Repositories;

interface UserRepositoryInterface {
    public function getAll();
    public function getById($_id);
    public function create(array $inputs);
    public function update(array $inputs, $_id);
    public function delete($_id);
}
