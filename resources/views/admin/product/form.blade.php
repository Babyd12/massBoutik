<div class="row padding-1 p-1">
    <div class="col-md-12">
        @buttonBack(['route' => 'products.index'])
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('messages.Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchace_price" class="form-label">{{ __('messages.Purchaseprice') }}</label>
            <input type="text" name="purchace_price" class="form-control @error('purchace_price') is-invalid @enderror" value="{{ old('purchace_price', $product?->purchace_price) }}" id="purshace_price" placeholder="Purshaceprice">
            {!! $errors->first('purchace_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="selling_price" class="form-label">{{ __('messages.Sellingprice') }}</label>
            <input type="text" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror" value="{{ old('selling_price', $product?->selling_price) }}" id="selling_price" placeholder="Sellingprice">
            {!! $errors->first('selling_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="btn-group" aria-label="Basic radio toggle button group"> 
            <!-- Radio Button for Disable -->
            <input type="radio" class="btn-check @error('state') is-invalid @enderror"  name="state" id="state_false" value="0"
                   {{ old('state', $product?->state) == 0 ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="state_false">{{ __('messages.Disable') }}</label>

            <!-- Radio Button for Enable -->
            <input type="radio" class="btn-check @error('state') is-invalid @enderror" name="state" id="state_true" value="1"
                   @if (Route::is('products.create'))
                        {{ old('state', $product?->state) == 1  ? 'checked' : 'checked' }}>
                    @else
                        {{ old('state', $product?->state) == 1  ? 'checked' : '' }}>
                    @endif
            <label class="btn btn-outline-primary" for="state_true">{{ __('messages.Enable') }}</label>
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="unit_per_pack_id" class="form-label">{{ __('Unit Per Pack Id') }}</label>
            <select  name="unit_per_pack_id" id="unit_per_pack_id" class="form-control @error('unit_per_pack_id') is-invalid @enderror" >
              @foreach ($unitPerPack as $unit)
                <option value="{{$unit->id}}" @selected(old('unit_per_pack_id', $unit->id == $product->unit_per_pack_id )) > {{$unit->title}} </option>
              @endforeach
              {!! $errors->first('unit_per_pack_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </select>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
    </div>
</div>