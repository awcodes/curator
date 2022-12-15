<div
    {{ $attributes->merge($getExtraAttributes())->class(['px-4 py-3 curator-column']) }}
>
    @php
        $height = $getHeight();
        $width = $getWidth() ?? ($isRounded() ? $height : null);
        $record = $getRecord();
    @endphp

    <div style="
            {!! $height !== null ? "height: {$height};" : null !!}
            {!! $width !== null ? "width: {$width};" : null !!}
        "
        @class(['rounded-full overflow-hidden grid place-content-center' => $isRounded()])
    >
        @if ($isImage())
            <img
                src="/curator/{{ $record->path }}?w=50&h=50&fit=crop&fm=webp"
                style="
                    {!! $height !== null ? "height: {$height};" : null !!}
                    {!! $width !== null ? "width: {$width};" : null !!}
                "
                @class(['object-cover object-center' => $isRounded()])
                {{ $getExtraImgAttributeBag() }}
            />
        @else
            <x-curator::document-image
                label="{{ $record->filename }}"
                icon-size="md"
            />
        @endif
    </div>
</div>
