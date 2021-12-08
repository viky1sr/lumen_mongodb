<?php

use Illuminate\Support\Facades\Validator;

function userValidation($request) {
    $validated = Validator::make($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    return $validated;
}

function userUpdateValidation($request) {
    $validated = Validator::make($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
    ]);
    return $validated;
}
