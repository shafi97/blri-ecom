<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form onsubmit="ajaxStore(event, this, 'createModal')" action="{{ route('admin.sub-category.store') }}"
                method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="category_uuid" class="form-label required">Category Name </label>
                            <select class="form-select" name="category_uuid" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_uuid'))
                                <div class="alert alert-danger">{{ $errors->first('category_uuid') }}</div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label required">Name </label>
                            <input type="search" name="name" class="form-control" value="{{ old('name') }}"
                                required />
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
