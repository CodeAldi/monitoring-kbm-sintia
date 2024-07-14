<?php

namespace App\Enums;

enum StatusKbm: String
{
    case HASNOTSTARTED = "has_not_started_yet";
    case STARTED = "started";
    case ONGOING = "ongoing";
    case FINISHED = "finished";
}
