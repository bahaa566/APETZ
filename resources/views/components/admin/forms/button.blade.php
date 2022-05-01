<div class="demo-inline-spacing">
    <button
        {{ $attributes->merge(['type' => $type, 'class' => 'btn btn-primary waves-effect waves-float waves-light']) }}>
        {{ $slot }}
    </button>
</div>
