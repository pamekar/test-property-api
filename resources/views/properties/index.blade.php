@extends('layouts.app')

@section('content')
    <div id="search">
        <form @submit.prevent="searchProperties" :action="`${endpoint}/properties/search`" method="get" class="pb-4">
            <div class="form-group">
                <label for="fields">Fields</label>
                <select class="form-control" id="fields" name="field" v-model="field" required>
                    <option disabled selected>Select Field</option>
                    <option value="address">Address</option>
                    <option value="num_bedrooms">Number of Bedrooms
                    </option>
                    <option value="price">Price</option>
                    <option value="property_type">Property Type
                    </option>
                    <option value="type">For Sale / For Rent</option>

                </select>
            </div>
            <div class="form-group">
                <label for="term">Term</label>
                <input class="form-control" id="term" name="term" v-model="term" value="" required>
            </div>
            <button type="submit" class="btn btn-outline-secondary">Term</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th>County</th>
                <th>Country</th>
                <th>Town</th>
                <th>Description</th>
                <th>Address</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Num Bedrooms</th>
                <th>Num Bathrooms</th>
                <th>Price</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="property in properties.data">
                <td>@{{ property.county }}</td>
                <td>@{{ property.country }}</td>
                <td>@{{ property.town }}</td>
                <td>@{{ property.description }}</td>
                <td>@{{ property.address }}</td>
                <td>@{{ property.latitude }}</td>
                <td>@{{ property.longitude }}</td>
                <td>@{{ property.num_bedrooms }}</td>
                <td>@{{ property.num_bathrooms }}</td>
                <td>@{{ property.price/100 }}</td>
                <td>@{{ property.type }}</td>
                <td>
                    <div class="btn-group">

                        <a class="btn btn-sm btn-outline-primary mx-1"
                           :href="`${endpoint}/properties/${property.id}`">
                            <span class="iconify" data-icon="simple-line-icons:eye" data-inline="false"></span>
                        </a>
                        <a class="btn btn-sm btn-outline-secondary mx-1"
                           :href="`${endpoint}/properties/${property.id}/edit`">
                            <span class="iconify" data-icon="simple-line-icons:note" data-inline="false"></span>
                        </a>
                        <form @submit.prevent="deleteProperty(property.id)"
                              :action="`${endpoint}/properties/${property.id}`" method="post">
                            <button type="submit" class="btn btn-sm btn-outline-danger mx-1">
                                <span class="iconify" data-icon="simple-line-icons:close" data-inline="false"></span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <span
            class="text-muted">Showing @{{ properties.from }} to @{{ properties.to }} of @{{ properties.total }} properties<br></span>
        <div class="btn-group">
            <button v-on:click="searchProperties(1)" class="btn btn-outline-primary" v-if="properties.current_page > 1">
                <span class="iconify" data-icon="simple-line-icons:arrow-left" data-inline="false"></span> Previous
            </button>

            <button v-on:click="searchProperties(properties.current_page - 1)" class="btn btn-outline-primary"
                    v-if="properties.current_page > 1">
                <span class="iconify" data-icon="simple-line-icons:arrow-left" data-inline="false"></span> Previous
            </button>
            <button class="btn btn-outline-primary" v-else disabled>
                <span class="iconify" data-icon="simple-line-icons:arrow-left" data-inline="false"></span> Previous
            </button>

            <button class="btn btn-primary" disabled>
                @{{ properties.current_page }}
            </button>

            <button v-on:click="searchProperties(n + properties.current_page)" class="btn btn-outline-primary"
                    v-for="n in paginationCount" v-if="(n + properties.current_page) < properties.last_page">@{{ n +
                properties.current_page }}
            </button>
            <button class="btn btn-outline-primary" disabled>...</button>

            <button v-on:click="searchProperties(properties.current_page + 1)" class="btn btn-outline-primary"
                    v-if="properties.current_page < properties.last_page">
                Next <span class="iconify" data-icon="simple-line-icons:arrow-right" data-inline="false"></span>
            </button>
            <button class="btn btn-outline-primary" v-else disabled>
                Next <span class="iconify" data-icon="simple-line-icons:arrow-right" data-inline="false"></span>
            </button>

            <button v-on:click="searchProperties(properties.last_page)" class="btn btn-outline-primary"
                    v-if="properties.current_page < properties.last_page">
                <span class="iconify" data-icon="simple-line-icons:arrow-right" data-inline="false"></span><span
                        class="iconify" data-icon="simple-line-icons:arrow-right" data-inline="false"></span>
            </button>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{public_asset("js/script.js")}}" type="text/javascript"></script>
@endsection
