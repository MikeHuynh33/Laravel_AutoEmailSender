<div>
    <div class="d-flex justify-content-end ">
        <div class="me-3">
            <button class="btn btn-primary" wire:click="Recipient_handleCLick" type="button">Upload New Template</button>
        </div>

        <div class="me-5">
            <button class="btn btn-primary" wire:click="View_handleCLick" type="button">Views</button>
        </div>
    </div>
    <div class="container">
        @if ($openTemplateForm)
            @livewire('templates.template-upload')
        @endif
        @if ($openView)
            @livewire('templates.template-view')
        @endif
    </div>
</div>
