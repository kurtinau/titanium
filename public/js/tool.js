function getRealPath(){
   var curWwwPath=window.document.location.href;

  var pathName=window.document.location.pathname;
  var pos=curWwwPath.indexOf(pathName);

  var localhostPaht=curWwwPath.substring(0,pos);

  // var projectName=pathName.substring(0,pathName.substr(1).indexOf('/')+1);
 

  // var realPath=localhostPaht+projectName;
  var realPath=localhostPaht;
  // alert(realPath);
  return realPath;
}