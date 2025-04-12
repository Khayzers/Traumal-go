<nav style="background-color: #1A73E8; padding: 15px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('inicio') }}" style="display: flex; align-items: center; text-decoration: none;">
            <div style="width: 40px; height: 40px; background-color: #5595e9; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 22px;">T</div>
            <span style="color: white; font-weight: 700; font-size: 22px; margin-left: 10px;">Trauma<span style="color: #FF9966;">Med</span></span>
        </a>
        
        <div style="display: flex; align-items: center;">
            <ul style="display: flex; list-style-type: none; margin: 0; padding: 0;">
                <li>
                    <a href="{{ route('inicio') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('inicio') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('inicio') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Inicio</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('dashboard') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('dashboard') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('dashboard') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Dashboard</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('bandeja.solicitudes') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.solicitudes') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.solicitudes') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Centro</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('bandeja.traumatologo') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.traumatologo') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.traumatologo') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Traumatólogo</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('traumatologos') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('traumatologos') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('traumatologos') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Traumatólogos</a>
                </li>
            </ul>
            
            <div style="margin-left: 20px; display: flex; align-items: center;">
                @auth
                    <div style="display: flex; align-items: center; margin-right: 15px;">
                        <div style="width: 35px; height: 35px; background-color: #d0e3ff; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #1A73E8; font-weight: bold;">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span style="color: white; margin-left: 8px; font-weight: 500;">{{ Auth::user()->name }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="background: none; border: none; cursor: pointer; color: white; display: flex; align-items: center; font-size: 14px; opacity: 0.9; transition: opacity 0.2s;">
                            <i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i> Salir
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" style="display: flex; align-items: center; color: white; text-decoration: none; background-color: rgba(255,255,255,0.2); padding: 8px 16px; border-radius: 4px; transition: background-color 0.2s;">
                        <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i> Iniciar Sesión
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>