<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $productLend?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="lend_id" class="form-label">{{ __('Lend Id') }}</label>
            <input type="text" name="lend_id" class="form-control @error('lend_id') is-invalid @enderror" value="{{ old('lend_id', $productLend?->lend_id) }}" id="lend_id" placeholder="Lend Id">
            {!! $errors->first('lend_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $productLend?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>