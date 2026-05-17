<h1>Edit Post</h1>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: @json(session('success')),
        timer: 2000,
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('info'))
<script>
    Swal.fire({
        icon: 'info',
        title: 'No Changes',
        text: @json(session('info')),
        timer: 1000,
        showConfirmButton: false
    });
</script>
@endif

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}">
    <br><br>

    <textarea name="content">{{ $post->content }}</textarea>
    <br><br>
  <!-- #region -->
      <textarea name="gender">{{ $post->gender }}</textarea>
    <br><br>


    <textarea name="civil_status">{{ $post->civil_status }}</textarea>
    <br><br>

    


    <button type="submit">Update</button>
</form>

