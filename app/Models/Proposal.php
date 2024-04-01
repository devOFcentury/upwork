<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = ['job_id', 'validated'];
    /*
        à la creation du model on assigne à la propriété du model(user_id) l'utilisateur authentifié
        comme ça on aura pas besoin d'ajouter quand on enregistre les champs du model: le champ user_id
        puisque la fonction boot va gérer cela. Donc inutile de faire à chaque fois:
        Proposal::create([
            ...
            'user_id' => auth()->user()->id;
        ])
        ou
        $proposal = new Proposal();
        $proposal->user_id = auth()->user()->id;
        $proposal->save();
    */
    // la fonction boot va se charger d'ajouter à user_id l'id de l'utilisateur authentifié à la creation
    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function coverLetter() {
        return $this->hasOne(CoverLetter::class);
    }
}
