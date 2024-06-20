<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ["day", "begin", "end", "libelle", "formation_id"];

    public function formation(){
        return $this->belongsTo(Formation::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class); // Un cours est associé à plusieurs groupes.
    }
}
