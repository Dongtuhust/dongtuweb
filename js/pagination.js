var page = 1;

document.getElementsByTagName("").forEach(element => {
    element.onclick = changePage(element);
});
document.getElementById("distributionBtn").onclick = function(){
    if(mode != "distribution"){
        distribution();
        mode = "distribution";
    }
}

document.getElementById("").innerHTML = 

document.getElementById("userBtn").onclick = function(){
    if(mode != "user"){
        distribution();
        mode = "user";
    }
}

function changePage(src){
    var pageNumber = src.getAttribute("page");
    if(pageNumber != page){
        page = pageNumber;
    }
}