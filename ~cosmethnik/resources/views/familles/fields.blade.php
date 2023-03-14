<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/familles.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent  Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', __('models/familles.fields.parent_id').':') !!}
    {!! Form::select('parent_id',$childs , null, ['class' => 'form-control', 'placeholder' => 'Choisissez un parent
    ...']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
        document.getElementById('parent_id').onchange = function() {
            window.location = "{{ $childs }}&items=" + this.value;
        };
</script>

