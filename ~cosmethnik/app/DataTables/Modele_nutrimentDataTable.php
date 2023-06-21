<?php

namespace App\DataTables;

use App\Models\Modele_nutriment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Modele_nutrimentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'modele_nutriments.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Modele_nutriment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Modele_nutriment $model)
    {
        return $model->newQuery()->with('nutriment')->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
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
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/French.json'),
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
            'nutriment_id' => new Column(['title' => __('models/modeleNutriments.fields.nutriment_id'), 'data' => 'nutriment.nom']),
            'valeur' => new Column(['title' => __('models/modeleNutriments.fields.valeur'), 'data' => 'valeur',
            'render' => 'function() {
                var value = full.valeur+""+full.unite;
                return value;
            }']),
            'mini' => new Column(['title' => __('models/modeleNutriments.fields.mini'), 'data' => 'mini']),
            'maxi' => new Column(['title' => __('models/modeleNutriments.fields.maxi'), 'data' => 'maxi']),
            'portion' => new Column(['title' => __('models/modeleNutriments.fields.portion'), 'data' => 'portion',
            'render' => 'function() {
                var value = full.portion+""+full.unite_portion;
                return value;
            }']),
            'ajr_portion' => new Column(['title' => __('models/modeleNutriments.fields.ajr_portion'), 'data' => 'ajr_portion',
            'render' => 'function() {
                var value = full.ajr_portion;
                var unite_potion = full.unite_portion;
                var progressBar = `<div class="progress">
                    <div class="progress-bar" role="progressbar" style="color: dark !important;width: ${value}%;" aria-valuenow="${value}" aria-valuemin="0" aria-valuemax="100">${value}% de 2000${unite_potion}</div>
                </div>`;
                return progressBar;
            }']),
            'perte' => new Column(['title' => __('models/modeleNutriments.fields.perte'), 'data' => 'perte']),
            'methode' => new Column(['title' => __('models/modeleNutriments.fields.methode'), 'data' => 'methode'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'modele_nutriments_datatable_' . time();
    }
}
