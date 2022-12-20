@if (str($media->type)->contains('image'))
    <img src="{{ $source }}"
         alt="{{ $media->alt }}"
         width="{{ $media->width }}"
         height="{{ $media->height }}"
         loading="{{ $loading }}"
         {{ $attributes }}
    />
@else
    <x-curator::document-image
        label="{{ $media->name }}"
        icon-size="xl"
        {{ $attributes->merge(['class' => 'p-4']) }}
    />
@endif
