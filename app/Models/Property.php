<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function scopeSearch($query, $term, $field)
    {

        switch ($field) {
            case 'address':
                $query->where('address', 'like', "%{$term}%");
                break;
            case 'property_type':
                $propertyTypes = PropertyType::query()->where('title', 'like', "%{$term}%")
                    ->pluck('id')->toArray();
                $query->whereIn('id', $propertyTypes);
                break;
            case 'num_bedrooms':
            case 'price':
            case 'type':
                $query->where($field, $term);
                break;
        }

        return $query;
    }
}
