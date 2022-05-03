<?php

namespace App\Http\Controllers;

use App\Models\Learningoffer;
use App\Models\Meetingdate;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LearningofferController extends Controller
{
    /** liefert alle Lernangebote -------------------------------------------------------------------------
     * @return JsonResponse
     */

    public function getAllOffers():JsonResponse {
        $offers = Learningoffer::with(['subject', 'owner', 'learner', 'meetingdates'])->get();
        return response()->json($offers, 200);
    }

    /** liefert Lernangebot anhand von Id -------------------------------------------------------------------------
     * @param int $id
     * @return Learningoffer|null
     */

    public function getOfferById(int $id):?Learningoffer {
        $offer = Learningoffer::where('id', $id)->with(['subject', 'owner', 'learner', 'meetingdates'])->first();
        return $offer != null ? $offer : null;
    }

    /** Lernangebot mit der Id vorhanden? -------------------------------------------------------------------------
     * @param int $id
     * @return JsonResponse
     */

    public function checkOfferById(int $id):JsonResponse {
        $offer = Learningoffer::where('id', $id)->first();
        return $offer != null ?
            response()->json(true, 200) :
            response()->json(false, 200);
    }

    /** Lernangebot erstellen -------------------------------------------------------------------------
     * @param Request $request
     * @return JsonResponse
     * todo owner_id von aktuell eingeloggtem User richtig mitgeben, und nur wenn is_learner false
     */

    public function createOffer(Request $request):JsonResponse {
        DB::beginTransaction();
        try {
            // Massen-Zuweisung für subject_id, description, owner_id, learner_id, accepted_at (fillable-Array)
            $offer = Learningoffer::create($request->all());
            // Zuweisung meetingdates
            if (isset($request['dates']) && is_array($request['dates'])) {
                foreach ($request['dates'] as $meetingdate) {
                    if (isset($meetingdate['day']) && isset($meetingdate['from']) && isset($meetingdate['to'])){
                        $dayDate = new Carbon($meetingdate['day']);
                        $fromDate = new Carbon($meetingdate['from']);
                        $toDate = new Carbon($meetingdate['to']);
                        $meetingdateDate = Meetingdate::firstOrNew([
                            'day' => $dayDate,
                            'from' => $fromDate,
                            'to' => $toDate
                        ]);
                        $offer->meetingdates()->save($meetingdateDate);
                    }
                    else {var_dump();}
                }
            }
            DB::commit();
            return response()->json($offer, 201);
        } catch (Exception $exception) {
            var_dump();
            DB::rollback();
            return response()->json('Fehler beim Speichern des Lernangebots: '.$exception->getMessage(), 420);
        }
    }

    /** Lernangebot ändern -------------------------------------------------------------------------
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * todo nur wenn is_learner false
     */

    public function editOffer(Request $request, string $id):JsonResponse {
        DB::beginTransaction();
        try {
            $offer = Learningoffer::where('id', $id)->with(['meetingdates'])->first();
            if($offer != null){
                // Zuweisung subject_id, description
                $offer->update($request->all());
                // Zuweisung meetingdates
                $dateIds = [];
                if (isset($request['dates']) && is_array($request['dates'])) {
                    foreach ($request['dates'] as $meetingdate) {
                        if (isset($meetingdate['day']) && isset($meetingdate['from']) && isset($meetingdate['to'])){
                            $dayDate = new Carbon($meetingdate['day']);
                            $fromDate = new Carbon($meetingdate['from']);
                            $toDate = new Carbon($meetingdate['to']);
                            $existingDate = Meetingdate::where('day', $dayDate)
                                ->where('from', $fromDate)
                                ->where('to', $toDate)->first();
                            if($existingDate){
                                array_push($dateIds, $existingDate['id']);
                            }
                            else {
                                $meetingdateDate = Meetingdate::firstOrNew([
                                    'day' => $dayDate,
                                    'from' => $fromDate,
                                    'to' => $toDate
                                ]);
                                $offer->meetingdates()->save($meetingdateDate);
                                array_push($dateIds, $meetingdateDate['id']);
                            }
                        }
                        else {var_dump();}
                    }
                    $offer->meetingdates()->sync($dateIds);
                    $offer->save();
                }
            }
            else {var_dump();}
            DB::commit();
            $savedOffer = Learningoffer::where('id', $id)->with(['subject', 'owner', 'learner', 'meetingdates'])->first();
            return response()->json($savedOffer, 201);
        } catch (Exception $exception) {
            DB::rollback();
            return response()->json('Fehler beim Bearbeiten des Lernangebots: '.$exception->getMessage(), 420);
        }
    }

    /** Lernangebot annehmen -------------------------------------------------------------------------
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     * todo nur wenn is_learner true
     */

    public function acceptOffer(Request $request, string $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $offer = Learningoffer::where('id', $id)->with(['learner'])->first();
            if ($offer != null) {
                if (!isset($request['accepted_at'])) {
                    $request->request->add(['accepted_at' => Carbon::now()->toDateString()]);
                }
                $offer->update($request->all());
            } else {
                var_dump();
            }
            DB::commit();
            $savedOfferWithLearner = Learningoffer::where('id', $id)->with(['learner'])->first();
            return response()->json($savedOfferWithLearner, 201);
        } catch (Exception $exception) {
            DB::rollback();
            return response()->json('Fehler beim Zuweisen des Lernenden: ' . $exception->getMessage(), 420);
        }
    }

    /** Lernangebot löschen -------------------------------------------------------------------------
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     * todo nur wenn is_learner false
     */

    public function deleteOffer(int $id):JsonResponse {
        $offer = Learningoffer::where('id', $id)->first();
        if ($offer != null) $offer->delete();
        else throw new \Exception("Lernangebot existiert nicht und kann daher nicht gelöscht werden!");
        return response()->json('Lernangebot (ID: '.$id.') wurde erfolgreich gelöscht!', 200);
    }
}
