define(['jquery'], function() {
    var formadapt = function() {
        $( "#id_course_list" ).change( "select", function() {
            $.ajax({
                url: "gettingactivities.php",
                type: 'POST',
                data: { id_option: this.value }
            }).done(function( data ) {
                var select = document.getElementById('id_concerned_activities');
                $("#id_concerned_activities").find('option').remove().end();
                arr_data = JSON.parse(data);
                for (let i = 0; i < arr_data.length; i++) {
                    var opt = document.createElement('option');
                    opt.value = arr_data[i];
                    opt.innerHTML = arr_data[i];
                    select.appendChild(opt);
                }

            });
        });
    };
    return {
        formadapt: formadapt
    };
});