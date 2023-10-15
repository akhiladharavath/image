$(document).ready(function() {
      
            loadCarRecords();
            $('.add-btn').click(function() {
                $('.add-form').slideToggle();
            });
            $('#add_form').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: 'create.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        
                        loadCarRecords();
                    }
                });
            });

            function loadCarRecords(search,page=1) {
                $.ajax({
                    url: 'read.php',
                    method: 'POST',
                    data: { search: search,page:page },
                    success: function(response) {
                         
                        
                        $('#car_records').html(response);
                       
                    }
                });
            }
            $('#search_form').on('submit', function(e) {
                e.preventDefault();
                var search = $('#search_input').val();
                loadCarRecords(search);
            });
            $(document).on('click', '.pagination_link', function() {
               var page = $(this).data('page');
               var search = $('#search_input').val();
                loadCarRecords(search, page);
            });

            $(document).on('click', '.edit-btn', function() {
                var row = $(this).closest('tr');
                var id = row.find('.car-id').text();
                var make = row.find('.car-make').text();
                var model = row.find('.car-model').text();
                var color = row.find('.car-color').text();
                var image = row.find('.car-image').attr('src');

               
                var makeInput = $('<input type="text" class="form-control" value="' + make + '">');
                var modelInput = $('<input type="text" class="form-control" value="' + model + '">');
                var colorInput = $('<input type="text" class="form-control" value="' + color + '">');
                row.find('.car-make').html(makeInput);
                row.find('.car-model').html(modelInput);
                row.find('.car-color').html(colorInput);

                
                $(this).removeClass('edit-btn btn-primary').addClass('update-btn btn-success').text('Update');

                
               
            });

           
            $(document).on('click', '.update-btn', function() {
                var row = $(this).closest('tr');
                var id = row.find('.car-id').text();
                var make = row.find('.car-make input').val();
                var model = row.find('.car-model input').val();
                var color = row.find('.car-color input').val();

                $.ajax({
                    url: 'update.php',
                    method: 'POST',
                    data: { id: id, make: make, model: model, color: color },
                    success: function(response) {
                        loadCarRecords();
                    }
                });
            });

            
            $(document).on('click', '.delete-btn', function() {
                var row = $(this).closest('tr');
                var id = row.find('.car-id').text();
                if (confirm('Are you sure you want to delete this car record?')) {
                    $.ajax({
                        url: 'delete.php',
                        method: 'POST',
                        data: { id: id },
                        success: function(response) {
                            loadCarRecords();
                        }
                    });
                }
            });
            
        });
