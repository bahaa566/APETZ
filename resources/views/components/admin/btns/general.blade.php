<form   x-data="action" class="mx-1"  id="action-{{ $id }}" method="post"   action="{{ $route }}" x-ref="form">
    @csrf
    @method($method)
        <button   {{ $attributes->merge(['class' => 'btn btn-'.$color]) }}

        type="button" form="action-{{ $id }}" 
            title="{{ $title }}"  @click="confirm()">
            <i data-feather='{{$icon}}'></i>
        </button>
 </form>
