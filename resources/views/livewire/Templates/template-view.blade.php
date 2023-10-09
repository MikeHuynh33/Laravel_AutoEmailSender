<div class="row">
    @foreach ($listOfTemplate as $item)
        <div class="d-flex mt-5 col-4 justify-content-center  ">
            <iframe class="" src="{{ asset('email_templates/' . $item) }}" frameborder="0"></iframe>
        </div>
    @endforeach
</div>
