@props(['route'])
<a x-data="openModal" data-href="{!! $route !!} " class="btn btn-primary ml-1 float-right" @click="openModal">
    <span><i class="fa fa-upload"></i> {{__('import example')}}</span>
</a>
