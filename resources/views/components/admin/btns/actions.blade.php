@props(['delete', 'update','show'=>null])
<div class="tw-flex tw-justify-around">
    @if($show!=null)
        <x-admin.btns.show :route="$show"/>
    @endif
    <x-admin.btns.edit :route="$update"/>
    <x-admin.btns.delete :route="$delete"/>

</div>
