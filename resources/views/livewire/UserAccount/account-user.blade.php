<div class="row">
    <div class="d-flex justify-content-end ">
        <div class="me-3">
            <button class="btn btn-primary" wire:click="Account_handleCLick" type="button">Create New User</button>
        </div>

        <div class="me-5">
            <button class="btn btn-primary" wire:click="View_handleCLick" type="button">Views</button>
        </div>
    </div>
    <div class="container">
        @if ($openCreateForm)
            @livewire('user-account.newuserform')
        @endif
        @if ($openView)
            @livewire('user-account.listuser')
        @endif
    </div>
</div>
