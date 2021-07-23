<?php
namespace App\Traits;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

trait Maping {
    public static function mapAll($collection) {
        return $collection->map(function ($country) {
            return ['id' => $country->id, 'name' => $country->name];
        })->toArray();
    }
}

?>
