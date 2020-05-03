<?php

namespace App\Http\Controllers;

use App\Symptom;
use App\Disease;
use App\SymptomDisease;

use Illuminate\Http\Request;
use Illuminate\Http\Respone;

class SymptomCheckerController extends Controller
{


	public function index(){

		$hungarianData = $this->getHungarianCOVIDData();
		$globalData = $this->getGlobalCOVIDData();
		$symptoms = Symptom::orderBy('name')->get();

		return view('symptomChecker')->withHungarianData($hungarianData)->withGlobalData($globalData)->withSymptoms($symptoms);
	}

	public function getDiseasesBySymptoms(Request $request){
		$pickedSymptoms = $request->symptoms;

		$diseases = Disease::All();

		$exactMatch = [];

		foreach ($diseases as $key => $disease) {

			$symptoms = $disease->Symptoms;
			$symptomsCount = count($symptoms);

			$correspondingSymptomCount = 0;

			foreach ($symptoms as $symptom) {

				foreach ($pickedSymptoms as $pickedSymptom) {
					if ($symptom['id'] == $pickedSymptom) {
						$correspondingSymptomCount++;
					}
				}
			}
			$disease['correspondingSymptomCount'] = $correspondingSymptomCount;

			if ($symptomsCount == 0 || $correspondingSymptomCount == 0) {
				$disease['diseaseConcord'] = 0;
			}else{
				$disease['diseaseConcord'] = $correspondingSymptomCount / $symptomsCount;
			}

			if ($disease['diseaseConcord'] == 0) {
				unset($diseases[$key]);
			}

			if ($disease['diseaseConcord'] == 1) {
				$exactMatch[] = $diseases[$key];
				unset($diseases[$key]);
			}

		}

		$partialMatch = array_slice($this->orderDiseaseObjects($diseases), 0, 3);

		return response()->json(array(
		    'exact' => $exactMatch,
		    'partial' => $partialMatch
		));

	}


	private function orderDiseaseObjects($diseaseObjects){
        $c = collect($diseaseObjects);

        $diseaseObjects = $c->sortByDesc('diseaseConcord')->values();

        $finalDiseaseArray = [];
        foreach ($diseaseObjects as $disease) {
            $finalDiseaseArray[] = $disease;
        }

        return $finalDiseaseArray;
    }

	private function getHungarianCOVIDData(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://api.thevirustracker.com/free-api?countryTotal=HU",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		    ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
			$result = [];

			if(!isset($result['total_cases'])){ $result['total_cases'] = "No Data";}
			if(!isset($result['total_recovered'])){ $result['total_recovered'] = "No Data";}
			if(!isset($result['total_deaths'])){ $result['total_deaths'] = "No Data";}
			if(!isset($result['total_new_cases_today'])){ $result['total_new_cases_today'] = "No Data";}
			if(!isset($result['total_new_deaths_today'])){ $result['total_new_deaths_today'] = "No Data";}
			if(!isset($result['total_active_cases'])){ $result['total_active_cases'] = "No Data";}


			return $result;
		}

		$result = json_decode($response, true);

		if(isset($result['countrydata'][0])){$result = $result['countrydata'][0];}

		if(!isset($result['total_cases'])){ $result['total_cases'] = "No Data";}
		if(!isset($result['total_recovered'])){ $result['total_recovered'] = "No Data";}
		if(!isset($result['total_deaths'])){ $result['total_deaths'] = "No Data";}
		if(!isset($result['total_new_cases_today'])){ $result['total_new_cases_today'] = "No Data";}
		if(!isset($result['total_new_deaths_today'])){ $result['total_new_deaths_today'] = "No Data";}
		if(!isset($result['total_active_cases'])){ $result['total_active_cases'] = "No Data";}


		return $result;
	}


	private function getGlobalCOVIDData(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://api.thevirustracker.com/free-api?global=stats",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'Content-Type: application/json',
		    ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);

		if ($err) {
		  $result = [];

			if(!isset($result['total_cases'])){ $result['total_cases'] = "No Data";}
			if(!isset($result['total_recovered'])){ $result['total_recovered'] = "No Data";}
			if(!isset($result['total_deaths'])){ $result['total_deaths'] = "No Data";}
			if(!isset($result['total_new_cases_today'])){ $result['total_new_cases_today'] = "No Data";}
			if(!isset($result['total_new_deaths_today'])){ $result['total_new_deaths_today'] = "No Data";}
			if(!isset($result['total_active_cases'])){ $result['total_active_cases'] = "No Data";}


			return $result;
		}

		$result = json_decode($response, true);

		if(isset($result['results'][0])){	$result = $result['results'][0];}

		if(!isset($result['total_cases'])){ $result['total_cases'] = "No Data";}
		if(!isset($result['total_recovered'])){ $result['total_recovered'] = "No Data";}
		if(!isset($result['total_deaths'])){ $result['total_deaths'] = "No Data";}
		if(!isset($result['total_new_cases_today'])){ $result['total_new_cases_today'] = "No Data";}
		if(!isset($result['total_new_deaths_today'])){ $result['total_new_deaths_today'] = "No Data";}
		if(!isset($result['total_active_cases'])){ $result['total_active_cases'] = "No Data";}

		return $result;
	}

}
