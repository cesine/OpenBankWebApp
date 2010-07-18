/**
 *  File: ingCalenderFunctions.js
 *  Purpose:
 *        1) Provide a common shared approach to displaying calendar popup controls	
 *		  2) Provide options for disabling invalid dates
 *				a) Future dates (dates in the past disabled)
 *			    b) Future business dates (dates in the past disabled and future weekends).
 *				c) Before today (dates in the future disabled)
 *  Usage:	
 *        To be used with the IPageElement.xsl includes
 */	
		
	function futureDaysOnly(date) {
		// disable previous days
		return ( (beforeToday(date)  ) ? true : false );
	}

	function futureBusinessDaysOnly(date) {
		// disable weekend days (Saturdays == 6 and Sundays == 0) and previous days
		return ( (date.getDay() == 6 || date.getDay() == 0 || beforeToday(date)  ) ? true : false );
	}

	function beforeToday(date) {
	    //disable days after today
		var today = new Date();
		var compareToday = compareDatesOnly(date, today);
		if (compareToday > 0) {
			return(true);
		} else {
			return(false);
		}
	}
	function afterToday(date) {
	    //disable days prior to today
		var today = new Date();
		var compareToday = compareDatesOnly(today, date);
		if (compareToday > 0) {
			return(true);
		} else {
			return(false);
		}
	}
	function beforeThreeDaysAfterToday(date) {
	    //Returns true if date is before three days after today (This function is used for ASP start date validation)
		var threeDaysAfterToday = new Date(); // initialize to today
		threeDaysAfterToday.setTime( threeDaysAfterToday.getTime() + 1000 * 60 * 60 * 24 * 3 );
		var compareToday = compareDatesOnly(date, threeDaysAfterToday);
		if (compareToday > 0) {
			return(true);
		} else {
			return(false);
		}
	}
	

	/*
	 * Given two dates (in seconds) find out if date1 is bigger, date2 is bigger or
	 * they're the same, taking only the dates, not the time into account.
	 * In other words, different times on the same date returns equal.
	 * returns -1 for date1 bigger, 1 for date2 is bigger 0 for equal
	 */
	function compareDatesOnly(date1, date2) {
		var year1 = date1.getYear();
		var year2 = date2.getYear();
		var month1 = date1.getMonth();
		var month2 = date2.getMonth();
		var day1 = date1.getDate();
		var day2 = date2.getDate();

		if (year1 > year2) {
			return -1;
		}
		if (year2 > year1) {
			return 1;
		}

		//years are equal
		if (month1 > month2) {
			return -1;
		}
		if (month2 > month1) {
			return 1;
		}

		//years and months are equal
		if (day1 > day2) {
			return -1;
		}
		if (day2 > day1) {
			return 1;
		}

		//days are equal
		return 0;
	}
