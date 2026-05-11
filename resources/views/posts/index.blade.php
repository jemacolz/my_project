<h1>Posts</h1>

<a href="{{ route('posts.create') }}">Create Post</a>

@foreach($post as $posts)
    <h3>{{$posts->title }}</h3>
    <p>{{ $posts->content }}</p>
    <p>{{ $posts->description }}</p>
    <p>{{ $posts->gender }}</p>
    <p>{{ $posts->civil_status }}</p>

    <a href="{{ route('posts.edit', $posts->id) }}">Edit</a>

    <form method="POST" action="{{ route('posts.destroy', $posts->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
    <hr>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session('success'))

<script>

Swal.fire({
    title: 'Success!',
    text: '{{ session('success') }}',
    icon: 'success',
    confirmButtonText: 'OK'
});

</script>

@endif
