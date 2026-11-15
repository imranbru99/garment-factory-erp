<dl class="grid gap-3">
    @foreach ($checks as $label => $value)
        <div class="flex justify-between border-b py-2">
            <dt>{{ $label }}</dt>
            <dd>{{ $value }}</dd>
        </div>
    @endforeach
</dl>
