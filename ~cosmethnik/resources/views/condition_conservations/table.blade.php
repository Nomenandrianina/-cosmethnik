<div class="table-responsive">
    <table class="table" id="conditionConservations-table">
        <thead>
        <tr>
            <th>@lang('models/conditionConservations.fields.description')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($conditionConservations as $conditionConservations)
            <tr>
                <td>{{ $conditionConservations->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['conditionConservations.destroy', $conditionConservations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('conditionConservations.show', [$conditionConservations->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('conditionConservations.edit', [$conditionConservations->id]) }}"
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
