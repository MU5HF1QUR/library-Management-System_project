function show_result(str) {
  if (str.length==0) { 
    document.getElementById("live_search").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttpreq=new XMLHttpRequest();
  } else { 
    xmlhttpreq=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttpreq.onreadystatechange=function() { 
    if (this.readyState==4 && this.status==200) {
      document.getElementById("live_search").innerHTML=this.responseText;
    }
  }

  xmlhttpreq.open("GET", "search.php?q="+str,true);
  xmlhttpreq.send();
}