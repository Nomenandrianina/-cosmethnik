<?php

namespace App\DataTables;

use App\Models\Modele_emballages;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Modele_emballagesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'modele_emballages.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Modele_emballages $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Modele_emballages $model)
    {
        return $model->newQuery()->with('emballage')->where('model_id', $this->attributes['model_id'])->where('model_type', $this->attributes['model_type']);
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
            'emballage_id' => new Column(['title' => __('models/modeleEmballages.fields.emballage_id'), 'data' => 'emballage.nom']),
            'quantite' => new Column(['title' => __('models/modeleEmballages.fields.quantite'), 'data' => 'quantite']),
            'unite' => new Column(['title' => __('models/modeleEmballages.fields.unite'), 'data' => 'unite']),
            'freinte' => new Column(['title' => __('models/modeleEmballages.fields.freinte'), 'data' => 'freinte']),
            'maitre' => new Column(['title' => __('models/modeleEmballages.fields.maitre'), 'data' => 'maitre']),
            'variantes' => new Column(['title' => __('models/modeleEmballages.fields.variantes'), 'data' => 'variantes']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'modele_emballages_datatable_' . time();
    }
}
