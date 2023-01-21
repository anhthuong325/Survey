<?php

class UserType
{
    const ADMIN = 0;
    const STUDENT = 1;
    const TEACHER = 2;
    const USER = 3;
    public static function getRole($role){
        if($role == 0)
            return "ADMIN";
        if($role == 1)
            return "STUDENT";
        if($role == 2)
            return "TEACHER";
        if($role == 3)
            return "USER";
    }
}
