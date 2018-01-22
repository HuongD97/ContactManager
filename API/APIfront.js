
function viewContact(id){
    jQuery.ajax({
        url: "/viewContact/",
        type: "GET",
        data: {id:id},
        success: function(resp){
            alert(resp);
        }
    });
}

function addContact(){
    jQuery.ajax({
        url: "/addContact/",
        type: "POST",
        data:

    });
}

function deleteContact(id){
    jQuery.ajax({
        url: "/viewContact/",
        type: "DELETE",
        data: {id:id},
        success: function(resp){
            alert(resp);
        }

    });
}
