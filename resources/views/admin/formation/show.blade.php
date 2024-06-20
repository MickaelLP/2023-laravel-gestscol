<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of a formation
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.formation.index') }}">Back to formations</a></p>
                    <dl>
                        <dt class="text-[2rem]">Promotion</dt>
                        <dd>{{ $formation->promotion }}</dd>
                        <dt class="text-[2rem]">Name</dt>
                        <dd>{{ $formation->name }}</dd>
                        <dt class="text-[2rem]">Td</dt>
                        <dd>{{ $formation->td }}</dd>
                        <dt class="text-[2rem]">Tp</dt>
                        <dd>{{ $formation->tp }}</dd>
                        <dt class="text-[2rem]">Option</dt>
                        <dd>{{ $formation->option }}</dd>
                        <dt class="text-[2rem]">Category</dt>
                        <dd>{{ $formation->category }}</dd>
                        <dt class="text-[2rem]">Students</dt>
                    </dl>
                    @if ($formation->students->isNotEmpty())
                        <ul>
                            @foreach ($formation->students as $student)
                                <li>
                                    <a class="text-slate-500 hover:text-slate-200" class="link" href="{{ route('admin.student.show', $student) }}">{{$student->lastname}} {{$student->firstname}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    @can('update', $formation)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.formation.edit', $formation) }}">Edit formation</a></p>
                    @endcan
                    @can('delete', $formation)
                        <form action="{{ route('admin.formation.destroy', $formation) }}" method="POST">
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
    