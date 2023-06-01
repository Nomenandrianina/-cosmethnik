<?php

namespace App\DataTables;

use App\Models\Modele_allergenes;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Modele_allergenesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'modele_allergenes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Modele_allergenes $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Modele_allergenes $model)
    {
        return $model->newQuery()->with('allergene')->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
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
            'allergene_id' => new Column(['title' => __('models/modeleAllergenes.fields.allergene_id'), 'data' => 'allergene.nom']),
            'quantite' => new Column(['title' => __('models/modeleAllergenes.fields.quantite'), 'data' => 'quantite']),
            'pres_volontaire' => new Column(['title' => __('models/modeleAllergenes.fields.pres_volontaire'), 'data' => 'pres_volontaire','render' => 'function() {
                var value = full.pres_volontaire;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }',]),
            'pres_fortuite' => new Column(['title' => __('models/modeleAllergenes.fields.pres_fortuite'), 'data' => 'pres_fortuite',
            'render' => 'function() {
                var value = full.pres_fortuite;
                if (value === true || value === "1") {
                    return "Oui";
                } else {
                    return "Non";
                }
            }']),
            'source_pres_volontaire' => new Column(['title' => __('models/modeleAllergenes.fields.source_pres_volontaire'), 'data' => 'source_pres_volontaire']),
            'source_pres_fortuite' => new Column(['title' => __('models/modeleAllergenes.fields.source_pres_fortuite'), 'data' => 'source_pres_fortuite']),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'modele_allergenes_datatable_' . time();
    }
}
