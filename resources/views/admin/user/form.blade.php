<div class="row padding-1 p-1">
    <div class="col-md-12">
        @buttonBack(['route' => 'users.index'])
        <div class="form-group mb-2 mb20">
            <label for="full_name" class="form-label">{{ __('messages.Full Name') }}</label>
            <input type="text" name="full_name"
                class="form-control is-valid  @error('full_name') is-invalid @enderror  "
                value="{{ old('full_name', $user?->full_name) }}" id="full_name" placeholder="Full Name">
            {!! $errors->first('full_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            <div class="valid-feedback">
                {{ __('messages.This field is required') }}
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nick_name" class="form-label">{{ __('messages.Nick Name') }}</label>
            <input type="text" name="nick_name" class="form-control @error('nick_name') is-invalid @enderror"
                value="{{ old('nick_name', $user?->nick_name) }}" id="nick_name" placeholder="Nick Name">
            {!! $errors->first('nick_name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <input type="hidden" name="role" value="customer">
        <div class="row ">

            <div class="form-group mb-2 mb20 col-auto" style="width: 10%;">
                <label for="indicative" class="form-label">{{ __('messages.Indicative') }}</label>
                <input type="text" name="indicative" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('indicative', $user?->phone_id ?? '221') }}" id="indicative" placeholder="Indicative">
                {!! $errors->first('indicative', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>

            <div class="form-group mb-2 mb20  col-auto">
                <label for="phone" class="form-label">{{ __('messages.Phone') }}</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $user?->phone_id) }}" id="phone_id" placeholder="Phone number">
                {!! $errors->first('phone', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="description" class="form-label">{{ __('messages.Description') }}</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description">{{ old('description', $user?->description) }}</textarea>
            {!! $errors->first('description', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}

        </div>
        <div class="form-group mb-2 mb20">
            <label for="picture" class="form-label">{{ __('messages.Picture') }}</label>
            <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" value="{{ old('picture', $user?->picture) }}" id="picture" placeholder="Picture">
            {!! $errors->first('picture', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('messages.Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="role" class="form-control @error('role') is-invalid @enderror" value="admin" id="role" placeholder="Role">
        </div>
      

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
