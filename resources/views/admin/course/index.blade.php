<x-app-layout title="List of courses">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Index of courses
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">Courses</h1>
                    @can('create', App\Models\Course::class)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.course.create') }}">Create a course</a></p>
                    @endcan
                    @if($courses->isEmpty())
                        <p>No courses...</p>
                    @else
                        <ul>
                            @foreach ($courses as $course)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('admin.course.show', $course) }}">{{ $course->libelle }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    