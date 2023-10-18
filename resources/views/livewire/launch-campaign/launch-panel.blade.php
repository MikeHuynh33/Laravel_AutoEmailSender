<div class="row mx-4 ">
    <div class="d-flex justify-content-end my-3  ">
        <div class="me-3">
            <button class="btn btn-primary" wire:click="ReadyLaunch_handleCLick" type="button">Ready To Launch</button>
        </div>

        <div class="me-3">
            <button class="btn btn-primary" wire:click="Launched_handleCLick" type="button">Launched History</button>
        </div>
        <div class="me-5">
            <button class="btn btn-primary" wire:click="FailtureLaunched_handleCLick" type="button">Fail To
                Launch</button>
        </div>
    </div>
    <div class="container ">
        @if ($openReadyLaunch)
            @livewire('launch-campaign.ready-launch')
        @endif
        @if ($openLaunched)
            @livewire('launch-campaign.launched')
        @endif
        @if ($openFailtureLaunched)
            @livewire('launch-campaign.failure-launched')
        @endif
    </div>
</div>
