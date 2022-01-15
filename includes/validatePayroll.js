//function to display error message
function printError(elemId, hintMsg){
    document.getElementById(elemId).innerHTML = hintMsg;
}

//a function to validate form
function validateForm(){
    //retriving values of form elements
    var ee = document.getElementById("employee_id");
    var emp_id = ee.options[ee.selectedIndex].value;
    var er = document.getElementById("employer_id");
    var empr_id = er.options[er.selectedIndex].value;
    var pf = document.add_payroll.e_pf.value;
    var esic = document.add_payroll.e_esic.value;
    var joiningdate = document.add_payroll.joining_date.value;
    var leavingdate = document.add_payroll.leaving_date.value;
    var employeeErr = employerErr = pfErr = esicErr = joiningdateErr = leavingdateErr = true;

    //validate employee name
    if(emp_id == "0"){
        printError("employeeErr","Please select employee name");
    }else{
        printError("employeeErr","");
        employeeErr = false;
    }
    //validate employer name
    if(empr_id == "0"){
        printError("employerErr","Please select employee name");
    }else{
        printError("employerErr","");
        employerErr = false;
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

    //validate joining date
    if(joiningdate == ""){
        printError("joiningdateErr","Please select joining date");
    }else{
        var regex = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/; 
        if(regex.test(joiningdate)===false){
            printError("joiningdateErr","Please select valid date ");
        }else{
            printError("joiningdateErr","");
            joiningdateErr = false;
        }
    }

    //validate leaving date
    if(leavingdate == ""){
        printError("leavingdateErr","Please select leaving date");
    }else{
        var regex = /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/; 
        if(regex.test(leavingdate)===false){
            printError("leavingdateErr","Please select valid date");
        }else{
            if(leavingdate < joiningdate){
                printError("leavingdateErr","Leaving date cannot be before joining date");
            }
            else{
                printError("leavingdateErr","");
                leavingdateErr = false;
            }
            
        }
    }

    if(employeeErr = employerErr = pfErr = esicErr = joiningdateErr = leavingdateErr = true){
        return false;
    }else{
        return true;
    }
}