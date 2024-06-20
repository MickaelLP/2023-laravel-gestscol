<x-app-layout title="Create students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a course
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

                    <a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.course.index') }}">Back to list</a>
                    <form action="{{ route('admin.course.update', $course) }}" method="post">
                        @csrf
                        @method('PUT')
                        <p>
                            <x-form.input type="date" name="day" placeholder="19/08/23" label="Day" value="{{ $course->day }}"/>
                        </p>
                        <p>
                            <x-form.input type="time" name="begin" placeholder="08:00:00" label="Begin" value="{{ $course->begin }}"/>
                            {{-- <input placeholder="Firstname" name="firstname" value="{{ old('firstname') }}"> --}}
                        </p>
                        <p>
                            <x-form.input type="time" name="end" placeholder="10:00:00" label="End" value="{{ $course->end }}"/>
                            {{-- <input placeholder="Email" name="email" value="{{ old('email') }}"> --}}
                        </p>
                        <p>
                            <x-form.input name="libelle" placeholder="WEB 3" label="Libelle" value="{{ $course->libelle }}"/>
                            {{-- <input placeholder="Number" name="number" value="{{ old('number') }}"> --}}
                        </p>

                        <p>
                            <span class="block">Formation</span>
                            <select name="formation_id">
                                @foreach ($formations as $formation)
                                    <option
                                        @if ($formation->id == old('formation_id')) selected @endif
                                        value="{{ $formation->id }}">
                                        {{ $formation->name }}</option>
                                @endforeach
                            </select>
                            @error('formation_id')  
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
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
    