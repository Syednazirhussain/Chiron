<div class="table-responsive">
    <table class="table" id="promotionsSends-table">
        <thead>
        <tr>
            <th>Promotions Id</th>
        <th>User Id</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotionsSends as $promotionsSend)
            <tr>
                <td>{{ $promotionsSend->promotions_id }}</td>
            <td>{{ $promotionsSend->user_id }}</td>
            <td>{{ $promotionsSend->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['promotionsSends.destroy', $promotionsSend->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('promotionsSends.show', [$promotionsSend->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('promotionsSends.edit', [$promotionsSend->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
