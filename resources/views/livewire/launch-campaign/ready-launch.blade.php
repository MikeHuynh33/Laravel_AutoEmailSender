<div class="row position-relative ">
    @php
        $titles = ['Campaign Name', 'Status', 'Number Recipients', 'Due Date', 'Ready To Launch'];
    @endphp
    <table class="table table-striped table-class">
        <thead>
            <tr>
                @foreach ($titles as $title)
                    <th>{{ $title }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($listCampaignWithRep as $row)
                @if ($row->recipients_count >= 2)
                    <tr>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->recipients_count }}</td>
                        <td>{{ $row->end_date }}</td>
                        <td><button class="btn btn-primary " wire:click="Launch_Btn_Handler({{ $row->id }})">Launch
                                Campaign</button></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    @if ($confmodal)
        <div class="flex position-absolute  z-1 start-0 align-items-center justify-content-center bg-light "
            style="width: 100vw ; height: 80vh; top:-100%">
            <div class="border-4 p-4 flex-column mb-5 ms-5 w-75  ">
                <figure class=" m-0 ">
                    <blockquote class="blockquote fs-4 ">
                        Launch <span class=" fw-bolder fs-2">{{ $selectedCampaign }} </span>Confirm
                    </blockquote>
                    <figcaption class="blockquote-footer fs-5 ">
                        Review Your First 10 Email In Campaign :
                    </figcaption>
                </figure>
                <div class="flex flex-column align-items-center px-4 pb-2 ">
                    @foreach ($listCampaignWithAssociatedRep as $email)
                        <div class="mb-3 fs-5  ">
                            {{ $email }}
                        </div>
                    @endforeach

                </div>
                <div class="flex m-3  justify-content-end">
                    <button wire:click="Close_Btn_Handler()" class="btn btn-primary mx-4 ">Back</button>
                    <button wire:click="ChooseTemp_Btn_Handler" class="btn btn-primary">Choose Templates</button>
                </div>
            </div>

        </div>
    @endif

    @if ($chooseTempModel)
        <div class="flex position-absolute z-1 start-0 align-items-center justify-content-center bg-light "
            style="width: 100vw ; height: 80vh ;  top:-60%">
            <div class="border-4 p-4 flex-column mt-4 ms-5 w-75">
                <figure class=" m-0 ">
                    <blockquote class="blockquote fs-4 ">
                        Choose Template For <span class=" fw-bolder fs-2">{{ $selectedCampaign }} </span>
                    </blockquote>
                    <figcaption class="blockquote-footer fs-5 ">
                        Please choose your avabile templates:
                    </figcaption>
                </figure>
                <div class="flex flex-row align-items-center px-4 pb-2 g-4  ">
                    <label class=" fs-6 fw-bolder  " for="dropdown">Select Templates:</label>
                    <select id="dropdown" wire:model="selectedOption" class="form-control">
                        <option value="">Select an option</option>
                        @foreach ($listOfTemplate as $value => $fileName)
                            <option value="{{ $fileName }}">{{ $fileName }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($selectedOption)
                    <div class="row mt-3">
                        <iframe src="{{ asset('email_templates/' . $selectedOption) }}" frameborder="0"
                            style="height: 400px;"></iframe>
                    </div>
                @endif
                <div class="flex m-3  justify-content-end">
                    <button wire:click="Close_Btn_Handler()" class="btn btn-primary mx-4 ">Cancel</button>
                    <button wire:click="LaunchConfirmed_Btn_Handler()" class="btn btn-primary">Launch</button>
                </div>
            </div>

        </div>
    @endif

</div>
