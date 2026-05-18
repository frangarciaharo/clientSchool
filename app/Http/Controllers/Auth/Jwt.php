<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function authUser()
{
    $token = session('jwt');

    if (!$token) {
        return null;
    }

    return JWT::decode(
        $token,
        new Key(env('JWT_SECRET'), 'HS256')
    );
}