<div class="card">

    <div class="card-body">
        {{-- <div>
            <img src="{{ asset('storage/app/public/images/avatar/'. auth()->user()->avatar) }}" alt="" class="rounded-circle" width="33" height="33">
        </div> --}}
        
        <h4 class="mb-4 fw-semibold">Commentaires</h4>
        <form method="POST" action="{{ route('store') }}" role="form" id="post-comment" class="flex-grow-1">
            @csrf
            <input type="hidden" id="recipient_id" name="recipient_id" value="{{ $item->user_id }}">
            <input type="hidden" id="item_id" name="item_id" value="{{ $item->id }}">
            <textarea type="text" class="form-control col-md-3 py-3  @error('comment_text') is-invalid @enderror" name="comment_text" placeholder="Comment"></textarea>
            @error('comment_text')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <br>
            <div>
                <button type="submit" class="btn btn-primary">Commenter</button>
            </div>
        </form>
      </div>
    <div class="card-body border-bottom">
        @forelse($item->comments() as $comment)
        <div class="p-4 rounded-2 bg-light mb-3">
            <div class="d-flex align-items-center gap-3">
                @if(!empty($comment->user()->avatar))
                    <img src="{{ asset('storage/app/public/images/avatar/'.$comment->user()->avatar) }}" alt="" class="rounded-circle" width="40" height="40">
                @else
                <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                @endif
                <h6 class="fw-semibold mb-0 fs-4">
                    <a href="{{ url('profile/@'.$comment->user()->name) }}">
                        {{ $comment->user()->name }}
                    </a>
                    {{-- @if($item->user_id == $comment->user_id)
                        <span class="badge badge-pill bg-red">{{ __('OP')}}</span>
                    @endif --}}
                </h6>
                <span class="fs-2">{{ Carbon::parse($comment->created_at)->diffForHumans() }}</span>
            </div>
            
    
            <p class="my-3">
                {{ $comment->comment_text }}
            </p>
            <!-- Reste du code inchangé -->
        </div>
    @empty
        <div class="empty">
            {{-- <div class="empty-img">
                <img src="{{ asset('resources/views/assets/img/comments.svg') }}" alt="">
            </div>
            <p class="empty-title">{{ __('main.card_there_are_no_comments') }}</p> --}}
        </div>
    @endforelse
    </div>
    
   

    
</div>

   
    


    