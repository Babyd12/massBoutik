<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="title" class="form-label">{{ __('messages.Title') }}</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $unitPerPack?->title) }}" id="title" placeholder="Douzaine">
            {!! $errors->first('title', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="number" class="form-label">{{ __('messages.Number') }}</label>
            <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number', $unitPerPack?->number) }}" id="number" placeholder="12">
            {!! $errors->first('number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
    </div>
</div>