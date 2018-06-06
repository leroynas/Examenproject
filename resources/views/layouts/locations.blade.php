<div class="row mb-2">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card text-white tfe-block pink shadow-sm">
            <p>&euro; {{ $overall->purchaseTotal }} <i class="fas fa-arrow-down"></i></p>
            <p>&euro; {{ $overall->sellingTotal }} <i class="fas fa-arrow-up"></i></p>
            <small>Algemeen</small>
            <div class="icon"><i class="fas fa-globe"></i></div>
        </div>
    </div>

    @php $colors = ['purple', 'blue', 'green', 'pink'] @endphp
    @foreach ($locations as $location)
        <div class="col-xl-3 col-md-6 mb-3">
            <a class="link" href="{{ route('inventory.index', ['location' => $location->id]) }}">
                <div class="card text-white tfe-block @if($loop->index < 4){{ $colors[$loop->index] }}@else{{ $colors[$loop->index - 4] }}@endif shadow-sm">
                    <p>&euro; {{ $location->purchaseTotal }} <i class="fas fa-arrow-down"></i></p>
                    <p>&euro; {{ $location->sellingTotal }} <i class="fas fa-arrow-up"></i></p>
                    <small>{{ $location->name }}</small>
                    <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                </div>
            </a>
        </div>
    @endforeach
</div>
