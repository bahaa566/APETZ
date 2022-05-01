@props(['route', 'status'])

@props(['route'])

@php($id = \Str::uuid())
<form class="mx-1" x-data="toggleActivation" id="activate-{{ $id }}" method="post"
    action="{{ $route }}" x-ref="form">
    @csrf
    @method("PUT")
    @if ($status)
        <button type="button" form="activate-{{ $id }}" class="btn btn-success" @click="toggle()"
            title="{{ __('Activate') }}">
            <i data-feather='check'></i>
        </button>

    @else
        <button type="button" form="activate-{{ $id }}" class="btn btn-warning" @click="toggle()"
            title="{{ __('Blocked') }}">
            <i data-feather='shield'></i>
        </button>
    @endif
</form>
