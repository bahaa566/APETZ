<li class=" nav-item">
    <a class="d-flex align-items-center" href="">
        <i data-feather="home"></i>
        <span class="menu-title text-truncate" data-i18n="{{$main_header ?? ''}}">{{ $main_header ?? 'Dashboard' }}</span>
        {{-- <span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span> --}}
    </a>
    <ul class="menu-content">
        {{ $slot }}
    </ul>
</li>
