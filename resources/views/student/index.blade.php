<x-layout.main title="List of students">
    <h1 class="text-[3rem]">List of students</h1>
    @empty($students)
        <p>No student...</p>
    @else
        <ul>
            @foreach ($students as $student)
                <li class="hover:text-slate-200">
                    <a href="{{ route('student.show', $student) }}">{{ $student->lastname }} {{ $student->firstname }}</a>
                </li>
            @endforeach
        </ul>
    @endempty
</x-layout.main>
    