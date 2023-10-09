<div class="row mx-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @php
        $titles = ['Name', 'Email', 'Phone', 'Address', 'Subscription_status', 'Source'];
    @endphp
    @if ($hiddenForm)
        <form class="d-flex flex-row me-2 " wire:submit.prevent="uploadReview" enctype="multipart/form-data">
            @csrf
            <div class="border border-primary">
                <input class="p-4" role="button" type="file" wire:model="excelFile" accept=".xlsx, .xls">
                @error('excelFile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center align-content-center ">
                <button class="btn btn-primary " type="submit">Upload Excel</button>
            </div>
        </form>
    @endif

    @if (!empty($data))
        <h2>Review Data</h2>
        <div class="d-flex justify-content-end">
            <div class="d-flex flex-column ">
                <label class="p-3" for="dropdown">Select Campaign to add recipients:</label>
                <div class="d-flex g-3">
                    <form wire:submit.prevent="storeRecipient">
                        <select wire:model="selectedCampaign" class="me-5" id="dropdown" name="dropdown">
                            @foreach ($listCampaign as $campaign)
                                <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Store Data</button>
                    </form>

                </div>
            </div>
        </div>
        <h2>First 5 Recipeints of excel</h2>
        <table class="table table-striped table-class">
            <thead>
                <tr>
                    @foreach ($titles as $title)
                        <th>{{ $title }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($first10Recipients as $row)
                    <tr>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Last 5 Recipeints of excel</h2>
        <table class="table table-striped table-class">
            <thead>
                <tr>
                    @foreach ($titles as $title)
                        <th>{{ $title }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($last10Recipients as $row)
                    <tr>
                        @foreach ($row as $value)
                            <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</div>
