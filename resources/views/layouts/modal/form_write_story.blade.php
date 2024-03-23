<div class="modal modal-blur fade" id="modal--write--story" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('main.write_a_story') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- if you are not logged in -->
            @if (!Auth::check())
                <div class="modal-body">
                    <div class="empty">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <line x1="9" y1="10" x2="9.01" y2="10"></line>
                                <line x1="15" y1="10" x2="15.01" y2="10"></line>
                                <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path>
                            </svg>
                        </div>
                        <p class="empty-title">
                            {{ __('main.notices_03') }}
                        </p>
                        <div class="empty-action">
                            <a href="{{ route('login') }}" class="btn">
                                {{ __('Se Conencter') }}
                            </a>
                            <a href="{{ __('register') }}" class="btn btn-primary">
                                {{ __("S'inscrire") }}
                            </a>
                        </div>
                    </div>
                </div>
                <!-- if you have not set gender and birth -->
                @elseif (empty(Auth::user()->genders_id) || empty(Auth::user()->birth))
                <div class="modal-body">
                    <!-- ... code pour un utilisateur connecté mais sans genre ou date de naissance ... -->
                    <form action="{{ url('write') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control form-control @error('title', 'write') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="{{ __('main.title') }}">

                                @error('title', 'write')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <div style="position: relative;">
                                    <textarea class="form-control form-control-lg @error('story', 'write') is-invalid @enderror" name="story"
                                        rows="6" placeholder="{{ __('main.story') }}" oninput="updateCharacterCount(this)">{{ old('story') }}</textarea>

                                    <div id="characterCount" style="position: absolute; bottom: 5px; right: 5px;"></div>
                                </div>

                                @error('story', 'write')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 row">
                            <div class="col">

                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" />
                                
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.tags') }}</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                    name="tags" placeholder="{{ __('main.separate_tag') }}"
                                    value="{{ old('tags') }}">
                            </div>

                            <div class="mb-3">
                                <div class="col">
                                    <div
                                        class="form-selectgroup form-selectgroup-pills @error('category_id', 'write') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <label class="form-selectgroup-item">
                                                <input type="radio" id="category_id" name="category_id"
                                                    value="{{ $category->id }}"
                                                    class="form-selectgroup-input @error('category_id', 'write') is-invalid @enderror"
                                                    {{ old('category_id') == $category->id ? 'checked' : '' }}
                                                    @if (Auth::user()->total_point_count() < $category->score) disabled @endif>
                                                <span class="form-selectgroup-label"
                                                    @if (Auth::user()->total_point_count() < $category->score) data-bs-toggle="tooltip" data-bs-html="true" title="{{ __('points.form_notice1') }}" @endif>
                                                    {{ $category->name }}
                                                </span>
                                            </label>
                                        @endforeach

                                        @error('category_id', 'write')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                        </div>

                        <input type="hidden" name="genders_id" value="{{ Auth::user()->genders_id }}">
                        <input type="hidden" name="age"
                            value="{{ Carbon::now()->diffInYears(Auth::user()->birth) }}">

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <line x1="9" y1="12" x2="15" y2="12"></line>
                                    <line x1="12" y1="9" x2="12" y2="15"></line>
                                </svg> {{ __('main.btn_send') }}
                            </button>
                        </div>

                    </form>
                </div>
            @else
                <!-- write story -->
                @if ($status_write == 1)
                <form action="{{ url('write') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control form-control @error('title', 'write') is-invalid @enderror"
                                    name="title" value="{{ old('title') }}" placeholder="{{ __('main.title') }}">

                                @error('title', 'write')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <div style="position: relative;">
                                    <textarea class="form-control form-control @error('story', 'write') is-invalid @enderror" name="story"
                                        rows="6" placeholder="{{ __('main.story') }}" oninput="updateCharacterCount(this)">{{ old('story') }}</textarea>

                                    <div id="characterCount" style="position: absolute; bottom: 5px; right: 5px;"></div>
                                </div>

                                @error('story', 'write')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            

                            <div class="form-group mb-3 row">
                            <div class="col">

                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" />
                                
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('main.tags') }}</label>
                                <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                    name="tags" placeholder="{{ __('main.separate_tag') }}"
                                    value="{{ old('tags') }}">
                            </div>

                            <div><label class="form-label">Catégorie</label></div>

                            <div class="d-flex">
                                @foreach ($categories as $category)
                                    <div class="n-chk"> <!-- Utilisation d'une colonne de largeur 3/12 pour 4 catégories -->
                                        <div class="form-check form-check-primary form-check-inline @error('category_id', 'write') is-invalid @enderror">
                                            <label class="form-selectgroup-item form-check-label">
                                                <input type="radio" id="category_id" name="category_id"
                                                    value="{{ $category->id }}"
                                                    class="form-check-input form-selectgroup-input @error('category_id', 'write') is-invalid @enderror"
                                                    {{ old('category_id') == $category->id ? 'checked' : '' }}
                                                    @if (Auth::user()->total_point_count() < $category->score) disabled @endif>
                                                <span class="form-selectgroup-label"
                                                    @if (Auth::user()->total_point_count() < $category->score) data-bs-toggle="tooltip" data-bs-html="true" title="{{ __('points.form_notice1') }}" @endif>
                                                    {{ $category->name }}
                                                </span>
                                            </label>
                                        </div>
                                        @error('category_id', 'write')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <input type="hidden" name="genders_id" value="{{ Auth::user()->genders_id }}">
                        <input type="hidden" name="age"
                            value="{{ Carbon::now()->diffInYears(Auth::user()->birth) }}">

                        <div class="modal-footer">
                                <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                    <div class="d-flex align-items-center">
                                      <i class="ti ti-send me-2 fs-4"></i>
                                      {{ __('main.btn_send') }}
                                    </div>
                                  </button>
                        </div>

                    </form>
                @else
                    <!-- if new stories are paused -->
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="{{ asset('resources/views/assets/img/warning.svg') }}" alt="">
                        </div>
                        <div class="text-center">
                            <div class="empty-header">
                                {{ __('main.new_entries_paused') }}
                            </div>
                        </div>
                    </div>
                @endif
                <!-- end write story -->
            @endif
        </div>
    </div>
</div>





<script>
    function updateCharacterCount(textarea) {
        var maxLength = 200; // Le nombre maximum de caractères autorisés
        var characterCountElement = document.getElementById('characterCount');

        // Tronquer le contenu si la longueur dépasse maxLength
        if (textarea.value.length > maxLength) {
            textarea.value = textarea.value.substring(0, maxLength);
        }

        characterCountElement.textContent = textarea.value.length + '/' + maxLength;

        if (textarea.value.length > maxLength) {
            // Vous pouvez ajouter une classe CSS ou d'autres styles pour indiquer que la limite est dépassée.
            characterCountElement.style.color = 'red';
            // Désactiver la zone de texte si la limite est dépassée
            textarea.disabled = true;
        } else {
            characterCountElement.style.color = ''; // Réinitialiser la couleur si elle était rouge
            // Activer la zone de texte si la limite n'est pas dépassée
            textarea.disabled = false;
        }
    }
</script>
