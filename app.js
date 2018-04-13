(function(){var gtConstEvalStartTime = new Date();function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk=eval('((function(){var a\x3d447880174;var b\x3d1629736461;return 421530+\x27.\x27+(a+b)})())');var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();

function createCSSSelector (selector, style) {
    if (!document.styleSheets) return;
    if (document.getElementsByTagName("head").length == 0) return;
  
    var styleSheet,mediaType;
  
    if (document.styleSheets.length > 0) {
      for (var i = 0, l = document.styleSheets.length; i < l; i++) {
        if (document.styleSheets[i].disabled) 
          continue;
        var media = document.styleSheets[i].media;
        mediaType = typeof media;
  
        if (mediaType === "string") {
          if (media === "" || (media.indexOf("screen") !== -1)) {
            styleSheet = document.styleSheets[i];
          }
        }
        else if (mediaType=="object") {
          if (media.mediaText === "" || (media.mediaText.indexOf("screen") !== -1)) {
            styleSheet = document.styleSheets[i];
          }
        }
  
        if (typeof styleSheet !== "undefined") 
          break;
      }
    }
  
    if (typeof styleSheet === "undefined") {
      var styleSheetElement = document.createElement("style");
      styleSheetElement.type = "text/css";
      document.getElementsByTagName("head")[0].appendChild(styleSheetElement);
  
      for (i = 0; i < document.styleSheets.length; i++) {
        if (document.styleSheets[i].disabled) {
          continue;
        }
        styleSheet = document.styleSheets[i];
      }
  
      mediaType = typeof styleSheet.media;
    }
  
    if (mediaType === "string") {
      for (var i = 0, l = styleSheet.rules.length; i < l; i++) {
        if(styleSheet.rules[i].selectorText && styleSheet.rules[i].selectorText.toLowerCase()==selector.toLowerCase()) {
          styleSheet.rules[i].style.cssText = style;
          return;
        }
      }
      styleSheet.addRule(selector,style);
    }
    else if (mediaType === "object") {
      var styleSheetLength = (styleSheet.cssRules) ? styleSheet.cssRules.length : 0;
      for (var i = 0; i < styleSheetLength; i++) {
        if (styleSheet.cssRules[i].selectorText && styleSheet.cssRules[i].selectorText.toLowerCase() == selector.toLowerCase()) {
          styleSheet.cssRules[i].style.cssText = style;
          return;
        }
      }
      styleSheet.insertRule(selector + "{" + style + "}", styleSheetLength);
    }
  }

function objectToArray (initObject, finalArray){
    for(i in initObject) {
        array = Object.values(initObject[i]);
        finalArray.push(array[0])
    }
}
clubNamesArray = [];
objectToArray(clubNamesObject, clubNamesArray);
clubShortDescArray = [];
objectToArray(shortDescObject, clubShortDescArray);
clubIconsArray = [];
objectToArray(clubIconsObject, clubIconsArray);
clubLeftImageArray = [];
objectToArray(leftImageObject, clubLeftImageArray);
clubLongDescArray = [];
objectToArray(longDescObject, clubLongDescArray);
clubRoomArray = [];
objectToArray(roomObject, clubRoomArray);
clubTimesArray = [];
objectToArray(timesObject, clubTimesArray);
clubAdvisorArray = [];
objectToArray(advisorObject, clubAdvisorArray);
clubEmailArray = [];
objectToArray(emailObject, clubEmailArray);



for (let i = 0; i < clubNamesArray.length; i++) {
  let noSpaceClub
  noSpaceClub = clubNamesArray[i];
  let s = 0
  for (s; s < noSpaceClub.length; s++) {
      noSpaceClub = noSpaceClub.replace(" ", "");
      noSpaceClub = noSpaceClub.replace("'", "");
  }
  noSpaceClub = noSpaceClub.toLowerCase();
  window[noSpaceClub] = {
    nospace: noSpaceClub,
    name: clubNamesArray[i].charAt(0).toUpperCase(),
    shortDesc: clubShortDescArray[i],
    backImage: clubIconsArray[i],
    leftImage: clubLeftImageArray[i],
    longDesc: clubLongDescArray[i],
    room: clubRoomArray[i],
    times: clubTimesArray[i],
    advisor: clubAdvisorArray[i],
    email: clubEmailArray[i]
  };
}

clubNamesArray.sort();

var newClub ;
var imageCounter = 0;

for (i in clubNamesArray) {
    var body = document.getElementById("body");
    var clubContainer = document.getElementById("clubContainer");
  //Making club name all lowercase with no spaces
    noSpaceClub = clubNamesArray[i];
    let s = 0
    for (s; s < noSpaceClub.length; s++) {
        noSpaceClub = noSpaceClub.replace(" ", "");
        noSpaceClub = noSpaceClub.replace("'", "");
    }
    noSpaceClub = noSpaceClub.toLowerCase();

    CSSObjectName = noSpaceClub;

  //Creating the CSS Background Images
    createCSSSelector("." + noSpaceClub, "background-image: url('" + this[CSSObjectName].backImage + "');");
    imageCounter++;

  //Creating the first div
    flexibleSpacing = document.createElement("div");
    flexibleSpacing.setAttribute("class", "col-xl-3 col-lg-4 col-md-6 col-sm-8");
    clubContainer.appendChild(flexibleSpacing);

  //Creating the second div
    clubContent = document.createElement("div");
    clubContent.setAttribute("class", "clubcontent");
    flexibleSpacing.appendChild(clubContent);

  //Creating the title
    hoverClubName = document.createElement("p");
    hoverClubName.setAttribute("class", "clubname");
    var clubHoverTitle = document.createTextNode(this[CSSObjectName].name);
    hoverClubName.appendChild(clubHoverTitle);
    clubContent.appendChild(hoverClubName);

  //Creating the third div
    projectAnimated = document.createElement("div");
    projectAnimated.setAttribute("class", "col-12 project " + noSpaceClub + " wow animated animated4 fadeInLeft");
    clubContent.appendChild(projectAnimated);

  //Creating the fourth div
    projectHoverContent = document.createElement("div");
    projectHoverContent.setAttribute("class", "project-hover");
    projectAnimated.appendChild(projectHoverContent);

  //Creating hover short description
    var clubShortDesc = document.createTextNode(this[CSSObjectName].shortDesc);
    clubHoverDesc = document.createElement("p");
    clubHoverDesc.appendChild(clubShortDesc);
    projectHoverContent.appendChild(clubHoverDesc);

  //Creating hover hr
    clubHoverHR = document.createElement("hr");
    projectHoverContent.appendChild(clubHoverHR);

  //Creating the learn more button
    clubHoverLearnMore = document.createElement("a");
    var learnMore = document.createTextNode("Learn More");
    clubHoverLearnMore.setAttribute("id", noSpaceClub + "-button");
    clubHoverLearnMore.setAttribute("class", "learnmorebutton");
    clubHoverLearnMore.appendChild(learnMore);
    projectHoverContent.appendChild(clubHoverLearnMore);


  //This is now for the modals
  //Creating opening and closing scripts first


  //Creating the modal black background
    modalBackground = document.createElement("div");
    modalBackground.style.zIndex = "9";
    modalBackground.setAttribute("id", noSpaceClub + "-button-modal")
    modalBackground.setAttribute("class", "modal modalSelector")
    body.appendChild(modalBackground);

  //Creating the modal body
    modalBody = document.createElement("div");
    modalBody.setAttribute("class", "modal-content")
    modalBackground.appendChild(modalBody);

  //Creating the close button
    modalEx = document.createElement("span");
    modalEx.style.zIndex = "10";
    modalEx.setAttribute("class", "close-button");
    modalEx.setAttribute("id", "close-" + noSpaceClub);
    exButton = document.createTextNode("✖");
    modalEx.appendChild(exButton);
    modalBody.appendChild(modalEx);

  //Creating the modal title
    modalTitle = document.createElement("h1");
    var clubModalTitle = document.createTextNode(this[CSSObjectName].name);
    modalTitle.setAttribute("class", "modalheader");
    modalTitle.appendChild(clubModalTitle);
    modalBody.appendChild(modalTitle);

  //Creating the modal sub body
    modalSubBody = document.createElement("div");
    modalSubBody.setAttribute("class", "container-fluid");
    modalSubBody.setAttribute("id", "superContainer");
    modalBody.appendChild(modalSubBody);
  
  //Creating the sub body row
    modalRow = document.createElement("div");
    modalRow.setAttribute("class", "row justify-content-center");
    modalSubBody.appendChild(modalRow);

  //Creating left image div
    leftImageDiv = document.createElement("div");
    leftImageDiv.setAttribute("class", "col-xl-10 col-lg-10 col-md-10 col-sm-11");
    leftImage = document.createElement("img");
    leftImage.setAttribute("style", "width: 100%; padding-top: 20px; margin: 0px;");
    leftImage.src=this[CSSObjectName].leftImage;
    leftImageDiv.appendChild(leftImage);
    modalRow.appendChild(leftImageDiv);
  
  //Creating long desc div
    longDescDiv = document.createElement("div");
    longDescDiv.setAttribute("class", "col-xl-10 col-lg-10 col-md-10 col-sm-11 description");
    longDesc = document.createElement("p");
    longDescText = document.createTextNode(this[CSSObjectName].longDesc);
    longDesc.setAttribute("class", "modaldesc");
    longDesc.appendChild(longDescText);
    longDescDiv.appendChild(longDesc);
    modalRow.appendChild(longDescDiv);

  //Creating the list
    clubInfoList = document.createElement("ul");
    clubInfoList.setAttribute("class", "desc-list");

    roomLi = document.createElement("li");
    timesLi = document.createElement("li");
    advisorLi = document.createElement("li");
    emailLi = document.createElement("li");

    roomText = document.createTextNode("Room: " + this[CSSObjectName].room);
    timesText = document.createTextNode("Times: " + this[CSSObjectName].times);
    advisorText = document.createTextNode("Advisor: " + this[CSSObjectName].advisor);
    emailText = document.createTextNode(this[CSSObjectName].email);
    emailTextTwo = document.createTextNode("Email: ");

    emailAnchor = document.createElement("a");
    emailAnchor.setAttribute("href", "mailto:" + this[CSSObjectName].email);
    emailAnchor.setAttribute("target", "_blank");
    emailAnchor.appendChild(emailText);


    roomLi.appendChild(roomText);
    timesLi.appendChild(timesText);
    advisorLi.appendChild(advisorText);
    emailLi.appendChild(emailTextTwo);
    emailLi.appendChild(emailAnchor);

    clubInfoList.appendChild(roomLi);
    clubInfoList.appendChild(timesLi);
    clubInfoList.appendChild(advisorLi);
    clubInfoList.appendChild(emailLi);

    longDescDiv.appendChild(clubInfoList);

  //Buttons to open the modal  
    var buttons = document.getElementsByClassName("learnmorebutton");
    var buttonsCount = buttons.length;
    for (var j = 0; j<= buttonsCount; j++) {
      buttons[i].onclick = function() {
        var modalItself = document.getElementById(this.id + "-modal");
        modalItself.style.display = "block";
      }
    }

  //Buttons to close the modal
    var closebuttons = document.getElementsByClassName("close-button");
    var closebuttonsCount = closebuttons.length;
    for (var j = 0; j < closebuttonsCount; j++) {
      closebuttons[j].onclick = function() {
        modalButton = this;
        modalBackground = modalButton.parentElement.parentElement;
        modalBackground.setAttribute("id", this.id + "-modal");
        var modalItself = document.getElementById(this.id + "-modal");
        modalItself.style.display = "none";
        originalClub = this.id.substring(6,9999);
        modalBackground.setAttribute("id", originalClub + "-button-modal");
      }
    }

  //Clicking on window outside modal
    var modals = document.getElementsByClassName("modalSelector");
    var modalsCount = modals.length;
    for (var j = 0; j< modalsCount; j++) {
      modals[j].onclick = function() {
        var modalItself = document.getElementById(this.id);
        window.onclick = function(event) {
          if (event.target == modalItself) {
            modalItself.style.display = "none";
          }
        }
      }
    }
  }
//Creating the first div
flexibleSpacing = document.createElement("div");
flexibleSpacing.setAttribute("class", "col-xl-3 col-lg-4 col-md-6 col-sm-8");
clubContainer.appendChild(flexibleSpacing);

//Creating the second div
clubContent = document.createElement("div");
clubContent.setAttribute("class", "clubcontent");
flexibleSpacing.appendChild(clubContent);

//Creating the title
hoverClubName = document.createElement("p");
hoverClubName.setAttribute("class", "clubname");
var clubHoverTitle = document.createTextNode("Credits");
hoverClubName.appendChild(clubHoverTitle);
clubContent.appendChild(hoverClubName);

//Creating the third div
projectAnimated = document.createElement("div");
projectAnimated.setAttribute("class", "col-12 project credits wow animated animated4 fadeInLeft");
clubContent.appendChild(projectAnimated);

//Creating the fourth div
projectHoverContent = document.createElement("div");
projectHoverContent.setAttribute("class", "project-hover");
projectAnimated.appendChild(projectHoverContent);

//Creating the credits hover
firstP = document.createElement("p");
firstP.setAttribute("id", "creditdesc")
firstPT = document.createTextNode("Created by ");
firstP.appendChild(firstPT);

stavA = document.createElement("a");
stavA.setAttribute("href", "https://github.com/Poonchy");
stavA.setAttribute("target", "_blank");
stavAP = document.createTextNode("Stav Corcos.");
stavA.appendChild(stavAP);
firstP.appendChild(stavA);

secondPT = document.createTextNode(" Made possible with the collaborative help of ");
firstP.appendChild(secondPT);

lunithA = document.createElement("a");
lunithA.setAttribute("href", "https://github.com/oftheheadland");
lunithA.setAttribute("target", "_blank");
lunithAP = document.createTextNode("Andrew VanNess");
lunithA.appendChild(lunithAP);
firstP.appendChild(lunithA);

thirdPT = document.createTextNode(" and ");
firstP.appendChild(thirdPT);

kathrynA = document.createElement("a");
kathrynA.setAttribute("href", "https://livingsoloved.com");
kathrynA.setAttribute("target", "_blank");
kathrynAP = document.createTextNode("Kathryn McCarn.");
kathrynA.appendChild(kathrynAP);
firstP.appendChild(kathrynA);


projectHoverContent.appendChild(firstP);
clubHoverHR = document.createElement("hr");
projectHoverContent.appendChild(clubHoverHR);

