<?php


namespace Awcodes\Curator\Actions;

use Filament\Forms\Components\Actions\Action;
use Awcodes\Curator\Components\CuratorPicker;

class PickerAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'curator_picker';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->modalWidth = 'screen';

        $this->modalActions([]);

        $this->modalHeading(__('curator::views.modal.heading'));

        $this->modalContent(static function(CuratorPicker $component) {
            return view('curator::components.picker-action', [
                'statePath' => $component->getStatePath(),
                'modalId' => $component->getLivewire()->id . '-form-component-action',
                'directory' => $component->getDirectory(),
                'shouldPreserveFilenames' => $component->shouldPreserveFilenames(),
                'maxWidth' => $component->getMaxWidth(),
                'minSize' => $component->getMinSize(),
                'maxSize' => $component->getMaxSize(),
                'rules' => $component->getValidationRules(),
                'acceptedFileTypes' => $component->getAcceptedFileTypes(),
                'diskName' => $component->getDiskName(),
                'visibility' => $component->getVisibility(),
                'imageCropAspectRatio' => $component->getImageCropAspectRatio(),
                'imageResizeTargetWidth' => $component->getImageResizeTargetWidth(),
                'imageResizeTargetHeight' => $component->getImageResizeTargetHeight(),
            ]);
        });
    }
}