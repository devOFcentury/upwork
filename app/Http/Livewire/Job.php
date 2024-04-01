<?php

namespace App\Http\Livewire;

use App\Notifications\JobLike;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Job extends Component
{
    public $job;

    public function addLike()
    {
        if (Auth::check()) {
            
            /** @var \App\Models\User $user **/
            $user = Auth::user();
            $response = $user->likes()->toggle($this->job->id);

            

            if ($response['attached']) {
                $this->job->user->notify(new JobLike($this->job));
            }
        } else {
            // emmettre un événement flash message
            $this->emit('flash', 'Merci de vous connecter pour ajouter une mission à vos favoris', 'error');
        }

    }

    public function render()
    {
        return view('livewire.job');
    }

    
}
