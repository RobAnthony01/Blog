{{--MODAL--}}
<div id="edit-delete-Modal" class="modal">
    <div class="modal-content">

        <form id="modal-form" action="/blog/delete" method="post">
            @csrf
            <input type="hidden" id="modal-hidden" name="id" value="">
            <div class="modal-header">
                <h5 id="modal-title">Do you really want to to delete this blog?</h5>
                <span id="modal-close" class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value=""
                           required>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="pull-right">
                        <button id="btn-submit" type="submit" class="btn btn-primary">Delete</button>
                        <button id="btn-cancel" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>