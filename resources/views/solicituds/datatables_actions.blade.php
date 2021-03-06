{!! Form::open(['route' => ['solicituds.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('solicituds.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @hasanyrole('admin|user')
    <a href="{{ route('solicituds.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endhasanyrole
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
