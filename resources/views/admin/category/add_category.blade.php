<x-admin.header />
<div class="card">
    <div class="card-body">
        <form action="{{ !empty($category) ? route('admin.category.update', ['id' => $category->id]) : route('admin.store.category') }}" action="" method="POST" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            {{-- @foreach ($user as $users) --}}

            {{-- <input type="hidden" name="idd" value="{{$users->id}}" /> --}}
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
            {{-- @endforeach --}}

            <div class="form-group">
                <label for="first_name">category Name</label>
                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror"
                    {{-- id="first_name" placeholder="category Name" value=""> --}}
                id="category_name" placeholder="category Name" value="{{ @$category->category_name }}">
                @error('category_name')
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
