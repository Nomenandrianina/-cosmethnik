<?php

namespace App\DataTables;

use App\Models\Compositions;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class CompositionsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'compositions.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Compositions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Compositions $model)
    {
        return $model->newQuery()->with(['matiere_premiere'])->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
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
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('models/compositions.table.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('models/compositions.table.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('models/compositions.table.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('models/compositions.table.reload').''
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
            'product' => new Column(['title' => __('models/compositions.fields.product'), 'data' => 'matiere_premiere.nom']),
            'quantite' => new Column(['title' => __('models/compositions.fields.quantite'), 'data' => 'quantite']),
            'unite' => new Column(['title' => __('models/compositions.fields.unite'), 'data' => 'unite']),
            'poids' => new Column(['title' => __('models/compositions.fields.poids'), 'data' => 'poids']),
            'rendement' => new Column(['title' => __('models/compositions.fields.rendement'), 'data' => 'rendement']),
            'freinte' => new Column(['title' => __('models/compositions.fields.freinte'), 'data' => 'freinte'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'compositions_datatable_' . time();
    }
}
