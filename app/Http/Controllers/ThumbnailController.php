<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thumbnail;
use Validator;

class ThumbnailController extends Controller
{
    /**
     * Ajout du middleware d'authentification pour les routes utilisant les modèles
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
    * Retourne la vue de la page d'accueil
    * @return $thumbnails retourne toutes les vignettes
    */
    public function index(){
        $thumbnails = Thumbnail::all();
        return view('index', ['thumbnails' => $thumbnails]);
    }

    /**
     * Retourne la vue de détail de la vignette
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
     * Crée une vignette en bdd
     * @param  Request $request     Objet de la requete
     * @return []                   Renvoye un status success ou error
     */
    public function create(Request $request)
    {
        $status = '';
        $msg = '';
        $this->validateFields($request);
        $thumbnail = new Thumbnail;
        $thumbnail->legend = $_POST['legend'];
        $thumbnail->imageUrl = $_POST['imageUrl'];
        $thumbnail->description = $_POST['description'];
        if($thumbnail->save()){
            $status = 'success';
            $msg = 'Vignette crée avec succès!';
        } else {
            $status = 'error';
            $msg = 'Erreur lors de la création de la vignette !';
        }
        return redirect('/admin')->with($status, $msg);
    }

    /**
     * Modifie une vignette en bdd
     * @param  [String]  $thumbnailId   Id de la vignette
     * @param  Request $request         Objet de la requète
     * @return []                       Renvoye un status success ou error
     */
    public function edit($thumbnailId, Request $request)
    {
        $status = '';
        $msg = '';
        if(is_numeric($thumbnailId)){
            $this->validateFields($request);
            $thumbnail = Thumbnail::find($thumbnailId);
            $thumbnail->legend = $_POST['legend'];
            $thumbnail->imageUrl = $_POST['imageUrl'];
            $thumbnail->description = $_POST['description'];
            if($thumbnail->save()){
                $status = 'success';
                $msg = 'Vignette modifiée avec succès!';
            } else {
                $status = 'error';
                $msg = 'Erreur lors de la modification de la vignette !';
            }
        } else {
            $status = 'error';
            $msg = 'Erreur lors de la modification de la vignette !';
        }
        return redirect('/admin')->with($status, $msg);
    }

    /**
     *  Supprime une vignette de la bdd
     * @param  [String] $thumbnailId    Id de la vignette
     * @return []                       Renvoye un status success ou error
     */
    public function delete($thumbnailId)
    {
        $status = '';
        $msg = '';
        if(is_numeric($thumbnailId)){
            $thumbnail = Thumbnail::find($thumbnailId);
            if($thumbnail->delete()){
                $status = 'success';
                $msg = 'Vignette supprimée avec succès!';
            } else {
                $status = 'error';
                $msg = 'Erreur lors de la suppression de la vignette !';
            }
        } else {
            $status = 'error';
            $msg = 'Erreur lors de la suppression de la vignette, l\'identifiant passé en paramètre est incorrect!';
        }
        return redirect('/admin')->with($status, $msg);
        return redirect('/admin/');
    }

    /**
     * Test si les champs ajoutés au formulaire sont conformes pour les envoyer dans la bdd ou non
     * @param  Request $request     Requète
     * @return []                   Continue l'execution dans la fonction ou renvoye une erreur à la vue précédente
     */
    private function validateFields(Request $request)
    {
        Validator::make($request->all(), [
            'legend' => 'required|max:70',
            'imageUrl' => 'required|max:255',
            'description' => 'required',
        ])->validate();
    }

}
