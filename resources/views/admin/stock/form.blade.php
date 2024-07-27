<div class="row padding-1 p-1">
    <div class="col-md-12">
        {{-- return back --}}
        <a href="{{ route('stocks.index') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
            <i class="bi bi-arrow-90deg-left"></i>
            {{ __('messages.Back') }}
        </a>

        <div class="form-group mb-2 mb20">
            <label for="product-select"> {{ __('messages.Choose a Product') }} </label>
            <div id="product-select" class="custom-select">
                <input type="text" id="product-search" class="form-control @error('product_id') is-invalid @enderror"
                    placeholder="Sélectionnez un produit" readonly>
                <input type="hidden" id="product-id" name="product_id"
                    value="{{ old('product_id', $stock->product_id) }}">
                <div id="dropdown" class="dropdown-content">
                    <input type="text" id="product-filter" class="form-control" placeholder="Rechercher un produit">
                    <select id="product-list" size="10" class="form-control">
                        <option value=""> {{ __('messages.Select a product') }} </option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->purchace_price }}"
                                data-sellingprice="{{ $product->selling_price }}"
                                data-wholesalePrice="{{ $product->wholesale_price }}" @selected(old('product_id', $stock->product_id) == $product->id)>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        </div>

        @if (Route::currentRouteName() === 'stocks.create' || Route::currentRouteName() === 'stocks.edit')
            <div class="form-group mb-2 mb20 row">
                <div class="col">
                    <label for="price" class="form-label">{{ __('messages.Buy Price') }}</label>
                    <input type="text" name="price" id="product-price"
                        class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $stock?->price) }}" id="price" placeholder="Price" readonly>
                    {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>

            </div>

            {{-- selling price --}}

            <div class="form-group mb-2 mb20 row">
                <div class="col">
                    <label for="price" class="form-label">{{ __('messages.Sell Price') }}</label>
                    <input type="text" name="wholesale_pice" id="product-selling-price"
                        class="form-control @error('wholesale_pice') is-invalid @enderror"
                        value="{{ old('wholesale_pice', $stock?->price) }}" placeholder="wholesale pice" readonly>
                    {!! $errors->first(
                        'wholesale_pice',
                        '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                    ) !!}
                </div>

                <div class="col">
                    <label for="price" class="form-label">{{ __('messages.Wholesale price') }}</label>
                    <input type="text" name="sellPrice" id="wholesale-price"
                        class="form-control @error('sellPrice') is-invalid @enderror"
                        value="{{ old('sellPrice', $stock?->price) }}" placeholder="Sell Price" readonly>
                    {!! $errors->first('sellPrice', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                </div>
            </div>
        @endif

        <div class="form-group mb-2 mb20">
            <label for="operation" class="form-label">{{ __('messages.Are you making a sale or purchase?') }}</label>
            <select name="operation" id="operation" class="form-control @error('operation') is-invalid @enderror">
                @foreach ($enumOperations as $operation)
                    <option value="{{ $operation }}" @selected(old('operation', $stock->operation) == $operation)>
                        {{ __('messages.' . $operation->value) }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('operation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20" aria-label="Basic radio toggle button group">

            <input type="radio" class="btn-check @error('operation_type') is-invalid @enderror"
                name="operation_type" id="operation_type_false" value="bulk"
                {{ old('operation_type', $stock?->operation_type) == 'Bulk' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary" for="operation_type_false">{{ __('messages.Bulk') }}</label>

            <label for="operation_type" class="form-check-label ml-2 mr-2" >{{ __('messages.Or') }}</label>

            <input type="radio" class="btn-check @error('operation_type') is-invalid @enderror" 
                name="operation_type" id="operation_type_true" value="in_detail"
                @if (Route::is('stocks.create'))
                    {{ old('operation_type', $stock?->operation_type) == ''  ? 'checked' : 'checked' }}>        
                 @else
                    {{ old('operation_type', $stock?->operation_type) == 'in_detail' ? 'checked' : '' }}>
                @endif
                <label class="btn btn-outline-primary" for="operation_type_true">{{ __('messages.In detail') }}</label>

            {!! $errors->first(
                'operation_type',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('messages.Quantity') }}</label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                value="{{ old('quantity', $stock?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('product-select');
        const productSearch = document.getElementById('product-search');
        const productId = document.getElementById('product-id');
        const dropdown = document.getElementById('dropdown');
        const productFilter = document.getElementById('product-filter');
        const productList = document.getElementById('product-list');
        const productPrice = document.getElementById('product-price');
        const productSellingPrice = document.getElementById('product-selling-price');
        const wholesalePrice = document.getElementById('wholesale-price');

        // Initial update of the product search field
        const selectedOption = productList.options[productList.selectedIndex];
        if (selectedOption && selectedOption.value !== "") {
            productSearch.value = selectedOption.text;
            productId.value = selectedOption.value;
        }

        // Toggle dropdown
        productSearch.addEventListener('click', function() {
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Filter products
        productFilter.addEventListener('keyup', function() {
            const filter = productFilter.value.toLowerCase();
            for (let i = 0; i < productList.options.length; i++) {
                const option = productList.options[i];
                const txtValue = option.textContent || option.innerText;
                option.style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        });

        // Select product
        productList.addEventListener('change', function() {
            const selectedOption = productList.options[productList.selectedIndex];
            productSearch.value = selectedOption.text;
            productId.value = selectedOption.value;
            productPrice.value = selectedOption.dataset.price;
            productSellingPrice.value = selectedOption.dataset.sellingprice;
            wholesalePrice.value = selectedOption.dataset.wholesaleprice;
            dropdown.style.display = 'none';
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!productSelect.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Log all products when the page is loaded
        const options = productList.options;
        const products = [];
        for (let i = 0; i < options.length; i++) {
            products.push({
                value: options[i].value,
                text: options[i].innerText,
                price: options[i].dataset.price,
                sellingPrice: options[i].dataset.sellingPrice,
                wholesalePrice: options[i].dataset.wholesaleprice,
            });
        }
        // console.log('All Products:', products);
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
