<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('erorr')
        <div class="alert alert-danger">
            {{ session('erorr') }}
        </div>
    @endsession

    <form method="POST" action="{{ route('organization.update', $organization) }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>

            <input type="text" class="form-control @error('name') is-invalid 
            @enderror" id="name"
                name="name" value="{{ old('name', $organization->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="Leader_name" for="exampleCheck1">Leader</label>
            <input type="text" class="form-control @error('Leader_name') is-invalid 
            @enderror"
                id="Leader_name" name="Leader_name"
                value="{{ old('Leader_name', $organization->organizationLeader?->Leader_name) }}">
            @error('Leader_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <a class="btn btn-warning" href="{{ route('organization.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
        </method=>
</x-app>
