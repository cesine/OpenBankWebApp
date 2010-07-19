// $Id: form-validator.js 5825 2007-01-02 08:24:58Z andrew $
/**
 *
 * Copyright (c) 2004-2006 by Zapatec, Inc.
 * http://www.zapatec.com
 * 1700 MLK Way, Berkeley, California,
 * 94709, U.S.A.
 * All rights reserved.
 */

//Array of Data Types
Zapatec.Form.dataTypes = {};

Zapatec.Form.Validator = [];

/*
* Small function to add datatypes to Zapatec.Form.dataTypes
* @param zpName {String} name of this datatype
* @param name {String} internal name
* @param regex {RegExp} regexp to validate
* @param error {String} text to use, if validation was not passed
* @param help {String} help message
* @param func {function} function to use for validating field value
*/

Zapatec.Form.Validator.addDataType = function(zpName, name, regex, error, help, func) {
	Zapatec.Form.dataTypes[zpName] = {
		zpName: zpName,
		name: name,
		regex: regex,
		error: error,
		help: help,
		func: func
 };
}

// backward compartibility
Zapatec.Form.addDataType = Zapatec.Form.Validator.addDataType;

/*
 * Returns true, if given string is valid domain name
 * Valid domains:
 *	127.0.0.1
 *	google.com
 *	http://www.google.com/
 * @param domain {string} value to test
 * @return true if value is correct domain name
 * @type boolean
 */
Zapatec.Form.Validator.isDomainValid = function(domain){
	if(typeof(domain) != 'string'){
		return false;
	}

/* remove this rule, so French character become valid
	for (i = 0; i < domain.length; i++){
		if (domain.charCodeAt(i) > 127){
			return false;
		}
	}
*/
	var ipDigit = "(0?0?\\d|[01]?\\d\\d|2[0-4]\\d|25[0-6])";
	var ipRE = new RegExp("^" + ipDigit + "\\." + ipDigit + "\\." + ipDigit + "\\." + ipDigit + "$");

	if (ipRE.test(domain)) {
		return true;
	}

	var domains = domain.split(".");

	if (domains.length < 2) {
		return false;
	}



	for (i = 0; i < domains.length - 1; i++) {
		if (!(/^[a-zA-Z0-9\-\!\#\$\%\&\\'\*\+\-\/\=\_\~\`\{\}]+$/).test(domains[i])) {
			return false;
		}
	}

	if(domains[domains.length-2].length < 2){
		return false;
	}

	if (!(/^[ÈÍ\{a-zA-Z]{2,}$/).test(domains[domains.length-1])){
		return false;
	}

	return true;
}

/*
 * Returns true, if given string is valid domain name
 * Valid urls:
 *	127.0.0.1
 *	http://127.0.0.1/index.html?query
 *	google.com
 *	http://www.google.com/search?q=Zapatec
 * @param url {String} value to test
 * @return true if value is correct URL
 * @type boolean
 */
Zapatec.Form.Validator.isUrlValid = function(url){
	if(typeof(url) != 'string'){
		return false;
	}

	var domain = url;

	var protocolSeparatorPos = url.indexOf("://");
	var domainSeparatorPos = url.indexOf("/", protocolSeparatorPos + 3);

	if(protocolSeparatorPos == 0){
		return false;
	}

	domain = url.substring(
		(protocolSeparatorPos > 0 ? protocolSeparatorPos + 3 : 0),
		(domainSeparatorPos > 0 ? domainSeparatorPos : url.length)
	);

	var portSeparatorPos = domain.indexOf(":");

	if(portSeparatorPos > 0){
		var port = domain.substring(portSeparatorPos + 1);
	
		if(!port.match(/\d+/)){
			// port number contains non-digits
			return false;
		}

		domain = domain.substring(0, portSeparatorPos);
	}

	return Zapatec.Form.Validator.isDomainValid(domain);
}

/**
 * Checks if given string is valid email address.
 * @param url {String} value to test
 * @return true if value is correct email
 * @type boolean
 */
Zapatec.Form.Validator.isIEmailValid = function(email){
	if(email == null){
		return false;
	}

	var atPos = email.indexOf("@");

	if(
		atPos < 1 ||
		email.indexOf(".", atPos) == -1
	){
		return false
	}

	var login = email.substring(0, atPos);
	var domain = email.substring(atPos + 1, email.length);

	// Regexp declarations
    //var atom = "\[^\\s\\(\\)><@,;:\\\\\\\"\\.\\[\\]\]+";
    var atom = "\[^\\s\\(\\)><@,;:\\\\\\\"\\.\\[\\]&!#$%^*=|'`~?\/{}\\+\]+";
    var word = "(" + atom + "|(\"[^\"]*\"))";
    var loginRE = new RegExp("^" + word + "(\\." + word + ")*$");
/*
    for (i = 0; i < login.length; i++){
        if (login.charCodeAt(i) > 127){
            return false;
        }
    }
*/
    if (!login.match(loginRE)){
        return false;
    }

    return Zapatec.Form.Validator.isDomainValid(domain);
}

/*
 * Returns true, if given string is valid credit card number(according to Luhn
 * algorythm)
 * @param cardNumber - [string] value to test
 * @return true if value is correct domain name
 * @type boolean
 */
Zapatec.Form.Validator.isCreditCardValid = function(cardNumber){
	if(cardNumber == null){
		return false;
	}

	var cardDigits = cardNumber.replace(/\D/g, "");
	var parity = cardDigits.length % 2;
	var sum = 0;

	for(var ii = 0; ii < cardDigits.length; ii++){
		var digit = cardDigits.charAt(ii);

		if (ii % 2 == parity)
			digit = digit * 2;

		if (digit > 9)
			digit = digit - 9;

		sum += parseInt(digit);
	}

	return ((sum != 0) && (sum % 10 == 0))
}

/*
 * Returns true if given string is valid date according to given format. Default format: "%m/%d/%y"
 * @param str - [string] value to test
 * @param format - [string] date format
 * @return true if value is correct domain name
 * @type boolean
 */
Zapatec.Form.Validator.isDateValid = function(str, fmt){
	if(fmt == null || fmt == ""){
		fmt = "%d/%m/%y"
	}

	var separator = " ";
	var nums = fmt.split(separator)

	if (nums.length < 3){
		separator = "/"
		nums = fmt.split(separator)

		if (nums.length < 3){
			separator = "."
			nums = fmt.split(separator)

			if (nums.length < 3){
				separator = "-"
				nums = fmt.split(separator)

				if (nums.length < 3){
					separator = null;
				}
			}
		}
	}

	if(separator == null){
		return false;
	}

	var y = null;
	var m = null;
	var d = null;

	var a = str.split(separator);

	if(a.length != 3){
		return false;
	}

	var b = fmt.match(/%./g);

	var nlDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	var lDays  = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    for (var i = 0; i < a.length; ++i) {
		if (!a[i])
			continue;
		switch (b[i]) {
		    case "%d":
		    case "%e":
				d = parseInt(a[i], 10);
				if(d < 0 || d > 31)
					d = -1
				break;
		    case "%m":
				m = parseInt(a[i], 10) - 1;
				if(m > 11 || m < 0)
					m = -1;
				break;
		    case "%Y":
		    case "%y":
				y = parseInt(a[i], 10);
				(y < 100) && (y += (y > 29) ? 1900 : 2000);
				break;
		}
	}

	if (y == null || m == null || d == null || isNaN(y) || isNaN(m) || isNaN(d)){
		return false;
	}

	if(m != -1){
		if ((y % 4) == 0) {
			if ((y % 100) == 0 && (y % 400) != 0){
				if(d > nlDays[m]){
					d = -1;
				}
			}

			if(d > lDays[m]){
				d = -1;
			}
		} else {
			if(d > nlDays[m]){
				d = -1;
			}
		}
	}

	if (y != 0 && m != -1 && d != -1){
		return true;
	}

	return false;
}

/*
* Returns true if given string is valid city name"
* @param str - [string] value to test
*/
Zapatec.Form.Validator.isCityValid = function(city){
	if(city == null){
		return false;
	}
	
	//cityValidChar_1=/^[\w‡‚ÁÈËÍÎÓÔÙ˚˘¸ˇ\-\.\s\'\,]+$/;
	//cityValidChar_1=/^[\w‡‚‰ÈËÍÎÓÔÙˆ˘˚¸ˇ??Á«…\-\.\s\'\,]+$/;
	cityValidChar_1=/^[\w‡‚‰ÈËÍÎÓÔÙˆ˘˚¸ˇÁ«…\-\.\s\'\,]+$/;
	var matchArray=city.match(cityValidChar_1);
	
	if (matchArray != null)
		{ return true;}
	
	return false;

}

/*
* Returns true if given string is valid name"
* @param str - [string] value to test
*/
Zapatec.Form.Validator.isNameValid = function(firstname){

	if(firstname == null){
		return false;
	}
	
	nameValidChar_1=/^[A-Za-z]$/;
	var matchArray=firstname.match(nameValidChar_1);
	
	if (matchArray != null)
		{ return true;}
	
	// in sync with java rule: if contains any of follow char, will be invalid
/*		private final static char[] invalidCharacters = 
		{'!','#','$', '%', '&', '*', '+', '/', '\\','=', '?', 
		'^', '_', '`', '{', '|', '}', '~', '@', ',','[',']'};
*/	
	nameInValidChar_2=/[\!#\$%&\*\+\/\\\=\?\^_\`\{\|\}~@,\[\]1234567890]/;
	matchArray=firstname.match(nameInValidChar_2);
	
	if (matchArray != null)
		{ return false; }
	
	return true;

}

/*
* Returns true if given string is not numeric
* @param str - [string] value to test
*/
Zapatec.Form.Validator.isNonNumeric = function(str){

	if(str == null){
		return false;
	}
	
	var rule=/[0-9]/;
	var matchArray=str.match(rule);
	
	if (matchArray != null)
		{ return false;}
	
	return true;
}

/*
 * Returns true if given string is less than a given max size. Default size: "9999"
 * @param str - [string] value to test
 * @param maxSize - [int] max length
 * @return true if value is correct domain name
 * @type boolean
 */
Zapatec.Form.Validator.isInputTooLong = function(str, maxSize){

	if(maxSize == null || maxSize  == "" || isNaN(maxSize) || str == null || str == ""){  // maxSize.isNaN check too
		return true;
	}
	return (str.length <= maxSize);
}

/*
 * Returns true if given string is greater than a given min size. Default size: 0
 * @param str - [string] value to test
 * @param minSize - [int] min length
 * @return true if value is greater than minSize
 * @type boolean
 */
Zapatec.Form.Validator.isInputTooShort = function(str, minSize){
	if(minSize == null || minSize  == "" || isNaN(minSize) || str == null || str == ""){  // minSize.isNaN check too
		return true;
	}
	return (str.length >= minSize);
}

//Initialize the validators
Zapatec.Form.Validator.addDataType(
	'zpFormUrl',
	'A URL -- web address',
	null,
	'invalidURLError',
	"Valid URL needs to be in the form http://www.yahoo.com:80/index.html or just www.yahoo.com",
	Zapatec.Form.Validator.isUrlValid
);

Zapatec.Form.Validator.addDataType(
	'zpFormIEmail',
	'An Email Address',
	null,
	'invalidEmailError',
	"Valid email address need to be in the form of nobody@example.com",
	Zapatec.Form.Validator.isIEmailValid
);

Zapatec.Form.Validator.addDataType(
	'zpFormCreditCard',
	'Credit card number',
	null,
	'invalidCreditCardError',
	"Please enter valid credit card number",
	Zapatec.Form.Validator.isCreditCardValid
);

Zapatec.Form.Validator.addDataType(
	'zpFormUSPhone',
	'A USA Phone Number',
	/^((\([1-9][0-9]{2}\) *)|([1-9][0-9]{2}[\-. ]?))(\d[ -]?){6}\d *(ex[t]? *[0-9]+)?$/,
	'invalidUSPhoneError',
	"Valid US Phone number needs to be in the form of 'xxx xxx-xxxx' For instance 312 123-1234. An extention can be added as ext xxxx. For instance 312 123-1234 ext 1234",
	null
);

Zapatec.Form.Validator.addDataType(
	'zpFormInternationalPhone',
	'An international Phone Number',
	/^\+\d{1,3}[ -]\d{2,3}[ -](\d[ -]?){6}\d *(ex[t]? *[0-9]+)?$/,
//	/^((\([1-9][0-9]{2}\) *)|([1-9][0-9]{2}[\-. ]?))[0-9]{3}[\-. ][0-9]{4} *(ex[t]? *[0-9]+)?$/,
	'invalidInternationalPhoneError',
	"Valid internation phone number needs to be in the form of '+x xxx xxx-xxxx' For instance +1 234 567-9012. An extention can be added as ext xxxx. For instance +1 234 567-9012 ext 1234",
	null
);

Zapatec.Form.Validator.addDataType(
	'zpFormUSZip',
	'A USA Zip Number',
	/(^\d{5}$)|(^\d{5}-\d{4}$)/,
	'invalidUSZipError',
	"Valid US Zip number needs to be either in the form of '99999', for instance 94132 or '99999-9999' for instance 94132-3213",
	null
);

Zapatec.Form.Validator.addDataType(
	'zpFormDate',
	'A Valid Date',
	null,
	'invalidDateError',
	"Please enter a valid date",
	Zapatec.Form.Validator.isDateValid
);

Zapatec.Form.Validator.addDataType(
	'zpFormInt',
	'An Integer',
	null,
	'invalidIntError',
	"Please enter an integer",
	function(number) {
		return /^\d+$/.test(number)
	}
);

Zapatec.Form.Validator.addDataType(
	'zpFormFloat',
	'A Floating Point Number',
	null,
	'invalidFloatError',
	"Please enter a Floating Point Number",
	function(number) {
		var parsed = parseFloat(number);
		return (parsed == number);
	}
);

Zapatec.Form.Validator.addDataType(
	'zpFormMinFloat',
	'A Floating Point Number',
	null,
	'invalidMinFloatError',
	"Please enter a Floating Point Number that is above the minimum",
	function(fieldValue, minimum) {
		var parsed = parseFloat(fieldValue);
		return (parsed == fieldValue && parsed >= minimum);
	}
);


// create a custom data type for English Currency
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormCurrEn',          

	// Friendly description
	'A Currency field',    

	// Regular Expression for Validation
	//	/(^[0-9]+(\.[0-9]{2})?$)/,
	// /(^[0-9]+(\.[0-9]{2})?$)|(^[0-9]{1,3}(,[0-9]{3})*\.[0-9]{2}$)/,
	//	/(^\d+(\.\d{2})?$)|(^\d{1,3}(,\d{3})*\.\d{2}$)/,
	// /(^\d+(\.\d{1,2})?$)|(^[1-9]{1}(,\d{3})*\.\d{1,2}$)|(^[1-9]{1}\d{1,2}(,\d{3})*\.\d{1,2}$)/,
	// this regex also appears in ApplicationUserText.properties, look for ZP_FORM_CURRENCY_REGEX
	/(^\d*(\.\d{1,2})?$)|(^[1-9]{1}(,\d{3})*(\.\d{1,2})?$)|(^[1-9]{1}\d{1,2}(,\d{3})*(\.\d{1,2})?$)/,

	// Error message
	"Invalid Currency",    

	// Help message
	"Valid currency is ##.##",  

	// Function
	null  
);

// create a custom data type for French Currency
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormCurrFr',          

	// Friendly description
	'A Currency field',    

	// Regular Expression for Validation
	// /(^[0-9]+(\,[0-9]{2})?$)/,
	// /(^[0-9]+(\,[0-9]{2})?$)|(^[0-9]{1,3}(\s[0-9]{3})*\,[0-9]{2}$)/,
	// /(^\d+(\,\d{2})?$)|(^[1-9]{1}(\s\d{3})*\,\d{2}$)|(^[1-9]{1}\d{1,2}(\s\d{3})*\,\d{2}$)/,
	// /(^\d+(\,\d{1,2})?$)|(^[1-9]{1}(\s\d{3})*\,\d{1,2}$)|(^[1-9]{1}\d{1,2}(\s\d{3})*\,\d{1,2}$)/,
	// this regex also appears in ApplicationUserText.properties, look for ZP_FORM_CURRENCY_REGEX
	 /(^\d*(\,\d{1,2})?$)|(^[1-9]{1}(\s\d{3})*(\,\d{1,2})?$)|(^[1-9]{1}\d{1,2}(\s\d{3})*(\,\d{1,2})?$)/,
	 

	// Error message
	"MONNAIE INVALIDE",    

	// Help message
	"Valid currency is ##.##",  

	// Function
	null  
);

// create a custom data type for French Currency
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormEmpMonth',          

	// Friendly description
	'A Employed Month field',    

	// Regular Expression for Validation
	null,

	// Error message
	"Invalid Month",    

	// Help message
	"Valid month between 0 and 11",  

	// Function
	function(number) {
		return (number >= 0 && number <= 11);
	}
);

/*
// create a custom data type for First Name, Last Name and Initials
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormNameChk',          

	// Friendly description
	'A Name field',    

	// Regular Expression for Validation
	/[^\d~!@#$%^&*()_=+/{}\\\\\\|\\\[\\\],']+$/,

	// Error message
	"Invalid Name",    

	// Help message
	"Valid name is required",  

	// Function
	null  
);
*/

// create a custom data type for First Name, Last Name and Initials
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormNameChk',          

	// Friendly description
	'A Name field',    

	// Regular Expression for Validation
	null,
	
	// Error message
	"Invalid Name",    

	// Help message
	"Valid name is required",  

	// Function
	Zapatec.Form.Validator.isNameValid
);


// create a custom data type for First Name, Last Name and Initials
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormNonNumeric',          

	// Friendly description
	'A non numeric field',    

	// Regular Expression for Validation
	null,

	// Error message
	"Number is not valid",    

	// Help message
	"Remove number",  

	// Function
	Zapatec.Form.Validator.isNonNumeric
);

/*
// create a custom data type for First Name, Last Name and Initials
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormNonNumeric',          

	// Friendly description
	'A non numeric field',    

	// Regular Expression for Validation
	null,

	// Error message
	"Number is not valid",    

	// Help message
	"Remove number",  

	// Function
	null  
);
*/
Zapatec.Form.Validator.addDataType(
	// Zapatec Name to be put in INPUT class
	'zpFormCity',

	// Friendly description
	'City',

	// Regular Expression for Validation
	null,

	// Error message
	"City Name is invalid",
	
	// Help message
	"Please enter valid city",

	// Function
	Zapatec.Form.Validator.isCityValid
);

/*
* Returns true if given string is too long"
* @param str - [string] value to test
*/
Zapatec.Form.Validator.addDataType(
	'zpFormInputLengthCheck',
	'An Input Length Check',
	null,
	'invalid input length ',
	"The input entered is too long",
	Zapatec.Form.Validator.isInputTooLong
);

/*
* Returns true if given string is too short"
* @param str - [string] value to test
*/
Zapatec.Form.Validator.addDataType(
	'zpFormMinInputLengthCheck',
	'An Minimum Input Length Check',
	null,
	'invalid input length ',
	"The input entered is too short",
	Zapatec.Form.Validator.isInputTooShort
);





