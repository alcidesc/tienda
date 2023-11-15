<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table='productos';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        
        'nombre',
        'categoria_id',
        'estado',
        
    ];
    public function categoria(){
        return $this->belongsTo(categoria::class,'categoria_id');
    }
}
