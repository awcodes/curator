<?php

namespace Awcodes\Curator\Actions;

use Filament\Forms\Components\Actions\Action;
use Awcodes\Curator\Components\CuratorPicker;
use FilamentTiptapEditor\TiptapEditor;

class MediaAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'filament_tiptap_media';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->modalWidth('screen');

        $this->modalHeading(__('filament-curator::media-picker-modal.heading'));

        $this->modalActions(fn () => []);

        $this->modalContent(static function (TiptapEditor|CuratorPicker $component) {
            return view('filament-curator::components.media-action', [
                'statePath' => $component->getStatePath(),
                'modalId' => $component->getLivewire()->id.'-form-component-action',
                'directory' => app('curator')->getDirectory(),
                'shouldPreserveFilenames' => app('curator')->shouldPreserveFilenames(),
                'maxWidth' => app('curator')->getMaxWidth(),
                'minSize' => app('curator')->getMinSize(),
                'maxSize' => app('curator')->getMaxSize(),
                'rules' => [],
                'acceptedFileTypes' => app('curator')->getAcceptedFileTypes(),
                'diskName' => app('curator')->getDiskName(),
                'visibility' => app('curator')->getVisibility(),
                'imageCropAspectRatio' => app('curator')->getImageCropAspectRatio(),
                'imageResizeTargetWidth' => app('curator')->getImageResizeTargetWidth(),
                'imageResizeTargetHeight' => app('curator')->getImageResizeTargetHeight(),
            ]);
        });
    }
}
