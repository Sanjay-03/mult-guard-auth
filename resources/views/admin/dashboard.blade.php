@include('layouts.includes.header')
<div class="container mt-5">
    <h6 class="text-center my-3">Welcome Admin <span class="text-success">{{ $user->email }}</span></h6>
    <div>
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
</div>
@include('layouts.includes.footer')
