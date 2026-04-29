<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UNITAMA</a>

            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('student.index') }}">STUDENT</a>
                <a class="nav-link" href="{{ route('department.index') }}">DEPARTEMEN</a>
                <a class="nav-link" href="{{ route('lecturer.index') }}">LECTURER</a>
            </div>
        </div>
    </nav>

    <div class="bg-primary py-5 text-center text-white">
        <h1 class="fw-bold">{{ $title }}</h1>
    </div>

    <div class="container my-5">
        {{ $slot }}
    </div>

</body>

</html>
