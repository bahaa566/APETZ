@props(['name'])
@error($name)
    <div class="tw-text-red-500 tw-font-bold">{{ $message }}</div>
@enderror
