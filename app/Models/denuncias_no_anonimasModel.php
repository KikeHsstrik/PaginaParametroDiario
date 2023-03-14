<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denuncias_no_anonimasModel extends Model
{
    use HasFactory;

    
    protected $table = 'denuncias_no_anonimas';

    protected $fillable = [
        'texto_denuncia_anonima_no',
        'nombre_usuario_denuncia_anonima_no',
        'apellido_usuario_denuncia_anonima_no',
        'dirección_usuario_denuncia_anonima_no',
        'num_tel_denuncia_anonima_no',
        'correo_usuario_denuncia_anonima_no'
    ];
}
