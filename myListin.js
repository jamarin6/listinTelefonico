// listin.js
///window.onload=function(){ // para que 1ºcargue la página y después pinte los users
//readUsers(); // 1º cargo los users que estén guardados en la bbdd
///};

function borraUser(userID){
	$.post("http://localhost/listinMVC/controllers/deleteUser_controller.php", {userID: userID}, function(data,status){//(URL,data,callback)
		eval(data);
	});
}

function borraNum(phoneID,userID){
	$.post("http://localhost/listinMVC/controllers/deleteNumList_controller.php", {phoneID: phoneID, userID: userID}, function(data,status){//(URL,data,callback)
		eval(data);
	});
}

///function dameUsers(){
///	var users;
///	users <= recibo x ajax un array de users
///	pintarUsers(users);
///}///

///function pintarUsers(array){
///	
///}

//$(document).ready(function(){
//	$("#verUser").click(function(){
 //   $.get("http://localhost/listin/readAnUser.php",function(data,status){ // (URL,callback)
 //     var user = data; // recibo los datos del user
 // 	  paintAnUser(user); // pinto los numeros
 //   });
//  });
//  $("#botonPrueba").click(function(){
//    readUsers();
//  });
//});

//function readUsers() {
//	$.get("http://localhost/listin/readUsers.php",function(data,status){ // (URL,callback)
//		var allUsers = JSON.parse(data); // recibo los datos en formato JSON y lo parseo para transformarlo 
//		                                 // a objeto javascript para poder manipularlo, sería allUsers un array 
//		                                 // de objetos javascript tipo hash??? Del tipo:
//		                                 // "allUsers":[
 //   																 // 	 {"nombre":"Jose", "ap1":"Marin", "ap2":"Hidalgo", "fechaNac":"1980-02-19"}, 
 //   																 // 	 {"nombre":"Juan", "ap1":"Perez", "ap2":"Ruiz", "fechaNac":"1980-02-19"}, 
 //   																 // 	 {"nombre":"Luis", "ap1":"Nieto", "ap2":"Lopez", "fechaNac":"1980-02-19"}
//																		 //  ]
 // 	paintUsers(allUsers); // allUsers es objeto javascript
 //   });
//}

//function readAnUser(id,nombre,ap1,ap2,fechaNac){ // recibe el user del userID que se manda 
//  //$.post("readAnUser.php", {userID: userID}, function(data,status){ // (URL,data,callback) 
//  //  var myUser = JSON.parse(data);     
//  //    //paintAnUser(myUser);     
//  //});
//  res="<p>User: " + nombre + "</p><br>";
//  res+="<p>1er Apellido: " + ap1 + "</p><br>";
//  res+="<p>2º Apellido: " + ap2 + "</p><br>";
//  res+="<p>Fecha nacimiento: " + fechaNac + "</p><br>";
//  res+="<p>Lista de tlfnos: FALTA POR HACER</p><br>";
//  $("#probando").html(res);
//}

//function paintUsers(users){
 // res="<ul>" //;
 // for (i = 0; i < users.length; i++) {// abajo, Math.ceil me redondea un coeficiente entre 0 y 4 para el color
//    res+="<li>" + users[i].nombre + " " + users[i].ap1 + " " + users[i].ap2 +  " " + " <button type='button' class='btn btn-info btn-xs' onclick='paintAnUser( \" " + users[i].id + "\",\"" + users[i].nombre + "\",\"" + users[i].ap1 + "\",\"" + users[i].ap2 + "\",\"" + users[i].fechaNac + "\"" + ")'>Ver</button><button type='button' class='btn btn-danger btn-xs' onclick='deleteUser(" + users[i].id + ")'>X</button></li>";
//  }//
  //res+="</ul>";////

 // //res2="<table>"; // empezamos tabla NO SALE, NO SE PUEDE???//
 // //for (i = 0; i < users.length; i++)
 // //  re2+="<tr><td>" + users[i].nombre + "</td><td>" + users[i].ap1 + "</td><td>" + users[i].ap2 + "</td></tr>"
 // //res2+="</table>";//

  //$("#usersList").html(res); // aquí va la lista de users
//}

//function paintAnUser(id,nombre,ap1,ap2,fechaNac){
//  res="<p><strong>User: </strong>" + nombre + "</p>";
//  res+="<p><strong>1er Apellido: </strong>" + ap1 + "</p>";
//  res+="<p><strong>2º Apellido: </strong>" + ap2 + "</p>";
//  res+="<p><strong>Fecha nacimiento: </strong>" + fechaNac + "</p>";
//  res+="<p><strong>Lista de tlfnos: </strong>FALTA POR HACER</p>";
 // $("#probando").html(res);
//}