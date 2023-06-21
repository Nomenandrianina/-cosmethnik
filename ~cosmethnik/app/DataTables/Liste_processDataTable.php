<?php

namespace App\DataTables;

use App\Models\Liste_process;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Liste_processDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'liste_processes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Liste_process $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Liste_process $model)
    {
        return $model->newQuery()->with(['ressource'])->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
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
            'etape' => new Column(['title' => __('models/listeProcesses.fields.etape'), 'data' => 'etape']),
            'ressource_id' => new Column(['title' => __('models/listeProcesses.fields.ressource_id'), 'data' => 'ressource.nom']),
            'quantite' => new Column(['title' => __('models/listeProcesses.fields.quantite'), 'data' => 'quantite']),
            'cadence' => new Column(['title' => __('models/listeProcesses.fields.cadence'), 'data' => 'cadence']),
            'unite_cadence' => new Column(['title' => __('models/listeProcesses.fields.unite_cadence'), 'data' => 'unite_cadence']),
            'taux_horaire' => new Column(['title' => __('models/listeProcesses.fields.taux_horaire'), 'data' => 'taux_horaire']),
            'produit_heure' => new Column(['title' => __('models/listeProcesses.fields.produit_heure'), 'data' => 'produit_heure'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'liste_processes_datatable_' . time();
    }
}
