@extends('layouts.app')

{{-- This is used for BOTH create and edit.--}}

{{-- When editing, --}}
{{--    $blog will be set to the values of the blog to be edited--}}
{{--    $action will contain 'edit'--}}

{{-- When creating, --}}
{{--    $blog is not set,--}}
{{--    $action will contain 'create'--}}

@section('content')

    <form method="post"
          @if ($action === 'create')
          action="/blog/store"
          @else
          action="/blog/update"
            @endif
    >
        @include('partials.erroralert')
        <div class="form-horizontal">
            @csrf
            <h4>{{ucfirst($action)}} Blog</h4>
            <hr/>
            @if (!empty($blog))
                <input type="hidden" value="{{$blog->id}}" name="id">
                <input type="hidden" value="{{$blog->user_id}}" name="user_id">
                <input type="hidden" value="{{$blog->created_at}}" name="created_at">
            @endif
            <input type="hidden" value="" id="categoryIds" name="categoryIds">

            <div class="form-group">
                <label class="control-label col-md-2" for="title">Title</label>
                <div class="col-md-10">
                    <input type="text" name="title" id="title" class="form-control"
                           @if (!empty($blog->title))
                           value="{{$blog->title}}"
                           @endif
                           required>
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
                            <option value="{{$status}}"
                                    @if(!empty($blog->status) && $blog->status === $status)
                                    selected="selected"
                                    @endif
                            >{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-2" for="publish_date">Publish date</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="publish_date" id="publish_date"
                           placeholder="dd-mm-yyyy"
                           @if (!empty($blog->publish_date))
                           value="{{$blog->publish_date}}"
                            @endif
                    >
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
                    <textarea class="form-control w-100" name="blog_text" id="blog_text" rows="30" cols="100"
                    >@if (!empty($blog->blog_text)){!! $blog->blog_text !!}@endif</textarea>
                </div>
                <div id="preview" class="col-md-5">
                    <p>&nbsp;</p>
                </div>
            </div>

            <!--TODO Add upload image method-->
            <div class="form-group">
                <label class="control-label col-md-2" for="image">Image location</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="image" id="image"
                           @if (!empty($blog->image))
                           value="{{$blog->image}}"
                            @endif
                    >
                </div>
                <label class="control-label col-md-2" for="alt_text">Alternative text</label>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="alt_text" id="alt_text"
                           @if (!empty($blog->alt_text))
                           value="{{$blog->alt_text}}"
                            @endif
                    >
                </div>
            </div>

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
    <script>

        // Used to insert HTML tags in blog_text.
        // Either wraps selected text in tags, or
        // Places tags at the caret and moves caret to allow typing between the tags

        function insert(startString, endString) {
            const textBox = document.getElementById('blog_text');
            textBox.focus();
            let caretStart = textBox.selectionStart;
            let caretEnd = textBox.selectionEnd;
            let textInListBox = textBox.value;
            let newText = textInListBox.substring(0, caretStart) + startString + textInListBox.substring(caretStart, caretEnd) + endString + textInListBox.substring(caretEnd, textInListBox.length);
            textBox.value = newText;
            textBox.selectionEnd = caretEnd + startString.length + endString.length;
            document.getElementById('preview').innerHTML = newText;
            // document.getElementById('preview').css('FontSize', '0.5em');
        }

        //previews HTML text written in blog_text by copying it to preview

        function drawHTML() {
            document.getElementById('preview').innerHTML = document.getElementById('blog_text').value;
        }

        // Moves Options in a ListBox
        // from the ListBox with id in leftListBoxID
        // to ListBox with id in rightListBoxID
        // Will move only selected items if isMoveAll === false
        // Will move all items if isMoveAll === true

        function MoveListBoxItem(leftListBoxID, rightListBoxID, isMoveAll) {
            const fromParent = document.getElementById(leftListBoxID);
            const toParent = document.getElementById(rightListBoxID);
            let count = fromParent.options.length;
            let movingOptions = [];
            for (let i = 0; i < count; i++) {
                if (fromParent.options[i].selected === true || isMoveAll) {
                    movingOptions.push(fromParent.options[i]);
                }
            }
            count = movingOptions.length;
            for (let i = 0; i < count; i++) {
                {
                    opt = movingOptions.pop();
                    opt.selected = false;
                    toParent.appendChild(opt);
                }
            }
        }

        window.addEventListener('DOMContentLoaded', function () {
                drawHTML();
                document.getElementById('blog_text').addEventListener('input', function () {
                    drawHTML();
                });

                // SUBMIT button - converts HTML text so it goes through filters
                // Stores selected category ids as string list in hidden input categoryIds

                document.getElementById('submitbtn').addEventListener('click', function () {
                    const textBox = document.getElementById('blog_text');
                    textBox.value = textBox.value.replace(/<(.+?)>/g, '< $1 >');
                    let hiddenString = '';
                    const selected = document.querySelectorAll('#SelectedCategories option');
                    for (let select of selected) {
                        hiddenString += select.value + ",";
                    }
                    document.getElementById('categoryIds').value = hiddenString;
                });

                //Handles date picker

                $(function () {
                    let currentDate = new Date();
                    $('#publish_date').datepicker({
                        dateFormat: "dd-mm-yy"
                    });
                    $("#publish_date").datepicker("setDate", currentDate);
                });

                // Category button handlers

                document.getElementById('addAll').addEventListener('click', function () {
                    MoveListBoxItem('categoryItems', 'SelectedCategories', true);
                });
                document.getElementById('addSelected').addEventListener('click', function () {
                    MoveListBoxItem('categoryItems', 'SelectedCategories', false);
                });
                document.getElementById('removeAll').addEventListener('click', function () {
                    MoveListBoxItem('SelectedCategories', 'categoryItems', true);
                });
                document.getElementById('removeSelected').addEventListener('click', function () {
                    MoveListBoxItem('SelectedCategories', 'categoryItems', false);
                });

                // HTML tag button handlers
                document.getElementById('left').addEventListener('click', function () {
                    insert("<p class=\"text-left\">", "</p>");
                });
                document.getElementById('right').addEventListener('click', function () {
                    insert("<p class=\"text-right\">", "</p>");
                });
                document.getElementById('center').addEventListener('click', function () {
                    insert("<p class=\"text-center\">", "</p>");
                });
                document.getElementById('justify').addEventListener('click', function () {
                    insert("<p class=\"text-justify\">", "</p>");
                });

                document.getElementById('bold').addEventListener('click', function () {
                    insert("<b>", "</b>");
                });
                document.getElementById('italic').addEventListener('click', function () {
                    insert("<i>", "</i>");
                });
                document.getElementById('underline').addEventListener('click', function () {
                    insert("<u>", "</u>");
                });
                document.getElementById('subscript').addEventListener('click', function () {
                    insert("<sub>", "</sub>");
                });
                document.getElementById('superscript').addEventListener('click', function () {
                    insert("<sup>", "</sup>");
                });
                document.getElementById('p').addEventListener('click', function () {
                    insert("<p>", "</p>");
                });
                document.getElementById('h3').addEventListener('click', function () {
                    insert("<h3>", "</h3>");
                });
                document.getElementById('h4').addEventListener('click', function () {
                    insert("<h4>", "</h4>");
                });
                document.getElementById('h5').addEventListener('click', function () {
                    insert("<h5>", "</h5>");
                });
                document.getElementById('ol').addEventListener('click', function () {
                    insert("<ol>", "</ol>");
                });
                document.getElementById('ul').addEventListener('click', function () {
                    insert("<ul>", "</ul>");
                });
                document.getElementById('li').addEventListener('click', function () {
                    insert("<li>", "</li>");
                });
                document.getElementById('img').addEventListener('click', function () {
                    insert('<img class="" src="">', '');
                });
                document.getElementById('a-link').addEventListener('click', function () {
                    insert('<a href="">', '</a>');
                });
                document.getElementById('pre').addEventListener('click', function () {
                    insert("<pre>", "</pre>");
                });
                document.getElementById('code').addEventListener('click', function () {
                    insert("<code>", "</code>");
                });

            },
            false
        );
    </script>

@endsection {{--scripts--}}
