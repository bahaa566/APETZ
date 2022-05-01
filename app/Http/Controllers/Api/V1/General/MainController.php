<?php

namespace App\Http\Controllers\Api\V1\General;

use app\Helpers\ApiResponder;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\General\{ComplaintRequest};
use App\Http\Resources\Api\General\{TypeResource, AnimalResource, SplashResource, AdvertisementResource};
use App\Models\{Advertisement, Animal, Splash, Type, Setting};
use Illuminate\Http\JsonResponse as Response;

class MainController extends Controller
{

    /**
     * get countries
     *
     * @return Response
     */
    public function animals(): Response
    {
        return ApiResponder::handleResources(Animal::active()->get(), AnimalResource::class);
    }

    /**
     * get types
     *
     * @param int $animal_id
     * @return Response
     */
    public function types($animal_id = null): Response
    {
        return ApiResponder::handleResources(Type::with('animal')
            ->ofAnimal($animal_id)
            ->active()
            ->get(), TypeResource::class);
    }



    /**
     * get setting by name
     *
     * @param string $name optional
     * @return Response
     */
    public function settings($name = null): Response
    {
        return ApiResponder::success(Helper::getSettings());
    }

    /**
     * save users complaints to storage
     *
     * @param ComplaintRequest $request
     * @return Response
     */
    public function complaints(ComplaintRequest $request): Response
    {
        $request->user()->complaints()->create($request->validated());

        return ApiResponder::success(message: __('Created Successfully, We Will Contact You Soon'));
    }
}
