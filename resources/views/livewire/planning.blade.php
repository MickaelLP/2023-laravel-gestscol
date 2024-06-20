<div>
    @if ($isShowFormUpdate==false)
        <form class="my-3 space-y-1" wire:submit='submit'>
            <p><input type="text" placeholder="Course" wire:model="form.course"></p>
            <p><input type="text" placeholder="Student" wire:model="form.student"></p>
            <p>
                <button type="button" wire:click='previousWeek()'>Previous week</button>
                <span class="inline-block">
                    <input type="date" wire:model="form.date">
                    @error('form.date')
                        <span class="block text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </span>
                <button type="button" wire:click='nextWeek()'>Next week</button>
            </p>
            <p>
                <select wire:model="form.study">
                    <option value=""></option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->name }}</option>
                    @endforeach
                </select>
            </p>
            <p>
                @foreach ($groups as $group)
                    <label class="block my-1">
                        <input wire:model="form.groups" type="checkbox" value="{{ $group->id }}">
                        {{ $group->name }}
                    </label>
                @endforeach
            </p>
            <p><button type="submit" class="border border-gray-500 p-2">Envoyez</button></p>
        </form>
    @else
        <h1>Modifier la date pour {{ $courseForUpdate->libelle }}</h1>
        <form class="my-3 space-y-1" wire:submit='submitUpdate({{ $courseForUpdate->id }})'>
            <label for="date">Choisissez une nouvelle date</label>
            <input id="date" type="date" wire:model='updateDate'>
            <p><button type="submit" class="border border-gray-500 p-2">Changez le cours</button></p>
        </form>
    @endif

    <div wire:loading>
        loading...
    </div>

    {{-- @empty($courses)
        <p>no course</p>
    @else
        <ul class="space-y-1">
            @foreach ($courses as $course)
                <li>{{ $course->label }}</li>
            @endforeach
        </ul>
    @endempty --}}

    <table class="w-full border-collapse table-fixed">
        <thead>
            <tr class="bg-gray-300">
                @foreach ($days as $day)
                    <th class="p-1">{{ $day->format('d/m/Y') }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($days as $day)
                    <td class="border border-gray-300 p-1 align-top space-y-1">
                        {{-- @foreach ($courses->filter(function ($course) use ($day) { return $course->begin->format('Y-m-d') == $day->format('Y-m-d'); }) as $course) --}}
                        @foreach ($courses->get($day->format('Y-m-d'), []) as $course)
                            <div class="bg-green-600 p-1 text-white">
                                {{-- <p class="text-xs">{{ $course->begin->format('m/d/Y H:i') }}</p> --}}
                                <p>{{ $course->name }}</p>
                                <p>{{ $course->formation->name ?? null }}</p>
                                @can('delete', $course)
                                <p>
                                    <button class="bg-red-500 py-2 px-2 text-gray-100 border border-gray-500" wire:click='delete({{ $course->id }})'>Delete</button>
                                    @can('update',$course)
                                    <button class="bg-green-500 py-2 px-2 text-gray-100 border border-gray-500" wire:click='showFormUpdate({{$course->id}})'>Update</button>
                                    @endcan
                                </p>
                                @endcan
                            </div>
                        @endforeach
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>

</div>
