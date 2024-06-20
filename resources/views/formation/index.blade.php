<x-layout.main title="List of formations">
    <h1>Formations</h1>
    @empty($formations)
        <p>No formation...</p>
    @else
        <ul>
            @foreach ($formations as $formation)
                <li><a href="{{ route('formation.show', $formation) }}">{{ $formation->name }} {{ $formation->promotion }}</li></a>
            @endforeach
        </ul>
    @endempty
</x-layout.main>