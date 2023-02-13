$(function(){
    $('#species').on('change',function(){
        const speciesId = this.value;
        $('#state').html('');
            $.ajax({
                url: '{{ route("advert/create/getBreeds") }}?species_id=' + speciesId,
                type: 'get',
                success: function (res) {
                    $('#breed').html('<option value="">Select State</option>');
                    $.each(res, function (key, value) {
                        $('#breed').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });


