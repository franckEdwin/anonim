<div class="card mb-3">
    <div class="card-header">
        <h2 class="card-title">
            {{ __('main.w_top_users') }}
        </h2>
    </div>
    <table class="table card-table">
        <thead>
            <tr>
                <th>{{ __('main.w_user') }}</th>
                <th class="w-5">{{ __('main.w_score') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($topUser as $user)
            <tr>
                
                <td>
                    <a href="{{ route('profile', $user->name) }}" class="text-decoration-none strong">
                        <span class="avatar avatar-xs avatar-rounded" @if(!empty($user->avatar)) style="background-image: url({{ asset('storage/app/public/images/avatar/'.$user->avatar) }})" @endif>
                        @if(empty($user->avatar))
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                            @endif

                            @if(Cache::has('user-is-online-' . $user->id))
                            <span class="badge bg-green" title="{{ __('main.card_online') }}"></span>
                            @else
                            <span class="badge bg-x" title="{{ __('main.card_offline') }}"></span>
                            @endif
                        </span>
                        <span class="text-truncate">{{ $user->name }}</span>
                    </a>
                </td>

                <td>
                    <span class="">
                        {{ $user->total_point_count() }}
                    </span>
                </td>

            </tr>
            @empty
            <div class="empty">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="9" y1="10" x2="9.01" y2="10"></line><line x1="15" y1="10" x2="15.01" y2="10"></line><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path></svg>
                </div>
                <p class="empty-title">
                    {{ __('main.w_no_rated_users') }}
                </p>
            </div>
            @endforelse
        </tbody>
    </table>
</div>


<div class="">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold"> {{ __('main.w_top_users') }}</h5>
            <p class="card-subtitle mb-0">Best Employees</p>
          </div>
          
        </div>
        <div class="table-responsive">
          <table class="table align-middle text-nowrap mb-0">
            <thead>
              <tr class="text-muted fw-semibold">
                <th scope="col" class="ps-0">{{ __('main.w_user') }}</th>
                <th scope="col">{{ __('main.w_score') }}</th>
              </tr>
            </thead>
            <tbody class="border-top">
                @forelse($topUser as $user)
              <tr>
                <td class="ps-0">
                    <a href="{{ route('profile', $user->name) }}" class="text-decoration-none strong">
                 
                        <div class="d-flex align-items-center">
                    <div class="me-2 pe-1">
                      <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" class="rounded-circle" width="40" height="40" alt="" />
                    </div>
                    <div>
                      <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                      
                      @if(Cache::has('user-is-online-' . $user->id))
                      <p class="fs-2 mb-0 text-muted">Online</p>
                      @else
                      <p class="fs-2 mb-0 text-muted">Offline</p>
                      @endif
                    </div>
                  </div>
               
                </a>
                </td>

                {{-- <td>
                    <a href="{{ route('profile', $user->name) }}" class="text-decoration-none strong">
                        <span class="avatar avatar-xs avatar-rounded" @if(!empty($user->avatar)) style="background-image: url({{ asset('storage/app/public/images/avatar/'.$user->avatar) }})" @endif>
                        @if(empty($user->avatar))
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="7" r="4" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                            @endif

                            @if(Cache::has('user-is-online-' . $user->id))
                            <span class="badge bg-green" title="{{ __('main.card_online') }}"></span>
                            @else
                            <span class="badge bg-x" title="{{ __('main.card_offline') }}"></span>
                            @endif
                        </span>
                        <span class="text-truncate">{{ $user->name }}</span>
                    </a>
                </td>
                 --}}
                <td>
                  <p class="mb-0 fs-3"> {{ $user->total_point_count() }}</p>
                </td>
              
            </tr>
            @empty
            <div class="empty">
                <div class="empty-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><line x1="9" y1="10" x2="9.01" y2="10"></line><line x1="15" y1="10" x2="15.01" y2="10"></line><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path></svg>
                </div>
                <p class="empty-title">
                    {{ __('main.w_no_rated_users') }}
                </p>
            </div>
            @endforelse

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>