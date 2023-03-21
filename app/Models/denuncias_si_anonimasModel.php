<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denuncias_si_anonimasModel extends Model
{
    
    protected $table = 'denuncias_si_anonimas';

    protected $fillable = [
        'texto_denuncia_anonima_si',
        'num_tel_denuncia_anonima_si'
    ];
}
