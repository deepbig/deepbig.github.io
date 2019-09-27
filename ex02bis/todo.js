var ft_list;

$(document).ready(function(){
    $('#new').click(newTodo);
    $('#ft_list div').click(deleteTodo);
    ft_list = $('#ft_list');
    loadTodo();
});

function loadTodo(){
    ft_list.empty();
    aj('select.php', "GET", null, function(data){
        data = jQuery.parseJSON(data);
        jQuery.each(data, function(i, val) {
            ft_list.prepend($('<div data-id="' + i + '">' + val + '</div>').click(deleteTodo));
        });
    });
}

function newTodo(){
    var todo = prompt("What is your task?", "");
    if (todo !== '') {
        aj('insert.php?todo=' + todo, "GET", null, loadTodo);
    }
}

function deleteTodo(){
    if (confirm("Are you sure you want to delete this task?")){
        aj('delete.php?id=' + $(this).data('id'), "GET", null, loadTodo);
    }
}

function aj(url, method, data, success) {
    $.ajax({
            method: method,
            url: url,
            data: data
        })
        .done(function (data) {
            success(data);
        })
        .error(function (msg) {
            alert("error ajax : " + msg);
        });
}

// var	ft_list;
// var	cookie;

// $(document).ready(function ()
// {
//     $('#new').click(addTodo);
// 	ft_list = $('#ft_list');
// 	var get = getCookie("todos");
// 	console.log(JSON.parse(get));
// 	cookie = JSON.parse(get);
// 	cookie.forEach(function (e)
// 	{
// 		addEntry(e);	
// 	})
// });

// window.onunload = function ()
// {
// 	console.log("unload");
// 	saveCookie();
// }

// function saveCookie()
// {
// 	var entries = ft_list.children();
// 	var tmp = [];
// 	for (var i = 0; i < entries.length; i++)
// 	{
// 		if (entries[i].tagName == 'DIV')	
// 		{
// 			tmp.unshift(entries[i].innerHTML);
// 			console.log(entries[i].innerHTML);
// 		}
// 	}
// 	var toset = JSON.stringify(tmp);
// 	console.log(toset);
// 	setCookie("todos", toset, 1);
// }

// function setCookie(cname,cvalue,exdays)
// {
// 	var d = new Date();
// 	d.setTime(d.getTime() + (exdays*24*60*60*1000));
// 	var expires = "expires=" + d.toGMTString();
// 	var string = cname + "=" + cvalue + ";" + expires + ";path=/";
// 	document.cookie = string; 
// }

// function getCookie(cname)
// {
// 	var name = cname + "=";
// 	console.log(document.cookie);
// 	var ca = document.cookie.split(';');
// 	for(var i = 0; i < ca.length; i++)
//    	{
// 		var c = ca[i];
// 		while (c.charAt(0) == ' ')
// 			c = c.substring(1);

// 		if (c.indexOf(name) == 0) 
// 			return c.substring(name.length, c.length);
// 	}
// 	return "";
// }

// function addTodo()
// {
// 	var txt = $.prompt(
//         [
//             {
//                 title:"Add things to do.",
//                 buttons:{"submit":true});
// 	if (txt)
// 	{
// 		addEntry(txt);
// 	}
// }

// function addEntry(txt)
// {
//     ft_list.prepend($('<div>' + todo + '</div>').click(delToDo));
// 	// var div = document.createElement("div");
// 	// div.className = "entry";
// 	// div.innerHTML = txt;
// 	// div.addEventListener("click", deleteEntry);
//     // ft_list.insertBefore(div, ft_list.firstChild);
    
// }

// function deleteEntry()
// {
// 	if(confirm("Delete this entry?"))
// 	{
// 		this.parentElement.removeChild(this);
// 	}
// }


// var button;
// var ft_list;
// //var todo;
// var div;
// var cookie = [];
// //var newCookie = [];

// $(document).ready(function(){
//     $('#new').click(firstToDo);
//     $('#ft_list div').click(delToDo);
//     ft_list = $('#ft_list');
//     var get = getCookie("todos");
// 	cookie = JSON.parse(get);
// 	cookie.forEach(function (e)
// 	{
// 		addEntry(e);	
// 	})
// })
// // window.onload = function() {
// //     button = document.querySelector("#button");
// //     button.addEventListener("click", firstToDo);
// //     ft_list = document.querySelector("#ft_list");
// //     var tmp = document.cookie;
// //     if (tmp) {
// //         cookie = JSON.parse(tmp);
// //         cookie.forEach(function (todo) {
// //             addToDo(todo);
// //         });
// //     }
// // }


// window.onunload = function () {
//     saveCookie();
//     // var todo = ft_list.children;
//     // var newCookie = [];
//     // for (var i = 0; i < todo.length; i++)
//     //     newCookie.unshift(todo[i].innerHTML);
//     // document.cookie = JSON.stringify(newCookie);
// };

// function saveCookie()
// {
// 	var entries = ft_list.children();
// 	var tmp = [];
// 	for (var i = 0; i < entries.length; i++)
// 	{
// 		if (entries[i].tagName == 'DIV')	
// 		{
// 			tmp.unshift(entries[i].innerHTML);
// 			console.log(entries[i].innerHTML);
// 		}
// 	}
// 	var toset = JSON.stringify(tmp);
// 	console.log(toset);
// 	setCookie("todos", toset, 1);
// }

// function setCookie(cname,cvalue,exdays)
// {
// 	var d = new Date();
// 	d.setTime(d.getTime() + (exdays*24*60*60*1000));
// 	var expires = "expires=" + d.toGMTString();
// 	var string = cname + "=" + cvalue + ";" + expires + ";path=/";
// 	document.cookie = string; 
// }

// function getCookie(cname)
// {
// 	var name = cname + "=";
// 	console.log(document.cookie);
// 	var ca = document.cookie.split(';');
// 	for(var i = 0; i < ca.length; i++)
//    	{
// 		var c = ca[i];
// 		while (c.charAt(0) == ' ')
// 			c = c.substring(1);

// 		if (c.indexOf(name) == 0) 
// 			return c.substring(name.length, c.length);
// 	}
// 	return "";
// }

// function firstToDo() {
//     var todo = prompt("What is your task?", "");
//     if (todo === "") {
//         alert("you did not add any task!")
//         return ;
//     }
//     addToDo(todo);
// }

// function addToDo(todo) {
//     ft_list.prepend($('<div>' + todo + '</div>').click(delToDo));
//     // div = document.createElement("div");
//     // div.innerHTML = todo;
//     // div.addEventListener("click", delToDo);
//     // ft_list.insertBefore(div, ft_list.firstChild);


//     // // var todo = ft_list.children;
//     // // var newCookie = [];
//     // // for (var i = 0; i < todo.length; i++)
//     // //     newCookie.unshift(todo[i].innerHTML);
//     // // console.log(newCookie);
//     // // document.cookie = newCookie;
//     // // console.log(document.cookie);

//     // // for(var i = 0; i < ft_list.children.length; i++) {
//     // //     console.log(ft_list.children[i].innerHTML);
//     // // }
// }

// function delToDo() {
//     if (confirm("Are you sure you want to delete this task?")) {
//         this.remove();
//     }
// }