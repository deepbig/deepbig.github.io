var ft_list;
var cookie = [];

window.onload = function () {
    document.querySelector("#new").addEventListener("click", newTodo);
    ft_list = document.querySelector("#ft_list");
    var tmp = document.cookie;
    if (tmp) {
        cookie = JSON.parse(tmp);
        cookie.forEach(function (e) {
            addTodo(e);
        });
    }
};

window.onunload = function () {
    var todo = ft_list.children;
    var newCookie = [];
    for (var i = 0; i < todo.length; i++)
        newCookie.unshift(todo[i].innerHTML);
    document.cookie = JSON.stringify(newCookie);
};

function newTodo(){
    var todo = prompt("What is your task?", "");
    if (todo !== '') {
        addTodo(todo)
    }
}

function addTodo(todo){
    var div = document.createElement("div");
    div.innerHTML = todo;
    div.addEventListener("click", deleteTodo);
    ft_list.insertBefore(div, ft_list.firstChild);
}

function deleteTodo(){
    if (confirm("Are you sure you want to delete this task?")){
        this.parentElement.removeChild(this);
    }
}

// var button;
// var ft_list;
// //var todo;
// var div;
// var cookie = [];
// //var newCookie = [];

// window.onload = function() {
//     button = document.querySelector("#button");
//     button.addEventListener("click", firstToDo);
//     ft_list = document.querySelector("#ft_list");
//     var tmp = document.cookie;
//     if (tmp) {
//         cookie = JSON.parse(tmp);
//         cookie.forEach(function (todo) {
//             addToDo(todo);
//         });
//     }
// }

// window.onunload = function () {
//     var todo = ft_list.children;
//     var newCookie = [];
//     for (var i = 0; i < todo.length; i++)
//         newCookie.unshift(todo[i].innerHTML);
//     document.cookie = JSON.stringify(newCookie);
// };

// function firstToDo() {
//     var todo = prompt("What is your task?", "");
//     if (todo === "") {
//         alert("you did not add any task!")
//         return ;
//     }
//     addToDo(todo);
// }

// function addToDo(todo) {

//     div = document.createElement("div");
//     div.innerHTML = todo;
//     div.addEventListener("click", delToDo);
//     ft_list.insertBefore(div, ft_list.firstChild);


//     // var todo = ft_list.children;
//     // var newCookie = [];
//     // for (var i = 0; i < todo.length; i++)
//     //     newCookie.unshift(todo[i].innerHTML);
//     // console.log(newCookie);
//     // document.cookie = newCookie;
//     // console.log(document.cookie);

//     // for(var i = 0; i < ft_list.children.length; i++) {
//     //     console.log(ft_list.children[i].innerHTML);
//     // }
// }

// function delToDo() {
//     if (confirm("Are you sure you want to delete this task?")) {
//         this.parentElement.removeChild(this);
//     }
// }


