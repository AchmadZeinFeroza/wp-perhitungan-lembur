<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\EmployeeRepository;

class EmployeeController extends Controller
{

    public function __construct(EmployeeRepository $employeeRepository )
    {
        $this->employeeRepository = $employeeRepository;
    }


    /**
     *  @OA\GET(
     *     path="/employees",
     *     tags={"employees"},
     *     summary="Returns a Sample API response",
     *     description="A sample employees to test out the API",
     *     operationId="employees",
     *     @OA\Parameter(
     *          name="per_page",
     *          description="list total data for one page",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="page",
     *          description="number of page",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="order_by",
     *          description="only can fill with 'name' or 'salary'",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="order_type",
     *          description="only can fill with 'ASC' or 'DESC'",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="id", type="integer", example="1"),
     *              @OA\Property(property="name", type="string", example="Achmad Zein Feroza"),
     *              @OA\Property(property="status_id", type="integer", example="3"),
     *              @OA\Property(property="status", type="array", example={{
 *                  "name": "Tetap"
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="name",
    *                         type="string",
    *                         example="Tetap"
    *                      ),
    *                ),),),
    *              @OA\Property(property="salary", type="integer", example="2000000"),
     *          )
     *     ),
     * )
     */
    public function show(EmployeeRequest $request)
    {
        return $this->employeeRepository->findAll(request());
    }

        /**
     *  @OA\POST(
     *     path="/employees",
     *     tags={"employees"},
     *     summary="Returns a Sample API response",
     *     description="A sample employees to test out the API",
     *     operationId="employees-post",
     *     @OA\Parameter(
     *          name="name",
     *          description="must be unique and min 2 character",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="status_id",
     *          description="id of references, only can fill with 3,4",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="salary",
     *          description="only can fill between 2000000 - 10000000",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Berhasil Ditambahkan"),
     *              @OA\Property(property="data", type="array", example={{
 *                  "name": "Achmad Zein Feroza",
 *                  "status_id": "3",
 *                  "salary": "2000000"
 *                  }},
    *                @OA\Items(
    *                      @OA\Property(
    *                         property="name",
    *                         type="string",
    *                         example="Achmad Zein Feroza"
    *                      ),
    *                      @OA\Property(
    *                         property="status_id",
    *                         type="integer",
    *                         example="3"
    *                      ),
    *                      @OA\Property(
    *                         property="salary",
    *                         type="integer",
    *                         example="2000000"
    *                      ),
    *                ),),),
    *              @OA\Property(property="salary", type="integer", example="2000000"),
     *          ),
     *      *     @OA\Response(
     *          response=500,
     *          description="invalid",
     *           @OA\JsonContent(
     *              @OA\Property(property="msg", type="string", example="Data Tidak Berhasil Ditambahkan"),
     *          )
     *      )
     *     ),
     * )
     */

    public function store(EmployeeRequest $request)
    {
        return $this->employeeRepository->post($request);
    }
}
