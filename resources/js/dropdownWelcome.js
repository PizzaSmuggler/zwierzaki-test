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
                        $('select[name="filter[breed_id]"]').append('<option value="">'+ 'Bez znaczenia' + '</option>');
                        $.each(data, function(key, value){
                            $('select[name="filter[breed_id]"]').append('<option value="'+ value.id +'">'+value.name + '</option>');
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
    $('#voievodeships').on('change', function() {
        const voievodeshipID = $(this).val();
        if(voievodeshipID) {
            $.ajax({
                url: '/getCities/'+voievodeshipID,
                type: "GET",
                data : {"_token":"{{ csrf_token() }}"},
                dataType: "json",
                success:function(data) {
                    console.log(data);
                    if(data){
                        $('#cities').empty();
                        $('select[name="filter[city_id]"]').append('<option value="">'+ 'Bez znaczenia' + '</option>');
                        $.each(data, function(key, value){
                            $('select[name="filter[city_id]"]').append('<option value="'+ value.id +'">'+value.name + '</option>');
                        });
                    }else{
                        $('#cities').empty();
                    }
                }
            });
        }else{
            $('#cities').empty();
        }
    });
});


