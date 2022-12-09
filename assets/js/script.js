function openCreateDialog(){
    document.getElementById("modal1").style.display="flex";
}

function closeCreateDialog(){
    document.getElementById("modal1").style.display="none";
}

function json2tr(json){
    return '<tr><td>' + json.titre + '</td>' + 
            '<td>' + json.contenue + '</td>' + 
            '<td>' + json.pseudo + '</td></tr>';
}

function todolist2html(todolistJson){

    var str = '';
    for(let i =0; i<todolistJson.length;i++){
        str += json2tr(todolistJson[i]);
    }
    document.getElementById("list").innerHTML = str;

}

function GetList(){

    var xhr = new XMLHttpRequest();
    xhr.open("GET", 'C:/xampp/htdocs/PHP/projet-groupe-forum/forum/readall.php');
    xhr.send();
    xhr.onload = function() {
        let reponse = xhr.response;
        console.log(reponse);
        todolist2html(JSON.parse(reponse));
        
    }


}

document.getElementById("list").innerHTML = GetList();



function createTopic(){
    let newContent = document.getElementById("content").innerText;
    let newTitle = document.getElementById("title").innerText;
    var xhr = new XMLHttpRequest;
    xhr.open("GET", './assets/php/create?content="'+newContent+'"');
    xhr.open("GET", './assets/php/create?titre="'+newTitle+'"');
    xhr.timeout = 5000;
    xhr.send();
    xhr.onload = function() {
        let reponse = JSON.parse(xhr.response)
        let newTitle =reponse.titre;
        let newTodo = {};
        newTodo.title = newTitle;
        newTodo.content = newContent;
        let newHtml = todo2html(newTodo);
        document.getElementById("list").innerHTML = newHtml;

    }  
}

