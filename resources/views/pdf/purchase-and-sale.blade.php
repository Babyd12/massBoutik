<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} {{ $date }} </title>

    <style>
        /* Corps du document */
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        /* Structure des tableaux */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        /* Style des cellules d'en-tête */
        th,
        td {
            padding: 0.5rem;
            text-align: center;
            border: 1px solid black;
        }

        /* Style spécifique pour les en-têtes */
        th {
            background-color: #182c3f;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 12px;
        }

        /* Style des lignes du tableau */
        tbody tr {
            background-color: rgb(241, 245, 249);
        }

        /* Style des éléments du tableau */
        tfoot tr td {
            font-weight: bold;
            text-align: right;
            background-color: #182c3fb4;
            color: #ffffff;
        }

        /* Styles pour l'en-tête et le titre */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 50px;
            height: 50px;
        }

        .header h1 {
            font-size: 1.5rem;
            margin: 5;
            text-align: center;
        }

        /* Marges et alignement */
        .margin-top {
            margin-top: 1.25rem;
        }

        /* Style du pied de page */
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            text-align: center;
            background-color: rgb(241, 245, 249);
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="header">
                    {{-- <img src="storage/images/users/.png" alt="Logo"> --}}

                    <h1>{{ __('messages.Daily Sales Report') }} </h1>
                    <div>{{ __('messages.Day') }} : {{ $date }}</div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('messages.Quantity') }}</th>
                                    <th>{{ __('messages.Operation') }}</th>
                                    <th>{{ __('messages.Operation type') }}</th>
                                    <th>{{ __('messages.Price') }}</th>
                                    <th>{{ __('messages.Product') }}</th>
                                    <th>{{ __('messages.created_at') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>{{ __('messages.' . $sale->operation) }}</td>
                                        <td>{{ __('messages.' . $sale->operation_type) }}</td>
                                        <td>{{ $sale->price }}</td>
                                        <td>{{ $sale->product->name }}</td>
                                        <td>{{ $sale->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">Total {{ number_format($dayBenefit, 0, '.', ',') }}
                                        {{ App\Enums\CodeDevise::FCFA }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="footer margin-top">
                <div>@M2C Business</div>
            </div>
        </div>
    </div>
</body>


</html>
