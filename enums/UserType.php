<?php

class UserType
{
    const ADMIN = 1;
    const STUDENT = 2;
    const TEACHER = 3;
    const USER = 4;
    public static function getRole($role){
        if($role == 1)
            return "ADMIN";
        if($role == 2)
            return "STUDENT";
        if($role == 3)
            return "TEACHER";
        if($role == 4)
            return "USER";
    }
}
