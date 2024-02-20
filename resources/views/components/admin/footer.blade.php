<!-- /.container-fluid -->
</div>
{{-- </section> --}}
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Developed By Hanzi
    </div>
    <strong>&copy; <?php echo date('Y'); ?> - E-commerce Project</strong> - PHP Laravel
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js2/app.js') }}"></script>
@yield('js')
<!-- /.control-sidebar -->
<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            var cat_id = $(this).val();
            // alert(cat_id);

            $.ajax({
                url: "getsubcategories",
                type: 'GET',
                data: {
                    cat_id: cat_id
                },
                dataType: 'json', // Change this to 'xml' if the server returns XML data
                success: function(data) {
                    // console.log(data);
                    $('#subcategory').empty();

                    // Iterate through the data and add options to the sub_categories select
                    $.each(data, function(index, subcategory) {
                        $('#subcategory').append('<option value="' + subcategory
                            .id + '">' + subcategory.subcategory_name + '</option>');
                    });

                }
            });

        });
    });
</script>

<script src="{{ asset('js/script.js') }}"></script>
</div>
</body>

</html>
