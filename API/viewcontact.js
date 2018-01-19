
function viewContact(id){
    jQuery.ajax({
        url: "/viewContact/"
        type: GET
        data: {id:id}
        success: function(resp){
            alert(resp);
        },

    });
}
