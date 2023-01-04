<?php

namespace Awcodes\Curator\Actions;

use Awcodes\Curator\Components\Forms\CuratorEditor;
use Filament\Forms\Components\Actions\Action;

class CurationAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'curator_curation';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->modalWidth = 'screen';

        $this->modalActions([]);

        $this->modalHeading(__('curator::views.curation.heading'));

        $this->modalContent(static function (CuratorEditor $component) {
            return view('curator::components.actions.curation-action', [
                'statePath' => $component->getStatePath(),
                'modalId' => $component->getLivewire()->id.'-form-component-action',
                'record' => $component->getRecord(),
            ]);
        });
    }
}
