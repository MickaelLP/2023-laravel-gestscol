<x-app-layout title="Create students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a student
        </h2>
    </x-slot>
    <div class="py-12 text-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.student.index') }}">Back to list</a>
                    <form action="{{ route('admin.student.store') }}" method="post">
                        @csrf
                        <p>
                            <x-form.input name="lastname" placeholder="First" label="LastName"/>
                        </p>
                        <p>
                            <x-form.input name="firstname" placeholder="John" label="FirstName"/>
                            {{-- <input placeholder="Firstname" name="firstname" value="{{ old('firstname') }}"> --}}
                        </p>
                        <p>
                            <x-form.input name="email" placeholder="john@smith.fr" label="Email"/>
                            {{-- <input placeholder="Email" name="email" value="{{ old('email') }}"> --}}
                        </p>
                        <p>
                            <x-form.input name="number" placeholder="GFD09991" label="Number"/>
                            {{-- <input placeholder="Number" name="number" value="{{ old('number') }}"> --}}
                        </p>
                        <p>
                            <select name="formation_id">
                                <option value="">-- Formations --</option>
                                @foreach ($formations as $formation)
                                    <option
                                    @if ($formation->id == old('formation_id')) selected @endif
                                    value="{{ $formation->id }}">{{ $formation->promotion }}</option>
                                    
                                @endforeach
                            </select>
                            @error('formation_id')  
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
                        </p>

                        <p>
                            @foreach ($groups as $group)
                            <span class="block my-1 "><input class="mx-2" type="checkbox" name="groups[]" value="{{ $group->id }}"
                                @if (in_array($group->id, old('groups', []))) checked @endif
                                />{{ $group->name }}</span>
                            @endforeach
                        </p>
                        
                        <p>
                            <button class="hover:text-slate-200 text-green-500" type="submit" placeholder="Lastname">Save</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    