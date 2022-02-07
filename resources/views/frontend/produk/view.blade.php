@extends('layouts.frontend')

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">Collections / {{ $pakaians->kategori->nama_kategori }} / {{ $pakaians->nama_pakaian }}</h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ $pakaians->image() }}" alt="" style="width:320px; height:340px;" alt="Gambar" alt="IMG-PRODUCT">
                </div>
                <div class="col-md-8">
                    <h3 class="mb-0">
                        {{ $pakaians->nama_pakaian }}
                        
                    </h3>
                    <hr>
                    <label class="fw-bold">Harga : Rp. {{ $pakaians->harga }}</label>
                    <p class="mt-3">
                        {!! $pakaians->deskripsi !!}
                    </p>
                    <hr>
                    @if ($pakaians->qty > 0)
                        <label class="badge bg-success">Stock Tersedia</label>
                    @else
                    <label class="badge bg-success">Stock Tidak Tersedia</label>
                        
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $pakaians->id }}" class="pakaian_id">
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-9">
                        <br>
                        <button type="button" class="btn btn-success me-3 addToCartBtn float-start">Tambahkan ke Favorit</button>
                        <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            $('.addToCartBtn').click(function (e){
                e.preventDefault();

                var pakaian_id =$(this).closest('.product_data').find('.pakaian_id').val();
                var qty =$(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
                $.ajax({
                    method: "POST",
                    url: "/add-to-cart",
                    data: {
                        'pakaian_id': pakaian_id,
                        'qty': qty,
                    },
                    success: function (response){
                        alert(response.status);
                    }
                })
            });

        $('.increment-btn').click(function (e){
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10){
                value++;
                $('.qty-input').val(value);
            }
        });
        $('.decrement-btn').click(function (e){
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1){
                value--;
                $('.qty-input').val(value);
            }
        });
    });
        </script>
@endsection