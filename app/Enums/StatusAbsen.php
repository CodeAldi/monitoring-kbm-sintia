<?php

namespace App\Enums;

enum StatusAbsen: String
{
    case HADIR = "hadir";
    case TERLAMBAT = "terlambat";
    case SAKIT = "sakit";
    case CUTI = "cuti";
    case IZIN = "izin";
    case ALFA = "alfa";
}
