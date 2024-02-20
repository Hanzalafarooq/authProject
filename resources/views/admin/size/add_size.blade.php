<x-admin.header />
<div class="card">
    <div class="card-body">
        <form action="{{ !empty($size) ? route('admin.size.update', ['id' => $size->id]) : route('admin.store.size') }}" action="" method="POST" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            {{-- @foreach ($user as $users) --}}

            {{-- <input type="hidden" name="idd" value="{{$users->id}}" /> --}}
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
            {{-- @endforeach --}}

            <div class="form-group">
                <label for="first_name">size Name</label>
                <input type="text" name="size_name" class="form-control @error('size_name') is-invalid @enderror"
                    {{-- id="first_name" placeholder="size Name" value=""> --}}
                id="size_name" placeholder="size Name" value="{{ @$size->size_name }}">
                @error('size_name')
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
