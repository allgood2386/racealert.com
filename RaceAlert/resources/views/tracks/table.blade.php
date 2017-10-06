<table class="table table-responsive" id="tracks-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tracks as $track)
        <tr>
            <td>{!! $track->name !!}</td>
            <td>{!! $track->description !!}</td>
            <td>
                {!! Form::open(['route' => ['tracks.destroy', $track->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tracks.show', [$track->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tracks.edit', [$track->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>