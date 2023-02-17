$(function(){
    $('#species').on('change', function() {
        const speciesID = $(this).val();
        if(speciesID) {
            $.ajax({
                url: '/getBreeds/'+speciesID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data) {
                    if(data){
                        $('#breeds').empty();
                        $.each(data, function(key, value){
                            $('select[name="breed_id"]').append('<option value="'+ value.id +'">'+value.name + '</option>');
                        });
                    }else{
                        $('#breeds').empty();
                    }
                }
            });
        }else{
            $('#breeds').empty();
        }
    });
});


