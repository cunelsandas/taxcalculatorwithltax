/* เปลี่ยนภาพ background */
function ChangeCssBg(CssId,Cssvalue){
		document.getElementById(CssId).style.background= "url('images/"+Cssvalue+"') no-repeat";
		
		}

function ajaxLoad(method,URL,data,displayid){
	var ajax=null;
	if(window.ActiveXObject){
		ajax=new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		ajax=new XMLHttpRequest();
	}else{
		alert("browser not support");
		return;
	}
	method=method.toLowerCase();
	URL+="?dummy="+(new Date()).getTime();
	if(method.toLowerCase()=="get"){
		URL+="&"+data;
		data=null;
	}
	ajax.open(method,URL);
	
	if(method.toLowerCase()=="post"){
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
	}

	ajax.onreadystatechange = function(){
		if(ajax.readyState==4 && ajax.status==200){
			var ctype=ajax.getResponseHeader("Content-Type");
			ctype= ctype.toLowerCase();
			ajaxCallback(ctype,displayid,ajax.responseText);

			delete ajax;
			ajax=null;
		}
	}
	ajax.send(data);

}

function ajaxCallback(contentType,displayid,responseText){
	if(contentType.match("text/javascript")){
		eval(responseText);
	}
	else{
		var el=document.getElementById(displayid);
		el.innerHTML = responseText;
	}
}


function printdiv(printpage,fontsize)
{

if(fontsize==null){
	var fon1=12;
}else{
	var fon1=fontsize;
}
var headstr = "<html><head><title></title><style type='text/css'>[data-negative]{color: red;}@import url(../font/thsarabunnew.css);table tr:nth-child(odd) td{ background-color:#efefef;}table tr:nth-child(even) td{background-color:white;} body,th,td{font-family:THSarabunNew;font-size:"+fon1+"px;padding:3px;} th{background-color:#7f7f7f;color:white;}.title{	width:100%;background-color:#272727;color:yellow;}.th1{width:70%;height:30px;	line-height:30px;	background-color:#7f7f7f;color:white;display:inline-block;}.th2{width:30%;height:30px;line-height:30px;background-color:#7f7f7f;color:white;display:inline-block;}.tr1{width:70%;height:30px;line-height:30px;border-bottom:1px dashed #004080;color:blue;display:inline-block;}.tr2{width:30%;height:30px;line-height:30px;border-bottom:1px dashed #004080;color:blue;display:inline-block;}.hideul{margin-left:20px;width:100%;list-style:none;}.hideul li{height:30px;line-height:30px;	background-color:#d8fcf8;border-bottom:1px dashed #868686;width:90%;}.hideul li:hover{cursor:pointer;background-color:#ffffcc;}  .bottomLine{ background-color:#b6b6b6;color:black;} .pagebreak{page-break-after: always;} @page {size: 210mm 297mm; margin: 25mm 25mm 25mm 25mm; }@media print {@page {margin:15mm 5mm 15mm 5mm} body {background: #FFF;}table,td{overflow:visible !important;} }</style></head><body>";
var footstr = "</body></html>";
var newstr = document.all.item(printpage).innerHTML;
//var oldstr = document.body.innerHTML;
//document.body.innerHTML = headstr+newstr+footstr;
//window.print();
//document.body.innerHTML = oldstr;
//return false;

myWindow=window.open('','_blank');
myWindow.document.write(headstr+newstr+footstr);
myWindow.focus();
myWindow.document.close();

}





