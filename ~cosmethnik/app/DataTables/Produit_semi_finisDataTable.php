<?php

namespace App\DataTables;

use App\Models\Produit_semi_finis;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Produit_semi_finisDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'produit_semi_finis.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Produit_semi_finis $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Produit_semi_finis $model)
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
            'nom' => new Column(['title' => __('models/produitSemiFinis.fields.nom'), 'data' => 'nom']),
            'libelle_commerciale' => new Column(['title' => __('models/produitSemiFinis.fields.libelle_commerciale'), 'data' => 'libelle_commerciale']),
            'libelle_legale' => new Column(['title' => __('models/produitSemiFinis.fields.libelle_legale'), 'data' => 'libelle_legale']),
            'description' => new Column(['title' => __('models/produitSemiFinis.fields.description'), 'data' => 'description']),
            'description_conditionnement' => new Column(['title' => __('models/produitSemiFinis.fields.description_conditionnement'), 'data' => 'description_conditionnement']),
            'modele' => new Column(['title' => __('models/produitSemiFinis.fields.modele'), 'data' => 'modele']),
            'code_bcepg' => new Column(['title' => __('models/produitSemiFinis.fields.code_bcepg'), 'data' => 'code_bcepg']),
            'code_erp' => new Column(['title' => __('models/produitSemiFinis.fields.code_erp'), 'data' => 'code_erp']),
            'ean' => new Column(['title' => __('models/produitSemiFinis.fields.ean'), 'data' => 'ean']),
            'ean_colis' => new Column(['title' => __('models/produitSemiFinis.fields.ean_colis'), 'data' => 'ean_colis']),
            'ean_palette' => new Column(['title' => __('models/produitSemiFinis.fields.ean_palette'), 'data' => 'ean_palette']),
            'dossier_id' => new Column(['title' => __('models/produitSemiFinis.fields.dossier_id'), 'data' => 'dossier_id']),
            'etat_produit_id' => new Column(['title' => __('models/produitSemiFinis.fields.etat_produit_id'), 'data' => 'etat_produit_id']),
            'filiale_id' => new Column(['title' => __('models/produitSemiFinis.fields.filiale_id'), 'data' => 'filiale_id']),
            'usine_id' => new Column(['title' => __('models/produitSemiFinis.fields.usine_id'), 'data' => 'usine_id']),
            'geographique_id' => new Column(['title' => __('models/produitSemiFinis.fields.geographique_id'), 'data' => 'geographique_id']),
            'marque_id' => new Column(['title' => __('models/produitSemiFinis.fields.marque_id'), 'data' => 'marque_id']),
            'client_id' => new Column(['title' => __('models/produitSemiFinis.fields.client_id'), 'data' => 'client_id']),
            'unite_id' => new Column(['title' => __('models/produitSemiFinis.fields.unite_id'), 'data' => 'unite_id']),
            'quantite_nette' => new Column(['title' => __('models/produitSemiFinis.fields.quantite_nette'), 'data' => 'quantite_nette']),
            'poids_nette_egoutte' => new Column(['title' => __('models/produitSemiFinis.fields.poids_nette_egoutte'), 'data' => 'poids_nette_egoutte']),
            'freinte_produit' => new Column(['title' => __('models/produitSemiFinis.fields.freinte_produit'), 'data' => 'freinte_produit']),
            'taille_portion' => new Column(['title' => __('models/produitSemiFinis.fields.taille_portion'), 'data' => 'taille_portion']),
            'unite_portion' => new Column(['title' => __('models/produitSemiFinis.fields.unite_portion'), 'data' => 'unite_portion']),
            'texte_portion' => new Column(['title' => __('models/produitSemiFinis.fields.texte_portion'), 'data' => 'texte_portion']),
            'nombre_portion' => new Column(['title' => __('models/produitSemiFinis.fields.nombre_portion'), 'data' => 'nombre_portion']),
            'cahier_de_charge' => new Column(['title' => __('models/produitSemiFinis.fields.cahier_de_charge'), 'data' => 'cahier_de_charge']),
            'date_limite_consommation' => new Column(['title' => __('models/produitSemiFinis.fields.date_limite_consommation'), 'data' => 'date_limite_consommation']),
            'ddm_dua' => new Column(['title' => __('models/produitSemiFinis.fields.ddm_dua'), 'data' => 'ddm_dua']),
            'pao' => new Column(['title' => __('models/produitSemiFinis.fields.pao'), 'data' => 'pao']),
            'duree_vie_minimum' => new Column(['title' => __('models/produitSemiFinis.fields.duree_vie_minimum'), 'data' => 'duree_vie_minimum']),
            'condition_conservation_id' => new Column(['title' => __('models/produitSemiFinis.fields.condition_conservation_id'), 'data' => 'condition_conservation_id']),
            'precaution_emploi_id' => new Column(['title' => __('models/produitSemiFinis.fields.precaution_emploi_id'), 'data' => 'precaution_emploi_id']),
            'conseil_preparation_utilisation' => new Column(['title' => __('models/produitSemiFinis.fields.conseil_preparation_utilisation'), 'data' => 'conseil_preparation_utilisation']),
            'prix_vente_uv' => new Column(['title' => __('models/produitSemiFinis.fields.prix_vente_uv'), 'data' => 'prix_vente_uv']),
            'monnaie_id' => new Column(['title' => __('models/produitSemiFinis.fields.monnaie_id'), 'data' => 'monnaie_id']),
            'quantite_imprevisionnelle' => new Column(['title' => __('models/produitSemiFinis.fields.quantite_imprevisionnelle'), 'data' => 'quantite_imprevisionnelle'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'produit_semi_finis_datatable_' . time();
    }
}
