<?php

    namespace App\Enums;

    enum UserLevel : string
    {
        case User = 'user';
        case Manager = 'manager';
        case Admin = 'admin';
    }