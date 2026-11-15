<div class="grid gap-4 md:grid-cols-3">
    @foreach ($kpis as $label => $value)
        <div class="rounded-lg border p-4">
            <div class="text-sm text-gray-500">{{ str($label)->headline() }}</div>
            <div class="text-2xl font-semibold">{{ $value }}</div>
        </div>
    @endforeach
</div>
