<?php

namespace App\Jobs;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateAPIProperties implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    private $newProperties;

    /**
     * Create a new job instance.
     *
     * @param  array  $properties
     */
    public function __construct(array $properties)
    {
        $this->newProperties = $properties;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->newProperties as $newProperty) {
            $property = new Property();

            $propertyType = PropertyType::firstOrCreate(['title' => $newProperty['property_type']['title']],
                ['description' => $newProperty['property_type']['description']]);

            $property->property_uuid = $newProperty['uuid'];
            $property->property_type_id = $propertyType->id;
            $property->county = $newProperty['county'];
            $property->country = $newProperty['country'];
            $property->town = $newProperty['town'];
            $property->description = $newProperty['description'];
            $property->address = $newProperty['address'];
            $property->image_full = $newProperty['image_full'];
            $property->image_thumbnail = $newProperty['image_thumbnail'];
            $property->latitude = $newProperty['latitude'];
            $property->longitude = $newProperty['longitude'];
            $property->num_bedrooms = $newProperty['num_bedrooms'];
            $property->num_bathrooms = $newProperty['num_bathrooms'];
            $property->price = $newProperty['price'];
            $property->type = $newProperty['type'];

            $property->save();
        }
    }
}
