<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Category extends Model
{
    use HasFactory;

    public function todo(){
        return $this->hasMany(Todo::class); // TODO Una Categoria tiene muchos Todos
    }

}
