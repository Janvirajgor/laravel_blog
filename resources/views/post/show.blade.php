@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="{{ route('post.index') }}" class="btn btn-outline-primary btn-sm"> <i class="fas fa-backward "></i> </a>
                <hr>
                @guest
                    @if ($post->image)
                        <img src="{{ asset($post->image) }}" style="height: 300px; width:450px;" alt="{{ $post->title }} photo" class="img-fluid">
                    @endif
                    <h1 class="display-one" style="color:cadetblue">{{ ucfirst($post->title) }}</h1>
                    
                    @if($post->created_at == NULL)
                    <span class="text-danger">No Date Set</span>
                    @else
                    Created at:
                    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    <br> Updated at:
                    {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                    @endif

                    <p>{!! $post->description !!}</p>

                @endguest

                @auth
                    @if ($post->image)
                        <img src="{{ asset($post->image) }}" style="height: 300px; width:450px;" alt="{{ $post->title }} photo" class="img-fluid">
                    @endif
                    <h1 class="display-one" style="color:cadetblue">{{ ucfirst($post->title) }}</h1>
                    
                    @if($post->created_at == NULL)
                    <span class="text-danger">No Date Set</span>
                    @else
                    Created at:
                    {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    <br> Updated at:
                    {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                    @endif

                    <p>{!! $post->description !!}</p>
                    
                    @if(auth()->user()->id == $post->user_id && auth()->user()->id)
                        <a href="{{ route('post.edit', $post->id)}}" class="btn btn-outline-primary"><i class="fas fa-edit  fa-lg"></i>Edit Post</a>
                        <br><br>

                        <form id="delete-frm" class="" action="" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete')"> <i class="fas fa-trash fa-lg"></i> Delete Post</button>
                        </form>
                    @endif
                @endauth
                <hr>
                <h5 class="card-header">Comments 
                    <span class="comment-count btn btn-sm btn-outline-info">{{ count($post->comments) }}</span>
                    <small class="float-right" style="position: relative; left:850px;">
                        <span title="Likes" id="saveLikeDislike" data-type="like" data-post="{{ $post->id}}" class="mr-2 btn btn-sm btn-outline-primary d-inline font-weight-bold">
                            Like
                            <span class="like-count">{{ $post->likes() }}</span>
                        </span>
                        <span title="Dislikes" id="saveLikeDislike" data-type="dislike" data-type="dislike" data-post="{{ $post->id}}" class="mr-2 btn btn-sm btn-outline-danger d-inline font-weight-bold">
                            Dislike
                            <span class="dislike-count">{{ $post->dislikes() }}</span>
                        </span>
                    </small>
                    </h5>

                    @include('post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                <hr />
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store'   ) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
                <br>
                
            </div>
        </div>
    </div>
@endsection




