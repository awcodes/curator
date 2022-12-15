@if (str($media->type)->contains('image'))
    <img src="{{ $source }}"
         alt="{{ $media->alt }}"
         width="{{ $media->width }}"
         height="{{ $media->height }}"
         loading="lazy"
         {{ $attributes }}
    />
@else
    <x-curator::document-image
        label="{{ $media->filename }}"
        icon-size="xl"
        {{ $attributes->merge(['class' => 'p-4']) }}
    />
@endif
