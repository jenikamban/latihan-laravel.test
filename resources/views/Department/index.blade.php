<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary" href="{{ route('Department.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($Departments as $Department)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $Department->name }}
                <a class="btn btn-warning btn-sm" href="{{ route('Department.edit', $Department) }}"
                    role="button">edit</a>
                <form action="{{ route('Department.destroy', $Department) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('anda yakin')">Delete</button>
                </form>

            </li>
        @endforeach
    </ul>
</x-app>
