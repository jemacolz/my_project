<h1>Posts</h1>

<a href="{{ route('posts.create') }}">Create Post</a>

@foreach($posts as $post)
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
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
