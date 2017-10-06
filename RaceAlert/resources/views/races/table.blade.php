<table class="table table-responsive" id="races-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Start</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($races as $race)
        <tr>
            <td>{!! $race->name !!}</td>
            <td>{!! $race->description !!}</td>
            <td>{!! $race->start !!}</td>
            <td>
                {!! Form::open(['route' => ['races.destroy', $race->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('races.show', [$race->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('races.edit', [$race->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>