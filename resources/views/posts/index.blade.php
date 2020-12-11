@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <a type="button" class="btn btn-secondary" href="{{route('posts.create')}}"> Create</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>
                    <a class="btn btn-warning" href="{{route('posts.edit',$post->id)}}">Edit</a>
                    <button type="button" class="btn btn-danger delete-button" data-id="{{$post->id}} ">Delete</button>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="{{$posts->nextPageUrl()}}">Older Posts</a>
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded',evt => {
            $('.delete-button').click(function (e) {
                if(confirm('Are you sure ?'))
                {
                    $.ajax({
                        url: '/posts/' + $(this).data('id'),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        success: function (result) {
                            location.reload();
                        }

                    });
                }
            });
        })
    </script>
@endsection
