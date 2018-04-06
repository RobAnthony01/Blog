<div>
    @foreach ($blog->categories as $category)
        <span class="badge badge-pill badge-info">{{$category->name}}</span>
    @endforeach
</div>