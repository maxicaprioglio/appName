<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $table = 'datas';
    public $timestamps = false;

    protected $fillable = [
        'apellido',
        'base',
        'usuario',
        'nivel',
        'definido',
        'total',
        'resultado'
    ];
    protected $casts = [
        'base' => 'array',
        'resultado' => 'array'
    ];
    /**
     * Define la relación uno a uno con el modelo User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
