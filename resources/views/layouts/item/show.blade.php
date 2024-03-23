@extends('layouts.app')
@section('content')
<div class="row row-cards justify-content-center">
    <div class="col-lg-8">

        <div class="card">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center gap-3">

              @if(!empty($item->user->avatar))
              <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" alt="" class="rounded-circle" width="40" height="40">
          @else
              <!-- Si l'auteur du post n'a pas d'avatar, affichez une version par défaut -->
              <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-circle" width="40" height="40">
          @endif
              <h6 class="fw-semibold mb-0 fs-4">{{ $item->user->name }}</h6>
              <p class="card-subtitle my-2">
                {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
            </p>
            </div>
            <p class="fw-semibold my-3 fs-4">
              {{ $item->story }}
            </p>
            @if ($item->image)
            <img src="{{ url('storage/app/public/'.$item->image) }}" alt="" class="img-fluid rounded-4 w-100 object-fit-cover" style="height: 360px;">
            @endif
            <div class="d-flex align-items-center my-3">
              <div class="d-flex align-items-center gap-2">
                <a href="javascript:void(0);" onclick="likePost({{ $item->id }})" class="d-flex">
                  <i  id="like-icon-{{ $item->id }}" class="ti ti-heart-filled text-dark fs-6 @if(Auth::check()) @if(Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif @else text-muted @endif"></i>
                  {{-- id="like-icon-{{ $item->id }}" class="ti ti-heart-filled text-dark fs-6 @if(Auth::check()) @if(Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif @else text-muted @endif" --}}
                  <span class="ms-1 text-dark" id="like-{{ $item->id }}">@json($item->likers()->count())</span>
              </a>

              </div>

              <div class="d-flex align-items-center gap-2 ms-4">
                <i class="ti ti-eye text-dark fs-6"></i>{{ $item->itemView() }}
              </div>

              <div class="d-flex align-items-center gap-2 ms-4">
                <i class="ti ti-message-2 text-dark fs-6"></i>
                {{ __('main.card_comments', ['count' => $item->comments()->count()]) }}
              </div>

              
              
          
              <a class="text-dark ms-auto d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Share">
                <i class="ti ti-share"></i>
              </a>

              <div class="d-flex align-items-center gap-2">
                <div class="col">
                  @if(Auth::check())
                  <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                      <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check() && Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                  </a>
              @endif
                    
                   
                </div>
            </div>
            
         
            
            </div>

              <div class="">
              @foreach($item->tags as $tag)  
                <span class="bg-light-success text-success badge">{{ $tag->slug }}</span>
              @endforeach
              </div>

            
          </div>
          
          <div class="col">
            @include('layouts.item.comments')
        </div>
        </div>

       

        
       
        
    </div>
    
    <div class="col-lg-4">
        
        <!-- Top Users -->
        @if($statusPoints == 1)
        @include('layouts.topUsers')
        @endif
        <!-- End Top Users -->
        
        <!-- ads -->
        @if(!empty($setting_adv_top))
        @if($adv_top->status == 1)
        <div class="mb-3">
            {!! $adv_top->value !!}
        </div>
        @endif
        @endif
        <!-- end ads -->
        
        @forelse($randomItems as $item)
        <div class="card card-sm mb-3  card-hover">
            <div class="card-header">
                <div class="d-flex align-items-center gap-3">
                  @if(!empty($item->user->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" alt="" class="rounded-pill img-fluid" width="50">
                        @else
                            <!-- Si l'auteur du post n'a pas d'avatar, affichez une version par défaut -->
                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="50">
                        @endif
                  <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="text-white text-decoration-none">
                    <span class="mb-0 text-dark fs-5">
                      {{ $item->user->name }}
                    </span>
                </a>
                  
                </div>
            </div>

            
                
            <div class="card-body">
                <p class="card-text">
                    {{ Str::limit($item->story, 120) }}
                </p>
                <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="btn btn-danger fs-2 fw-semibold lh-sm">
                    {{ __('lire') }} 
                </a>
            </div>

        </div>

       
        @empty
        {{ __('There are no stories to show.') }}
        @endforelse
        
        <!-- ads -->
        @if(!empty($setting_adv_bottom))
        @if($adv_bottom->status == 1)
        <div class="mb-3">
            {!! $adv_bottom->value !!}
        </div>
        @endif
        @endif
        <!-- end ads -->
        
    </div>
    
</div>
@endsection('content')
