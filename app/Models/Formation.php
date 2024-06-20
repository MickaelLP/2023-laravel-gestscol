<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = ["promotion", "name", "td", "tp", "option", "category"];

    public function students(){
        return $this->hasMany(Student::class); // Une Formation est associé à plusieurs étudiants
    }
}
