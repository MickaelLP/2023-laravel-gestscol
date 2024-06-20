<div class="my-3">
    <p><input type="text" placeholder="search" wire:model.live="search"></p>
    @empty($students)
    <p>no student</p>
    @else
        <ul class="space-y-1">
            @foreach ($students as $student)
                <li><a class="link" href="{{ route('student.show', $student) }}">{{ $student->lastname }} {{ $student->firstname }}</a>
                </li>
            @endforeach
        </ul>
    @endempty
</div>

