@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Apartment</h2>
        <form action="{{ route('apartments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ApartmentsNumber" class="form-label">Apartment Number:</label>
                <input type="text" name="ApartmentsNumber" id="ApartmentsNumber" class="form-control">
            </div>

            <div class="mb-3">
                <label for="SizeParSquareMeter" class="form-label">Size (sqm):</label>
                <input type="number" name="SizeParSquareMeter" id="SizeParSquareMeter" class="form-control">
            </div>

            <div class="mb-3">
                <label for="PriceParSquareMeter" class="form-label">Price per sqm:</label>
                <input type="number" step="0.01" name="PriceParSquareMeter" id="PriceParSquareMeter" class="form-control">
            </div>

            <div class="mb-3">
                <label for="TotalPrice" class="form-label">Total Price:</label>
                <input type="number" step="0.01" name="TotalPrice" id="TotalPrice" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="Status" class="form-label">Status:</label>
                <select name="Status" id="Status" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Sold">Sold</option>
                    <option value="Reserved">Reserved</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ResidenceID" class="form-label">Residence:</label>
                <select name="ResidenceID" id="ResidenceID" class="form-control">
                    @foreach($residences as $residence)
                        <option value="{{ $residence->ResidenceID }}">{{ $residence->ResidenceName }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeInput = document.getElementById('SizeParSquareMeter');
            const priceInput = document.getElementById('PriceParSquareMeter');
            const totalPriceInput = document.getElementById('TotalPrice');

            sizeInput.addEventListener('input', updateTotalPrice);
            priceInput.addEventListener('input', updateTotalPrice);

            function updateTotalPrice() {
                const size = parseFloat(sizeInput.value);
                const price = parseFloat(priceInput.value);
                const totalPrice = size * price;
                totalPriceInput.value = totalPrice.toFixed(2);
            }
        });
    </script>
@endsection
