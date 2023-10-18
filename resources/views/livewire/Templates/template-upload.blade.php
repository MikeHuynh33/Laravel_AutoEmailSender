<div class="row">
    @if (session()->has('excelFile'))
        <div class="alert alert-success mt-1">
            {{ session('excelFile') }}
        </div>
    @endif
    <div class="d-flex col-12">
        <form class="d-flex flex-column  me-2 " wire:submit.prevent="uploadHtmlFile">
            @csrf
            <div class="form-group mb-3">
                <label for="htmlFileName" class="form-label fs-4 ">Name Email Template:</label>
                <input class=" form-control p-4" type="text" wire:model="htmlFileName">
            </div>
            <div class="d-flex flex-row border border-primary">
                <input class="p-4" type="file" wire:model="htmlFile" accept=".html">
                @error('excelFile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="d-flex justify-content-center align-content-center ">
                    <button class="btn btn-primary " type="submit">Upload HTML</button>
                </div>
            </div>
        </form>
    </div>
    @if ($IframeReview)
        <div class="d-flex mt-3  col-12 fs-3 fw-bolder "> Uploaded Html Email Templates Review :
        </div>
        <div class="d-flex border-1 mt-1 col-12 justify-content-center  ">
            <iframe class="iframe-custom" src="{{ asset($filePathReview) }}" frameborder="1"
                style="height: 400px"></iframe>
        </div>
    @endif
</div>
