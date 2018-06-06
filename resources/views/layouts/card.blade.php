<div class="card shadow-sm">
    <div class="card-header bg-white text-dark d-flex flex-row justify-content-between py-4">
        <h4 class="text-uppercase m-0">{{ $title }}</h4>

        @if (isset($create))
            <a class="text-dark h5 m-0 mt-1" href="{{ $create }}"><i class="fas fa-plus"></i></a>
        @endif
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
