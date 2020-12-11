@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-end">
        <form action="" method="GET">
            <input type="text" class="form-control" name="search" placeholder="search ..."/>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{$post->title}}
                        </h2>
                        <h3 class="post-subtitle">
                            {{substr($post->content, 0, 50)}}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        {{$post->created_at}}</p>
                </div>
                <hr>
            @endforeach
            @if($posts->hasMorePages())
            <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Older Posts &rarr;</a>
                </div>
            @endif
        </div>
    </div>
@endsection
