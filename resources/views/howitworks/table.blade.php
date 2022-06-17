<div class="table-responsive">
    <table class="table" id="howitworks-table">
        <thead>
        <tr>
            <th>Title</th>
        <th>File</th>
        <th>Description</th>
        <th>Type</th>
        <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($howitworks as $howitworks)
            <tr>
                <td>{{ $howitworks->title }}</td>
            <td>{{ $howitworks->file }}</td>
            <td>{{ $howitworks->description }}</td>
            <td>{{ $howitworks->type }}</td>
            <td>{{ $howitworks->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['howitworks.destroy', $howitworks->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('howitworks.show', [$howitworks->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('howitworks.edit', [$howitworks->id]) }}"
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
