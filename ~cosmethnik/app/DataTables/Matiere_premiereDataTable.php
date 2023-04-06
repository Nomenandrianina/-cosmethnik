<?php

namespace App\DataTables;

use App\Models\Matiere_premiere;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class Matiere_premiereDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'matiere_premieres.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Matiere_premiere $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Matiere_premiere $model)
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
            'nom' => new Column(['title' => __('models/matierePremieres.fields.nom'), 'data' => 'nom']),
            'libelle_commerciale' => new Column(['title' => __('models/matierePremieres.fields.libelle_commerciale'), 'data' => 'libelle_commerciale']),
            'libelle_legale' => new Column(['title' => __('models/matierePremieres.fields.libelle_legale'), 'data' => 'libelle_legale']),
            'description' => new Column(['title' => __('models/matierePremieres.fields.description'), 'data' => 'description']),
            'description_conditionnement' => new Column(['title' => __('models/matierePremieres.fields.description_conditionnement'), 'data' => 'description_conditionnement']),
            'modele' => new Column(['title' => __('models/matierePremieres.fields.modele'), 'data' => 'modele']),
            'code_becpg' => new Column(['title' => __('models/matierePremieres.fields.code_becpg'), 'data' => 'code_becpg']),
            'code_erp' => new Column(['title' => __('models/matierePremieres.fields.code_erp'), 'data' => 'code_erp']),
            'ean' => new Column(['title' => __('models/matierePremieres.fields.ean'), 'data' => 'ean']),
            'ean_colis' => new Column(['title' => __('models/matierePremieres.fields.ean_colis'), 'data' => 'ean_colis']),
            'ean_palette' => new Column(['title' => __('models/matierePremieres.fields.ean_palette'), 'data' => 'ean_palette']),
            'dossier_id' => new Column(['title' => __('models/matierePremieres.fields.dossier_id'), 'data' => 'dossier_id']),
            'etat_produit_id' => new Column(['title' => __('models/matierePremieres.fields.etat_produit_id'), 'data' => 'etat_produit_id']),
            'filiale_id' => new Column(['title' => __('models/matierePremieres.fields.filiale_id'), 'data' => 'filiale_id']),
            'usine_id' => new Column(['title' => __('models/matierePremieres.fields.usine_id'), 'data' => 'usine_id']),
            'geographique_id' => new Column(['title' => __('models/matierePremieres.fields.geographique_id'), 'data' => 'geographique_id']),
            'marque_id' => new Column(['title' => __('models/matierePremieres.fields.marque_id'), 'data' => 'marque_id']),
            'client_id' => new Column(['title' => __('models/matierePremieres.fields.client_id'), 'data' => 'client_id']),
            'quantite_nette' => new Column(['title' => __('models/matierePremieres.fields.quantite_nette'), 'data' => 'quantite_nette']),
            'unite_id' => new Column(['title' => __('models/matierePremieres.fields.unite_id'), 'data' => 'unite_id']),
            'poids_net_egoutte' => new Column(['title' => __('models/matierePremieres.fields.poids_net_egoutte'), 'data' => 'poids_net_egoutte']),
            'freinte_produit' => new Column(['title' => __('models/matierePremieres.fields.freinte_produit'), 'data' => 'freinte_produit']),
            'taille_portion' => new Column(['title' => __('models/matierePremieres.fields.taille_portion'), 'data' => 'taille_portion']),
            'unite_portion' => new Column(['title' => __('models/matierePremieres.fields.unite_portion'), 'data' => 'unite_portion']),
            'texte_portion' => new Column(['title' => __('models/matierePremieres.fields.texte_portion'), 'data' => 'texte_portion']),
            'nombre_portion' => new Column(['title' => __('models/matierePremieres.fields.nombre_portion'), 'data' => 'nombre_portion']),
            'cahier_charge' => new Column(['title' => __('models/matierePremieres.fields.cahier_charge'), 'data' => 'cahier_charge']),
            'date_limite_consommation' => new Column(['title' => __('models/matierePremieres.fields.date_limite_consommation'), 'data' => 'date_limite_consommation']),
            'ddm_dua' => new Column(['title' => __('models/matierePremieres.fields.ddm_dua'), 'data' => 'ddm_dua'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'matiere_premieres_datatable_' . time();
    }
}
