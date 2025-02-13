<div class="row padding-1 p-1">
    <div class="col-md-12">
        <a href="{{ route('lends.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
            <i class="bi bi-arrow-90deg-left"></i>
            {{ __('messages.Back') }}
        </a>
        @alertSuccesOrDanger
        <div class="form-group mb-2 mb20">
            <label for="item-select"> {{ __('messages.Choose a Product') }} </label>
            <div id="item-select" class="custom-select">
                <input type="text" id="item-search" class="form-control @error('product_id') is-invalid @enderror"
                    placeholder="Sélectionnez un produit" readonly>
                <input type="hidden" id="item-hidden" name="product_id" value="{{ old('product_id',  $lend->productLends->first()->product_id ?? '') }}">
                <div id="item-dropdown" class="dropdown-content">
                    <input type="text" id="item-filter" class="form-control" placeholder="Rechercher un produit">

                    <select id="item-list" size="10" class="form-control">
                        <option value=""> {{ __('messages.Select a product') }} </option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->purshacePrice }}"
                                data-sellingprice="{{ $product->sellingPrice }}" @selected(old('product_id', $lend->productLends->first()->product_id ?? '') == $product->id)>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="user-select"> {{ __('messages.Choose a User') }} </label>
            <div id="user-select" class="custom-select">
                <input type="text" id="user-search" class="form-control @error('user_id') is-invalid @enderror"
                    placeholder="Sélectionnez un utilisateur" readonly>
                <input type="hidden" id="user-hidden" name="user_id" value="{{ old('user_id', $lend->productLends->first()->user_id ?? '') }}"> 
                <div id="user-dropdown" class="dropdown-content">
                    <input type="text" id="user-filter" class="form-control" placeholder="Rechercher un utilisateur">
                    <select id="user-list" size="10" class="form-control">
                        <option value=""> {{ __('messages.Select a user') }} </option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-name="{{ $user->full_name }}"
                                @selected(old('user_id', $lend->productLends->first()->user_id ?? '') == $user->id)>
                                {{ $user->full_name }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Quantité -->
            <div class="col-md-6 form-group mb-2">
              <label for="quantity" class="form-label">{{ __('messages.Quantity') }}</label>
              <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                     value="{{ old('quantity', $lend?->quantity) }}" id="quantity" placeholder="Quantity">
              {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
         
            <!-- Type d'Opération -->
            <div class="col-md-6 form-group mb-2">
              <label class="form-label">{{ __('messages.Operation type') }}</label>
              <div class="d-flex align-items-center">
                <div class="form-check me-3">
                  <input type="radio" class="btn-check @error('operation_type') is-invalid @enderror" name="operation_type"
                         id="operation_type_bulk" value="bulk"
                         {{ old('operation_type', $lend?->operation_type) == 'bulk' ? 'checked' : '' }}>
                  <label class="btn btn-outline-primary" for="operation_type_bulk">{{ __('messages.Bulk') }}</label>
                </div>

                <label for=""> {{ __('messages.Or') }} </label>
                <div class="form-check me-3">
                  <input type="radio" class="btn-check @error('operation_type') is-invalid @enderror" name="operation_type"
                         id="operation_type_in_detail" value="in_detail"
                         {{ old('operation_type', $lend?->operation_type) == 'in_detail' ? 'checked' : '' }}>
                  <label class="btn btn-outline-primary" for="operation_type_in_detail">{{ __('messages.In detail') }}</label>
                </div>
              </div>
              {!! $errors->first('operation_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
          

        <div class="form-group mb-2 mb20">
            <label for="advance" class="form-label">{{ __('messages.advance') }}</label>
            <input type="text" name="advance" class="form-control @error('advance') is-invalid @enderror"
                value="{{ old('advance', $lend?->advance) }}" id="advance" placeholder="advance">
            {!! $errors->first('advance', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="form-group mb-2 mb20" aria-label="Basic radio toggle button group">
            <label for="payment_status" class="form-check-label">{{ __('messages.State') }}</label><br>

            <input type="radio" class="btn-check @error('payment_status') is-invalid @enderror" name="payment_status" id="state_true"
                value="1" {{ old('payment_status', $lend?->payment_status) == 1 ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="state_true">{{ __('messages.Paid') }}</label>

            <input type="radio" class="btn-check @error('state') is-invalid @enderror" name="payment_status"
                id="state_false" value="0" {{ old('payment_status', $lend?->payment_status) == 0 ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="state_false">{{ __('messages.Outstanding payment') }}</label>

            {!! $errors->first('payment_status', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>



    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    function setupDropdown(selectId, searchId, hiddenId, dropdownId, filterId, listId) {
        const selectElem = document.getElementById(selectId);
        const searchElem = document.getElementById(searchId);
        const hiddenElem = document.getElementById(hiddenId);
        const dropdownElem = document.getElementById(dropdownId);
        const filterElem = document.getElementById(filterId);
        const listElem = document.getElementById(listId);

        // Initial update of the search field
        const selectedOption = listElem.querySelector(`option[value="${hiddenElem.value}"]`);
        if (selectedOption) {
            searchElem.value = selectedOption.textContent || selectedOption.innerText;
            selectElem.value = selectedOption.textContent;
            // hiddenElem.value = selectedOption.value;

        }

        // Toggle dropdown
        searchElem.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent click propagation to avoid immediate closure of the dropdown
            dropdownElem.style.display = dropdownElem.style.display === 'block' ? 'none' : 'block';
        });

        // Filter items
        filterElem.addEventListener('keyup', function() {
            const filter = filterElem.value.toLowerCase();
            for (let i = 0; i < listElem.options.length; i++) {
                const option = listElem.options[i];
                const txtValue = option.textContent || option.innerText;
                option.style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        });
        
        // Select item
        listElem.addEventListener('change', function() {
            const selectedOption = listElem.options[listElem.selectedIndex];
            if (selectedOption) {
                searchElem.value = selectedOption.textContent || selectedOption.innerText;
                hiddenElem.value = selectedOption.value;
                dropdownElem.style.display = 'none'; // Hide the dropdown after selection
            }
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!selectElem.contains(event.target)) {
                dropdownElem.style.display = 'none';
            }
        });
    }

    // Initialize dropdowns
    setupDropdown('item-select', 'item-search', 'item-hidden', 'item-dropdown', 'item-filter', 'item-list');
    setupDropdown('user-select', 'user-search', 'user-hidden', 'user-dropdown', 'user-filter', 'user-list');
});

</script>



<style>
    .custom-select {
        position: relative;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        width: 100%;
    }

    .dropdown-content input {
        margin: 5px;
    }

    .dropdown-content select {
        list-style-type: none;
        padding: 0;
        margin: 0;
        max-height: 200px;
        overflow-y: auto;
    }

    .dropdown-content select option {
        padding: 8px 16px;
        cursor: pointer;
    }

    .dropdown-content ul li:hover {
        background-color: #ddd;
    }
</style>
