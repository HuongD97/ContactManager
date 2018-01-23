
function viewContact(id){
    jQuery.ajax({
        url: "/API/viewContact/",
        type: "GET",
        data: {id:id},
        success: function(resp){
			if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#contactDisplay").attr("data-cid",obj.id);
				$("#nameRO").html(obj.name);
				$("#phoneRO").html(obj.phone);
				$("#emailRO").html(obj.email);

				if($("#contactDisplay").is(":hidden")){
					$("section").toggleClass("defaultHidden");
				}
			} else {
				showError("viewContact API call fail whaled :(");
			}
        }
    });
}

function addContact(){
    jQuery.ajax({
        url: "/API/addContact/",
        type: "POST",
        data: {}
    });
}

//PHP Does not easily support accessing PUT and DELETE data.
//We opted to forego these RESTful verbs for cleaner PHP code on the back end.
function deleteContact(id){
    jQuery.ajax({
        url: "/API/deleteContact/",
        type: "POST",
        data: {id:id},
        success: function(resp){
			if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#"+obj.id).remove();
				$("section").toggleClass("defaultHidden");
			} else {
				showError("deleteContact API call fail whaled :(");
			}
        }
    });
}

function searchContact(){}

//add to 2nd page once written <script src="/API/APIfront.js"></script>
