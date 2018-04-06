@extends('layouts.app')

@section('content')

    <form method="post" action="/blog/store">
        @include('partials.error-alert')
        <div class="form-horizontal">
            @csrf
            <h4>Create Blog</h4>
            <hr/>
            <input type="hidden" value="" id="categoryIds" name="categoryIds">

            <div class="form-group">
                <label class="control-label col-md-2" for="title">Title</label>
                <div class="col-md-10">
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="status">Publish status</label>
                <div class="col-md-2">
                    <select class="form-control" name="status" id="status">
                        @php
                            $statusList=['Published','Draft','Hidden'];
                        @endphp
                        @foreach($statusList as $status)
                            <option value="{{$status}}" @if ($status === old('status')) selected="selected" @endif>{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="publish_date">Publish date</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="publish_date" id="publish_date"
                           placeholder="dd-mm-yyyy" value="{{old('publish_date')}}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <div class="btn-group">
                        <div id="left" class="btn btn-default"><i class="fa fa-align-left"></i></div>
                        <div id="center" class="btn btn-default"><i class="fa fa-align-center"></i></div>
                        <div id="right" class="btn btn-default"><i class="fa fa-align-right"></i></div>
                        <div id="justify" class="btn btn-default"><i class="fa fa-align-justify"></i></div>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                        <div id="bold" class="btn btn-default"><i class="fa fa-bold"></i></div>
                        <div id="italic" class="btn btn-default"><i class="fa fa-italic"></i></div>
                        <div id="underline" class="btn btn-default"><i class="fa fa-underline"></i></div>
                        <div id="subscript" class="btn btn-default"><i class="fa fa-subscript"></i></div>
                        <div id="superscript" class="btn btn-default"><i class="fa fa-superscript"></i></div>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                        <div id="p" class="btn btn-default">&lt;p&gt;</div>
                        <div id="h3" class="btn btn-default">h3</div>
                        <div id="h4" class="btn btn-default">h4</div>
                        <div id="h5" class="btn btn-default">h5</div>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                        <div id="ol" class="btn btn-default"><i class="fa fa-list-ol"></i></div>
                        <div id="ul" class="btn btn-default"><i class="fa fa-list-ul"></i></div>
                        <div id="li" class="btn btn-default">&lt;li&gt;</div>
                    </div>
                    &nbsp;
                    <div class="btn-group">
                        <div id="img" class="btn btn-default"><i class="fa fa-image"></i></div>
                        <div id="a-link" class="btn btn-default"><i class="fa fa-link"></i></div>
                        <div id="pre" class="btn btn-default">&lt;pre&gt;</div>
                        <div id="code" class="btn btn-default"><i class="fa fa-code"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2" for="blog_text">Blog Text</label>
                <div class="col-md-5">
                    <textarea class="form-control w-100" name="blog_text" id="blog_text" rows="30"
                              cols="100">{!! old('blog_text') !!}</textarea>
                </div>
                <div id="preview" class="col-md-5">
                    <p>&nbsp;</p>
                </div>
            </div>

            <!--TODO Add upload image method-->
            <div class="form-group">
                <label class="control-label col-md-2" for="image">Image location</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="image" id="image" value="{{old('image')}}">
                </div>
                <label class="control-label col-md-2" for="alt_text">Alternative text</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="alt_text" id="alt_text" value="{{old('alt_text')}}">
                </div>
            </div>

            {{--TODO Change listboxes to use arrays--}}
            {{--TODO change listboxes to get old data on validation errors--}}
            <div class="form-group">
                <label class="control-label col-md-2" for="categoryItems">Categories</label>
                <div class="col-md-3">
                    <select multiple class="form-control category-list" size="10" name="categoryItems"
                            id="categoryItems">
                        @if (!empty($categories))
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-1  btn-group-vertical">
                    <button type="button" id="addAll" class="btn btn-default"><i class="fa fa-angle-double-right"></i>
                    </button>
                    <button type="button" id="addSelected" class="btn btn-default"><i class="fa fa-angle-right"></i>
                    </button>
                    <button type="button" id="removeSelected" class="btn btn-default"><i class="fa fa-angle-left"></i>
                    </button>
                    <button type="button" id="removeAll" class="btn btn-default"><i class="fa fa-angle-double-left"></i>
                    </button>
                </div>
                <div class="col-md-3">
                    <select id="SelectedCategories" multiple class="form-control category-list" size="10">
                        @if (!empty($blog->categories))
                            @foreach ($blog->categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <input id="submitbtn" type="submit" value="Save" class="btn btn-default pull-right"/>
            </div>
        </div>
    </form>
    <br>
@endsection {{--content--}}

@section('scripts')
    @include('partials.handle-edit-blog')
@endsection {{--scripts--}}
