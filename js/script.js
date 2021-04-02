/* --------------------------------------------------------
Home Page
-----------------------------------------------------------*/






/* --------------------------------------------------------
Facilities us Page
-----------------------------------------------------------*/



/* --------------------------------------------------------
Contact Page
-----------------------------------------------------------*/




/* --------------------------------------------------------
Reservation Page
-----------------------------------------------------------*/
function finalCost(){
    var roomType = document.getElementById("room_type").value;
    var personNum = document.getElementById("person_number").value;

    var total = (parseInt(roomType)*100) + ((personNum)*3) 

    document.getElementById("result").innerHTML = total;
}