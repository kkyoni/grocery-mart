<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Code</th>
            <td>{{ $promo->code }}</td>
        </tr>
        <tr>
            <th>Email Name</th>
            <td>
                @foreach ($promo_details as $val)
                    <span class="badge badge-success">{{ $val['UserDetails']['email'] }}</span>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{ $promo->start_date }}</td>
        </tr>
        <tr>
            <th>End Date</th>
            <td>{{ $promo->end_date }}</td>
        </tr>
        </tr>
    </table>
</div>
