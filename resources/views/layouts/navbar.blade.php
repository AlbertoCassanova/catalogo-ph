<div class="bg-pink-500 flex justify-between p-4 items-center">
    <div>
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/large_logo.png') }}" alt="logo" width="80">
        </a>
    </div>
    <div>
        @if (Route::is('admin.dashboard'))
            <select>
                <option value="pe">Perú</option>
                <option value="co">Colombia</option>
            </select>
        @else
            <nav>
                <ul>
                    @auth
                        @if (Auth::user()->rol == 'admin')
                            <a href="{{ route('admin.gestionplanes') }}" class="text-white mx-1">Planes</a>
                        @endif
                        <a href="{{ route('admin.logout') }}" class="text-white mx-1">Cerrar sesión</a>
                    @endauth
                    @guest
                        <select name="country" id="">
                            <option value="pe">Perú</option>
                        </select>
                    @endguest
                </ul>
            </nav>
        @endif
    </div>
</div>
