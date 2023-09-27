<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\BaseController;
use App\Models\DryerVents;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DryerVentsController extends BaseController
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
            $dryerVents = DryerVents::get()->toArray();

            $response['dryerVents'] = $dryerVents;
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
                'dryer_vent_exit_point',
                'price'
            );

            $user = $request->user();

            $dryerVents = DryerVents::create([
                'dryer_vent_exit_point' => $input['dryer_vent_exit_point'],
                'price' => $input['price'],
                'created_by' => $user->id
            ]);

            $response['dryerVents'] = $dryerVents;
            $response['message'] = 'Dryer vents created successfully.!';
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

            $dryerVent = DryerVents::where('id', $id)->first();

            if ($dryerVent) {
                $response['dryerVent'] = $dryerVent;
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
                'dryer_vent_exit_point',
                'price'
            );

            $user = $request->user();

            $dryerVent = DryerVents::where('id', $id)->first();

            if ($dryerVent) {
                $dryerVent->update([
                    'dryer_vent_exit_point' => $input['dryer_vent_exit_point'],
                    'price' => $input['price'],
                    'updated_by' => $user->id
                ]);

                $response['dryerVent'] = $dryerVent;
                $response['message'] = 'Dryer vent updated successfully.!';
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

            $dryerVent = DryerVents::where('id', $id)->first();

            if ($dryerVent) {
                $dryerVent->delete();
                $response['airDuct'] = 'Dryer vent deleted successfully.!';
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
}
