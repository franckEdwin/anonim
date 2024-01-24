@extends('layouts.app')
@section('content')
<div class="row row-cards justify-content-center">
    <div class="col-lg-8">

        <div class="card">
        <div class="card-body border-bottom">
            <div class="d-flex align-items-center gap-3">
              <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" alt="" class="rounded-circle" width="40" height="40">
              <h6 class="fw-semibold mb-0 fs-4">{{ $item->user->name }}</h6>
              <p class="card-subtitle mb-0">
                {{ $item->created_at->formatLocalized('%a, %b %d, %Y') }}
            </p>
            </div>
            <p class="text-dark my-3">
              {{ $item->story }}
            </p>
            @if ($item->image)
            <img src="{{ url('storage/app/public/'.$item->image) }}" alt="" class="img-fluid rounded-4 w-100 object-fit-cover" style="height: 360px;">
            @endif
            <div class="d-flex align-items-center my-3">
              <div class="d-flex align-items-center gap-2">
                <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="">
                  <i class="ti ti-eye fs-5"></i>
                </a>
                <span class="text-dark fw-semibold">{{ $item->itemView() }}</span>
              </div>
              <div class="d-flex align-items-center gap-2 ms-4">
                <a class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="">
                  <i class="ti ti-message-2"></i>
                </a>
                <span class="text-dark fw-semibold">{{ __('main.card_comments', ['count' => $item->comments()->count()]) }}</span>
              </div>
          
              <a class="text-dark ms-auto d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Share">
                <i class="ti ti-share"></i>
              </a>
            </div>

            
          </div>
          {{-- <div class="d-flex align-items-center gap-3 p-3">
            <img src="../../dist/images/profile/user-1.jpg" alt="" class="rounded-circle" width="33" height="33">
            <input type="text" class="form-control py-8" id="exampleInputtext" aria-describedby="textHelp" placeholder="Comment">
            <button class="btn btn-primary">Comment</button>
          </div> --}}
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
        <div class="card card-sm mb-3 shadow">
            <div class="card-header {{ $item->gender->bg_color }}">
                <div class="col">
                    <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}" class="text-white text-decoration-none">
                        <span class="small">
                            {{ $item->gender->name }} - {{ __('main.years_old', ['age' => $item->age]) }}
                        </span>
                    </a>
                </div>
            </div>
                
            <div class="card-body">
                <p class="small">
                    {{ Str::limit($item->story, 120) }}
                </p>
                <a href="{{ route('show', ['id'=>$item->id, 'slug'=>$item->slug]) }}">
                    {{ __('Continue') }} <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="7 7 12 12 7 17" /><polyline points="13 7 18 12 13 17" /></svg>
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
