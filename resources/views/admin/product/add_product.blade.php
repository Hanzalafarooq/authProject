 <x-admin.header />
 {{-- <x-admin.sidenav/> --}}
 @section('content-header', 'Customer Management')
 <div class="csss">

     <title>Product Form</title>
     </head>

     {{-- <body> --}}
     <div class="shaper mx-5">
         <h1>Product Form</h1>
         <form action="{{ url('/product/store') }}" method="post" enctype="multipart/form-data">
             @csrf
             <label for="title">Title:</label>
             <input type="text" id="title" name="title" required>

             <label for="category">Category:</label>
             <select id="category" name="category" required>
                 <option value="" disabled selected>Select Category</option>
                 @foreach ($category as $item)
                     <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                 @endforeach


             </select>

             <label for="subcategory">Subcategory:</label>
             <select id="subcategory" name="subcategory" required>
                 <option value="" disabled selected>Select Subcategory</option>
             </select>

             <label for="brand">Brand:</label>
             <select id="brand" name="brand" required>

                 <option value="" disabled selected>Select Brand</option>
                 @foreach ($brands as $itemss)
                     <option value="{{ $itemss->id }}">{{ $itemss->brand_name }}</option>
                 @endforeach


                 <!-- Add more options as needed -->
             </select>
             <label for="brand">Color:</label>
             <select id="color" name="color" required>

                 <option value="" disabled selected>Select Color</option>
                 @foreach ($color as $itemss)
                     <option value="{{ $itemss->id }}">{{ $itemss->color_name }}</option>
                 @endforeach


                 <!-- Add more options as needed -->
             </select>
             </select>
             <label for="brand">size:</label>
             <select id="color" name="size" required>

                 <option value="" disabled selected>Select Size</option>
                 @foreach ($size as $items)
                     <option value="{{ $items->id }}">{{ $items->size_name }}</option>
                 @endforeach


                 <!-- Add more options as needed -->
             </select>
             <label for="weight">weight:</label>
             <input type="text" id="weight" name="weight" required>
             <label for="price">Price:</label>
             <input type="number" id="price" name="price" step="10" required>

             <label for="discountedPrice">Discounted Price:</label>
             <input type="number" id="discountedPrice" name="discountedPrice" min="0" step="10">

             <label for="description">Description:</label>
             <textarea id="description" name="description" rows="4" required></textarea>


             <!-- Your other form fields here -->
<div class="form-group">
             <label for="image">Image:</label>
             <input type="file" id="image" name="image" accept="image/*" required>
             <div id="imagePreview"></div> <!-- Image preview container -->
</div>
             <label for="gallery">Gallery:</label>
             <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple required>
             <div id="galleryPreview"></div>
             <button type="submit">Submit</button>
         </form>

     </div>

     <x-admin.footer />
