<?php

namespace App\DataTables;

use App\Models\Modele_physico_chimique;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Modele_physico_chimiqueDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'modele_physico_chimiques.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Modele_physico_chimique $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Modele_physico_chimique $model)
    {
        return $model->newQuery()->with('physico_chimique');
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
            'physico_chimique_id' => new Column(['title' => __('models/modelePhysicoChimiques.fields.physico_chimique_id'), 'data' => 'physico_chimique.nom']),
            'caracteristique' => new Column(['title' => __('models/modelePhysicoChimiques.fields.caracteristique'), 'data' => 'caracteristique']),
            'valeur' => new Column(['title' => __('models/modelePhysicoChimiques.fields.valeur'), 'data' => 'valeur']),
            'mini' => new Column(['title' => __('models/modelePhysicoChimiques.fields.mini'), 'data' => 'mini']),
            'maxi' => new Column(['title' => __('models/modelePhysicoChimiques.fields.maxi'), 'data' => 'maxi']),
            'critere_texte' => new Column(['title' => __('models/modelePhysicoChimiques.fields.critere_texte'), 'data' => 'critere_texte']),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'modele_physico_chimiques_datatable_' . time();
    }
}
