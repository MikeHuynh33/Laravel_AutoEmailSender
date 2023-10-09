<div class="row">
    <div class="d-flex justify-content-end ">
        <div class="me-3">
            <button class="btn btn-primary" wire:click="Campaign_handleCLick" type="button">Create New Campaign</button>
        </div>

        <div class="me-5">
            <button class="btn btn-primary" wire:click="View_handleCLick" type="button">Views</button>
        </div>
    </div>
    <div class="container">
        @if ($openCampaignForm)
            @livewire('campaign.newcampagin')
        @endif
        @if ($openView)
            @livewire('campaign.listcampaign')
        @endif
    </div>
</div>
