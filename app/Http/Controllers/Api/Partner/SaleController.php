<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Services\SaleService;
use App\Http\Resources\SaleResource;

class SaleController extends Controller
{
    use ResponseTrait;
    public function __construct(protected SaleService $saleService) {}

    public function index()
    {
        try {
            $sales = $this->saleService->getPartnerSales(auth()->id());
            return $this->successResponse('Sales retrieved', SaleResource::collection($sales));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 422);
        }
    }
}
