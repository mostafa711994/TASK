
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="validation"></div>
                <form id="editForm">
                    @csrf
                    <input type="hidden" id="id" name="id" value="">

                    <div class="form-group">
                        <label for="recipient-name"
                               class="col-form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button id="submit" type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
