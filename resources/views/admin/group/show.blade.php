<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Details of a group
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p><a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.group.index') }}">Back to groups</a></p>
                    <dl>
                        <dt class="text-[2rem]">Name</dt>
                        <dd>{{ $group->name }}</dd>
                    </dl>
                    @can('update', $group)
                        <p><a class="hover:text-slate-200 text-green-500" href="{{ route('admin.group.edit', $group) }}">Edit group</a></p>
                    @endcan
                    @can('delete', $group)
                        <form action="{{ route('admin.group.destroy', $group) }}" method="POST">
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
    