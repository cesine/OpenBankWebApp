function DcsInit(){
	this.dcsid="dcsx1s8r800000oub8au9gzfc_2r8h";
	this.domain="secureinfo.ingdirect.ca";
	this.enabled=true;
	this.fpc="WT_FPC";
    var t=this;
    (function(){
        if (t.enabled&&(document.cookie.indexOf(t.fpc+"=")==-1)&&(document.cookie.indexOf("WTLOPTOUT=")==-1)){
            document.write("<scr"+"ipt type='text/javascript' src='"+"http://"+t.domain+"/"+t.dcsid+"/wtid.js"+"'><\/scr"+"ipt>");
        }
	})();
}
var DCS={};
var WT={};
var DCSext={};
var dcsInit=new DcsInit();