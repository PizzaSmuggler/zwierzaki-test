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
                    //console.log(data);
                    if(data){
                        $('#breed').empty();
                        $.each(data, function(key, value){
                            $('select[name="breed_id"]').append('<option value="'+ key +'">'+value.name + '</option>');
                        });
                    }else{
                        $('#breed').empty();
                    }
                }
            });
        }else{
            $('#city').empty();
        }
    });
    });


