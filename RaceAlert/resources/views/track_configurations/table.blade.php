<table class="table table-responsive" id="trackConfigurations-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Length</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($trackConfigurations as $trackConfiguration)
        <tr>
            <td>{!! $trackConfiguration->name !!}</td>
            <td>{!! $trackConfiguration->description !!}</td>
            <td>{!! $trackConfiguration->length !!}</td>
            <td>
                {!! Form::open(['route' => ['trackConfigurations.destroy', $trackConfiguration->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('trackConfigurations.show', [$trackConfiguration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('trackConfigurations.edit', [$trackConfiguration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>