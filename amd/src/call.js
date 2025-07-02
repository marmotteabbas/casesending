define(['jquery'], function() {
    var call = function(cas) {
        if (cas == 0) {
            currentUrl = window.location.href;
            var form = $('<form action="https://moodle-test.grenet.fr/moodle_flo/local/casesending/view.php" method="post">' +
            '<input type="hidden" name="url" value="'+currentUrl+'" />' +
            '</form>');
            $('body').append(form);
            $(form).submit();
        } else {
            $.ajax({
                url: "https://moodle-test.grenet.fr/moodle_flo/local/casesending/getterbanner.php",
                type: 'POST',
                data: { banumber: cas }
            }).done(function( data ) {
                document.body.innerHTML = document.body.innerHTML + "<dialog style='text-align: center;' id='casesendingmodal'><p>"+data+"</p> <button onclick='javascript:this.parentElement.remove()' id='casesendingmodalbuton'>Fermer</button></dialog>";
                const modal = document.querySelector("#casesendingmodal");
                modal.showModal();
            });
        }
      };
    return {
        call: call
    };
});
