<x-admin.header />
<div class="card">
    <div class="card-body">
        <form action="{{ !empty($brand) ? route('admin.brand.update', ['id' => $brand->id]) : route('admin.store.brand') }}" action="" method="POST" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            {{-- @foreach ($user as $users) --}}

            {{-- <input type="hidden" name="idd" value="{{$users->id}}" /> --}}
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
            {{-- @endforeach --}}

            <div class="form-group">
                <label for="first_name">Brand Name</label>
                <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror"
                    {{-- id="first_name" placeholder="Brand Name" value=""> --}}
                id="brand_name" placeholder="Brand Name" value="{{ @$brand->brand_name }}">
                @error('brand_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button class="btn btn-success btn-block btn-lg" type="submit">Submit</button>
        </form>
    </div>
</div>
{{-- @endsection --}}

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>











    <x-admin.footer />
