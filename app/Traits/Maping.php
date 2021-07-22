<?php
namespace App\Traits;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

trait Maping {

    public static function mapAll(Model $model) {
        return $model::all()->map(function ($country) {
            return ['id' => $country->id, 'name' => $country->name];
        })->toArray();
    }

}

?>
