<nav style="background-color: #1A73E8; padding: 15px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('inicio') }}" style="display: flex; align-items: center; text-decoration: none;">
            <div style="width: 40px; height: 40px; background-color: #5595e9; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 22px;">T</div>
            <span style="color: white; font-weight: 700; font-size: 22px; margin-left: 10px;">Trauma<span style="color: #FF9966;">Med</span></span>
        </a>
        
        <ul style="display: flex; list-style-type: none; margin: 0; padding: 0;">
            <li>
                <a href="{{ route('inicio') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('inicio') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('inicio') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Inicio</a>
            </li>
            <li style="margin-left: 10px;">
                <a href="{{ route('bandeja.solicitudes') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.solicitudes') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.solicitudes') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Centro</a>
            </li>
            <li style="margin-left: 10px;">
                <a href="{{ route('bandeja.traumatologo') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.traumatologo') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.traumatologo') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Traumatólogo</a>
            </li>
        </ul>
    </div>
</nav>