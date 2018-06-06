<div class="tfe-sidebar">
    <h4 class="brand">ToolsForEver</h4>
    <ul class="nav flex-column tfe-nav">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link{{ url()->current() == route('dashboard') || strpos(url()->current(), 'voorraad')  ? ' active' : null }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('locations.index') }}" class="nav-link{{ strpos(url()->current(), 'locaties') ? ' active' : null }}">
                <i class="fas fa-map-marker"></i>
                <span>Locaties</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('products.index') }}" class="nav-link{{ strpos(url()->current(), 'producten') ? ' active' : null }}">
                <i class="fas fa-box"></i>
                <span>Producten</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('manufacterers.index') }}" class="nav-link{{ strpos(url()->current(), 'fabrikanten') ? ' active' : null }}">
                <i class="fas fa-industry"></i>
                <span>Fabrikanten</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link{{ strpos(url()->current(), 'gebruikers') ? ' active' : null }}">
                <i class="fas fa-industry"></i>
                <span>Gebruikers</span>
            </a>
        </li>
    </ul>
</div>
