<x-admin.header />
<div class="card">
    <div class="card-body">
        <form action="{{ !empty($color) ? route('admin.color.update', ['id' => $color->id]) : route('admin.store.color') }}" action="" method="POST" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            {{-- @foreach ($user as $users) --}}

            {{-- <input type="hidden" name="idd" value="{{$users->id}}" /> --}}
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
            {{-- @endforeach --}}

            <div class="form-group">
                <label for="first_name">color Name</label>
                <input type="text" name="color_name" class="form-control @error('color_name') is-invalid @enderror"
                    {{-- id="first_name" placeholder="color Name" value=""> --}}
                id="color_name" placeholder="color Name" value="{{ @$color->color_name }}">
                @error('color_name')
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
