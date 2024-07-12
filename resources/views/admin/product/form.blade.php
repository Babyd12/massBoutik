<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purshace_price" class="form-label">{{ __('Purshaceprice') }}</label>
            <input type="text" name="purshacePrice" class="form-control @error('purshacePrice') is-invalid @enderror" value="{{ old('purshacePrice', $product?->purshacePrice) }}" id="purshace_price" placeholder="Purshaceprice">
            {!! $errors->first('purshacePrice', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="selling_price" class="form-label">{{ __('Sellingprice') }}</label>
            <input type="text" name="sellingPrice" class="form-control @error('sellingPrice') is-invalid @enderror" value="{{ old('sellingPrice', $product?->sellingPrice) }}" id="selling_price" placeholder="Sellingprice">
            {!! $errors->first('sellingPrice', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="btn-group " aria-label="Basic checkbox toggle button group">
            <label for="state" class="btn btn-outline-primar">{{ __('Enable') }}
                <input type="checkbox" name="state" class="form-check-input @error('state') is-invalid @enderror" value = {{ old('state', $product?->state) ? 'checked' : '1' }} id="state" >
            </label>

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
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>