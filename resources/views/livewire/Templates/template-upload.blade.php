<div class="row">
    @if (session()->has('excelFile'))
        <div class="alert alert-success">
            {{ session('excelFile') }}
        </div>
    @endif
    <div class="d-flex col-12">
        <form class="d-flex flex-row me-2 " wire:submit.prevent="uploadHtmlFile">
            @csrf
            <label for="htmlFileName" class="form-label">Name Email Template:</label>
            <input class="p-4" type="text" wire:model="htmlFileName">
            <div class="border border-primary">
                <input class="p-4" type="file" wire:model="htmlFile" accept=".html">
                @error('excelFile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center align-content-center ">
                <button class="btn btn-primary " type="submit">Upload HTML</button>
            </div>
        </form>
    </div>
    <div class="d-flex mt-3  col-12 fs-3 fw-bolder "> Uploaded Html Email Templates Review :
    </div>
    <div class="d-flex border-1 mt-5 col-12 justify-content-center  ">
        <iframe class="iframe-custom" src="{{ asset('email_templates/ilovepho.html') }}" frameborder="1"></iframe>
    </div>


</div>
