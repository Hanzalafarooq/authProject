<x-admin.header />
<div class="card">
    <div class="card-body">
        <form
            action="{{ !empty($subcategory) ? route('admin.subcategory.update', ['id' => $subcategory->id]) : route('admin.store.subcategory') }}"
            action="" method="POST" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            {{-- @dd($subcategory) --}}
            <div class="mb-3">
                <label for="" class="form-label">Main Category</label>
                <select class="form-select form-select-lg" name="main_category" id="">
                    <option selected>Select one</option>
                    @foreach ($categorys as $clis)
                        <option value={{ $clis->id }}>{{ $clis->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="first_name">subcategory Name</label>
                <input type="text" name="subcategory_name"
                    class="form-control @error('subcategory_name') is-invalid @enderror" {{-- id="first_name" placeholder="subcategory Name" value=""> --}}
                    id="subcategory_name" placeholder="subcategory Name" value=" {{ @$subcategory->subcategory_name }}">

                @error('subcategory_name')
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
