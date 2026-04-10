<?php

namespace App\Enums;

enum UserRole : String {
    case Admin = 'admin';
    case WakilKurikulum = 'wakil kurikulum';
    case GuruMapel = 'guru mapel';
    case GuruPiket = 'guru piket';
    case Siswa = 'siswa';
}