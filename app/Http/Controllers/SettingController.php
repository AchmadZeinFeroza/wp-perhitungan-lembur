<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;
use App\Repositories\SettingRepository;

class SettingController extends Controller
{
    
    public function __construct(SettingRepository $settingRepository )
    {
        $this->settingRepository = $settingRepository;
    }
/**
     * @OA\PATCH(
     *     path="/settings",
     *     tags={"settings"},
     *     summary="Returns a Sample API response",
     *     description="A sample settings to test out the API",
     *     operationId="settings",
     *     @OA\Parameter(
     *          name="value",
     *          description="id of references",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="key",
     *          description="Hanya Bisa diisi overtime_methode",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Setting Berhasil Diubah"),
     *              @OA\Property(property="data", type="array", example={{
 *                  "key": "overthime_method",
 *                  "value": "1",
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="key",
    *                         type="string",
    *                         example="overtime_method"
    *                      ),
    *                      @OA\Property(
    *                         property="value",
    *                         type="integer",
    *                         example="1"
    *                      ),
    *                ),),),),
         *     @OA\Response(
     *          response=500,
     *          description="invalid",
     *           @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Setting Tidak Berhasil Diubah"),
     *          )
     *      )
     *          )
     *     ),
     * 

     * )
     */
    public function update_setting(SettingRequest $request)
    {
        $response = $this->settingRepository->update($request);
        return $response;
    }
}
