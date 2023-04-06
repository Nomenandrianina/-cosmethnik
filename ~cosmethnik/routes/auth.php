<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    App\Http\Controllers\DashboardController::class, 'index'
])->name('dashboard');

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::post('permissions/loadFromRouter', [App\Http\Controllers\PermissionController::class, 'LoadPermission'])->name('permissions.load-router');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.profile');
Route::patch('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('users.updateProfile');

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder.index');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator_builder.field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('generator_builder.relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator_builder.generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('generator_builder.rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('generator_builder.from_file');


Route::resource('fileUploads', App\Http\Controllers\FileUploadController::class);

Route::resource('sites', App\Http\Controllers\SitesController::class);

Route::resource('dossiers', App\Http\Controllers\DossiersController::class);



Route::resource('commentaires', App\Http\Controllers\CommentairesController::class);

Route::resource('familles', App\Http\Controllers\FamilleController::class);

Route::resource('marques', App\Http\Controllers\MarquesController::class);

Route::resource('monnaies', App\Http\Controllers\MonnaiesController::class);

Route::resource('precautionEmplois', App\Http\Controllers\Precaution_emploiController::class);

Route::resource('conditionConservations', App\Http\Controllers\Condition_conservationsController::class);

Route::resource('unites', App\Http\Controllers\UnitesController::class);

Route::resource('geographiques', App\Http\Controllers\GeographiquesController::class);

Route::resource('usines', App\Http\Controllers\UsinesController::class);

Route::resource('filiales', App\Http\Controllers\FilialesController::class);

Route::resource('etatProduits', App\Http\Controllers\Etat_produitsController::class);

Route::resource('pays', App\Http\Controllers\PaysController::class);

Route::resource('clients', App\Http\Controllers\ClientsController::class);

Route::resource('emballages', App\Http\Controllers\EmballagesController::class);

Route::resource('modeleEmballages', App\Http\Controllers\Modele_emballagesController::class);

Route::resource('listeProcesses', App\Http\Controllers\Liste_processController::class);

Route::resource('ressources', App\Http\Controllers\RessourcesController::class);

Route::resource('ingredients', App\Http\Controllers\IngredientsController::class);

Route::resource('modeleIngredients', App\Http\Controllers\Modele_ingredientsController::class);

Route::resource('compositions', App\Http\Controllers\CompositionsController::class);

Route::resource('allergenes', App\Http\Controllers\AllergenesController::class);

Route::resource('modeleAllergenes', App\Http\Controllers\Modele_allergenesController::class);

Route::resource('couts', App\Http\Controllers\CoutsController::class);

Route::resource('organoleptiques', App\Http\Controllers\OrganoleptiquesController::class);

Route::resource('modeleOrganoleptiques', App\Http\Controllers\Modele_organoleptiquesController::class);

Route::resource('physicoChimiques', App\Http\Controllers\Physico_chimiquesController::class);

Route::resource('modelePhysicoChimiques', App\Http\Controllers\Modele_physico_chimiqueController::class);

Route::resource('allegations', App\Http\Controllers\AllegationsController::class);

Route::resource('modeleAllegations', App\Http\Controllers\Modele_allegationsController::class);

Route::resource('materiauxes', App\Http\Controllers\MateriauxController::class);

Route::resource('modeleMateriauxes', App\Http\Controllers\Modele_materiauxController::class);

Route::resource('activites', App\Http\Controllers\ActivitesController::class);

Route::resource('casEmploies', App\Http\Controllers\Cas_emploiesController::class);

Route::resource('produitFinis', App\Http\Controllers\Produit_finiController::class);

Route::resource('produitSemiFinis', App\Http\Controllers\Produit_semi_finisController::class);

Route::resource('modeleFamilles', App\Http\Controllers\Modele_famillesController::class);

Route::resource('matierePremieres', App\Http\Controllers\Matiere_premiereController::class);

