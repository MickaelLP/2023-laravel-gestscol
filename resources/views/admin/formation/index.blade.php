<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Index of formation.s
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">Formations</h1>
                    @can('create', App\Models\Formation::class)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.formation.create') }}">Create formation</a></p>
                    @endcan
                    {{-- @empty($formations)
                        <p>No formation...</p>
                    @else
                        <ul>
                            @foreach ($formations as $formation)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('admin.formation.show', $formation) }}">{{ $formation->name }} {{ $formation->promotion }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty --}}
                    <livewire:formation-filter>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    