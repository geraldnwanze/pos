<?php

namespace App\Enums;

class RoleEnum 
{
    const ADMIN = "admin";
    const OWNER = "owner";
    const STAFF = "staff";
    
    public static function list()
    {
        return [
            "admin" => "admin",
            "owner" => "owner",
            "staff" => "staff"
        ];
    }
}

