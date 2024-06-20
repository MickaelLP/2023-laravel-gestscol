<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit a student
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
                
                    <a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.student.show', $student) }}">Back to details</a>
                
                    <form action="{{ route('admin.student.update', $student) }}" method="post">
                        @csrf
                        @method('PUT')
                        <p>
                            <x-form.input name="lastname" placeholder="Smith" label="LastName" :value="$student->lastname"/>
                        </p>
                        <p>
                            {{-- <input placeholder="John" name="firstname" value="{{ old('firstname',$student->firstname) }}"> --}}
                            <x-form.input name="firstname" placeholder="John" label="FirstName" :value="$student->firstname"/>
                        </p>
                        <p>
                            {{-- <input placeholder="Email" name="email" value="{{ old('email',$student->email) }}"> --}}
                            <x-form.input name="email" placeholder="Email" label="Email" :value="$student->email"/>
                        </p>
                        <p>
                            {{-- <input placeholder="Number" name="number" value="{{ old('number',$student->number) }}"> --}}
                            <x-form.input name="number" placeholder="Number" label="number" :value="$student->number"/>
                
                        </p>
                        <p>
                            <span class="block">Formation</span>
                            <select name="formation_id">
                                @foreach ($formations as $formation)
                                    <option
                                        @if ($formation->id == old('formation_id')) selected @endif
                                        value="{{ $formation->id }}">
                                        {{ $formation->promotion }}</option>
                                @endforeach
                            </select>
                            @error('formation_id')  
                                <span class="text-red-500 block">{{ $message }}</span>
                            @enderror
                        </p>
                        <p>
                            <span>Groups</span>
                                @foreach ($groups as $group)
                                <span class="block my-1 "><input class="mx-2" type="checkbox" name="groups[]" value="{{ $group->id }}"
                                    @if (in_array($group->id, old('groups', $student->groups->pluck('id')->all()))) checked @endif
                                    />{{ $group->name }}</span>
                                @endforeach
                        </p>

                        <p><button class="hover:text-slate-200 text-green-500" type="submit" placeholder="Lastname">Save</button></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    