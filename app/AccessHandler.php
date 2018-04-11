<?php 

namespace App;

class AccessHandler
{
    protected static $hierarchy = [
        'admin' => 3, 'editor' => 2, 'user' => 1
    ];

    public static function check($userRole, $requiredRole)
    {
        return static::$hierarchy[$userRole] >= static::$hierarchy[$requiredRole];
    }
}
