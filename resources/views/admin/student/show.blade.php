<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of Student
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.student.index') }}">Back to students</a></p>
                    <dl>
                        <dt class="text-[2rem]">Lastname</dt>
                        <dd>{{ $student->lastname }}</dd>
                        <dt class="text-[2rem]">Firstname</dt>
                        <dd>{{ $student->firstname }}</dd>
                        <dt class="text-[2rem]">Email</dt>
                        <dd>{{ $student->email }}</dd>
                        <dt class="text-[2rem]">Number</dt>
                        <dd>{{ $student->number }}</dd>
                        <dt class="text-[2rem]">Formation</dt>
                        <dd>
                            @if ($student->formation)
                                <a class="text-slate-500 hover:text-slate-200"
                                    href="{{ route('admin.formation.show', $student->formation) }}">{{ $student->formation->name }}</a>
                            @else
                                N/A
                            @endif
                        </dd>
                        <dt class="text-[2rem]">Groups</dt>
                        <dd>
                            @if($student->groups->isEmpty())
                                N/A
                            @else
                                @foreach ($student->groups as $group)
                                    <label class="block">
                                        {{ $group->name }} 
                                    </label>
                                @endforeach
                            @endempty
                        </dd>


                    </dl>
                    @can('update', $student)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.student.edit', $student) }}">Edit student</a></p>
                    @endcan
                    @can('delete', $student)
                        <form action="{{ route('admin.student.destroy', $student) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="hover:text-slate-200 text-red-500" type="submit">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    