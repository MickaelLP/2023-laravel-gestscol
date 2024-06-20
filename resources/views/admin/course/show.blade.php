<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of a course
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.course.index') }}">Back to courses</a></p>
                    <dl>
                        <dt class="text-[2rem]">Day</dt>
                        <dd>{{ $course->day }}</dd>
                        <dt class="text-[2rem]">Time begin</dt>
                        <dd>{{ $course->begin }}</dd>
                        <dt class="text-[2rem]">Time end</dt>
                        <dd>{{ $course->end }}</dd>
                        <dt class="text-[2rem]">Libellé</dt>
                        <dd>{{ $course->libelle }}</dd>
                        <dt class="text-[2rem]">Formation name</dt>
                        <p>
                            <a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.formation.show', $course->formation) }}"">{{ $course->formation->name }}</a>
                        </p>
                    </dl>
                    @can('update', $course)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.course.edit', $course) }}">Edit course</a></p>
                    @endcan
                    @can('delete', $course)
                        <form action="{{ route('admin.course.destroy', $course) }}" method="POST">
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
    