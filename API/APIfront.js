function viewContact(UserID, id){
    jQuery.ajax({
        url: '/API/viewContact.php',
        type: "GET",
        data: {UserID:UserID, id:id},
        success: function(resp){
			if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#contactDisplay").attr("data-cid",obj.id);
				$("#nameFRO").html(obj.nameF);
				$("#nameLRO").html(obj.nameL);
				$("#phoneRO").html(obj.phone);
				$("#emailRO").html(obj.email);

				if($("#contactDisplay").is(":hidden")){
					$(".togglePanel").toggleClass("defaultHidden");
				}
			} else {
				showError("viewContact API call fail whaled :(");
			}
        }
    });
}

function addContact(UserID){
	var nameF=$("#nameWF").val();
    var nameL=$("#nameWL").val();
	var phone=$("#phoneW").val();
	var email=$("#emailW").val();
	$('#addContactInfoDiv .userInput').val("");
    jQuery.ajax({
        url: '/API/addContact.php',
        type: "POST",
        data: {UserID:UserID, nameF:nameF, nameL:nameL, phone:phone, email:email},
		success: function(resp){
			if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#contactDisplay").attr("data-cid",obj.id);
				$("#nameFRO").html(obj.nameF);
                $("#nameLRO").html(obj.nameL);
				$("#phoneRO").html(obj.phone);
				$("#emailRO").html(obj.email);

				if($("#contactDisplay").is(":hidden")){
					$(".togglePanel").toggleClass("defaultHidden");
				}
				$("#contactList button").last().after('<button id="' + obj.id + '" type="button" class="list-group-item contact">' + obj.nameF + " " + obj.nameL + "</button>");
				$("#"+obj.id).on("click",function(){viewContact(obj.UserID, this.id);});
			}
			else {
				showError("addContact API call fail whaled :(");
			}
		}
    });
}

//PHP Does not easily support accessing PUT and DELETE data.
//We opted to forego these RESTful verbs for cleaner PHP code on the back end.
function deleteContact(UserID, id){
    jQuery.ajax({
        url: '/API/deleteContact.php',
        type: "POST",
        data: {UserID:UserID, id:id},
        success: function(resp){
			if(resp!="fail whale :("){
				var obj = $.parseJSON(resp);
				$("#"+obj.id).remove();
				$(".togglePanel").toggleClass("defaultHidden");
			} else {
				showError("deleteContact API call fail whaled :(");
			}
        }
    });
}

function searchContact(UserID, searchTerm){
	jQuery.ajax({
        url: '/API/searchContact.php',
        type: "GET",
        data: {UserID:UserID, searchTerm:searchTerm},
		success: function(resp){
			if(resp!="fail whale :("){
				$('#searchBox').val("");
				var obj = $.parseJSON(resp);
				$('.contact').hide();
				for(var i=0; i < obj.length; i++){
					$('#'+obj[i].cid).show();
				}
			}
		}
	});
}

//add to 2nd page once written <script src="/API/APIfront.js"></script>
