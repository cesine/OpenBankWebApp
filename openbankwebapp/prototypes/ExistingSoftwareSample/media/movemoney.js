function disableFormField(field) {
  if (document.all || document.getElementById) {
    field.disabled = true;
  } else {
    field.oldOnFocus = field.onfocus; field.onfocus = skip;
  }
}

function getSelectedValue(selection) {
  return selection.options[selection.selectedIndex].value;
}

function popCal() {
  newwindow = window.open("","popCal","height=460,width=710,scrollbars=yes,resizable=yes,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function PopWin() {
  newwindow = window.open("","PopWin","height=500,width=480,scrollbars=yes,resizable=yes,top=50,left=50,screenX=50,screenY=50,location=no,toolbar=no");
}

function onCalendarClose(cal) {
  cal.hide();
  return true;
}

function changeSchedule(freq) {
  var divNow = document.getElementById('freq_now');
  var divLater = document.getElementById('freq_later');
  var divOngoing = document.getElementById('freq_ongoing');
  if (freq.value == 'Now') {
    if (divNow) divNow.style.display = '';
    if (divLater) divLater.style.display = 'none';
    if (divOngoing) divOngoing.style.display = 'none';
  } else if (freq.value == 'Later') {
    if (divNow) divNow.style.display = 'none';
    if (divLater) divLater.style.display = '';
    if (divOngoing) divOngoing.style.display = 'none';
  } else if (freq.value == 'Ongoing') {
    if (divNow) divNow.style.display = 'none';
    if (divLater) divLater.style.display = 'none';
    if (divOngoing) divOngoing.style.display = '';
  }
}

function bodyOnLoad() {
}

function doSubmit() {
  window.document.MainForm.submit();
}

function doCancel() {
  window.parent.location.href  = refreshLink;
}

function trimSpaces(input) {
  return input.replace(/^\s*|\s*$/g, '');
}
