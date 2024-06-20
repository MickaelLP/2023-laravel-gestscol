<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Index of group.s
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-[3rem]">Groups</h1>
                    @can('create', App\Models\Group::class)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.group.create') }}">Create a group</a></p>
                    @endcan
                    @empty($groups)
                        <p>No group...</p>
                    @else
                        <ul>
                            @foreach ($groups as $group)
                                <li class="text-slate-500 hover:text-slate-200">
                                    <a href="{{ route('admin.group.show', $group) }}">{{ $group->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endempty
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    