

<div class="col-lg-4">
    @if(!empty($item->image))
    <div class="col">
        <div class="@if($item->featured == 1) card-featured @endif">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    @if(!empty($item->image))
                        <a href="javascript:void(0)">
                            <img src="{{ url('storage/app/public/'.$item->image) }}" alt="Image" style="height:auto; width:auto; " class="card-img-top rounded-0 ">
                        </a>
                    @else
                       
                    @endif
    
                    @if(Auth::check())
                        @if(!empty(Auth::user()->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/'.Auth::user()->avatar) }}" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="50" height="50" data-bs-toggle="tooltip" data-bs-placement="top">
                        @else
                            <img src="{{ asset('storage/app/public/images/avatar/user-1.jpg') }}" alt="Default Avatar" class="avatar avatar-sm">
                        @endif
                    @endif
                </div>
                <br>
                <div class="card-body p-4">
                   
                    <h3 class="card-title text-truncate text-muted">
                        {{ $item->title }}
                    </h3>
    
                    <p class="d-block my-4 fs-4 text-dark">{{ Str::limit($item->story, $story_preview_chars) }}</p>
    
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2">
                            
                            <div class="col">
                                <a href="javascript:void(0);" onclick="likePost({{ $item->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $item->id }}" class="icon @if(Auth::check()) @if(Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                </a>
                                <i class="ti ti-thumb-up-{{ $item->id }}"></i><span id="like-{{ $item->id }}">@json($item->likers()->count())</span> {{ __('') }}
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>{{ $item->itemView() }} {{ __('') }}</div>

     
    
                        <div class="ms-auto">
                            <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted"><i class="ti ti-message-circle me-1 fs-5"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}</a>
                        </div>

                        <div class="col-auto">
                    <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check()) @if(Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                    </a>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    @else
        <!-- Code pour un post sans image -->
        <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(resources/views/assets2/dist/images/backgrounds/weather.jpg);">
            <div class="card-body position-relative">
                <div class="d-flex flex-column justify-content-between h-100">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Francisco Quinn">
                            @if(Auth::check())
                                <img src="{{ asset('storage/app/public/images/avatar/'.Auth::user()->avatar) }}" alt="" class="rounded-circle img-fluid" width="40" height="40">
                            @else
                                <img src="{{ asset('storage/app/public/images/avatar/user-1.jpg') }}" alt="Default Avatar" class="rounded-circle img-fluid" width="40" height="40">
                            @endif
                        </div>
                        <!-- <span class="badge text-bg-primary rounded-4 fs-2 fw-semibold"> {{ $item->gender->name }} - {{ __('main.years_old', ['age' => $item->age]) }}</span> -->
                    </div>
                    <div>
                        <p class="fs-7 my-4 fw-semibold text-white d-block lh-sm">{{ $item->title }}</p>

                        <p class="d-block my-4 fs-5 text-white">{{ Str::limit($item->story, $story_preview_chars) }}</p>
                        

                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2">
                                <div class="col">
                                    <a href="javascript:void(0);" onclick="likePost({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="like-icon-{{ $item->id }}" class="icon @if(Auth::check()) @if(Auth::user()->hasLiked($item)) icon-filled text-danger @else text-muted @endif @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                    </a>
                                    <i class="ti ti-thumb-up-{{ $item->id }}"></i><span id="like-{{ $item->id }}">@json($item->likers()->count())</span> {{ __('') }}
                                </div>
                            </div>

                            


                            

                            

                            

                            <div class="d-flex align-items-center gap-2 text-white"><i class="ti ti-eye text-white fs-5"></i>{{ $item->itemView() }} {{ __('') }}</div>

                            <div class="ms-auto">
                                <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="link text-muted text-white"><i class="ti ti-message-circle me-1 fs-5 text-white"></i>{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}</a>
                            </div>

                            <a href="javascript:void(0);" onclick="savePost({{ $item->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" id="save-icon-{{ $item->id }}" class="icon @if(Auth::check()) @if(Auth::user()->hasFavorited($item)) icon-filled @else text-muted @endif @else text-muted @endif" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2" /></svg>
                    </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>