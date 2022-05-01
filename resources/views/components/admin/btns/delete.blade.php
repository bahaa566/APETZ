@props(['route'])

@php($id = \Str::uuid())
<form  x-data="destroy" id="delete-{{ $id }}" method="post" action="{{ $route }}"
    x-ref="form">
    @csrf
    @method('delete')

    <button type="button" form="delete-{{ $id }}" class="btn btn-danger" @click="destroy()">
        <i data-feather='trash-2'></i>
    </button>
</form>
