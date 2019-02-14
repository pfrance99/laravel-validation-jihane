<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thumbnail;

class AdminController extends Controller
{
    /**
     * Ajout du middleware auth
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Redirection vers la vue index admin avec toutes les vignettes en paramètre
     * @return $thumbnails retourne toutes les vignettes
     */
    public function index(){
        $thumbnails = Thumbnail::all();
        return view('admin.index', ['thumbnails' => $thumbnails]);
    }

    /**
     * Retourne la vue de détail de la vignette admin
     * @param  [string] $thumbnailId retourne l'id de la vignette à afficher
     * @return          $thumbnail   retourne la vignette avec la vue
     */
    public function show($thumbnailId){
        $thumbnail = null;
        if(is_numeric($thumbnailId)) {
            $thumbnail = Thumbnail::find($thumbnailId);
        }
        return view('show', ['thumbnail' => $thumbnail]);
    }

    /**
     * Redirige vers la route de création des données de modèle
     * @return [] Retourne la vue admin create
     */
    public function create(){
        return view('admin.create');
    }

    /**
     * Retourne la vue d'édition de la vignette existante
     * @param  [string] $thumbnailId        Id de la vignette
     * @return [vue/object]                 Retourne les données à préremplir dans le formulaire d''édition
     */
    public function edit($thumbnailId){
        $thumbnail = null;
        if(is_numeric($thumbnailId)) {
            $thumbnail = Thumbnail::find($thumbnailId);
        }
        return view('admin.edit', ['thumbnail' => $thumbnail]);
    }
}
