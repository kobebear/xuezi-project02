function $(id){
  return document.getElementById(id);
}

function get(url,callback){
  var xhr=new XMLHttpRequest();
  xhr.open("get",url,true);
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      callback(xhr.responseText);
    }
  }
  xhr.send();
}