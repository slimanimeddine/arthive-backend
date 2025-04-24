<?php

namespace App\Http\Controllers\V1;

use App\Http\Resources\V1\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group Countries
 */
class CountryController extends ApiController
{
    /**
     * List Countries
     *
     * Retrieve a list of countries
     *
     * @apiResourceCollection scenario=Success App\Http\Resources\V1\CountryResource
     *
     * @apiResourceModel App\Models\Country
     */
    public function index(Request $request)
    {
        $countries = Cache::rememberForever('countries', function () {
            return Country::all();
        });

        return CountryResource::collection($countries);
    }
}
