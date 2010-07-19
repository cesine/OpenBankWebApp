//-- SetCookie Module
//-- TeamTech, All Rights Reserved.

//-- **** Don't modify below this point ***
var _ubd=document,_udl=_ubd.location;
var _udn="auto";		// (auto|none|domain) set the domain name for cookies. 
// you can set _udn = ".ingdirect.ca" if the html always belong this site.
var _utcp="/";			// cookie path for tracking, leave it "/" for any directory in server can access this cookie
var _ucto="5184000";		// set Cookie expire in seconds (60 days default)

var _uhash="on";		// (on|off) unique domain hash for cookies

function _uDomain() {
    if (!_udn || _udn=="" || _udn=="none") { _udn=""; return 1; }
    if (_udn=="auto") {
    var d=_ubd.domain;
    if (d.substring(0,4)=="www.") {
    d=d.substring(4,d.length);
    }
    _udn=d;
    }
   
    if (_uhash=="off") return 1;
    return _uHash(_udn); 
}

 
function _uHash(d) {
    if (!d || d=="") return 1;
    var h=0,g=0;
    for (var i=d.length-1;i>=0;i--) {
    var c=parseInt(d.charCodeAt(i));
    h=((h << 6) & 0xfffffff) + c + (c << 14);
    if ((g=h & 0xfe00000)!=0) h=(h ^ (g >> 21));
    }
    return h;
} 

function getParam(name)
{
  var start=location.search.indexOf("?"+name+"=");
  if (start<0) start=location.search.indexOf("&"+name+"=");
  if (start<0) return '';
  start += name.length+2;
  var end=location.search.indexOf("&",start)-1;
  if (end<0) end=location.search.length;
  var result='';
  for(var i=start;i<=end;i++) {
    var c=location.search.charAt(i);
    result=result+(c=='+'?' ':c);
  }
  return unescape(result);
}

var SiteID ="";
var PlacementID ="";
var ADID ="";
var CreativeID ="";
var sourceFlag ="";
var mediaFlag ="";

function getAllParam()
{
    SiteID = getParam("sid") ;
    PlacementID =getParam("pid");
    ADID = getParam("aid");
    CreativeID = getParam("cid");
    sourceFlag = getParam("sourceflag");
    mediaFlag = getParam("mediaflag");
}

function ParamExist()
{
   if( (SiteID  == "") &&  (PlacementID  == "") &&  (ADID == "" ) && ( CreativeID  == "" ) &&  ( sourceFlag == "" ) &&  (mediaFlag == "" ) )
        return false;
   return true;
 }
 
function getSiteID()
{
    return "sid=" + SiteID ;
}

function getPlacementID()
{
    return "pid=" + PlacementID;
}

function getADID()
{
    return "aid=" + ADID;
}

function getCreativeID()
{
    return "cid=" + CreativeID;
}

function getsourceFlag()
{
    return "sourceflag=" + sourceFlag;
}

function getmediaFlag()
{
    return "mediaflag=" + mediaFlag;
}
 

function cookieTracker() 
{
    var uniqueID,querystring,x="";
    
    var _udt=new Date();

    var _ust=Math.round(_udt.getTime()/1000);
    var _uu=Math.round(Math.random()*2147483647);
    var _udh=_uDomain();
    var _udo = "  domain=.ingdirect.ca"; //if we can not get domain, use the default one
    
    uniqueID =_udh+"."+_uu+"."+_ust;
 
    if (_ucto && _ucto!="") {
        x=new Date(_udt.getTime()+(_ucto*1000));
        x=" expires="+x.toGMTString()+";";
    }
    
    if (_udn && _udn!="") { _udo=" domain="+_udn+";"; }

    getAllParam();
    
    if( ParamExist() )
    {
        _ubd.cookie="uniqueID="+uniqueID+"; " + " path="+_utcp+";"+x+_udo;
        _ubd.cookie="date="+_udt.getTime()+"; " + " path="+_utcp+";"+x+_udo;
    }
    
    if( SiteID  != "" )
        _ubd.cookie= getSiteID()+"; " + " path="+_utcp+";"+x+_udo;
    if( PlacementID  != "" )
        _ubd.cookie= getPlacementID()+"; " + " path="+_utcp+";"+x+_udo;
    if( ADID != "" )
        _ubd.cookie= getADID()+"; " + " path="+_utcp+";"+x+_udo;
    if( CreativeID  != "" )
        _ubd.cookie= getCreativeID()+"; " + " path="+_utcp+";"+x+_udo;
    if( sourceFlag != "" )
        _ubd.cookie= getsourceFlag()+"; " + " path="+_utcp+";"+x+_udo;
    if( mediaFlag != "" )
        _ubd.cookie= getmediaFlag()+"; " + " path="+_utcp+";"+x+_udo;


}
