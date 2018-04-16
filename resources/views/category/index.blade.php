@extends('layouts.app')

@section('content')

    {{--MODAL--}}
    {{--Many of the values are updated by JavaScript--}}
    <div id="edit-delete-Modal" class="modal">
        <div class="modal-content">

            <form id="modal-form" action="" method="post">
                @csrf
                <input type="hidden" id="modal-hidden" name="id" value="">
                <div class="modal-header">
                    <h5 id="modal-title">Edit the category</h5>
                    <span id="modal-close" class="close">&times;</span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" class="form-control" name="category" id="name" value="default" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="pull-right">
                            <button id="btn-submit" type="submit" class="btn btn-primary">Save</button>
                            <button id="btn-cancel" class="btn btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form method="post" action="{{url('store')}}">
        @csrf
        <div class="form-horizontal">
            <div class="form-group">
                <div class="row">
                    <h2 class="col-md-2 col-sm-12">Categories</h2>
                    <label for="category" class="mt-4 control-label col-sm-3">Add new category</label>
                    <div class="mt-4 col-sm-3 col-xs-10 col-xs-offset-1">
                        <input class="form-control" name="category" id="category" required>
                    </div>
                    <input type="submit" value="Create" id="create-btn" class="m-4 btn btn-default col-sm-2"/>
                </div>
            </div>
        </div>
    </form>
    @include('partials.error-alert')
    <hr/>
    <div class="row">
        {{ $categories->links() }}
    </div>
    <div class="row">
        <table id="table_category" class="table table-bordered col-sm-12">
            <thead>
            <tr class="d-flex">
                <th class="col-sm-8 col-xs-6">Category</th>
                <th class="col-sm-4 col-xs-6">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="d-flex">
                    <td class="col-sm-8 col-xs-6"> {{$category->name}}</td>
                    <td class="col-sm-4 col-xs-6">
                        <button class="btn btn-default btn-sm edit-button" dusk="Edit{{$category->id}}" data-id="{{$category->id}}">Edit</button>
                        <button class="btn btn-default btn-sm delete-button" dusk="Delete{{$category->id}}" data-id="{{$category->id}}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        function closeModal(event) {
            document.getElementById('edit-delete-Modal').style.display = 'none';
            event.preventDefault();
        }

        document.getElementById('modal-close').addEventListener('click', closeModal);
        document.getElementById('btn-cancel').addEventListener('click', closeModal);
        document.getElementById('table_category')
            .addEventListener('click', function (event) {
                if (event.target.className.indexOf('edit-button') !== -1) {
                    document.getElementById('modal-title').innerText = 'Edit the category';
                    document.getElementById('name').value = event.target.parentNode.previousElementSibling.innerHTML.trim();
                    document.getElementById('modal-form').action = 'update';
                    document.getElementById('modal-hidden').value = event.target.getAttribute('data-id');
                    document.getElementById('btn-submit').innerHTML = 'Save';
                    document.getElementById('edit-delete-Modal').style.display = 'block';
                } else if (event.target.className.indexOf('delete-button') !== -1) {
                    document.getElementById('modal-title').innerText = 'Do you want to delete this category?';
                    document.getElementById('name').value = event.target.parentNode.previousElementSibling.innerHTML.trim();
                    document.getElementById('modal-form').action = 'delete';
                    document.getElementById('modal-hidden').value = event.target.getAttribute('data-id');
                    document.getElementById('btn-submit').innerHTML = 'Delete';
                    document.getElementById('edit-delete-Modal').style.display = 'block';
                }
                event.preventDefault();
            });
    </script>
@endsection
