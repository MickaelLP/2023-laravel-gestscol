<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class PlanningForm extends Form
{
    // #[Rule('required|date_format:Y-m-d')]
    public $date = null;

    public $course = '';

    public $student = '';

    // #[Rule('integer|exists:formations,id')]
    public $formation = null;

    // #[Rule(['form.groups.*' => 'interger|exists:groups,id'])]
    public $groups = [];

    public function rules()
    {
        return [
            'course' => 'nullable|string',
            'student' => 'nullable|string',
            'date' => 'required|date_format:Y-m-d',
            'formation' => 'nullable|integer|exists:formations,id',
            'groups.*' => 'integer|exists:groups,id',
        ];
    }
}
