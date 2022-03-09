<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OvertimeRequest;
use App\Http\Requests\PayRequest;
use App\Repositories\OvertimeRepository;

class OvertimeController extends Controller
{
    public function __construct(OvertimeRepository $overtimeRepository )
    {
        $this->overtimeRepository = $overtimeRepository;
    }
/**
     *  @OA\GET(
     *     path="/overtimes",
     *     tags={"overtimes"},
     *     summary="Returns a Sample API response",
     *     description="A sample overtimes to test out the API",
     *     operationId="overtimes",
     *     @OA\Parameter(
     *          name="date_started",
     *          description="date with format Y:m:d",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="date_ended",
     *          description="date with format Y:m:d",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Ditemukan"),
     *              @OA\Property(property="data", type="array", example={{
 *                  "employee_id": "1",
 *                  "employee_name": "Achmad Zein Feroza",
 *                  "date": "2022-03-10",
 *                  "time_started": "15:00",
 *                  "time_ended": "19:00",
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="employee_id",
    *                         type="integer",
    *                         example="1"
    *                      ),
    *                      @OA\Property(
    *                         property="employee_name",
    *                         type="string",
    *                         example="Achmad Zein Feroza"
    *                      ),
    *                      @OA\Property(
    *                         property="date",
    *                         type="date",
    *                         example="2022-03-10"
    *                      ),
    *                      @OA\Property(
    *                         property="time_started",
    *                         type="date",
    *                         example="15:00"
    *                      ),
    *                      @OA\Property(
    *                         property="time_ended",
    *                         type="date",
    *                         example="19:00"
    *                      ),
    *                ),),),),
         *     @OA\Response(
     *          response=404,
     *          description="invalid",
     *           @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Tidak Ditemukan"),
     *          )
     *      )
     *          )
     *     ),
     * 

     * )
     */
    public function show(OvertimeRequest $request)
    {
        return $this->overtimeRepository->show($request);
    }

    /**
     *  @OA\POST(
     *     path="/overtimes",
     *     tags={"overtimes"},
     *     summary="Returns a Sample API response",
     *     description="A sample overtimes to test out the API",
     *     operationId="overtimes-post",
     *     @OA\Parameter(
     *          name="employee_id",
     *          description="id of employee",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="date",
     *          description="date with format Y:m:d",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="time_started",
     *          description="time with format HH:mm",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="time_ended",
     *          description="time with format HH:mm",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Berhasil Ditambahkan"),
     *              @OA\Property(property="data", type="array", example={{
 *                  "id": "1",
 *                  "employee_id": "1",
 *                  "date": "2022-03-10",
 *                  "time_started": "15:00",
 *                  "time_ended": "19:00",
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="id",
    *                         type="integer",
    *                         example="1"
    *                      ),
    *                      @OA\Property(
    *                         property="employee_id",
    *                         type="integer",
    *                         example="1"
    *                      ),
    *                      @OA\Property(
    *                         property="date",
    *                         type="date",
    *                         example="2022-03-10"
    *                      ),
    *                      @OA\Property(
    *                         property="time_started",
    *                         type="date",
    *                         example="15:00"
    *                      ),
    *                      @OA\Property(
    *                         property="time_ended",
    *                         type="date",
    *                         example="19:00"
    *                      ),
    *                ),),),),
         *     @OA\Response(
     *          response=500,
     *          description="invalid",
     *           @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Tidak Berhasil Ditambahkan"),
     *          )
     *      )
     *          )
     *     ),
     * 

     * )
     */
    public function store(OvertimeRequest $request)
    {
        return $this->overtimeRepository->post($request);    
    }

    /**
     *  @OA\GET(
     *     path="/overtime-pays/calculate",
     *     tags={"overtimes-pays"},
     *     summary="Returns a Sample API response",
     *     description="A sample overtimes to test out the API",
     *     operationId="overtimes-pays",
     *     @OA\Parameter(
     *          name="month",
     *          description="date with format Y:m",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="date"
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="name", type="string", example="Achmad Zein Feroza"),
     *              @OA\Property(property="status_id", type="array", example={{
 *                  "name": "Achmad Zein Feroza",
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="name",
    *                         type="string",
    *                         example="Achmad Zein Feroza"
    *                      ),
    *                ),),
     *              @OA\Property(property="salary", type="integer", example="2000000"),           
     *              @OA\Property(property="overtime", type="array", example={{
 *                  "id": "1",
 *                  "date": "2022-03-10",
 *                  "time_started": "15:00",
 *                  "time_ended": "19:00",
 *                  "time_hours": "4",
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="id",
    *                         type="integer",
    *                         example="1"
    *                      ),
    *                      @OA\Property(
    *                         property="date",
    *                         type="date",
    *                         example="2022-03-10"
    *                      ),
    *                      @OA\Property(
    *                         property="time_started",
    *                         type="date",
    *                         example="15:00"
    *                      ),
    *                      @OA\Property(
    *                         property="time_ended",
    *                         type="date",
    *                         example="19:00"
    *                      ),
    *                      @OA\Property(
    *                         property="time_hours",
    *                         type="date",
    *                         example="4"
    *                      ),
    *                ),),),
*              @OA\Property(property="salary_month", type="integer", example="80000"),  
     *             @OA\Property(property="total_hours_month", type="integer", example="8"),    
     *          ),
     *      *     @OA\Response(
     *          response=404,
     *          description="invalid",
     *           @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Tidak Ditemukan"),
     *          )
     *      )
     *     ),
     * 

     * )
     */
    public function pay(PayRequest $request)
    {
        return $this->overtimeRepository->pay($request);
    }
}
