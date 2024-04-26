@include('layouts.includes.header')
<div class="container mt-5">
    <h6 class="text-center my-3">Welcome <span class="text-success">{{ $user->email }}</span></h6>
    <div>
        <div class="text-end my-2">
            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                data-bs-target="#addPostModal">Add</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>S.No.</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>created_at</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['description'] }}</td>
                        <td>{{ date('d-m-Y', strtotime($post['created_at'])) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addPostModalLabel">Add Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center my-3">
                        @if ($errors->any())
                            <p class="text-danger">{{ $errors->first() }}</p>
                        @endif
                    </div>

                    <form action="add-post" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="post_description" class="form-label">Post Description</label>
                            <textarea class="form-control" name="post_description" id="post_description" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@include('layouts.includes.footer')
