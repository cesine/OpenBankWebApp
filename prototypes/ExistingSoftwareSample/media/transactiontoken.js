function getCookieValTT(a){var b=document.cookie.indexOf(";",a);if(b==-1)b=document.cookie.length;return unescape(document.cookie.substring(a,b))}function getCookieTT(a){var b=a+"=";var c=b.length;var d=document.cookie.length;var i=0;while(i<d){var j=i+c;if(document.cookie.substring(i,j)==b)return getCookieValTT(j);i=document.cookie.indexOf(" ",i)+1;if(i==0)break}return null}function populateTransactionToken(){var a="TRANSACTION_TOKEN";var b=document.getElementById(a);if(b){b.value=getCookieTT(a)}else{var c=document.getElementsByName(a);if(c){c[0].value=getCookieTT(a)}}}