<?php

namespace App\Http\Controllers;

use App\Models\Learningoffer;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class LearningofferController extends Controller
{
    public function index() {
        return view("welcome", ["users" => User::all()]);
    }

    /** alle Lernangebot erhalten
     * @return JsonResponse
     */

    public function getAllOffers():JsonResponse {
        $offers = Learningoffer::with(['subject_id', 'description', 'owner_id'])->get();
        return response()->json($offers, 200);
    }

    /** Lernangebot anhand von Id erhalten
     * @param int $id
     * @return Learningoffer|null
     */

    public function getOfferById(int $id){
        $offer = Learningoffer::where('id', $id)->first();
        return $offer != null ? $offer : null;
    }

    /** Lernangebot anhand von Id vorhanden?
     * @param int $id
     * @return JsonResponse
     */

    public function checkOfferById(int $id):JsonResponse {
        $offer = Learningoffer::where('id', $id)->first();
        return $offer != null ?
            response()->json(true, 200) :
            response()->json(false, 200);
    }

    // todo Methoden

    // Lernangebot annehmen
    // acceptOffer

    // Lernangebot erstellen
    // createOffer

    // Lernangebot löschen
    // deleteOffer

    // Lernangebot ändern
    // editOffer

}
