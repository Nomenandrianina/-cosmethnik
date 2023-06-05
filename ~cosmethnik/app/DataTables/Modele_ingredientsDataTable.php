<?php

namespace App\DataTables;

use App\Models\Modele_ingredients;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Modele_ingredientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'modele_ingredients.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Modele_ingredients $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Modele_ingredients $model)
    {
        return $model->newQuery()->with('ingredient')->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'ingredient_id' => new Column(['title' => __('models/modeleIngredients.fields.ingredient_id'), 'data' => 'ingredient.nom']),
            'quantite' => new Column(['title' => __('models/modeleIngredients.fields.quantite'), 'data' => 'quantite']),
            'ogm' => new Column(['title' => __('models/modeleIngredients.fields.ogm'), 'data' => 'ogm',
            'render' => 'function() {
                var value = full.ogm;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }']),
            'ionisation' => new Column(['title' => __('models/modeleIngredients.fields.ionisation'), 'data' => 'ionisation',
            'render' => 'function() {
                var value = full.ionisation;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }']),
            'auxilliaire_technologie' => new Column(['title' => __('models/modeleIngredients.fields.auxilliaire_technologie'), 'data' => 'auxilliaire_technologie',
            'render' => 'function() {
                var value = full.auxilliaire_technologie;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }']),
            'support' => new Column(['title' => __('models/modeleIngredients.fields.support'), 'data' => 'support',
            'render' => 'function() {
                var value = full.support;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'modele_ingredients_datatable_' . time();
    }
}
