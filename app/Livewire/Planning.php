<?php

namespace App\Livewire;

use App\Livewire\Forms\PlanningForm;
use Livewire\Component;
use App\Models\Course;
use App\Models\Group;
use App\Models\Formation;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Planning extends Component
{
    public PlanningForm $form;

    public bool $isShowFormUpdate = false;

    public Course $courseForUpdate;

    public $updateId;

    public $updateDate;

    public function mount()
    {
        $this->form->date = now()->format('Y-m-d');

    }

    public function render()
    {
        $formations = Formation::orderBy('name', 'asc')->get();
        $groups = Group::orderBy('name', 'asc')->get();

        /**
         * @TODO Vérifier les noms des variables dans la bdd ! 
         */
        if ($this->getErrorBag()->isEmpty()) {
            $first_day = Carbon::createFromFormat('Y-m-d',$this->form->date)->startOfWeek();
            $last_day = $first_day->clone()->endOfWeek();

            $days = [];
            while ($first_day < $last_day) {
                $days[] = $first_day->clone();
                $first_day->addDay();
            }
            $first_day = $days[0];

            $courses = Course::orderBy('begin', 'asc')
                ->where('day','>=', $first_day->format('Y-m-d'))
                ->where('day','<=', $last_day->format('Y-m-d'))
                ->when(trim($this->form->course) !== '', function (Builder $query) {
                    str($this->form->course)->squish()->explode(' ')->each(function ($word) use ($query) {
                        $query->where('label', 'like', '%' . $word . '%');
                    });
                })
                ->when(trim($this->form->student) !== '', function (Builder $query) {
                    $query->whereHas('groups.students', function (Builder $query) {
                        str($this->form->student)->squish()->explode(' ')->each(function ($word) use ($query) {
                            $query->where(function (Builder $query) use ($word) {
                                $query->where('lastname', 'like', '%' . $word . '%')
                                    ->orWhere('firstname', 'like', '%' . $word . '%');
                            });
                        });
                    });
                })
                ->when(!empty($this->form->formation), function (Builder $query) {
                    $query->where('formation_id', '=', $this->form['formation']);
                })
                
                ->when(!empty($this->form->groups), function (Builder $query) {
                    $query->whereHas('groups', function (Builder $query) {
                        $query->whereIn('id', $this->form->groups);
                    });
                })
                ->get()
                ->groupBy('day');

            
        }

        return view('livewire.planning', [
            'formations' => $formations,
            'groups' => $groups,
            'courses' => $courses,
            'courseForUpdate' => $this->courseForUpdate ?? null,
            'days' => $days,
            'isShowFormUpdate' => $this->isShowFormUpdate,
        ]);
    }

    public function nextWeek() 
    {
        $this->form->date = Carbon::createFromFormat('Y-m-d', $this->form->date)->startOfWeek()->addWeek()->format('Y-m-d');
    }

    public function previousWeek() 
    {
        $this->form->date = Carbon::createFromFormat('Y-m-d', $this->form->date)->startOfWeek()->subWeek()->format('Y-m-d');
    }

    public function submit()
    {
        $this->form->validate();
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);

        $this->authorize('delete', $course);

        $course->delete();
    }

    public function submitUpdate($id)
    {
        $date = $this->updateDate;
        $course = Course::findOrFail($id);
        $this->authorize('update', $course);
        $course->update([
            'day' => $date,
        ]);
        $this->isShowFormUpdate = false;
    }

    public function showFormUpdate($id)
    {
        $course = Course::findOrFail($id);
        $this->isShowFormUpdate = true;
        $this->courseForUpdate = $course;
        $this->updateId = $id;
        $this->updateDate = $course->day;
    }
}
