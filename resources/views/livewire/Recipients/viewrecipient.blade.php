<div>
    @php
        $titles = ['Title', 'Start_date', 'End_date', 'Number_Recipients'];
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
                <tr>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->start_date }}</td>
                    <td>{{ $row->end_date }}</td>
                    <td>{{ $row->recipients_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
