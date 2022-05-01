@props(['url'])
<li>
    <a class="d-flex align-items-center" href="{{$url}}">
        <i data-feather="circle"></i>
        <span class="menu-item text-truncate" data-i18n="Analytics">{{ $slot }}</span>
    </a>
</li>
