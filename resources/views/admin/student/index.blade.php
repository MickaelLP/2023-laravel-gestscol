<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Students
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">List of students</h1>
                    <p>
                        @can('create', App\Model\Student::class)
                            <a class="hover:text-slate-200 text-green-500" href="{{ route('admin.student.create') }}">Create student</a>
                        @endcan
                    </p>
                    {{-- @empty($students)
                        <p>No student...</p>
                    @else
                        <ul>
                            @foreach ($students as $student)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('admin.student.show', $student) }}">{{ $student->lastname }} {{ $student->firstname }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty --}}

                    <livewire:student-filter />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    