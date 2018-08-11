@extends('layouts.blog-home')

@section('content')
    
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                @if($posts)

                    @foreach($posts as $post)
                        <!-- First Blog Post -->
                        <h2>
                            <a href="post/{{$post->slug}}">{{$post->title}}</a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php">{{$post->user->name}}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
                        <hr>
                        <img class="img-responsive"  src="{{isset( $post->photo->file) ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
                        <hr>
                        <p>{!! str_limit($post->body,100) !!}</p>
                        <a class="btn btn-primary" href="post/{{$post->slug}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                @endif
               
                <!-- Pagination -->
                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                      {{$posts->links()}}
                    </div> 
                  </div> 
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
               @include('includes.front_side_bar')

        </div>
@endsection
