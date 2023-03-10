<?php

namespace App\DataTables;

use App\Models\Produit_fini;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Produit_finiDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'produit_finis.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Produit_fini $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Produit_fini $model)
    {
        return $model->newQuery();
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
            'nom' => new Column(['title' => __('models/produitFinis.fields.nom'), 'data' => 'nom']),
            'libelle_commerciale' => new Column(['title' => __('models/produitFinis.fields.libelle_commerciale'), 'data' => 'libelle_commerciale']),
            'libelle_legale' => new Column(['title' => __('models/produitFinis.fields.libelle_legale'), 'data' => 'libelle_legale']),
            'description' => new Column(['title' => __('models/produitFinis.fields.description'), 'data' => 'description']),
            'modele' => new Column(['title' => __('models/produitFinis.fields.modele'), 'data' => 'modele']),
            'code_bcpg' => new Column(['title' => __('models/produitFinis.fields.code_bcpg'), 'data' => 'code_bcpg']),
            'code_erp' => new Column(['title' => __('models/produitFinis.fields.code_erp'), 'data' => 'code_erp']),
            'ean' => new Column(['title' => __('models/produitFinis.fields.ean'), 'data' => 'ean']),
            'ean_colis' => new Column(['title' => __('models/produitFinis.fields.ean_colis'), 'data' => 'ean_colis']),
            'ean_palette' => new Column(['title' => __('models/produitFinis.fields.ean_palette'), 'data' => 'ean_palette']),
            'quantite_nette' => new Column(['title' => __('models/produitFinis.fields.quantite_nette'), 'data' => 'quantite_nette']),
            'poids_net_egoutte' => new Column(['title' => __('models/produitFinis.fields.poids_net_egoutte'), 'data' => 'poids_net_egoutte']),
            'freinte_produit' => new Column(['title' => __('models/produitFinis.fields.freinte_produit'), 'data' => 'freinte_produit']),
            'taille_portion' => new Column(['title' => __('models/produitFinis.fields.taille_portion'), 'data' => 'taille_portion']),
            'unite_portion' => new Column(['title' => __('models/produitFinis.fields.unite_portion'), 'data' => 'unite_portion']),
            'texte_portion' => new Column(['title' => __('models/produitFinis.fields.texte_portion'), 'data' => 'texte_portion']),
            'nombre_portion' => new Column(['title' => __('models/produitFinis.fields.nombre_portion'), 'data' => 'nombre_portion']),
            'cdc' => new Column(['title' => __('models/produitFinis.fields.cdc'), 'data' => 'cdc']),
            'date_limite_consommation' => new Column(['title' => __('models/produitFinis.fields.date_limite_consommation'), 'data' => 'date_limite_consommation']),
            'ddm_dua' => new Column(['title' => __('models/produitFinis.fields.ddm_dua'), 'data' => 'ddm_dua']),
            'dossier_id' => new Column(['title' => __('models/produitFinis.fields.dossier_id'), 'data' => 'dossier_id']),
            'etat_produit_id' => new Column(['title' => __('models/produitFinis.fields.etat_produit_id'), 'data' => 'etat_produit_id']),
            'filiale_id' => new Column(['title' => __('models/produitFinis.fields.filiale_id'), 'data' => 'filiale_id']),
            'usine_id' => new Column(['title' => __('models/produitFinis.fields.usine_id'), 'data' => 'usine_id']),
            'geographique_id' => new Column(['title' => __('models/produitFinis.fields.geographique_id'), 'data' => 'geographique_id']),
            'marque_id' => new Column(['title' => __('models/produitFinis.fields.marque_id'), 'data' => 'marque_id']),
            'client_id' => new Column(['title' => __('models/produitFinis.fields.client_id'), 'data' => 'client_id']),
            'unite_id' => new Column(['title' => __('models/produitFinis.fields.unite_id'), 'data' => 'unite_id'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'produit_finis_datatable_' . time();
    }
}
