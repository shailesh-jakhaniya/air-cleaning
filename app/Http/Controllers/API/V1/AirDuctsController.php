<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Models\AirDucts;
use App\Models\DryerVents;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AirDuctsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [];

        try {
            $airDucts = AirDucts::get()->toArray();

            $response['airDuct'] = $airDucts;
            $this->setStatusCode(200);
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = [];

        try {
            $input = $request->only(
                'num_of_furnace',
                'furnace_loc_sidebyside',
                'furnace_loc_different',
                'square_footage_min',
                'square_footage_max',
                'final_price'
            );

            $user = $request->user();

            $airDuct = AirDucts::create([
                'num_of_furnace' => $input['num_of_furnace'],
                'furnace_loc_sidebyside' => $input['furnace_loc_sidebyside'],
                'furnace_loc_different' => $input['furnace_loc_different'],
                'square_footage_min' => $input['square_footage_min'],
                'square_footage_max' => $input['square_footage_max'],
                'final_price' => $input['final_price'],
                'created_by' => $user->id
            ]);

            $response['airDuct'] = $airDuct;
            $response['message'] = 'Air Duct created successfully.!';
            $this->setStatusCode(200);
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = [];

        try {

            $airDuct = AirDucts::where('id', $id)->first();

            if ($airDuct) {
                $response['airDuct'] = $airDuct;
                $this->setStatusCode(200);
            } else {
                $response['message'] = 'No record found.';
                $this->setStatusCode(404);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = [];

        try {
            $input = $request->only(
                'id',
                'num_of_furnace',
                'furnace_loc_sidebyside',
                'furnace_loc_different',
                'square_footage_min',
                'square_footage_max',
                'final_price'
            );

            $user = $request->user();

            $airDuct = AirDucts::where('id', $id)->first();

            if ($airDuct) {
                $airDuct->update([
                    'num_of_furnace' => $input['num_of_furnace'],
                    'furnace_loc_sidebyside' => $input['furnace_loc_sidebyside'],
                    'furnace_loc_different' => $input['furnace_loc_different'],
                    'square_footage_min' => $input['square_footage_min'],
                    'square_footage_max' => $input['square_footage_max'],
                    'final_price' => $input['final_price'],
                    'updated_by' => $user->id
                ]);

                $response['airDuct'] = $airDuct;
                $response['message'] = 'Air Duct updated successfully.!';
                $this->setStatusCode(200);
            } else {
                $response['message'] = 'No record found.!';
                $this->setStatusCode(404);
            }
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [];

        try {

            $airDuct = AirDucts::where('id', $id)->first();

            if ($airDuct) {
                $airDuct->delete();
                $response['airDuct'] = 'Air duct deleted successfully.!';
                $this->setStatusCode(200);
            } else {
                $response['message'] = 'No record found.';
                $this->setStatusCode(404);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }

    public function businessRules()
    {
        $response = [];

        try {

            $airDucts = AirDucts::get()->toArray();
            $dryerVents = DryerVents::get()->toArray();

            $response['airDucts'] = $airDucts;
            $response['dryerVents'] = $dryerVents;
            $response['exitPoints'] = [
                'ZEROTOTENFEET' => '0-10 Feet Off the Ground',
                'TENPLUSFEET' => '10+ Feet Off the Ground',
                'ROOFTOP' => 'Rooftop'
            ];
            $response['numFurnaces'] = [
                'ONE' => '1',
                'TWO' => '2',
                'THREEPLUS' => '3+'
            ];

            $this->setStatusCode(200);
        } catch (Exception $ex) {
            Log::error($ex);
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(500);
        }

        return $this->respond($response);
    }
}
