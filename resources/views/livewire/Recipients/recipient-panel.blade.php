<div class="row">
    <div class="d-flex justify-content-end ">
        <div class="me-3">
            <button class="btn btn-primary" wire:click="Recipient_handleCLick" type="button">Create New User</button>
        </div>

        <div class="me-5">
            <button class="btn btn-primary" wire:click="View_handleCLick" type="button">Views</button>
        </div>
    </div>
    <div class="container">
        @if ($openRecipientForm)
            @livewire('recipients.newrecipientform')
        @endif
        @if ($openView)
            @livewire('recipients.viewrecipient')
        @endif
    </div>
</div>
