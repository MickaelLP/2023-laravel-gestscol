<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /*
    La variable fillable correspond aux champs de la table de la base de données Student. 
    */
    protected $fillable = ["lastname", "firstname", "email", "number", "formation_id"];

    public function formation()
    {
        return $this->belongsTo(Formation::class);// belongsTo : appartient à 
    }

    public function groups(){
        return $this->belongsToMany(Group::class);
    }

    /**
     * Permet de caster des champs de la bdd avec l'objet carbon 
     * Carbon sert à manipuler les dates
     * Ici $casts n'est pas utilisé ?
     */
    protected $casts = [
        "begin","date",
        "end","date"
    ];
}
