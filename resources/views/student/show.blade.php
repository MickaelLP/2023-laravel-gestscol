<x-layout.main title="Details of student">
    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('student.index') }}">Back to students</a></p>
    <dl>
        <dt class="text-[2rem]">Lastname</dt>
        <dd>{{ $student->lastname }}</dd>
        <dt class="text-[2rem]">Firstname</dt>
        <dd>{{ $student->firstname }}</dd>
        <dt class="text-[2rem]">Email</dt>
        <dd>{{ $student->email }}</dd>
        <dt class="text-[2rem]">Number</dt>
        <dd>{{ $student->number }}</dd>
    </dl>
</x-layout.main>