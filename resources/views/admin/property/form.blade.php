@csrf
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="county">County</label>
            <input name="county" id="county" class="form-control" type="text"
                   value="{{ old('county', isset($property) ? $property->county->name : '') }}">
        </div>
        <div class="col">
            <label for="country">Country</label>
            <input name="country" id="country" class="form-control" type="text"
                   value="{{ old('country', isset($property) ? $property->country->name : '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="displayable_address">Displayable Address</label>
            <input name="displayable_address" id="displayable_address" class="form-control"
                   type="text" value="{{ old('displayable_address', isset($property) ? $property->displayable_address : '') }}">
        </div>
        <div class="col">
            <label for="postcode">Postcode</label>
            <input name="postcode" id="postcode" class="form-control"
                   type="text" value="{{ old('postcode', isset($property) ? $property->postcode : '') }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description"
              class="form-control" rows="7">{{ old('description', isset($property) ? $property->description : '') }}</textarea>
</div>
<!-- Image Upload -->
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="number_of_bedrooms">Number of bedrooms</label>
            <select name="number_of_bedrooms" id="number_of_bedrooms" class="form-control">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" @if(isset($property) && $property->number_of_bedrooms == $i) selected @endif>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
        <div class="col">
            <label for="number_of_bathrooms">Number of bathrooms</label>
            <select name="number_of_bathrooms" id="number_of_bathrooms" class="form-control">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" @if(isset($property) && $property->number_of_bathrooms == $i) selected @endif>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input name="price" id="price" class="form-control"
           type="text" value="{{ old('price', isset($property) ? $property->price : '') }}">
</div>
<div class="form-group">
    <label for="property_type">Property Type</label>
    <select name="property_type" id="property_type" class="form-control">
        @foreach($propertyTypes as $propertyType)
            <option value="{{ $propertyType->title }}"
                    @if(isset($property) && $property->propertyType->title == $propertyType->title) selected @endif>
                {{ $propertyType->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="contract_type">Contract Type</label><br>
    <div class="form-check form-check-inline">
        <input id="contract_type_rent" class="form-check-input" type="radio" name="contract_type"
               value="rent" @if(isset($property) && $property->contract_type == 'rent') checked="checked" @endif>
        <label class="form-check-label" for="contract_type_rent">Rent</label>
    </div>
    <div class="form-check form-check-inline">
        <input id="contract_type_sale" class="form-check-input" type="radio" name="contract_type"
               value="sale" @if(isset($property) && $property->contract_type == 'sale') checked="checked" @endif>
        <label class="form-check-label" for="contract_type_sale">Sale</label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
