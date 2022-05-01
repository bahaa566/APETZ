@props(['delete', 'update'])
<div class="tw-flex tw-space-x-2">
    <x-admin.forms.btns.edit :route="$update" />
    <x-admin.forms.btns.delete :route="$delete" />
</div>
