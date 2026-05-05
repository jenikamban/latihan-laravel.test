<x-app>

    <x-slot:title>{{ $title }}</x-slot>


    <a class="btn btn-warning" href="{{ route('department.index') }}" role="button">Back</a>

    {{-- deparment --}}

    <ul class="list-group mb-3">
        <h4> Data deparment</h4>
        <li class="list-group-item active" aria-current="true">An active item</li>
        <li class="list-group-item">Name: {{ $Department->name }}</li>
        <li class="list-group-item">
            Created At:{{ $Department->created_at->format('d F Y H:i:s') }}
        </li>
        <li class="list-group-item">
            Last update:{{ $Department->updated_at->diffForHumans() }}

        </li>

    </ul>

    {{-- lecturer --}}
    <h4> Data lecturers</h4>

    <ul class="list-group">


        @foreach ($Department->lecturers as $lecturer)
            <li class="list-group-item"> {{ $lecturer->name }}</li>
        @endforeach



    </ul>

</x-app>
