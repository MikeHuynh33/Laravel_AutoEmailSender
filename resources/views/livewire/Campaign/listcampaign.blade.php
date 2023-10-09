<div class="row mt-5 mx-5 ">
    <div class="d-flex flex-row justify-content-between  header_wrap">
        <div class="num_rows">
            <div class="form-group">
                <!--		Show Numbers Of Rows 		-->
                <select class="form-control w-50 " name="state" id="maxRows">
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="100">100</option>
                    <option value="5000">Show ALL Rows</option>
                </select>
            </div>
        </div>
        <div class="tb_search ">
            <input type="text" id="search_input_all" placeholder="Search.." class="form-control">
        </div>
    </div>
    <table class="table table-striped table-class mt-3" id="table-id">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Start_Date</th>
                <th>End_Date</th>
                <th>Created_Date</th>
                <th>Adjust</th>
            </tr>
        </thead>
        <tbody>
            {{-- List all Users --}}
            @foreach ($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ $campaign->start_date }}</td>
                    <td>{{ $campaign->end_date }}</td>
                    <td>{{ $campaign->created_at }}</td>
                    <td><button class="btn btn-outline-primary me-2 ">Edit</button>
                        <button class="btn btn-outline-primary">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
