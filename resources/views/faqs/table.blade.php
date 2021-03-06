<div class="table-responsive">
    <table class="table" id="faqs-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faqs as $faq)
            <tr>
                <td>{{ $faq->title }}</td>
                <td>{{ $faq->description }}</td>
                <td>{{ $faq->type }}</td>
                <td>{{ $faq->status }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['faqs.destroy', $faq->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('faqs.show', [$faq->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('faqs.edit', [$faq->id]) }}"
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
