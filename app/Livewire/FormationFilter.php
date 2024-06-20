<?php

namespace App\Livewire;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Formation;

class FormationFilter extends Component
{

    public $search = '';

    public function render()
    {
        // return view('livewire.formation-filter');
        $formations = Formation::orderBy('name','asc')
            ->when(trim($this->search) !== '', function (Builder $query) {
                Str::of($this->search)->squish()->explode(' ')->each(function ($word) use ($query) {
                    $query->where('name', 'like', '%' . $word . '%');
                });
            })
            ->get();
        return view('livewire.formation-filter', ['formations' => $formations]);
    }
}
