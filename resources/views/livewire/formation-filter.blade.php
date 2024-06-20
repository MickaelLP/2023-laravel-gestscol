<div>
    <p><input placeholder="search" wire:model.live="search"></p>
    @empty($formations)
        <p>no study</p>
    @else
        <ul class="space-y-1">
            @foreach ($formations as $formation)
                <li><a class="link" href="{{ route('formation.show', $formation) }}">{{ $formation->name }}</a></li>
            @endforeach
        </ul>
    @endempty
</div>

