<div class="">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold"> {{ __('main.w_top_users') }}</h5>
            <p class="card-subtitle mb-0">Scoreboard</p>
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
                {{-- <td class="ps-0">
                    <a href="{{ route('profile', $user->name) }}" class="">
                 
                        <div class="d-flex align-items-center">
                    <div class="me-2 pe-1">
                      <img src="{{ asset('storage/app/public/images/avatar/'.$item->user->avatar) }}" class="rounded-circle" width="40" height="40" alt="" />
                    </div>
                    <div>
                      <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                      
                      @if(Cache::has('user-is-online-' . $user->id))
                      <span class="badge fw-semibold bg-light-success text-success">Online</span>
                      @else
                      <span class="badge fw-semibold bg-light-danger text-danger">Offline</span>
                      @endif
                    </div>
                  </div>
               
                </a>
                </td> --}}

                <td class="ps-0">
                    <a href="{{ route('profile', $user->name) }}" class="text-decoration-none strong">

                      <div class="d-flex align-items-center">
                        <div class="me-2 pe-1">
                      <span class="avatar avatar-xs avatar-rounded" @if(!empty($user->avatar)) img src="{{ asset('storage/app/public/images/avatar/'.$user->avatar) }}');" @endif></span>
                    
                      <span class="avatar avatar-xs avatar-rounded">
                        @if(!empty($user->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/'.$user->avatar) }}" alt="user_avatar" width="40" height="40" class="rounded-circle" />

                        @endif
                        
                      </span>
                   

                        @if(empty($user->avatar))
                            <img src="{{ asset('storage/app/public/images/avatar/user-2.jpg') }}" alt="" class="rounded-pill img-fluid" width="40" height="40">
                            @endif
                          </div>

                            <div>
                              <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                              
                              @if(Cache::has('user-is-online-' . $user->id))
                              <span class="badge fw-semibold bg-light-success text-success">Online</span>
                              @else
                              <span class="badge fw-semibold bg-light-danger text-danger">Offline</span>
                              @endif
                            </div>

                        </span>
                      </div>
                       
                    </a>
                </td>
                
                
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