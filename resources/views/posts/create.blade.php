
@include('layouts.navbar')



<h1>Create Post</h1>

@if ($errors->any())

   @foreach ($errors->all() as $errors)

       <p>{{ $errors }}</p>

   @endforeach

@endif


<form method="POST" action="/posts">
    @csrf

    <input type="text" name="title" placeholder="Title">
    <br><br>

    <textarea name="content" placeholder="Content"></textarea>
    <br><br>

    <textarea name="description" placeholder="Description"></textarea>
    <br><br>

    
    
    {{-- <select name="options_deliver" id="options_deliver">
        @foreach($options as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select> --}}
    <br><br>
    <button type="submit">Save</button>
</form>
