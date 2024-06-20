<x-layout.main title="details of formation">
    <p><a href="{{ route('formation.index') }}">Back to formations</a></p>
    <dl>
        <dt>Promotion</dt>
        <dd>{{ $formation->promotion }}</dd>
        <dt>Name</dt>
        <dd>{{ $formation->name }}</dd>
        <dt>Td</dt>
        <dd>{{ $formation->td }}</dd>
        <dt>Tp</dt>
        <dd>{{ $formation->tp }}</dd>
        <dt>Option</dt>
        <dd>{{ $formation->option }}</dd>
        <dt>Category</dt>
        <dd>{{ $formation->category }}</dd>
    </dl>
</x-layout.main>