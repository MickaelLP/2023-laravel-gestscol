<x-app-layout title="List of students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit a formation
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
            
                <a class="text-slate-500 hover:text-slate-200" href="{{ route('admin.formation.show', $formation) }}">Back to details</a></li>
                <form action="{{ route('admin.formation.update', $formation) }}" method="post">
                    @csrf
                    @method('PUT')
                    <p>
                        <x-form.input placeholder="Promotion" name="promotion" value="{{ old('promotion', $formation->promotion) }}" />
                        @error('promotion')  
                            <br>{{$message}}
                        @enderror
                    </p>
                    <p><x-form.input placeholder="Name" name="name" value="{{ old('name', $formation->name) }}"/></p>
                    <p><x-form.input placeholder="Numéro de td" name="td" value="{{ old('td', $formation->td) }}"/></p>
                    <p><x-form.input placeholder="Numéro de tp" name="tp" value="{{ old('tp', $formation->tp) }}"/></p>
                    <p><x-form.input placeholder="Option" name="option" value="{{ old('option', $formation->option) }}"/></p>
                    <p><x-form.input placeholder="Category" name="category" value="{{ old('category', $formation->category) }}"/></p>
                    <p>
                        <label  class="block text-[2rem]" for="">Students</label>
                        @foreach ($students as $student)
                            <span class="block my-1"><input class="mx-2" type="checkbox" name="students[]" value="{{ $student->id }}"
                                @if (in_array($student->id, old('students', $formation->students->pluck('id')->all()))) checked @endif
                                >{{ $student->lastname }} {{ $student->firstname }}</span>
                        @endforeach
                    </p>
                    <p><button class="hover:text-slate-200 text-green-500" type="submit">Edit</button></p>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
    