$(function(){
    $('#voievodeship').on('change', function() {
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
                        $.each(data, function(key, value){
                            $('select[name="city_id"]').append('<option value="'+ value.id +'">'+value.name + '</option>');
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


