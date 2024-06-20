<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\Student;

class StudentFilter extends Component
{
    public $search = '';

    public function render()
    {
        // return view('livewire.student-filter');
        $students = Student::orderBy('lastname', 'asc')->orderBy('firstname', 'asc')
            ->when(trim($this->search) !== '', function (Builder $query) {
                foreach (preg_split('#\s+#', trim($this->search)) as $word) {
                    $query->where(function (Builder $query) use ($word) {
                        $query->where('lastname', 'like', $word . '%')
                            ->orWhere('firstname', 'like', $word . '%');
                    });
                }
            })
            ->get();

        return view('livewire.student-filter', ['students' => $students]);

    }
}
