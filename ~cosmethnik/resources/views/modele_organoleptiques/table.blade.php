<div class="table-responsive">
    <table class="table" id="modeleOrganoleptiques-table">
        <thead>
        <tr>
            <th>@lang('models/modeleOrganoleptiques.fields.caractéristique')</th>
        <th>@lang('models/modeleOrganoleptiques.fields.valeur')</th>
        <th>@lang('models/modeleOrganoleptiques.fields.model_type')</th>
        <th>@lang('models/modeleOrganoleptiques.fields.model_id')</th>
        <th>@lang('models/modeleOrganoleptiques.fields.organoleptique_id')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($modeleOrganoleptiques as $modeleOrganoleptiques)
            <tr>
                <td>{{ $modeleOrganoleptiques->caractéristique }}</td>
            <td>{{ $modeleOrganoleptiques->valeur }}</td>
            <td>{{ $modeleOrganoleptiques->model_type }}</td>
            <td>{{ $modeleOrganoleptiques->model_id }}</td>
            <td>{{ $modeleOrganoleptiques->organoleptique_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['modeleOrganoleptiques.destroy', $modeleOrganoleptiques->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('modeleOrganoleptiques.show', [$modeleOrganoleptiques->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('modeleOrganoleptiques.edit', [$modeleOrganoleptiques->id]) }}"
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
