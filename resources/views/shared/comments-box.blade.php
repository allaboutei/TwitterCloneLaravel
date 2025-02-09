<div>
    <form action="{{ route('ideas.comments.store',$idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @forelse ($idea->comments as $comment)


    <div class="d-flex align-items-start">
        <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                src="{{$comment->user->getImageURL()}}" alt="Mario Avatar">
        <div class="w-100">
            <div class="d-flex justify-content-between">
                <a href="{{route('profile')}}"><h6 class="">{{$comment->user->name}}
                </h6></a>
                <small class="fs-6 fw-light text-muted">{{$comment->created_at}}</small>
            </div>
            <p class="fs-6 mt-3 fw-light">
               {{$comment->content}}
            </p>
        </div>
    </div>
    @empty
    <p class="text-center mt-10 ">No Comment Found</p>
    @endforelse
</div>
