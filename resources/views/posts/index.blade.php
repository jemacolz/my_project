@extends('layouts.app')

@section('title', 'Posts')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Posts</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="{{ route('posts.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Posts
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Clearance</h3>

                    <div class="card-tools">
                        @auth
                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-search"></i>
                                Filter
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="card-body" p-0>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:50px;">ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Description</th>
                                    <th>Gender</th>
                                    <th>Civil Status</th>

                                    @auth
                                        <th style="width:180px;">Action</th>
                                    @endauth
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($post as $posts)
                                    <tr>
                                        <td>{{ $posts->id }}</td>
                                        <td>{{ $posts->title }}</td>
                                        <td>{{ $posts->content }}</td>
                                        <td>{{ $posts->description }}</td>
                                        <td>{{ $posts->gender }}</td>
                                        <td>{{ $posts->civil_status }}</td>

                                        @auth
                                            <td>
                                                <a href="{{ route('posts.edit', $posts->id) }}" class="text-decoration-none me-2 p-0">
                                                    <i class="bi bi-pencil-fill"></i>
                                            
                                                </a>

                                                <form method="POST" action="{{ route('posts.destroy', $posts->id) }}"
                                                    class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="text-decoration-none border-0 bg-transparent p-0 m-0 align-baseline" style="color: rgb(233, 66, 25)">
                                                        <i class="bi bi-trash-fill"></i>
                                                    
                                                    </button>
                                                </form>
                                            </td>
                                        @endauth
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.delete-form').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This post will be deleted.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'Cancel'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
