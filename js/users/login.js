function login(){
  var txtName=$("txtName"),txtPwd=$("txtPwd");
  var xhr=new XMLHttpRequest();
  xhr.open(
    "post","data/users/login.php",true);
  xhr.onreadystatechange = function(){
    if(xhr.readyState==4 && xhr.status==200){
      var result = xhr.responseText; //服务器响应结果
        if(result=="true"){
          alert("登录成功");
          location="index.html";
        }else alert("用户名或密码不正确!");
    }
  }
  xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  var msg="uname="+txtName.value+"&upwd="+txtPwd.value;  
  xhr.send(msg);
}