function DcsInit(){
	this.dcsid="dcsdzdd0r10000cx9jjdww31i_9k8f";
	this.domain="secureinfo.ingdirect.ca";
	this.enabled=true;
	this.fpc="WT_FPC";
    var t=this;
    (function(){
        if (t.enabled&&(document.cookie.indexOf(t.fpc+"=")==-1)&&(document.cookie.indexOf("WTLOPTOUT=")==-1))
        {
            document.write("<scr"+"ipt type='text/javascript' src='"+"https://"+t.domain+"/"+t.dcsid+"/wtid.js"+"'><\/scr"+"ipt>");
        }
	})();
}
var DCS={};
var WT={};
var DCSext={};
var dcsInit=new DcsInit();