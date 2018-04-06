@if (auth::check())
    <br>
    <div class="btn-group pull-right">
        <a class="btn btn-default" href="{{url('/blog/edit/' . $blog->id )}}">Edit</a>
        <button data-id="{{$blog->id}}" data-title="{{$blog->title}}" class="btn btn-default delete-button">Delete</button>
    </div>
@endif