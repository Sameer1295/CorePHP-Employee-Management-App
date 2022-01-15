//function to display error message
function printError(elemId, hintMsg){
    document.getElementById(elemId).innerHTML = hintMsg;
}

//a function to validate form
function validateForm(){
    //retriving values of form elements
    var name = document.add_employer.e_name.value;
    var address = document.add_employer.e_address.value;
    var contact = document.add_employer.e_contact_number.value;
    var pf = document.add_employer.e_pf_number.value;
    var esic = document.add_employer.e_esic_number.value;
    var gst = document.add_employer.e_gst_number.value;

    var nameErr = addressErr = contactErr = pfErr = esicErr = gstErr = true;

    //validate name
    if(name == ""){
        printError("nameErr","Please enter name");
    }else{
        var regex = /^[a-zA-Z\s]+$/;
        if(regex.test(name)===false){
            printError("nameErr","Please enter a valid name");
        }else{
            printError("nameErr","");
            nameErr = false;
        }
    }
    //validate address
    if(address == ""){
        printError("addressErr","Please enter address");
    }else{
        var regex = /^[a-zA-Z0-9\s]/;
        if(regex.test(address)===false){
            printError("addressErr","Please enter a valid address");
        }else{
            printError("addressErr","");
            addressErr = false;
        }
    }
    //validate contact number
    if(contact == ""){
        printError("contactErr","Please enter contact number");
    }else{
        var regex = /^[7-9]\d{9}$/;
        if(regex.test(contact)===false){
            printError("contactErr","Please enter a valid contact number");
        }else{
            printError("contactErr","");
            contactErr = false;
        }
    }
    //validate pf number
    if(pf == ""){
        printError("pfErr","Please enter pf number");
    }else{
        var regex = /^[A-Z]{2}\/[A-Z]{3}\/\d{7}\/\d{3}\/\d{7}$/; //MH/BAN/0047162/000/0010999
        if(regex.test(pf)===false){
            printError("pfErr","Please enter a valid pf number");
        }else{
            printError("pfErr","");
            pfErr = false;
        }
    }
    
    //validate esic number
    if(esic == ""){
        printError("esicErr","Please enter esic number");
    }else{
        var regex = /^([0-9]{2})[\–\-]([0-9]{2})[\–\-]([0-9]{6})[\–\-]([0-9]{3})[\–\-]([0-9]{4})$/; //31–00–123456–000–0001
        if(regex.test(esic)===false){
            printError("esicErr","Please enter a valid esic");
        }else{
            printError("esicErr","");
            esicErr = false;
        }
    }

    //validate gst number
    if(gst == ""){
        printError("gstErr","Please enter contact number");
    }else{
        var regex = /^([0-9]{2})[\–\-]([0-9]{2})[\–\-]([0-9]{6})[\–\-]([0-9]{3})[\–\-]([0-9]{4})$/; //31–00–123456–000–0001
        if(regex.test(gst)===false){
            printError("gstErr","Please enter a valid gst number");
        }else{
            printError("gstErr","");
            gstErr = false;
        }
    }

    if(nameErr = addressErr = contactErr = pfErr = esicErr = gstErr = true){
        return false;
    }else{
        return true;
    }
}