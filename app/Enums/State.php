<?php

namespace App\Enums;

enum State:string
{
    case notyet= "Not yet";
    case inprogress="in progress";
    case finished= "finished";
}
