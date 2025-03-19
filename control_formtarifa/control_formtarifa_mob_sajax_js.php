
 <form name="form_ajax_redir_1" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_outra_jan">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>
 <form name="form_ajax_redir_2" method="post" style="display: none">
  <input type="hidden" name="nmgp_parms">
  <input type="hidden" name="nmgp_url_saida">
  <input type="hidden" name="script_case_init">
  <input type="hidden" name="script_case_session" value="<?php echo session_id() ?>">
 </form>

 <SCRIPT>
<?php
sajax_show_javascript();
?>

  function scCenterElement(oElem)
  {
    var $oElem    = $(oElem),
        $oWindow  = $(this),
        iElemTop  = Math.round(($oWindow.height() - $oElem.height()) / 2),
        iElemLeft = Math.round(($oWindow.width()  - $oElem.width())  / 2);

    $oElem.offset({top: iElemTop, left: iElemLeft});
  } // scCenterElement

  function scAjaxHideAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "none";
    }
  } // scAjaxHideAutocomp

  function scAjaxShowAutocomp(sFrameId)
  {
    if (document.getElementById("id_ac_frame_" + sFrameId))
    {
      document.getElementById("id_ac_frame_" + sFrameId).style.display = "";
      document.getElementById("id_ac_" + sFrameId).focus();
    }
  } // scAjaxShowAutocomp

  function scAjaxHideDebug()
  {
    if (document.getElementById("id_debug_window"))
    {
      document.getElementById("id_debug_window").style.display = "none";
      document.getElementById("id_debug_text").innerHTML = "";
    }
  } // scAjaxHideDebug

  function scAjaxShowDebug(oTemp)
  {
    if (!document.getElementById("id_debug_window"))
    {
      return;
    }
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["htmOutput"] && "" != oResp["htmOutput"])
    {
      document.getElementById("id_debug_window").style.display = "";
      document.getElementById("id_debug_text").innerHTML = scAjaxFormatDebug(oResp["htmOutput"]) + document.getElementById("id_debug_text").innerHTML;
      //scCenterElement(document.getElementById("id_debug_window"));
    }
  } // scAjaxShowDebug

  function scAjaxFormatDebug(sDebugMsg)
  {
    return "<table class=\"scFormMessageTable\" style=\"margin: 1px; width: 100%\"><tr><td class=\"scFormMessageMessage\">" + scAjaxSpecCharParser(sDebugMsg) + "</td></tr></table>";
  } // scAjaxFormatDebug

  function scAjaxHideErrorDisplay_default(sErrorId, bForce)
  {
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
        document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "none";
        document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = "";
        if (null == bForce)
        {
            bForce = true;
        }
        if (bForce)
        {
            var $oField = $('#id_sc_field_' + sErrorId);
            if (0 < $oField.length)
            {
                scAjax_removeFieldErrorStyle($oField);
            }
        }
    }
    if (document.getElementById("id_error_display_fixed"))
    {
        document.getElementById("id_error_display_fixed").style.display = "none";
    }
  } // scAjaxHideErrorDisplay_default

  function scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg)
  {
    if (oResp && oResp['redirExitInfo'])
    {
      sErrorMsg += "<br /><input type=\"button\" onClick=\"window.location='" + oResp['redirExitInfo']['action'] + "'\" value=\"Ok\">";
    }
    sErrorMsg = scAjaxErrorSql(sErrorMsg);
    if (document.getElementById("id_error_display_" + sErrorId + "_frame"))
    {
      document.getElementById("id_error_display_" + sErrorId + "_frame").style.display = "";
      document.getElementById("id_error_display_" + sErrorId + "_text").innerHTML = sErrorMsg;
      if ("table" == sErrorId)
      {
        scCenterElement(document.getElementById("id_error_display_" + sErrorId + "_frame"));
      }
      var $oField = $('#id_sc_field_' + sErrorId);
      if (0 < $oField.length)
      {
        scAjax_applyFieldErrorStyle($oField);
      }
    }
    if (ajax_error_list && ajax_error_list[sErrorId] && ajax_error_list[sErrorId]["timeout"] && 0 < ajax_error_list[sErrorId]["timeout"])
    {
      setTimeout("scAjaxHideErrorDisplay('" + sErrorId + "', false)", ajax_error_list[sErrorId]["timeout"] * 1000);
    }
  } // scAjaxShowErrorDisplay_default

  var iErrorSqlId = 1;

  function scAjaxErrorSql(sErrorMsg)
  {
    var iTmpPos = sErrorMsg.indexOf("{SC_DB_ERROR_INI}"),
        sTmpId;
    while (-1 < iTmpPos)
    {
      sTmpId    = "sc_id_error_sql_" + iErrorSqlId;
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><span style=\"text-decoration: underline\" onClick=\"$('#" + sTmpId + "').show(); scCenterElement(document.getElementById('" + sTmpId + "'))\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_MID}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span><table class=\"scFormErrorTable\" id=\"" + sTmpId + "\" style=\"display: none; position: absolute\"><tr><td>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_CLS}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "<br /><br /><span onClick=\"$('#" + sTmpId + "').hide()\">" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_END}");
      sErrorMsg = sErrorMsg.substr(0, iTmpPos) + "</span></td></tr></table>" + sErrorMsg.substr(iTmpPos + 17);
      iTmpPos   = sErrorMsg.indexOf("{SC_DB_ERROR_INI}");
      iErrorSqlId++;
    }
    return sErrorMsg;
  } // scAjaxErrorSql

  function scAjaxHideMessage_default()
  {
    if (document.getElementById("id_message_display_frame"))
    {
      document.getElementById("id_message_display_frame").style.display = "none";
      document.getElementById("id_message_display_text").innerHTML = "";
    }
  } // scAjaxHideMessage

  function scAjaxShowMessage_default()
  {
    if (!oResp["msgDisplay"] || !oResp["msgDisplay"]["msgText"])
    {
      return;
    }
    _scAjaxShowMessage_default({title: scMsgDefTitle, message: oResp["msgDisplay"]["msgText"], isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: false, toastPos: ""});
  } // scAjaxShowMessage

  var scMsgDefClose = "";

  function _scAjaxShowMessage_default(params) {
	var sTitle = params["title"],
		sMessage = params["message"],
		bModal = params["isModal"],
		iTimeout = params["timeout"],
		bButton = params["showButton"],
		sButton = params["buttonLabel"],
		iTop = params["topPos"],
		iLeft = params["leftPos"],
		iWidth = params["width"],
		iHeight = params["height"],
		sRedir = params["redirUrl"],
		sTarget = params["redirTarget"],
		sParam = params["redirParam"],
		bClose = params["showClose"],
		bBodyIcon = params["showBodyIcon"],
		bToast = params["isToast"],
		sToastPos = params["toastPos"];
    if ("" == sMessage) {
      if (bModal) {
        scMsgDefClick = "close_modal";
      }
      else {
        scMsgDefClick = "close";
      }
      _scAjaxMessageBtnClick();
      document.getElementById("id_message_display_title").innerHTML = scMsgDefTitle;
      document.getElementById("id_message_display_text").innerHTML = "";
      document.getElementById("id_message_display_buttone").value = scMsgDefButton;
      document.getElementById("id_message_display_buttond").style.display = "none";
    }
    else {
      document.getElementById("id_message_display_title").innerHTML = scAjaxSpecCharParser(sTitle);
      document.getElementById("id_message_display_text").innerHTML = scAjaxSpecCharParser(sMessage);
      document.getElementById("id_message_display_buttone").value = sButton;
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_buttond").style.display = bButton ? "" : "none";
      document.getElementById("id_message_display_title_line").style.display = (bClose || "" != sTitle) ? "" : "none";
      document.getElementById("id_message_display_close_icon").style.display = bClose ? "" : "none";
      if (document.getElementById("id_message_display_body_icon")) {
        document.getElementById("id_message_display_body_icon").style.display = bBodyIcon ? "" : "none";
      }
      $("#id_message_display_content").css('width', (0 < iWidth ? iWidth + 'px' : ''));
      $("#id_message_display_content").css('height', (0 < iHeight ? iHeight + 'px' : ''));
      if (bModal) {
        iWidth = iWidth || 250;
        iHeight = iHeight || 200;
        scMsgDefClose = "close_modal";
        tb_show('', '#TB_inline?height=' + (iHeight + 6) + '&width=' + (iWidth + 4) + '&inlineId=id_message_display_frame&modal=true', '');
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2_modal";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close_modal";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close_modal";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
      else
      {
        scMsgDefClose = "close";
        $("#id_message_display_frame").css('top', (0 < iTop ? iTop + 'px' : ''));
        $("#id_message_display_frame").css('left', (0 < iLeft ? iLeft + 'px' : ''));
        document.getElementById("id_message_display_frame").style.display = "";
        if (0 == iTop && 0 == iLeft) {
          scCenterElement(document.getElementById("id_message_display_frame"));
        }
        if (bButton) {
          if ("" != sRedir && "" != sTarget) {
            scMsgDefClick = "redir2";
            document.form_ajax_redir_2.action = sRedir;
            document.form_ajax_redir_2.target = sTarget;
            document.form_ajax_redir_2.nmgp_parms.value = sParam;
            document.form_ajax_redir_2.script_case_init.value = scMsgDefScInit;
          }
          else if ("" != sRedir && "" == sTarget) {
            scMsgDefClick = "redir1";
            document.form_ajax_redir_1.action = sRedir;
            document.form_ajax_redir_1.nmgp_parms.value = sParam;
          }
          else {
            scMsgDefClick = "close";
          }
        }
        else if (null != iTimeout && 0 < iTimeout) {
          scMsgDefClick = "close";
          setTimeout("_scAjaxMessageBtnClick()", iTimeout * 1000);
        }
      }
    }
  } // _scAjaxShowMessage_default

  function _scAjaxMessageBtnClose() {
    switch (scMsgDefClose) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function _scAjaxMessageBtnClick() {
    switch (scMsgDefClick) {
      case "close":
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "close_modal":
        tb_remove();
        break;
      case "dismiss":
        scAjaxHideMessage();
        break;
      case "redir1":
        document.form_ajax_redir_1.submit();
        break;
      case "redir2":
        document.form_ajax_redir_2.submit();
        document.getElementById("id_message_display_frame").style.display = "none";
        break;
      case "redir2_modal":
        document.form_ajax_redir_2.submit();
        tb_remove();
        break;
    }
  } // _scAjaxMessageBtnClick

  function scAjaxHasError()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "ERROR" == oResp["result"];
  } // scAjaxHasError

  function scAjaxIsOk()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "OK" == oResp["result"] || "SET" == oResp["result"];
  } // scAjaxIsOk

  function scAjaxIsSet()
  {
    if (!oResp["result"])
    {
      return false;
    }
    return "SET" == oResp["result"];
  } // scAjaxIsSet

  function scAjaxCalendarReload()
  {
    if (oResp["calendarReload"] && "OK" == oResp["calendarReload"] && typeof self.parent.calendar_reload == "function")
    {
<?php
if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && isset($_SESSION['scriptcase']['display_mobile']) && $_SESSION['scriptcase']['display_mobile']) {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
} else {
?>
      self.parent.calendar_reload();
      self.parent.tb_remove();
<?php
}
?>
      return true;
    }
    return false;
  } // scCalendarReload

  function scAjaxUpdateErrors(sType)
  {
    ajax_error_geral = "";
    oFieldErrors     = {};
    if (oResp["errList"])
    {
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if ("geral_control_formtarifa_mob" == sTestField)
        {
          if (ajax_error_geral != '') { ajax_error_geral += '<br>';}
          ajax_error_geral += scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
        else
        {
          if (scFocusFirstErrorField && '' == scFocusFirstErrorName)
          {
            scFocusFirstErrorName = sTestField;
          }
          if (oResp["errList"][iFieldErrors]["numLinha"])
          {
            sTestField += oResp["errList"][iFieldErrors]["numLinha"];
          }
          if (!oFieldErrors[sTestField])
          {
            oFieldErrors[sTestField] = new Array();
          }
          oFieldErrors[sTestField][oFieldErrors[sTestField].length] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
        }
      }
    }
    for (iUpdateErrors = 0; iUpdateErrors < ajax_field_list.length; iUpdateErrors++)
    {
      sTestField = ajax_field_list[iUpdateErrors];
      if (oFieldErrors[sTestField])
      {
        ajax_error_list[sTestField][sType] = oFieldErrors[sTestField];
      }
    }
  } // scAjaxUpdateErrors

  function scAjaxUpdateFieldErrors(sField, sType)
  {
    aFieldErrors = new Array();
    if (oResp["errList"])
    {
      iErrorPos  = 0;
      for (iFieldErrors = 0; iFieldErrors < oResp["errList"].length; iFieldErrors++)
      {
        sTestField = oResp["errList"][iFieldErrors]["fldName"];
        if (oResp["errList"][iFieldErrors]["numLinha"])
        {
          sTestField += oResp["errList"][iFieldErrors]["numLinha"];
        }
        if (sField == sTestField)
        {
          aFieldErrors[iErrorPos] = scAjaxSpecCharParser(oResp["errList"][iFieldErrors]["msgText"]);
          iErrorPos++;
        }
      }
    }
        if (ajax_error_list[sField])
        {
        ajax_error_list[sField][sType] = aFieldErrors;
        }
  } // scAjaxUpdateFieldErrors

  function scAjaxListErrors(bLabel)
  {
    bFirst        = false;
    sAppErrorText = "";
    if ("" != ajax_error_geral)
    {
      bFirst         = true;
      sAppErrorText += ajax_error_geral;
    }
    for (iFieldList = 0; iFieldList < ajax_field_list.length; iFieldList++)
    {
      sFieldError = scAjaxListFieldErrors(ajax_field_list[iFieldList], bLabel);
      if ("" != sFieldError)
      {
        if (bFirst)
        {
          bFirst         = false
          sAppErrorText += "<hr size=\"1\" width=\"80%\" />";
        }
        sAppErrorText += sFieldError;
      }
    }
    return sAppErrorText;
  } // scAjaxListErrors

  function scAjaxListFieldErrors(sField, bLabel)
  {
    sErrorText = "";
    for (iErrorType = 0; iErrorType < ajax_error_type.length; iErrorType++)
    {
      if (ajax_error_list[sField])
      {
        for (iListErrors = 0; iListErrors < ajax_error_list[sField][ajax_error_type[iErrorType]].length; iListErrors++)
        {
          if (bLabel)
          {
            sErrorText += ajax_error_list[sField]["label"] + ": ";
          }
          sErrorText += ajax_error_list[sField][ajax_error_type[iErrorType]][iListErrors] + "<br />";
        }
      }
    }
    return sErrorText;
  } // scAjaxListFieldErrors

	function scAjaxClearErrors() {
		var fieldName;

		for (fieldName in ajax_error_list) {
            if (null != ajax_error_list[fieldName]) {
                ajax_error_list[fieldName]["valid"] = new Array();
                ajax_error_list[fieldName]["onblur"] = new Array();
                ajax_error_list[fieldName]["onchange"] = new Array();
                ajax_error_list[fieldName]["onclick"] = new Array();
                ajax_error_list[fieldName]["onfocus"] = new Array();
            }
		}
	} // scAjaxClearErrors

  function scAjaxSetVariables()
  {
    if (!oResp["varList"])
    {
      return true;
    }
    for (var iVarFields = 0; iVarFields < oResp["varList"].length; iVarFields++)
    {
      var sVarName  = oResp["varList"][iVarFields]["index"];
      var sVarValue = oResp["varList"][iVarFields]["value"];
	  eval(sVarName + " = \"" + sVarValue + "\";");
	}
  } // scAjaxSetVariables

  function scAjaxSetFields()
  {
    if (!oResp["fldList"])
    {
      return true;
    }
    for (iSetFields = 0; iSetFields < oResp["fldList"].length; iSetFields++)
    {
      var sFieldName = oResp["fldList"][iSetFields]["fldName"];
      var sFieldType = oResp["fldList"][iSetFields]["fldType"];

      if ("selectdd" == sFieldType)
      {
        var bSelectDD = true;
        sFieldType = "select";
      }
      else
      {
        var bSelectDD = false;
      }
      if ("select2_ac" == sFieldType)
      {
        var bSelect2AC = true;
        sFieldType = "select";
      }
      else
      {
        var bSelect2AC = false;
      }
      if (oResp["fldList"][iSetFields]["valList"])
      {
        var oFieldValues = oResp["fldList"][iSetFields]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (oResp["fldList"][iSetFields]["optList"])
      {
        var oFieldOptions = oResp["fldList"][iSetFields]["optList"];
      }
      else
      {
        var oFieldOptions = null;
      }
/*
      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)) &&
          oFieldValues[0]['value'])
      {
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = oFieldValues[0]['value'];
      }
*/

      if ("corhtml" == sFieldType)
      {
        sFieldType = 'text';

        /*sCor = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
        setaCorPaleta(sFieldName, sCor);*/
      }

      if ("_autocomp" == sFieldName.substr(sFieldName.length - 9) &&
          iSetFields > 0 &&
          sFieldName.substr(0, sFieldName.length - 9) == oResp["fldList"][iSetFields - 1]["fldName"] &&
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)))
      {
          sLabel_auto_Comp = (oFieldValues[0]['value']) ? oFieldValues[0]['value'] : "";
          document.getElementById("div_ac_lab_" + sFieldName.substr(0, sFieldName.length - 9)).innerHTML = sLabel_auto_Comp;
      }


      if (oResp["fldList"][iSetFields]["colNum"])
      {
        var iColNum = oResp["fldList"][iSetFields]["colNum"];
      }
      else
      {
        var iColNum = 1;
      }
      if (oResp["fldList"][iSetFields]["row"])
      {
        var iRow = oResp["fldList"][iSetFields]["row"];
		var thisRow = oResp["fldList"][iSetFields]["row"];
      }
      else
      {
        var iRow = 1;
		var thisRow = "";
      }
      if (oResp["fldList"][iSetFields]["htmComp"])
      {
        var sHtmComp = oResp["fldList"][iSetFields]["htmComp"];
        sHtmComp     = sHtmComp.replace(/__AD__/gi, '"');
        sHtmComp     = sHtmComp.replace(/__AS__/gi, "'");
      }
      else
      {
        var sHtmComp = null;
      }
      if (oResp["fldList"][iSetFields]["imgFile"])
      {
        var sImgFile = oResp["fldList"][iSetFields]["imgFile"];
      }
      else
      {
        var sImgFile = "";
      }
      if (oResp["fldList"][iSetFields]["imgOrig"])
      {
        var sImgOrig = oResp["fldList"][iSetFields]["imgOrig"];
      }
      else
      {
        var sImgOrig = "";
      }
      if (oResp["fldList"][iSetFields]["keepImg"])
      {
        var sKeepImg = oResp["fldList"][iSetFields]["keepImg"];
      }
      else
      {
        var sKeepImg = "N";
      }
      if (oResp["fldList"][iSetFields]["hideName"])
      {
        var sHideName = oResp["fldList"][iSetFields]["hideName"];
      }
      else
      {
        var sHideName = "N";
      }
      if (oResp["fldList"][iSetFields]["imgLink"])
      {
        var sImgLink = oResp["fldList"][iSetFields]["imgLink"];
      }
      else
      {
        var sImgLink = null;
      }
      if (oResp["fldList"][iSetFields]["docLink"])
      {
        var sDocLink = oResp["fldList"][iSetFields]["docLink"];
      }
      else
      {
        var sDocLink = "";
      }
      if (oResp["fldList"][iSetFields]["docIcon"])
      {
        var sDocIcon = oResp["fldList"][iSetFields]["docIcon"];
      }
      else
      {
        var sDocIcon = "";
      }

      if (oResp["fldList"][iSetFields]["docReadonly"])
      {
        var sDocReadonly = oResp["fldList"][iSetFields]["docReadonly"];
      }
      else
      {
        var sDocReadonly = "";
      }

      if (oResp["fldList"][iSetFields]["optComp"])
      {
        var sOptComp = oResp["fldList"][iSetFields]["optComp"];
      }
      else
      {
        var sOptComp = "";
      }
      if (oResp["fldList"][iSetFields]["optClass"])
      {
        var sOptClass = oResp["fldList"][iSetFields]["optClass"];
      }
      else
      {
        var sOptClass = "";
      }
      if (oResp["fldList"][iSetFields]["optMulti"])
      {
        var sOptMulti = oResp["fldList"][iSetFields]["optMulti"];
      }
      else
      {
        var sOptMulti = "";
      }
      if (oResp["fldList"][iSetFields]["imgHtml"])
      {
        var sImgHtml = oResp["fldList"][iSetFields]["imgHtml"];
      }
      else
      {
        var sImgHtml = "";
      }
      if (oResp["fldList"][iSetFields]["mulHtml"])
      {
        var sMULHtml = oResp["fldList"][iSetFields]["mulHtml"];
      }
      else
      {
        var sMULHtml = "";
      }
      if (oResp["fldList"][iSetFields]["updInnerHtml"])
      {
        var sInnerHtml = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["updInnerHtml"]);
      }
      else
      {
        var sInnerHtml = null;
      }
      if (oResp["fldList"][iSetFields]["lookupCons"])
      {
        var sLookupCons = scAjaxSpecCharParser(oResp["fldList"][iSetFields]["lookupCons"]);
      }
      else
      {
        var sLookupCons = "";
      }
      if (oResp["clearUpload"])
      {
        var sClearUpload = scAjaxSpecCharParser(oResp["clearUpload"]);
      }
      else
      {
        var sClearUpload = "N";
      }
      if (oResp["eventField"])
      {
        var sEventField = scAjaxSpecCharParser(oResp["eventField"]);
      }
      else
      {
        var sEventField = "__SC_NO_FIELD";
      }
      if (oResp["fldList"][iSetFields]["switch"])
      {
        var bSwitch = true == oResp["fldList"][iSetFields]["switch"];
      }
      else
      {
        var bSwitch = false;
      }
      if ("checkbox" == sFieldType)
      {
        scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField);
      }
      else if ("duplosel" == sFieldType)
      {
        scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions);
      }
      else if ("imagem" == sFieldType)
      {
        scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName);
      }
      else if ("documento" == sFieldType)
      {
        scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly);
      }
      else if ("label" == sFieldType)
      {
        scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons);
      }
      else if ("radio" == sFieldType)
      {
        scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField);
      }
      else if ("select" == sFieldType)
      {
        scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow);
      }
      else if ("text" == sFieldType)
      {
        scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField);
      }
      else if ("color_palette" == sFieldType)
      {
        scAjaxSetFieldColorPalette(sFieldName, oFieldValues);
      }
      else if ("editor_html" == sFieldType)
      {
        scAjaxSetFieldEditorHtml(sFieldName, oFieldValues);
      }
      else if ("imagehtml" == sFieldType)
      {
        scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml);
      }
      else if ("innerhtml" == sFieldType)
      {
        scAjaxSetFieldInnerHtml(sFieldName, oFieldValues);
      }
      else if ("multi_upload" == sFieldType)
      {
        scAjaxSetFieldMultiUpload(sFieldName, sMULHtml);
      }
      else if ("recur_info" == sFieldType)
      {
        scAjaxSetFieldRecurInfo(sFieldName, sMULHtml);
      }
      else if ("signature" == sFieldType)
      {
        scAjaxSetFieldSignature(sFieldName, oFieldValues);
      }
      else if ("rating" == sFieldType)
      {
        scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow);
      }
      scAjaxUpdateHeaderFooter(sFieldName, oFieldValues);
    }
  } // scAjaxSetFields

  function scAjaxUpdateHeaderFooter(sFieldName, oFieldValues)
  {
    if (self.updateHeaderFooter)
    {
      if (null == oFieldValues)
      {
        sNewValue = '';
      }
      else if (oFieldValues[0]["label"])
      {
        sNewValue = oFieldValues[0]["label"];
      }
      else
      {
        sNewValue = oFieldValues[0]["value"];
      }
      updateHeaderFooter(sFieldName, scAjaxSpecCharParser(sNewValue));
    }
  } // scAjaxUpdateHeaderFooter

  function scAjaxSetFieldText(sFieldName, oFieldValues, sLookupCons, thisRow, sEventField)
  {
    if (document.F1.elements[sFieldName])
    {
      var jqField = $("#id_sc_field_" + sFieldName),
          Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
      if (jqField.length)
      {
        jqField.val(Temp_text);
        if (sEventField != sFieldName && sEventField != "__SC_NO_FIELD" && sEventField != "")
        {
          //jqField.trigger("change");
        }
      }
      else
      {
        eval("document.F1." + sFieldName + ".value = Temp_text");
      }
      if (scEventControl_data[sFieldName]) {
        scEventControl_data[sFieldName]["calculated"] = Temp_text;
      }
    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
	scAjaxSetSliderValue(sFieldName, thisRow);
  } // scAjaxSetFieldText

  function scAjaxSetSliderValue(fieldName, thisRow)
  {
	  var sliderObject = $("#sc-ui-slide-" + fieldName);
	  if (!sliderObject.length) {
		  return;
	  }
	  scJQSlideValue(fieldName, thisRow);
  } // scAjaxSetSliderValue

  function scAjaxSetFieldColorPalette(sFieldName, oFieldValues)
  {
    if (document.F1.elements[sFieldName])
    {
        var Temp_text = scAjaxReturnBreakLine(scAjaxSpecCharParser(scAjaxProtectBreakLine(oFieldValues[0]['value'])));
        eval ("document.F1." + sFieldName + ".value = Temp_text");
    }
    if (oFieldValues[0]['label'])
    {
      scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues);
    }
    else
    {
      oFieldValues[0]['value'] = scAjaxBreakLine(oFieldValues[0]['value']);
	  setaCorPaleta(sFieldName, oFieldValues[0]['value']);
      scAjaxSetReadonlyValue(sFieldName, oFieldValues[0]['value']);
    }
  } // scAjaxSetFieldColorPalette

  function scAjaxSetFieldSelect(sFieldName, oFieldValues, oFieldOptions, bSelectDD, bSelect2AC, iRow, sEventField, thisRow)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if (bSelectDD)
    {
        $("#id_sc_field_" + sFieldName).dropdownchecklist("destroy");
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      scAjaxSetFieldText(sFieldNameHtml, oFieldValues, "", "", sEventField);
      return;
    }

    if (null != oFieldOptions)
    {
      $("#id_sc_field_" + sFieldName).children().remove()
      if ("<select" != oFieldOptions.substr(0, 7))
      {
        var $oField = $("#id_sc_field_" + sFieldName);
        if (0 < $oField.length)
        {
          $oField.html(oFieldOptions);
        }
        else
        {
          document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
        }
      }
      else
      {
        document.getElementById("idAjaxSelect_" + sFieldName).innerHTML = oFieldOptions;
      }
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    var oFormField = $("#id_sc_field_" + sFieldName);
    for (iFieldSelect = 0; iFieldSelect < oFormField[0].length; iFieldSelect++)
    {
      if (scAjaxInArray(oFormField[0].options[iFieldSelect].value, aValues))
      {
        oFormField[0].options[iFieldSelect].selected = true;
      }
      else
      {
        oFormField[0].options[iFieldSelect].selected = false;
      }
    }
	scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
    if (bSelectDD)
    {
        scJQDDCheckBoxAdd(thisRow, true);
    }
	if (bSelect2AC)
	{
		var newOption = new Option(oFieldValues[0]["label"], oFieldValues[0]["value"], true, true);
		$("#id_ac_" + sFieldName).append(newOption);
		$("#id_sc_field_" + sFieldName).val(oFieldValues[0]["value"]);
	}
	else if (oFormField.hasClass("select2-hidden-accessible"))
	{
        $("#id_sc_field_" + sFieldName).select2("destroy");
		var select2Field = sFieldName;
		if ("" != thisRow) {
			select2Field = select2Field.substr(0, select2Field.length - thisRow.toString().length);
		}
        scJQSelect2Add(thisRow, select2Field);
	}
  } // scAjaxSetFieldSelect

  function scAjaxSetFieldDuplosel(sFieldName, oFieldValues, oFieldOptions)
  {
    var sFieldNameOrig = sFieldName + "_orig";
    var sFieldNameDest = sFieldName + "_dest";
    var oFormFieldOrig = document.F1.elements[sFieldNameOrig];
    var oFormFieldDest = document.F1.elements[sFieldNameDest];

    if (null != oFieldOptions)
    {
      scAjaxClearSelect(sFieldNameOrig);
      for (iFieldSelect = 0; iFieldSelect < oFieldOptions.length; iFieldSelect++)
      {
        oFormFieldOrig.options[iFieldSelect] = new Option(scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["label"]), scAjaxSpecCharParser(oFieldOptions[iFieldSelect]["value"]));
      }
    }
    while (oFormFieldDest.length > 0)
    {
      oFormFieldDest.options[0] = null;
    }
    var aValues = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        sNewOptionLabel = oFieldValues[iFieldSelect]["label"] ? scAjaxSpecCharParser(oFieldValues[iFieldSelect]["label"]) : scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        sNewOptionValue = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
        if (sNewOptionValue.substr(0, 8) == "@NMorder")
        {
           sNewOptionValue                      = sNewOptionValue.substr(8);
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
           sNewOptionValue                      = sNewOptionValue.substr(1);
           aValues[iFieldSelect]                = sNewOptionValue;
        }
        else
        {
           aValues[iFieldSelect]                = sNewOptionValue;
           oFormFieldDest.options[iFieldSelect] = new Option(scAjaxSpecCharParser(sNewOptionLabel), sNewOptionValue);
        }
      }
    }
    for (iFieldSelect = 0; iFieldSelect < oFormFieldOrig.length; iFieldSelect++)
    {
      oFormFieldOrig.options[iFieldSelect].selected = false;
      if (scAjaxInArray(oFormFieldOrig.options[iFieldSelect].value, aValues))
      {
        oFormFieldOrig.options[iFieldSelect].disabled    = true;
        oFormFieldOrig.options[iFieldSelect].style.color = "#A0A0A0";
      }
      else
      {
        oFormFieldOrig.options[iFieldSelect].disabled = false;
      }
    }
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldDuplosel

  function scAjaxSetFieldCheckbox(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sInnerHtml, sOptComp, sOptClass, sOptMulti, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.getElementById("idAjaxCheckbox_" + sFieldName) && null != sInnerHtml)
    {
      document.getElementById("idAjaxCheckbox_" + sFieldName).innerHTML = sInnerHtml;
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearCheckbox(sFieldName);
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearCheckbox(sFieldName); */
      scAjaxRecreateOptions("Checkbox", "checkbox", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch);
    }
    else
    {
      scAjaxSetCheckboxOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "checkbox");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldCheckbox

  function scAjaxSetFieldRadio(sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, bSwitch, sEventField)
  {
	if (null == bSwitch)
	{
	  bSwitch = false;
	}
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      scAjaxSetFieldText(sFieldName, oFieldValues, "", "", sEventField);
      return;
    }
    if (null != oFieldOptions)
    {
        scAjaxClearRadio(sFieldName);
    }
    if (null != oFieldOptions && "" != oFieldOptions)
    {
/*      scAjaxClearRadio(sFieldName); */
      scAjaxRecreateOptions("Radio", "radio", sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, "", "", bSwitch);
    }
    else
    {
      scAjaxSetRadioOptions(sFieldName, oFieldValues);
    }
	scAjaxSetSwitchOptions(sFieldName, "radio");
    scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, "<br />");
  } // scAjaxSetFieldRadio

  function scAjaxSetSwitchOptions(fieldName, fieldType)
  {
	var fieldOptions = $(".sc-ui-" + fieldType + "-" + fieldName + ".lc-switch");
	if (!fieldOptions.length) {
		return;
	}
	for (var i = 0; i < fieldOptions.length; i++) {
		if ($(fieldOptions[i]).prop("checked")) {
			$(fieldOptions[i]).lcs_on();
		}
		else {
			$(fieldOptions[i]).lcs_off();
		}
	}
  }

  function scAjaxSetFieldLabel(sFieldName, oFieldValues, oFieldOptions, sLookupCons)
  {
    sFieldValue = oFieldValues[0]["value"];
    if ("undefined" == typeof oFieldValues[0]["label"]) {
      sFieldLabel = oFieldValues[0]["value"];
    } else {
      sFieldLabel = oFieldValues[0]["label"];
    }
    sFieldLabel = scAjaxBreakLine(sFieldLabel);
    if (null != oFieldOptions)
    {
      for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
      {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        if (sFieldValue == sOptText)
        {
          sFieldLabel = sOptValue;
        }
      }
    }
    if (document.getElementById("id_ajax_label_" + sFieldName))
    {
      document.getElementById("id_ajax_label_" + sFieldName).innerHTML = scAjaxSpecCharParser(sFieldLabel);
    }
    if (document.F1.elements[sFieldName])
    {
//      document.F1.elements[sFieldName].value = scAjaxSpecCharParser(sFieldValue);
        Temp_text = scAjaxProtectBreakLine(sFieldValue);
        Temp_text = scAjaxSpecCharParser(Temp_text);
        document.F1.elements[sFieldName].value = scAjaxReturnBreakLine(Temp_text);

    }
    if (document.getElementById("id_lookup_" + sFieldName))
    {
      document.getElementById("id_lookup_" + sFieldName).innerHTML = sLookupCons;
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(sFieldLabel));
  } // scAjaxSetFieldLabel

  function scAjaxSetFieldImage(sFieldName, oFieldValues, sImgFile, sImgOrig, sImgLink, sKeepImg, sHideName)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    if ("N" == sKeepImg && document.getElementById("id_ajax_img_"  + sFieldName))
    {
      document.getElementById("id_ajax_img_"  + sFieldName).src           = scAjaxSpecCharParser(sImgFile);
      document.getElementById("id_ajax_img_"  + sFieldName).style.display = ("" == sImgFile) ? "none" : "";
    }
    if (document.getElementById("id_ajax_link_" + sFieldName) && null != sImgLink)
    {
      document.getElementById("id_ajax_link_" + sFieldName).innerHTML = oFieldValues[0]["value"];
      document.getElementById("id_ajax_link_" + sFieldName).href      = scAjaxSpecCharParser(sImgLink);
    }
    if (document.getElementById("chk_ajax_img_" + sFieldName))
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"]) ? "none" : "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("N" == sKeepImg && document.getElementById("txt_ajax_img_" + sFieldName))
    {
      document.getElementById("txt_ajax_img_" + sFieldName).innerHTML     = oFieldValues[0]["value"];
      document.getElementById("txt_ajax_img_" + sFieldName).style.display = ("" == oFieldValues[0]["value"] || "S" == sHideName) ? "none" : "";
    }
    if ("" != sImgOrig)
    {
      eval("if (var_ajax_img_" + sFieldName + ") var_ajax_img_" + sFieldName + " = '" + sImgOrig + "';");
      if (document.F1.elements["temp_out1_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgFile;
        document.F1.elements["temp_out1_" + sFieldName].value = sImgOrig;
      }
      else if (document.F1.elements["temp_out_" + sFieldName])
      {
        document.F1.elements["temp_out_" + sFieldName].value = sImgOrig;
      }
    }
    if ("" != oFieldValues[0]["value"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = oFieldValues[0]["value"];
    }
    else if (oResp && oResp["ajaxRequest"] && "navigate_form" == oResp["ajaxRequest"])
    {
      if (document.F1.elements[sFieldName + "_salva"]) document.F1.elements[sFieldName + "_salva"].value = "";
    }
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldImage

  function scAjaxSetFieldDocument(sFieldName, oFieldValues, sDocLink, sDocIcon, sClearUpload, sDocReadonly)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    document.getElementById("id_ajax_doc_"  + sFieldName).innerHTML = scAjaxSpecCharParser(sDocLink);
    if (document.getElementById("id_ajax_doc_icon_"  + sFieldName))
    {
      document.getElementById("id_ajax_doc_icon_"  + sFieldName).src = scAjaxSpecCharParser(sDocIcon);
    }
    if ("" == oFieldValues[0]["value"])
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "none";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "none";
    }
    else
    {
      document.getElementById("chk_ajax_img_" + sFieldName).style.display = "";
      document.getElementById("id_ajax_doc_" + sFieldName).style.display = "";
    }
    if ("" == oFieldValues[0]["value"] && document.F1.elements[sFieldName + "_limpa"])
    {
      document.F1.elements[sFieldName + "_limpa"].checked = false;
    }
    if ("S" == sClearUpload && document.F1.elements[sFieldName + "_ul_name"])
    {
      document.F1.elements[sFieldName + "_ul_name"].value = "";
    }
    if ("" != sDocLink && sDocReadonly == "S")
    {
      scAjaxSetReadonlyValue(sFieldName, sDocLink);
    }
    else
    {
      scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
    }
  } // scAjaxSetFieldDocument

  function scAjaxSetFieldInnerHtml(sFieldName, oFieldValues)
  {
    if (document.getElementById(sFieldName))
    {
      document.getElementById(sFieldName).innerHTML = scAjaxSpecCharParser(oFieldValues[0]["value"]);
    }
  } // scAjaxSetFieldInnerHtml

  function scAjaxSetFieldMultiUpload(sFieldName, sMULHtml)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return;
    }
    $("#id_sc_loaded_" + sFieldName).html(scAjaxSpecCharParser(sMULHtml));
  } // scAjaxSetFieldMultiUpload

  function scAjaxExecFieldEditorHtml(strOption, bolUI, oField)
  {
	  	if(tinymce.majorVersion > 3)
		{
			if(strOption == 'mceAddControl')
			{
				tinymce.execCommand('mceAddEditor', bolUI, oField);
			}else
			if(strOption == 'mceRemoveControl')
			{
				tinymce.execCommand('mceRemoveEditor', bolUI, oField);
			}
		}
		else
		{
			tinyMCE.execCommand(strOption, bolUI, oField);
		}
  }

  function scAjaxSetFieldEditorHtml(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    oFormField.setContent(scAjaxSpecCharParser(oFieldValues[0]["value"]));
    scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldImageHtml(sFieldName, oFieldValues, sImgHtml)
  {
    if (document.getElementById("id_imghtml_" + sFieldName))
    {
      document.getElementById("id_imghtml_" + sFieldName).innerHTML = scAjaxSpecCharParser(sImgHtml);
    }
  } // scAjaxSetFieldEditorHtml

  function scAjaxSetFieldRecurInfo(sFieldName, oFieldValues)
  {
	  var jsonData = "" != oFieldValues[0]["value"]
	               ? JSON.parse(oFieldValues[0]["value"])
				   : { repeat: "1", endon: "E", endafter: "", endin: ""};
	  $("#id_rinf_repeat_" + sFieldName).val(jsonData.repeat);
	  $(".cl_rinf_endon_" + sFieldName).filter(function(index) {return $(this).val() == jsonData.endon}).prop("checked", true),
	  $("#id_rinf_endafter_" + sFieldName).val(jsonData.endafter);
	  $("#id_rinf_endin_" + sFieldName).val(jsonData.endin);
	  scAjaxSetReadonlyValue(sFieldName, scAjaxSpecCharParser(oFieldValues[0]["value"]));
  } // scAjaxSetFieldRecurInfo

  function scAjaxSetFieldSignature(sFieldName, oFieldValues)
  {
	var fieldValue = scAjaxSpecCharParser(oFieldValues[0]['value']);
	if ("data:image/png;base64," != fieldValue.substr(0, 22) && "data:image/jsignature;base30," != fieldValue.substr(0, 29))
	{
		scJQSignatureClear(sFieldName);
		return;
	}
	$("#id_sc_field_" + sFieldName).val(fieldValue);
	scJQSignatureRedraw(sFieldName);
  } // scAjaxSetFieldSignature

  function scAjaxSetFieldRating(sFieldName, oFieldValues, thisRow)
  {
	$("#id_sc_field_" + sFieldName).val(oFieldValues[0]['value']);
	if ("" != thisRow) {
      sFieldName = sFieldName.substr(0, sFieldName.lastIndexOf("_") + 1);
	}
	scJQRatingRedraw(sFieldName, thisRow);
  } // scAjaxSetFieldRating

  function scAjaxSetCheckboxOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return;
    }
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheckbox = 0; iFieldCheckbox < oFormField.length; iFieldCheckbox++)
        {
          if (scAjaxInArray(oFormField[iFieldCheckbox].value, aValues))
          {
            oFormField[iFieldCheckbox].checked = true;
          }
          else
          {
            oFormField[iFieldCheckbox].checked = false;
          }
        }
      }
      else
      {
        if (scAjaxInArray(oFormField.value, aValues))
        {
          oFormField.checked = true;
        }
        else
        {
          oFormField.checked = false;
        }
      }
    }
    else if (document.F1.elements[sFieldName + "[0]"])
    {
      for (iFieldCheckbox = 0; iFieldCheckbox < document.F1.elements.length; iFieldCheckbox++)
      {
        oFormElement = document.F1.elements[iFieldCheckbox];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && scAjaxInArray(oFormElement.value, aValues))
        {
          oFormElement.checked = true;
        }
        else if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1))
        {
          oFormElement.checked = false;
        }
      }
    }
    else
    {
      oFormElement = document.F1.elements[sFieldName];
      if (scAjaxInArray(oFormElement.value, aValues))
      {
        oFormElement.checked = true;
      }
      else
      {
        oFormElement.checked = false;
      }
    }
  } // scAjaxSetCheckboxOptions

  function scAjaxSetRadioOptions(sFieldName, oFieldValues)
  {
    if (!document.F1.elements[sFieldName])
    {
      return;
    }
    var oFormField = document.F1.elements[sFieldName];
    var aValues    = new Array();
    if (null != oFieldValues)
    {
      for (iFieldSelect = 0; iFieldSelect < oFieldValues.length; iFieldSelect++)
      {
        aValues[iFieldSelect] = scAjaxSpecCharParser(oFieldValues[iFieldSelect]["value"]);
      }
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      oFormField[iFieldRadio].checked = false;
    }
    for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
    {
      if (scAjaxInArray(oFormField[iFieldRadio].value, aValues))
      {
        oFormField[iFieldRadio].checked = true;
      }
    }
  } // scAjaxSetRadioOptions

  function scAjaxSetReadonlyValue(sFieldName, sFieldValue)
  {
    if (document.getElementById("id_read_on_" + sFieldName))
    {
      document.getElementById("id_read_on_" + sFieldName).innerHTML = sFieldValue;
    }
  } // scAjaxSetReadonlyValue

  function scAjaxSetReadonlyArrayValue(sFieldName, oFieldValues, sDelim)
  {
    if (null == oFieldValues)
    {
      return;
    }
    if (null == sDelim)
    {
      sDelim = " ";
    }
    sReadLabel = "";
    for (iReadArray = 0; iReadArray < oFieldValues.length; iReadArray++)
    {
      if (oFieldValues[iReadArray]["label"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["label"];
      }
      else if (oFieldValues[iReadArray]["value"])
      {
        if ("" != sReadLabel)
        {
          sReadLabel += sDelim;
        }
        sReadLabel += oFieldValues[iReadArray]["value"];
      }
    }
    scAjaxSetReadonlyValue(sFieldName, sReadLabel);
  } // scAjaxSetReadonlyArrayValue

  function scAjaxGetFieldValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        if (1 == oFieldValues.length)
        {
          sValue = scAjaxSpecCharParser(oFieldValues[0]["value"]);
        }
        else
        {
          sValue = new Array();
          for (jFieldValue = 0; jFieldValue < oFieldValues.length; jFieldValue++)
          {
            sValue[jFieldValue] = scAjaxSpecCharParser(oFieldValues[jFieldValue]["value"]);
          }
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldValue

  function scAjaxGetKeyValue(sFieldGet)
  {
    sValue = "";
    if (!oResp["fldList"])
    {
      return sValue;
    }
    for (iKeyValue = 0; iKeyValue < oResp["fldList"].length; iKeyValue++)
    {
      var sFieldName = oResp["fldList"][iKeyValue]["fldName"];
      if (sFieldGet == sFieldName)
      {
        if (oResp["fldList"][iKeyValue]["keyVal"])
        {
          return scAjaxSpecCharParser(oResp["fldList"][iKeyValue]["keyVal"]);
        }
        else
        {
          return scAjaxGetFieldValue(sFieldGet);
        }
      }
    }
    return sValue;
  } // scAjaxGetKeyValue

  function scAjaxGetLineNumber()
  {
    sLineNumber = "";
    if (oResp["errList"])
    {
      for (iLineNumber = 0; iLineNumber < oResp["errList"].length; iLineNumber++)
      {
        if (oResp["errList"][iLineNumber]["numLinha"])
        {
          sLineNumber = oResp["errList"][iLineNumber]["numLinha"];
        }
      }
      return sLineNumber;
    }
    if (oResp["fldList"])
    {
      return oResp["fldList"][0]["numLinha"];
    }
    if (oResp["msgDisplay"])
    {
      return oResp["msgDisplay"]["numLinha"];
    }
    return sLineNumber;
  } // scAjaxGetLineNumber

  function scAjaxFieldExists(sFieldGet)
  {
    bExists = false;
    if (!oResp["fldList"])
    {
      return bExists;
    }
    for (iFieldValue = 0; iFieldValue < oResp["fldList"].length; iFieldValue++)
    {
      var sFieldName  = oResp["fldList"][iFieldValue]["fldName"];
      if (oResp["fldList"][iFieldValue]["valList"])
      {
        var oFieldValues = oResp["fldList"][iFieldValue]["valList"];
        if (0 == oFieldValues.length)
        {
          oFieldValues = null;
        }
      }
      else
      {
        var oFieldValues = null;
      }
      if (sFieldGet == sFieldName && null != oFieldValues)
      {
        bExists = true;
      }
    }
    return bExists;
  } // scAjaxFieldExists

  function scAjaxGetFieldText(sFieldName)
  {
    $oHidden = $("input[name='" + sFieldName + "']");
    if (!$oHidden.length)
    {
      $oHidden = $("input[name='" + sFieldName + "_']");
    }
    if ($oHidden.length)
    {
      for (var i = 0; i < $oHidden.length; i++)
      {
        if ("hidden" == $oHidden[i].type && $oHidden[i].form && $oHidden[i].form.name && "F1" == $oHidden[i].form.name)
        {
          return scAjaxSpecCharProtect($oHidden[i].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    $oField = $("#id_sc_field_" + sFieldName);
    if(!$oField.length)
    {
      $oField = $("#id_sc_field_" + sFieldName + "_");
    }
    if ($oField.length && "select" != $oField[0].type.substr(0, 6))
    {
      return scAjaxSpecCharProtect($oField.val());//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else if (document.F1.elements[sFieldName + '_'])
    {
      return scAjaxSpecCharProtect(document.F1.elements[sFieldName + '_'].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return '';
    }
  } // scAjaxGetFieldText

  function scAjaxGetFieldHidden(sFieldName)
  {
    for( i= 0; i < document.F1.elements.length; i++)
    {
       if (document.F1.elements[i].name == sFieldName)
       {
          return scAjaxSpecCharProtect(document.F1.elements[i].value);//.replace(/[+]/g, "__NM_PLUS__");
       }
    }
//    return document.F1.elements[sFieldName].value.replace(/[+]/g, "__NM_PLUS__");
  } // scAjaxGetFieldHidden

  function scAjaxGetFieldSelect(sFieldName)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"])
    {
      return "";
    }
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var iSelected  = oFormField.selectedIndex;
    if (-1 < iSelected)
    {
      return scAjaxSpecCharProtect(oFormField.options[iSelected].value);//.replace(/[+]/g, "__NM_PLUS__");
    }
    else
    {
      return "";
    }
  } // scAjaxGetFieldSelect

  function scAjaxGetFieldSelectMult(sFieldName, sFieldDelim)
  {
    sFieldNameHtml = sFieldName;
    if (!document.F1.elements[sFieldName] && document.F1.elements[sFieldName + "[]"])
    {
      sFieldNameHtml += "[]";
    }
    if ("hidden" == document.F1.elements[sFieldNameHtml].type)
    {
      return scAjaxGetFieldHidden(sFieldNameHtml);
    }
    var oFormField = document.F1.elements[sFieldNameHtml];
    var sFieldVals = "";
    for (iFieldSelect = 0; iFieldSelect < oFormField.length; iFieldSelect++)
    {
      if (oFormField[iFieldSelect].selected)
      {
        if ("" != sFieldVals)
        {
          sFieldVals += sFieldDelim;
        }
        sFieldVals += scAjaxSpecCharProtect(oFormField[iFieldSelect].value);//.replace(/[+]/g, "__NM_PLUS__");
      }
    }
    return sFieldVals;
  } // scAjaxGetFieldSelectMult

  function scAjaxGetFieldCheckbox(sFieldName, sDelim)
  {
    var aValues = new Array();
    var sValue  = "";
    if (!document.F1.elements[sFieldName] && !document.F1.elements[sFieldName + "[]"] && !document.F1.elements[sFieldName + "[0]"])
    {
      return sValue;
    }
    if (document.F1.elements[sFieldName + "[]"] && "hidden" == document.F1.elements[sFieldName + "[]"].type)
    {
      return scAjaxGetFieldHidden(sFieldName + "[]");
    }
    if (document.F1.elements[sFieldName] && "hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    if (document.F1.elements[sFieldName + "[]"])
    {
      var oFormField = document.F1.elements[sFieldName + "[]"];
      if (oFormField.length)
      {
        for (iFieldCheck = 0; iFieldCheck < oFormField.length; iFieldCheck++)
        {
          if (oFormField[iFieldCheck].checked)
          {
            aValues[aValues.length] = oFormField[iFieldCheck].value;
          }
        }
      }
      else
      {
        if (oFormField.checked)
        {
          aValues[aValues.length] = oFormField.value;
        }
      }
    }
    else
    {
      for (iFieldCheck = 0; iFieldCheck < document.F1.elements.length; iFieldCheck++)
      {
        oFormElement = document.F1.elements[iFieldCheck];
        if (sFieldName + "[" == oFormElement.name.substr(0, sFieldName.length + 1) && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
        else if (sFieldName == oFormElement.name && oFormElement.checked)
        {
          aValues[aValues.length] = oFormElement.value;
        }
      }
    }
    for (iFieldCheck = 0; iFieldCheck < aValues.length; iFieldCheck++)
    {
      sValue += scAjaxSpecCharProtect(aValues[iFieldCheck]);//.replace(/[+]/g, "__NM_PLUS__");
      if (iFieldCheck + 1 != aValues.length)
      {
        sValue += sDelim;
      }
    }
    return sValue;
  } // scAjaxGetFieldCheckbox

  function scAjaxGetFieldRadio(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }
    var oFormField = document.F1.elements[sFieldName];
    if (!oFormField.length)
    {
        var sc_cmp_radio = eval("document.F1." + sFieldName);
        if (sc_cmp_radio.checked)
        {
           sValue = scAjaxSpecCharProtect(sc_cmp_radio.value);//.replace(/[+]/g, "__NM_PLUS__");
        }
    }
    else
    {
      for (iFieldRadio = 0; iFieldRadio < oFormField.length; iFieldRadio++)
      {
        if (oFormField[iFieldRadio].checked)
        {
          sValue = scAjaxSpecCharProtect(oFormField[iFieldRadio].value);//.replace(/[+]/g, "__NM_PLUS__");
        }
      }
    }
    return sValue;
  } // scAjaxGetFieldRadio

  function scAjaxGetFieldEditorHtml(sFieldName)
  {
    if ("hidden" == document.F1.elements[sFieldName].type)
    {
      return scAjaxGetFieldHidden(sFieldName);
    }
    var sValue = "";
    if (!document.F1.elements[sFieldName])
    {
      return sValue;
    }

	if(tinymce.majorVersion > 3)
	{
		var oFormField = tinyMCE.get(sFieldName);
	}
	else
	{
		var oFormField = tinyMCE.getInstanceById(sFieldName);
	}
    return scAjaxSpecCharParser(scAjaxSpecCharProtect(oFormField.getContent()));//.replace(/[+]/g, "__NM_PLUS__"));
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldSignature(sFieldName)
  {
    var signatureData = $("#sc-id-sign-" + sFieldName).jSignature("getData", "base30");
	$("#id_sc_field_" + sFieldName).val("data:" + signatureData[0] + "," + signatureData[1]);
	return $("#id_sc_field_" + sFieldName).val();
  } // scAjaxGetFieldEditorHtml

  function scAjaxGetFieldRecurInfo(sFieldName)
  {
	  var repeatInList = $(".cl_rinf_repeatin_" + sFieldName).filter(":checked"), repeatInValues = [], jsonData, i;
	  for (i = 0; i < repeatInList.length; i++) {
		  repeatInValues.push($(repeatInList[i]).val());
	  }
	  jsonData = {
		  repeat: $("#id_rinf_repeat_" + sFieldName).val(),
		  repeatin: repeatInValues.join(";"),
		  endon: $(".cl_rinf_endon_" + sFieldName).filter(":checked").val(),
		  endafter: $("#id_rinf_endafter_" + sFieldName).val(),
		  endin: $("#id_rinf_endin_" + sFieldName).val()
	  };
	  return JSON.stringify(jsonData);
  } // scAjaxGetFieldRecurInfo

  function scAjaxDoNothing(e)
  {
  } // scAjaxDoNothing

  function scAjaxInArray(mVal, aList)
  {
    for (iInArray = 0; iInArray < aList.length; iInArray++)
    {
      if (aList[iInArray] == mVal)
      {
        return true;
      }
    }
    return false;
  } // scAjaxInArray

  function scAjaxSpecCharParser(sParseString)
  {
    if (null == sParseString) {
      return "";
    }
    var ta = document.createElement("textarea");
    ta.innerHTML = sParseString.replace(/</g, "&lt;").replace(/>/g, "&gt;");
    return ta.value;
  } // scAjaxSpecCharParser

  function scAjaxSpecCharProtect(sOriginal)
  {
        var sProtected;
        sProtected = sOriginal.replace(/[+]/g, "__NM_PLUS__");
        sProtected = sProtected.replace(/[%]/g, "__NM_PERC__");
        return sProtected;
  } // scAjaxSpecCharProtect

  function scAjaxRecreateOptions(sFieldType, sHtmlType, sFieldName, oFieldValues, oFieldOptions, iColNum, sHtmComp, sOptComp, sOptClass, sOptMulti, bSwitch)
  {
    var sSuffix  = ("checkbox" == sHtmlType) ? "[]" : "";
    var sDivName = "idAjax" + sFieldType + "_" + sFieldName;
    var sDivText = "";
    var iCntLine = 0;
    var aValues  = new Array();
    var sClass;
    var markChangedClass;
    if (null != oFieldValues)
    {
      for (iRecreate = 0; iRecreate < oFieldValues.length; iRecreate++)
      {
        aValues[iRecreate] = scAjaxSpecCharParser(oFieldValues[iRecreate]["value"]);
      }
    }
    sDivText += "<table border=0>";
    if ("checkbox" == sHtmlType)
    {
        markChangedClass = "sc-ui-checkbox-" + sFieldName;
    }
    if ("radio" == sHtmlType)
    {
        markChangedClass = "sc-ui-radio-" + sFieldName;
    }
    for (iRecreate = 0; iRecreate < oFieldOptions.length; iRecreate++)
    {
        sOptText  = scAjaxSpecCharParser(oFieldOptions[iRecreate]["label"]);
        sOptValue = scAjaxSpecCharParser(oFieldOptions[iRecreate]["value"]);
        if (0 == iCntLine)
        {
            sDivText += "<tr>";
        }
        iCntLine++;
        if ("" != sOptClass)
        {
            sClass = " class=\"" + sOptClass;
            if ("" != sOptMulti)
            {
                sClass += " " + sOptClass + sOptMulti;
            }
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        else
        {
            sClass = " class=\"";
            if ("" != markChangedClass)
            {
                sClass += " " + markChangedClass;
            }
            sClass += "\"";
        }
        if (sHtmComp == null)
        {
            sHtmComp = "";
        }
        sChecked  = (scAjaxInArray(sOptValue, aValues)) ? " checked" : "";
        sDivText += "<td class=\"scFormDataFontOdd\">";
		if (bSwitch)
		{
			sDivText += "<div class=\"sc ";
			if ("Checkbox" == sFieldType)
			{
				sDivText += "switch";
			}
			else
			{
				sDivText += "radio";
			}
			sDivText += "\">";
		}
        sDivText += "<input id=\"id-opt-" + sFieldName + "-"  + iRecreate + "\" type=\"" + sHtmlType + "\" name=\"" + sFieldName + sSuffix + "\" value=\"" + sOptValue + "\"" + sChecked + " " + sHtmComp + " " + sOptComp + sClass + ">";
		if (bSwitch)
		{
			sDivText += "<span></span>";
		}
        sDivText += "<label for=\"id-opt-" + sFieldName + "-"  + iRecreate + "\">" + sOptText + "</label>";
		if (bSwitch)
		{
			sDivText += "</div>";
		}
        sDivText += "</td>";
        if (iColNum == iCntLine)
        {
            sDivText += "</tr>";
            iCntLine  = 0;
        }
    }
    sDivText += "</table>";
    document.getElementById(sDivName).innerHTML = sDivText;
    if ("" != markChangedClass)
    {
      $("." + markChangedClass).on("click", function() { scMarkFormAsChanged(); });
    }
  } // scAjaxRecreateOptions

  function scAjaxProcOn(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.blockUI && !bForce)
      {
        $.blockUI({
          message: $("#id_div_process_block"),
          overlayCSS: { backgroundColor: sc_ajaxBg },
          css: {
            borderColor: sc_ajaxBordC,
            borderStyle: sc_ajaxBordS,
            borderWidth: sc_ajaxBordW
          }
        });
      }
      else
      {
        document.getElementById("id_div_process").style.display = "";
        document.getElementById("id_fatal_error").style.display = "none";
        if (null != scCenterElement)
        {
          scCenterElement(document.getElementById("id_div_process"));
        }
      }
    }
  } // scAjaxProcOn

  function scAjaxProcOff(bForce)
  {
    if (null == bForce)
    {
      bForce = false;
    }
    if (document.getElementById("id_div_process"))
    {
      if ($ && $.unblockUI && !bForce)
      {
        $.unblockUI();
      }
      else
      {
        document.getElementById("id_div_process").style.display = "none";
      }
    }
  } // scAjaxProcOff

  function scAjaxSetMaster()
  {
    if (!oResp["masterValue"])
    {
      return;
    }
	if (scMasterDetailParentIframe && "" != scMasterDetailParentIframe)
	{
      var dbParentFrame = $(parent.document).find("[name='" + scMasterDetailParentIframe + "']");
	  if (!dbParentFrame || !dbParentFrame[0] || !dbParentFrame[0].contentWindow.scAjaxDetailValue)
	  {
		return;
	  }
      for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
      {
        dbParentFrame[0].contentWindow.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
      }
	}
    if (!parent || !parent.scAjaxDetailValue)
    {
      return;
    }
    for (iMaster = 0; iMaster < oResp["masterValue"].length; iMaster++)
    {
      parent.scAjaxDetailValue(oResp["masterValue"][iMaster]["index"], oResp["masterValue"][iMaster]["value"]);
    }
  } // scAjaxSetMaster

  function scAjaxSetFocus()
  {
    if (!oResp["setFocus"] && '' == scFocusFirstErrorName)
    {
      return;
    }
    sFieldName = oResp["setFocus"];
    if (document.F1.elements[sFieldName])
    {
        scFocusField(sFieldName);
    }
    scAjaxFocusError();
  } // scAjaxSetFocus

  function scAjaxFocusError()
  {
    if ('' != scFocusFirstErrorName)
    {
      scFocusField(scFocusFirstErrorName);
      scFocusFirstErrorName = '';
    }
  } // scAjaxFocusError

  function scAjaxSetNavStatus(sBarPos)
  {
    if (!oResp["navStatus"])
    {
      return;
    }
    sNavRet = "S";
    sNavAva = "S";
    if (oResp["navStatus"]["ret"])
    {
      sNavRet = oResp["navStatus"]["ret"];
    }
    if (oResp["navStatus"]["ava"])
    {
      sNavAva = oResp["navStatus"]["ava"];
    }
    if ("S" != sNavRet && "N" != sNavRet)
    {
      sNavRet = "S";
    }
    if ("S" != sNavAva && "N" != sNavAva)
    {
      sNavAva = "S";
    }
    Nav_permite_ret = sNavRet;
    Nav_permite_ava = sNavAva;
    nav_atualiza(Nav_permite_ret, Nav_permite_ava, sBarPos);
  } // scAjaxSetNavStatus

  function scAjaxSetSummary()
  {
    if (!oResp["navSummary"])
    {
      return;
    }
    sreg_ini = oResp["navSummary"].reg_ini;
    sreg_qtd = oResp["navSummary"].reg_qtd;
    sreg_tot = oResp["navSummary"].reg_tot;
    summary_atualiza(sreg_ini, sreg_qtd, sreg_tot);
  } // scAjaxSetSummary

  function scAjaxSetNavpage()
  {
    navpage_atualiza(oResp["navPage"]);
  } // scAjaxSetNavpage


  function scAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"])
    {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo)
    {
      if ("parent.parent" == oResp["redirInfo"]["target"])
      {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"])
      {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"])
      {
        window.open(sAction, "_blank");
      }
      else
      {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo)
    {
        document.write(scAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else
    {
      if (oResp["redirInfo"]["target"] == "modal")
      {
          tb_show('', sAction + '?script_case_init=' +  oResp["redirInfo"]["script_case_init"] + '&script_case_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir)
      {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else
      {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].script_case_init.value = oResp["redirInfo"]["script_case_init"];
      }
      document.forms[sFormRedir].submit();
    }
  } // scAjaxRedir

  function scAjaxSetDisplay(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    var aDispData = new Array();
    var aDispCont = {};
    var vertButton;
    if (bReset)
    {
      for (iDisplay = 0; iDisplay < ajax_block_list.length; iDisplay++)
      {
        aDispCont[ajax_block_list[iDisplay]] = aDispData.length;
        aDispData[aDispData.length] = new Array(ajax_block_id[ajax_block_list[iDisplay]], "on");
      }
      for (iDisplay = 0; iDisplay < ajax_field_list.length; iDisplay++)
      {
        if (ajax_field_id[ajax_field_list[iDisplay]])
        {
          aFieldIds = ajax_field_id[ajax_field_list[iDisplay]];
          for (iDisplay2 = 0; iDisplay2 < aFieldIds.length; iDisplay2++)
          {
            aDispCont[aFieldIds[iDisplay2]] = aDispData.length;
            aDispData[aDispData.length] = new Array(aFieldIds[iDisplay2], "on");
          }
        }
      }
    }
	var blockDisplay = {};
    if (oResp["blockDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["blockDisplay"].length; iDisplay++)
      {
        if (bReset)
        {
          aDispData[ aDispCont[ oResp["blockDisplay"][iDisplay][0] ] ][1] = oResp["blockDisplay"][iDisplay][1];
        }
        else
        {
          aDispData[aDispData.length] = new Array(ajax_block_id[ oResp["blockDisplay"][iDisplay][0] ], oResp["blockDisplay"][iDisplay][1]);
        }
		blockDisplay[ oResp["blockDisplay"][iDisplay][0] ] = oResp["blockDisplay"][iDisplay][1];
      }
	  //scCheckPagesWithoutBlock();
    }
	var fieldDisplay = {}, controlHtmlHideField = [], controlHtmlShowField = [];
    if (oResp["fieldDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["fieldDisplay"].length; iDisplay++)
      {
        if (typeof scHideUserField === "function" && "off" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlHideField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        if (typeof scShowUserField === "function" && "on" == oResp["fieldDisplay"][iDisplay][1]) {
          controlHtmlShowField.push(oResp["fieldDisplay"][iDisplay][0]);
        }
        for (iDisplay2 = 1; iDisplay2 < ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ].length; iDisplay2++)
        {
          aFieldIds = ajax_field_id[ ajax_field_mult[ oResp["fieldDisplay"][iDisplay][0] ][iDisplay2] ];
          for (iDisplay3 = 0; iDisplay3 < aFieldIds.length; iDisplay3++)
          {
            if (bReset)
            {
              aDispData[ aDispCont[ aFieldIds[iDisplay3] ] ][1] = oResp["fieldDisplay"][iDisplay][1];
            }
            else
            {
              aDispData[aDispData.length] = new Array(aFieldIds[iDisplay3], oResp["fieldDisplay"][iDisplay][1]);
            }
			if ("hidden_field_data_" == aFieldIds[iDisplay3].substr(0, 18)) {
			  fieldDisplay[ aFieldIds[iDisplay3].substr(18) ] = oResp["fieldDisplay"][iDisplay][1];
			}
          }
        }
      }
    }
    if (oResp["buttonDisplay"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplay"].length; iDisplay++)
      {
        var sBtnName2 = "";
        switch (oResp["buttonDisplay"][iDisplay][0])
        {
          case "first": var sBtnName = "sc_b_ini"; break;
          case "back": var sBtnName = "sc_b_ret"; break;
          case "forward": var sBtnName = "sc_b_avc"; break;
          case "last": var sBtnName = "sc_b_fim"; break;
          case "insert": var sBtnName = "sc_b_ins"; break;
          case "update": var sBtnName = "sc_b_upd"; break;
          case "delete": var sBtnName = "sc_b_del"; break;
          default: var sBtnName = "sc_b_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName2 = "sc_" + oResp["buttonDisplay"][iDisplay][0]; sBtnName3 = "gbl_sc_" + oResp["buttonDisplay"][iDisplay][0]; break;
        }
        aDispData[aDispData.length] = new Array(sBtnName, oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_t", oResp["buttonDisplay"][iDisplay][1]);
        aDispData[aDispData.length] = new Array(sBtnName + "_b", oResp["buttonDisplay"][iDisplay][1]);
        if ("" != sBtnName2)
        {
          aDispData[aDispData.length] = new Array(sBtnName2, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName2 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
        if ("" != sBtnName3)
        {
          aDispData[aDispData.length] = new Array(sBtnName3, oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_top", oResp["buttonDisplay"][iDisplay][1]);
          aDispData[aDispData.length] = new Array(sBtnName3 + "_bot", oResp["buttonDisplay"][iDisplay][1]);
        }
      }
    }
    if (oResp["buttonDisplayVert"])
    {
      for (iDisplay = 0; iDisplay < oResp["buttonDisplayVert"].length; iDisplay++)
      {
        vertButton = oResp["buttonDisplayVert"][iDisplay];
        aDispData[aDispData.length] = new Array("sc_exc_line_" + vertButton.seq, vertButton.delete);
        if (vertButton.gridView)
        {
          aDispData[aDispData.length] = new Array("sc_open_line_" + vertButton.seq, vertButton.update);
        }
        else
        {
          aDispData[aDispData.length] = new Array("sc_upd_line_" + vertButton.seq, vertButton.update);
        }
      }
    }
    for (iDisplay = 0; iDisplay < aDispData.length; iDisplay++)
    {
      scAjaxElementDisplay(aDispData[iDisplay][0], aDispData[iDisplay][1]);
    }
	for (var blockId in blockDisplay) {
		displayChange_block(blockId, blockDisplay[blockId]);
	}
	for (var fieldId in fieldDisplay) {
		displayChange_field(fieldId, "", fieldDisplay[fieldId]);
	}
	if (controlHtmlHideField.length) {
	  for (iDisplay = 0; iDisplay < controlHtmlHideField.length; iDisplay++) {
	    scHideUserField(controlHtmlHideField[iDisplay]);
	  }
	}
	if (controlHtmlShowField.length) {
	  for (iDisplay = 0; iDisplay < controlHtmlShowField.length; iDisplay++) {
	    scShowUserField(controlHtmlShowField[iDisplay]);
	  }
	}
  } // scAjaxSetDisplay

  function scAjaxNavigateButtonDisplay(sButton, sStatus)
  {
    sButton2 = sButton + "_off";

    if ("off" == sStatus)
    {
      sStatus2 = "off";
    }
    else
    {
      if ("sc_b_ini" == sButton || "sc_b_ret" == sButton)
      {
        if ("S" == Nav_permite_ret)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
      else
      {
        if ("S" == Nav_permite_ava)
        {
          sStatus  = "on";
          sStatus2 = "off";
        }
        else
        {
          sStatus  = "off";
          sStatus2 = "on";
        }
      }
    }

    scAjaxElementDisplay(sButton        , sStatus);
    scAjaxElementDisplay(sButton + "_t" , sStatus);
    scAjaxElementDisplay(sButton + "_b" , sStatus);
    scAjaxElementDisplay(sButton2       , sStatus2);
    scAjaxElementDisplay(sButton2 + "_t", sStatus2);
    scAjaxElementDisplay(sButton2 + "_b", sStatus2);
  } // scAjaxNavigateButtonDisplay

  function scAjaxElementDisplay(sElement, sAction)
  {
    if (ajax_block_tab && ajax_block_tab[sElement] && "" != ajax_block_tab[sElement])
    {
      scAjaxElementDisplay(ajax_block_tab[sElement], sAction);
    }
    if (document.getElementById(sElement))
    {

      if("off" == sAction)
      {
        $('#' + sElement).hide();
      }
      else
      {
        $('#' + sElement).show();
      }
      if (document.getElementById(sElement + "_dumb"))
      {
        if("off" == sAction)
        {
          $('#' + sElement + "_dumb").show();
        }
        else
        {
          $('#' + sElement + "_dumb").hide();
        }
      }
    }
  } // scAjaxElementDisplay

  function scAjaxSetLabel(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iLabel = 0; iLabel < ajax_field_list.length; iLabel++)
      {
        if (ajax_field_list[iLabel] && ajax_error_list[ajax_field_list[iLabel]])
        {
          scAjaxFieldLabel(ajax_field_list[iLabel], ajax_error_list[ajax_field_list[iLabel]]["label"]);
        }
      }
    }
    if (oResp["fieldLabel"])
    {
      for (iLabel = 0; iLabel < oResp["fieldLabel"].length; iLabel++)
      {
        scAjaxFieldLabel(oResp["fieldLabel"][iLabel][0], scAjaxSpecCharParser(oResp["fieldLabel"][iLabel][1]));
      }
    }
  } // scAjaxSetLabel

  function scAjaxFieldLabel(sField, sLabel)
  {
    if (document.getElementById("id_label_" + sField))
    {
      if (document.getElementById("id_label_" + sField).innerHTML != sLabel)
      {
        document.getElementById("id_label_" + sField).innerHTML = sLabel;
      }
    }
    else if (document.getElementById("hidden_field_label_" + sField) && document.getElementById("hidden_field_label_" + sField).innerHTML != sLabel)
    {
      document.getElementById("hidden_field_label_" + sField).innerHTML = sLabel;
    }
  } // scAjaxFieldLabel

  function scAjaxSetReadonly(bReset)
  {
    if (null == bReset)
    {
      bReset = false;
    }
    if (bReset)
    {
      for (iRead = 0; iRead < ajax_field_list.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_list[iRead], ajax_read_only[ajax_field_list[iRead]]);
      }
      for (iRead = 0; iRead < ajax_field_Dt_Hr.length; iRead++)
      {
        scAjaxFieldRead(ajax_field_Dt_Hr[iRead], ajax_read_only[ajax_field_Dt_Hr[iRead]]);
      }
    }
    if (oResp["readOnly"])
    {
      for (iRead = 0; iRead < oResp["readOnly"].length; iRead++)
      {
        if (ajax_read_only[ oResp["readOnly"][iRead][0] ])
        {
          scAjaxFieldRead(oResp["readOnly"][iRead][0], oResp["readOnly"][iRead][1]);
        }
        else if (oResp["rsSize"])
        {
          for (var i = 0; i <= oResp["rsSize"]; i++)
          {
            if (ajax_read_only[ oResp["readOnly"][iRead][0] + i ])
            {
              scAjaxFieldRead(oResp["readOnly"][iRead][0] + i, oResp["readOnly"][iRead][1]);
            }
          }
        }
      }
    }
  } // scAjaxSetReadonly

  function scAjaxFieldRead(sField, sStatus)
  {
    if ("on" == sStatus)
    {
      var sDisplayOff = "none";
      var sDisplayOn  = "";
    }
    else
    {
      var sDisplayOff = "";
      var sDisplayOn  = "none";
    }
    if (document.getElementById("id_read_off_" + sField))
    {
      document.getElementById("id_read_off_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_sc_dragdrop_" + sField))
    {
      document.getElementById("id_sc_dragdrop_" + sField).style.display = sDisplayOff;
    }
    if (document.getElementById("id_read_on_" + sField))
    {
      document.getElementById("id_read_on_" + sField).style.display = sDisplayOn;
    }
  } // scAjaxFieldRead

  function scAjaxSetBtnVars()
  {
    if (oResp["btnVars"])
    {
      for (iBtn = 0; iBtn < oResp["btnVars"].length; iBtn++)
      {
        eval(oResp["btnVars"][iBtn][0] + " = scAjaxSpecCharParser('" + oResp["btnVars"][iBtn][1] + "');");
      }
    }
  } // scAjaxSetBtnVars

  function scAjaxClearText(sFormField)
  {
    document.F1.elements[sFormField].value = "";
  } // scAjaxClearText

  function scAjaxClearLabel(sFormField)
  {
    document.getElementById("id_ajax_label_" + sFormField).innerHTML = "";
  } // scAjaxClearLabel

  function scAjaxClearSelect(sFormField)
  {
    document.F1.elements[sFormField].length = 0;
  } // scAjaxClearSelect

  function scAjaxClearCheckbox(sFormField)
  {
    document.getElementById("idAjaxCheckbox_" + sFormField).innerHTML = "";
  } // scAjaxClearCheckbox

  function scAjaxClearRadio(sFormField)
  {
    document.getElementById("idAjaxRadio_" + sFormField).innerHTML = "";
  } // scAjaxClearRadio

  function scAjaxClearEditorHtml(sFormField)
  {
    if(tinymce.majorVersion > 3)
        {
                var oFormField = tinyMCE.get(sFieldName);
        }
        else
        {
                var oFormField = tinyMCE.getInstanceById(sFieldName);
        }
    oFormField.setContent("");
  } // scAjaxClearEditorHtml

  function scCheckPagesWithoutBlock()
  {
	var page_id, block_id, has_block_shown;
    for (page_id in ajax_page_blocks) {
	  has_block_shown = false;
      for (block_id in ajax_page_blocks[page_id]) {
		console.log(page_id + ' ' + ajax_page_blocks[page_id][block_id]);
		console.log($("#div_" + ajax_block_id[ajax_page_blocks[page_id][block_id]]).css('display'));
        //$("#div_" + ajax_block_id[block_id]);
      }
    }
  }

  function scAjaxJavascript()
  {
    if (oResp["ajaxJavascript"])
    {
      var sJsFunc = "";
      for (var i = 0; i < oResp["ajaxJavascript"].length; i++)
      {
        sJsFunc = scAjaxSpecCharParser(oResp["ajaxJavascript"][i][0]);
        if ("" != sJsFunc)
        {
          var aParam = new Array();
          if (oResp["ajaxJavascript"][i][1] && 0 < oResp["ajaxJavascript"][i][1].length)
          {
            for (var j = 0; j < oResp["ajaxJavascript"][i][1].length; j++)
            {
              aParam.push("'" + oResp["ajaxJavascript"][i][1][j] + "'");
            }
          }
          eval("if (" + sJsFunc + ") { " + sJsFunc + "(" + aParam.join(", ") + ") }");
        }
      }
    }
  } // scAjaxJavascript

  function scAjaxAlert(callbackOk)
  {
    if (oResp["ajaxAlert"] && oResp["ajaxAlert"]["message"] && "" != oResp["ajaxAlert"]["message"])
    {
      scJs_alert(oResp["ajaxAlert"]["message"], callbackOk, oResp["ajaxAlert"]["params"]);
    }
    else
    {
      callbackOk();
    }
  } // scAjaxAlert

	function scJs_alert_default(message, callbackOk) {
		alert(message);
		if (typeof callbackOk == "function") {
			callbackOk();
		}
	} // scJs_alert_default

	function scJs_confirm_default(message, callbackOk, callbackCancel) {
		if (confirm(message)) {
			callbackOk();
		}
		else {
			callbackCancel();
		}
	} // scJs_confirm_default

  function scAjaxMessage(oTemp)
  {
    if (oTemp && oTemp != null)
    {
        oResp = oTemp;
    }
    if (oResp["ajaxMessage"] && oResp["ajaxMessage"]["message"] && "" != oResp["ajaxMessage"]["message"])
    {
      var sTitle    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["title"])        ? oResp["ajaxMessage"]["title"]               : scMsgDefTitle,
          bModal    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["modal"])        ? ("Y" == oResp["ajaxMessage"]["modal"])      : false,
          iTimeout  = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["timeout"])      ? parseInt(oResp["ajaxMessage"]["timeout"])   : 0,
          bButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button"])       ? ("Y" == oResp["ajaxMessage"]["button"])     : false,
          sButton   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["button_label"]) ? oResp["ajaxMessage"]["button_label"]        : "Ok",
          iTop      = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["top"])          ? parseInt(oResp["ajaxMessage"]["top"])       : 0,
          iLeft     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["left"])         ? parseInt(oResp["ajaxMessage"]["left"])      : 0,
          iWidth    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["width"])        ? parseInt(oResp["ajaxMessage"]["width"])     : 0,
          iHeight   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["height"])       ? parseInt(oResp["ajaxMessage"]["height"])    : 0,
          bClose    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["show_close"])   ? ("Y" == oResp["ajaxMessage"]["show_close"]) : true,
          bBodyIcon = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["body_icon"])    ? ("Y" == oResp["ajaxMessage"]["body_icon"])  : true,
          sRedir    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir"])        ? oResp["ajaxMessage"]["redir"]               : "",
          sTarget   = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_target"]) ? oResp["ajaxMessage"]["redir_target"]        : "",
          sParam    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["redir_par"])    ? oResp["ajaxMessage"]["redir_par"]           : "",
          bToast    = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast"])        ? ("Y" == oResp["ajaxMessage"]["toast"])      : false,
          sToastPos = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["toast_pos"])    ? oResp["ajaxMessage"]["toast_pos"]           : "",
          sType     = (oResp["ajaxMessage"] && oResp["ajaxMessage"]["type"])         ? oResp["ajaxMessage"]["type"]                : "";
      if (typeof scDisplayUserMessage == "function") {
        scDisplayUserMessage(oResp["ajaxMessage"]["message"]);
      }
      else {
		  var params = {
			  title: sTitle,
			  message: oResp["ajaxMessage"]["message"],
			  isModal: bModal,
			  timeout: iTimeout,
			  showButton: bButton,
			  buttonLabel: sButton,
			  topPos: iTop,
			  leftPos: iLeft,
			  width: iWidth,
			  height: iHeight,
			  redirUrl: sRedir,
			  redirTarget: sTarget,
			  redirParam: sParam,
			  showClose: bClose,
			  showBodyIcon: bBodyIcon,
			  isToast: bToast,
			  toastPos: sToastPos,
			  type: sType
		  };
        _scAjaxShowMessage(params);
      }
    }
  } // scAjaxMessage

  function scAjaxResponse(sResp)
  {
    eval("var oResp = " + sResp);
    return oResp;
  } // scAjaxResponse

  function scAjaxBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      input += "";
      while (input.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input = input.replace(String.fromCharCode(10), '<br>');
      }
      return input;
  } // scAjaxBreakLine

  function scAjaxProtectBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      var input1 = input + "";
      while (input1.lastIndexOf(String.fromCharCode(10)) > -1)
      {
         input1 = input1.replace(String.fromCharCode(10), '#@NM#@');
      }
      return input1;
  } // scAjaxProtectBreakLine

  function scAjaxReturnBreakLine(input)
  {
      if (null == input)
      {
          return "";
      }
      while (input.lastIndexOf('#@NM#@') > -1)
      {
         input = input.replace('#@NM#@', String.fromCharCode(10));
      }
      return input;
  } // scAjaxReturnBreakLine

  function scOpenMasterDetail(widget, url)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe.attr("src", url);
  } // scOpenMasterDetail

  function scMoveMasterDetail(widget)
  {
	  var iframe = $(parent.document).find("[name='" +  widget+ "']");
	  iframe[0].contentWindow.nm_move("apl_detalhe", true);
  } // scMoveMasterDetail

	function scAjaxError_markList() {
	    if ('undefined' == typeof oResp.errList) {
	        return;
	    }
		var i, fieldName, fieldList = new Array();
		for (i = 0; i < oResp.errList.length; i++) {
			fieldName = oResp.errList[i]["fldName"];
			if (oResp.errList[i]["numLinha"]) {
				fieldName += oResp.errList[i]["numLinha"];
			}
            fieldList.push(fieldName);
		}
		scAjaxError_markFieldList(fieldList);
	} // scAjaxError_markList

	function scAjaxError_markFieldList(fieldList) {
		var i;
		for (i = 0; i < fieldList.length; i++) {
            scAjaxError_markField(fieldList[i]);
		}
	} // scAjaxError_markFieldList

	function scAjaxError_unmarkList() {
		var i;
		for (i = 0; i < ajax_field_list.length; i++) {
            scAjaxError_unmarkField(ajax_field_list[i]);
		}
	} // scAjaxError_unmarkList

	function scAjaxError_markField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_applyFieldErrorStyle($oField);
		}
	} // scAjaxError_markField

	function scAjaxError_unmarkField(fieldName) {
		var $oField = $("#id_sc_field_" + fieldName);
		if (0 < $oField.length) {
			scAjax_removeFieldErrorStyle($oField);
		}
	} // scAjaxError_unmarkField

	function scAjax_displayEmptyForm() {
        $("#sc-ui-empty-form").show();
        $(".sc-ui-page-tab-line").hide();
        $("#sc-id-required-row").hide();
        sc_hide_control_formtarifa_mob_form();
	}

  function scAjax_applyFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.addClass(sc_css_status_pwd_text);
        fieldObj.parent().addClass(sc_css_status_pwd_box);
      } else {
        fieldObj.addClass(sc_css_status);
      }
  }

  function scAjax_removeFieldErrorStyle(fieldObj) {
    if (fieldObj.hasClass("sc-ui-pwd-toggle")) {
        fieldObj.removeClass(sc_css_status_pwd_text);
        fieldObj.parent().removeClass(sc_css_status_pwd_box);
      } else {
        fieldObj.removeClass(sc_css_status);
      }
  }

  function scAjax_formReload() {
<?php
    if ($this->nmgp_opcao == 'novo') {
        echo "      nm_move('reload_novo');";
    } else {
        echo "      nm_move('igual');";
    }
?>
  }

  function scBtnDisabled()
  {
    var btnNameNav, hasNavButton = false;

    if (typeof oResp.btnDisabled != undefined) {
      for (var btnName in oResp.btnDisabled) {
        btnNameNav = btnName.substring(0, 9);

        if ("on" == oResp.btnDisabled[btnName]) {
          $("#" + btnName).addClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "on";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "on";
            hasNavButton = true;
          }
        } else {
          $("#" + btnName).removeClass("disabled");

          if ("sc_b_ini_" == btnNameNav) {
            Nav_binicio_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_ret_" == btnNameNav) {
            Nav_bretorna_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_avc_" == btnNameNav) {
            Nav_bavanca_macro_disabled = "off";
            hasNavButton = true;
          } else if ("sc_b_fim_" == btnNameNav) {
            Nav_bfinal_macro_disabled = "off";
            hasNavButton = true;
          }
        }
      }
    }

    if (hasNavButton) {
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');
      nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');
    }
  }

  function scBtnLabel()
  {
    if (typeof oResp.btnLabel != undefined) {
      for (var btnName in oResp.btnLabel) {
        $("#" + btnName).find(".btn-label").html(oResp.btnLabel[btnName]);
      }
    }
  }

  var scFormHasChanged = false;

  function scMarkFormAsChanged() {
    scFormHasChanged = true;
  }

  function scResetFormChanges() {
    scFormHasChanged = false;
  }

  var isRunning_scFormClose_F5 = false;
  function scFormClose_F5(exitUrl) {
    if (isRunning_scFormClose_F5) {
      return;
    }
    isRunning_scFormClose_F5 = true;
    setTimeout(function() { isRunning_scFormClose_F5 = false; }, 3000);

    document.F5.action = exitUrl;
    document.F5.submit();

  }

  var isRunning_scFormClose_F6 = false;
  function scFormClose_F6(exitUrl) {
    if (isRunning_scFormClose_F6) {
      return;
    }
    isRunning_scFormClose_F6 = true;
    setTimeout(function() { isRunning_scFormClose_F6 = false; }, 3000);

    document.F6.action = exitUrl;
    document.F6.submit();

  }

  // ---------- Validate a
  function do_ajax_control_formtarifa_mob_validate_a()
  {
    var nomeCampo_a = "a";
    var var_a = scAjaxGetFieldText(nomeCampo_a);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_a(var_a, var_script_case_init, do_ajax_control_formtarifa_mob_validate_a_cb);
  } // do_ajax_control_formtarifa_mob_validate_a

  function do_ajax_control_formtarifa_mob_validate_a_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "a";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_a_cb

  // ---------- Validate importea
  function do_ajax_control_formtarifa_mob_validate_importea()
  {
    var nomeCampo_importea = "importea";
    var var_importea = scAjaxGetFieldText(nomeCampo_importea);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importea(var_importea, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importea_cb);
  } // do_ajax_control_formtarifa_mob_validate_importea

  function do_ajax_control_formtarifa_mob_validate_importea_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importea";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importea_cb

  // ---------- Validate importeela
  function do_ajax_control_formtarifa_mob_validate_importeela()
  {
    var nomeCampo_importeela = "importeela";
    var var_importeela = scAjaxGetFieldText(nomeCampo_importeela);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeela(var_importeela, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeela_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeela

  function do_ajax_control_formtarifa_mob_validate_importeela_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeela";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeela_cb

  // ---------- Validate importeepa
  function do_ajax_control_formtarifa_mob_validate_importeepa()
  {
    var nomeCampo_importeepa = "importeepa";
    var var_importeepa = scAjaxGetFieldText(nomeCampo_importeepa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepa(var_importeepa, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepa_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepa

  function do_ajax_control_formtarifa_mob_validate_importeepa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepa_cb

  // ---------- Validate estatusa
  function do_ajax_control_formtarifa_mob_validate_estatusa()
  {
    var nomeCampo_estatusa = "estatusa";
    var var_estatusa = scAjaxGetFieldRadio(nomeCampo_estatusa);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusa(var_estatusa, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusa_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusa

  function do_ajax_control_formtarifa_mob_validate_estatusa_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusa";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusa_cb

  // ---------- Validate m
  function do_ajax_control_formtarifa_mob_validate_m()
  {
    var nomeCampo_m = "m";
    var var_m = scAjaxGetFieldText(nomeCampo_m);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_m(var_m, var_script_case_init, do_ajax_control_formtarifa_mob_validate_m_cb);
  } // do_ajax_control_formtarifa_mob_validate_m

  function do_ajax_control_formtarifa_mob_validate_m_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "m";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_m_cb

  // ---------- Validate importem
  function do_ajax_control_formtarifa_mob_validate_importem()
  {
    var nomeCampo_importem = "importem";
    var var_importem = scAjaxGetFieldText(nomeCampo_importem);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importem(var_importem, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importem_cb);
  } // do_ajax_control_formtarifa_mob_validate_importem

  function do_ajax_control_formtarifa_mob_validate_importem_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importem";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importem_cb

  // ---------- Validate importeelm
  function do_ajax_control_formtarifa_mob_validate_importeelm()
  {
    var nomeCampo_importeelm = "importeelm";
    var var_importeelm = scAjaxGetFieldText(nomeCampo_importeelm);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelm(var_importeelm, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelm_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelm

  function do_ajax_control_formtarifa_mob_validate_importeelm_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelm";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelm_cb

  // ---------- Validate importeepm
  function do_ajax_control_formtarifa_mob_validate_importeepm()
  {
    var nomeCampo_importeepm = "importeepm";
    var var_importeepm = scAjaxGetFieldText(nomeCampo_importeepm);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepm(var_importeepm, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepm_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepm

  function do_ajax_control_formtarifa_mob_validate_importeepm_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepm";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepm_cb

  // ---------- Validate estatusm
  function do_ajax_control_formtarifa_mob_validate_estatusm()
  {
    var nomeCampo_estatusm = "estatusm";
    var var_estatusm = scAjaxGetFieldRadio(nomeCampo_estatusm);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusm(var_estatusm, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusm_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusm

  function do_ajax_control_formtarifa_mob_validate_estatusm_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusm";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusm_cb

  // ---------- Validate b2
  function do_ajax_control_formtarifa_mob_validate_b2()
  {
    var nomeCampo_b2 = "b2";
    var var_b2 = scAjaxGetFieldText(nomeCampo_b2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_b2(var_b2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_b2_cb);
  } // do_ajax_control_formtarifa_mob_validate_b2

  function do_ajax_control_formtarifa_mob_validate_b2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "b2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_b2_cb

  // ---------- Validate importeb2
  function do_ajax_control_formtarifa_mob_validate_importeb2()
  {
    var nomeCampo_importeb2 = "importeb2";
    var var_importeb2 = scAjaxGetFieldText(nomeCampo_importeb2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeb2(var_importeb2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeb2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeb2

  function do_ajax_control_formtarifa_mob_validate_importeb2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeb2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeb2_cb

  // ---------- Validate importeelb2
  function do_ajax_control_formtarifa_mob_validate_importeelb2()
  {
    var nomeCampo_importeelb2 = "importeelb2";
    var var_importeelb2 = scAjaxGetFieldText(nomeCampo_importeelb2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelb2(var_importeelb2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelb2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelb2

  function do_ajax_control_formtarifa_mob_validate_importeelb2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelb2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelb2_cb

  // ---------- Validate importeepb2
  function do_ajax_control_formtarifa_mob_validate_importeepb2()
  {
    var nomeCampo_importeepb2 = "importeepb2";
    var var_importeepb2 = scAjaxGetFieldText(nomeCampo_importeepb2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepb2(var_importeepb2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepb2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepb2

  function do_ajax_control_formtarifa_mob_validate_importeepb2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepb2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepb2_cb

  // ---------- Validate estatusb2
  function do_ajax_control_formtarifa_mob_validate_estatusb2()
  {
    var nomeCampo_estatusb2 = "estatusb2";
    var var_estatusb2 = scAjaxGetFieldRadio(nomeCampo_estatusb2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusb2(var_estatusb2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusb2_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusb2

  function do_ajax_control_formtarifa_mob_validate_estatusb2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusb2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusb2_cb

  // ---------- Validate b3
  function do_ajax_control_formtarifa_mob_validate_b3()
  {
    var nomeCampo_b3 = "b3";
    var var_b3 = scAjaxGetFieldText(nomeCampo_b3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_b3(var_b3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_b3_cb);
  } // do_ajax_control_formtarifa_mob_validate_b3

  function do_ajax_control_formtarifa_mob_validate_b3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "b3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_b3_cb

  // ---------- Validate importeb3
  function do_ajax_control_formtarifa_mob_validate_importeb3()
  {
    var nomeCampo_importeb3 = "importeb3";
    var var_importeb3 = scAjaxGetFieldText(nomeCampo_importeb3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeb3(var_importeb3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeb3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeb3

  function do_ajax_control_formtarifa_mob_validate_importeb3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeb3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeb3_cb

  // ---------- Validate importeelb3
  function do_ajax_control_formtarifa_mob_validate_importeelb3()
  {
    var nomeCampo_importeelb3 = "importeelb3";
    var var_importeelb3 = scAjaxGetFieldText(nomeCampo_importeelb3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelb3(var_importeelb3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelb3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelb3

  function do_ajax_control_formtarifa_mob_validate_importeelb3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelb3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelb3_cb

  // ---------- Validate importeepb3
  function do_ajax_control_formtarifa_mob_validate_importeepb3()
  {
    var nomeCampo_importeepb3 = "importeepb3";
    var var_importeepb3 = scAjaxGetFieldText(nomeCampo_importeepb3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepb3(var_importeepb3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepb3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepb3

  function do_ajax_control_formtarifa_mob_validate_importeepb3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepb3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepb3_cb

  // ---------- Validate estatusb3
  function do_ajax_control_formtarifa_mob_validate_estatusb3()
  {
    var nomeCampo_estatusb3 = "estatusb3";
    var var_estatusb3 = scAjaxGetFieldRadio(nomeCampo_estatusb3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusb3(var_estatusb3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusb3_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusb3

  function do_ajax_control_formtarifa_mob_validate_estatusb3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusb3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusb3_cb

  // ---------- Validate b4
  function do_ajax_control_formtarifa_mob_validate_b4()
  {
    var nomeCampo_b4 = "b4";
    var var_b4 = scAjaxGetFieldText(nomeCampo_b4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_b4(var_b4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_b4_cb);
  } // do_ajax_control_formtarifa_mob_validate_b4

  function do_ajax_control_formtarifa_mob_validate_b4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "b4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_b4_cb

  // ---------- Validate importeb4
  function do_ajax_control_formtarifa_mob_validate_importeb4()
  {
    var nomeCampo_importeb4 = "importeb4";
    var var_importeb4 = scAjaxGetFieldText(nomeCampo_importeb4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeb4(var_importeb4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeb4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeb4

  function do_ajax_control_formtarifa_mob_validate_importeb4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeb4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeb4_cb

  // ---------- Validate importeelb4
  function do_ajax_control_formtarifa_mob_validate_importeelb4()
  {
    var nomeCampo_importeelb4 = "importeelb4";
    var var_importeelb4 = scAjaxGetFieldText(nomeCampo_importeelb4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelb4(var_importeelb4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelb4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelb4

  function do_ajax_control_formtarifa_mob_validate_importeelb4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelb4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelb4_cb

  // ---------- Validate importeepb4
  function do_ajax_control_formtarifa_mob_validate_importeepb4()
  {
    var nomeCampo_importeepb4 = "importeepb4";
    var var_importeepb4 = scAjaxGetFieldText(nomeCampo_importeepb4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepb4(var_importeepb4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepb4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepb4

  function do_ajax_control_formtarifa_mob_validate_importeepb4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepb4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepb4_cb

  // ---------- Validate estatusb4
  function do_ajax_control_formtarifa_mob_validate_estatusb4()
  {
    var nomeCampo_estatusb4 = "estatusb4";
    var var_estatusb4 = scAjaxGetFieldRadio(nomeCampo_estatusb4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusb4(var_estatusb4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusb4_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusb4

  function do_ajax_control_formtarifa_mob_validate_estatusb4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusb4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusb4_cb

  // ---------- Validate c2
  function do_ajax_control_formtarifa_mob_validate_c2()
  {
    var nomeCampo_c2 = "c2";
    var var_c2 = scAjaxGetFieldText(nomeCampo_c2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c2(var_c2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c2_cb);
  } // do_ajax_control_formtarifa_mob_validate_c2

  function do_ajax_control_formtarifa_mob_validate_c2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c2_cb

  // ---------- Validate importec2
  function do_ajax_control_formtarifa_mob_validate_importec2()
  {
    var nomeCampo_importec2 = "importec2";
    var var_importec2 = scAjaxGetFieldText(nomeCampo_importec2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec2(var_importec2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec2

  function do_ajax_control_formtarifa_mob_validate_importec2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec2_cb

  // ---------- Validate importeelc2
  function do_ajax_control_formtarifa_mob_validate_importeelc2()
  {
    var nomeCampo_importeelc2 = "importeelc2";
    var var_importeelc2 = scAjaxGetFieldText(nomeCampo_importeelc2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc2(var_importeelc2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc2

  function do_ajax_control_formtarifa_mob_validate_importeelc2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc2_cb

  // ---------- Validate importeepc2
  function do_ajax_control_formtarifa_mob_validate_importeepc2()
  {
    var nomeCampo_importeepc2 = "importeepc2";
    var var_importeepc2 = scAjaxGetFieldText(nomeCampo_importeepc2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc2(var_importeepc2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc2_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc2

  function do_ajax_control_formtarifa_mob_validate_importeepc2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc2_cb

  // ---------- Validate estatusc2
  function do_ajax_control_formtarifa_mob_validate_estatusc2()
  {
    var nomeCampo_estatusc2 = "estatusc2";
    var var_estatusc2 = scAjaxGetFieldRadio(nomeCampo_estatusc2);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc2(var_estatusc2, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc2_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc2

  function do_ajax_control_formtarifa_mob_validate_estatusc2_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc2";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc2_cb

  // ---------- Validate c3
  function do_ajax_control_formtarifa_mob_validate_c3()
  {
    var nomeCampo_c3 = "c3";
    var var_c3 = scAjaxGetFieldText(nomeCampo_c3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c3(var_c3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c3_cb);
  } // do_ajax_control_formtarifa_mob_validate_c3

  function do_ajax_control_formtarifa_mob_validate_c3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c3_cb

  // ---------- Validate importec3
  function do_ajax_control_formtarifa_mob_validate_importec3()
  {
    var nomeCampo_importec3 = "importec3";
    var var_importec3 = scAjaxGetFieldText(nomeCampo_importec3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec3(var_importec3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec3

  function do_ajax_control_formtarifa_mob_validate_importec3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec3_cb

  // ---------- Validate importeelc3
  function do_ajax_control_formtarifa_mob_validate_importeelc3()
  {
    var nomeCampo_importeelc3 = "importeelc3";
    var var_importeelc3 = scAjaxGetFieldText(nomeCampo_importeelc3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc3(var_importeelc3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc3

  function do_ajax_control_formtarifa_mob_validate_importeelc3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc3_cb

  // ---------- Validate importeepc3
  function do_ajax_control_formtarifa_mob_validate_importeepc3()
  {
    var nomeCampo_importeepc3 = "importeepc3";
    var var_importeepc3 = scAjaxGetFieldText(nomeCampo_importeepc3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc3(var_importeepc3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc3_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc3

  function do_ajax_control_formtarifa_mob_validate_importeepc3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc3_cb

  // ---------- Validate estatusc3
  function do_ajax_control_formtarifa_mob_validate_estatusc3()
  {
    var nomeCampo_estatusc3 = "estatusc3";
    var var_estatusc3 = scAjaxGetFieldRadio(nomeCampo_estatusc3);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc3(var_estatusc3, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc3_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc3

  function do_ajax_control_formtarifa_mob_validate_estatusc3_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc3";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc3_cb

  // ---------- Validate c4
  function do_ajax_control_formtarifa_mob_validate_c4()
  {
    var nomeCampo_c4 = "c4";
    var var_c4 = scAjaxGetFieldText(nomeCampo_c4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c4(var_c4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c4_cb);
  } // do_ajax_control_formtarifa_mob_validate_c4

  function do_ajax_control_formtarifa_mob_validate_c4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c4_cb

  // ---------- Validate importec4
  function do_ajax_control_formtarifa_mob_validate_importec4()
  {
    var nomeCampo_importec4 = "importec4";
    var var_importec4 = scAjaxGetFieldText(nomeCampo_importec4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec4(var_importec4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec4

  function do_ajax_control_formtarifa_mob_validate_importec4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec4_cb

  // ---------- Validate importeelc4
  function do_ajax_control_formtarifa_mob_validate_importeelc4()
  {
    var nomeCampo_importeelc4 = "importeelc4";
    var var_importeelc4 = scAjaxGetFieldText(nomeCampo_importeelc4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc4(var_importeelc4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc4

  function do_ajax_control_formtarifa_mob_validate_importeelc4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc4_cb

  // ---------- Validate importeepc4
  function do_ajax_control_formtarifa_mob_validate_importeepc4()
  {
    var nomeCampo_importeepc4 = "importeepc4";
    var var_importeepc4 = scAjaxGetFieldText(nomeCampo_importeepc4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc4(var_importeepc4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc4_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc4

  function do_ajax_control_formtarifa_mob_validate_importeepc4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc4_cb

  // ---------- Validate estatusc4
  function do_ajax_control_formtarifa_mob_validate_estatusc4()
  {
    var nomeCampo_estatusc4 = "estatusc4";
    var var_estatusc4 = scAjaxGetFieldRadio(nomeCampo_estatusc4);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc4(var_estatusc4, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc4_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc4

  function do_ajax_control_formtarifa_mob_validate_estatusc4_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc4";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc4_cb

  // ---------- Validate c5
  function do_ajax_control_formtarifa_mob_validate_c5()
  {
    var nomeCampo_c5 = "c5";
    var var_c5 = scAjaxGetFieldText(nomeCampo_c5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c5(var_c5, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c5_cb);
  } // do_ajax_control_formtarifa_mob_validate_c5

  function do_ajax_control_formtarifa_mob_validate_c5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c5_cb

  // ---------- Validate importec5
  function do_ajax_control_formtarifa_mob_validate_importec5()
  {
    var nomeCampo_importec5 = "importec5";
    var var_importec5 = scAjaxGetFieldText(nomeCampo_importec5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec5(var_importec5, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec5_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec5

  function do_ajax_control_formtarifa_mob_validate_importec5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec5_cb

  // ---------- Validate importeelc5
  function do_ajax_control_formtarifa_mob_validate_importeelc5()
  {
    var nomeCampo_importeelc5 = "importeelc5";
    var var_importeelc5 = scAjaxGetFieldText(nomeCampo_importeelc5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc5(var_importeelc5, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc5_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc5

  function do_ajax_control_formtarifa_mob_validate_importeelc5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc5_cb

  // ---------- Validate importeepc5
  function do_ajax_control_formtarifa_mob_validate_importeepc5()
  {
    var nomeCampo_importeepc5 = "importeepc5";
    var var_importeepc5 = scAjaxGetFieldText(nomeCampo_importeepc5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc5(var_importeepc5, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc5_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc5

  function do_ajax_control_formtarifa_mob_validate_importeepc5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc5_cb

  // ---------- Validate estatusc5
  function do_ajax_control_formtarifa_mob_validate_estatusc5()
  {
    var nomeCampo_estatusc5 = "estatusc5";
    var var_estatusc5 = scAjaxGetFieldRadio(nomeCampo_estatusc5);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc5(var_estatusc5, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc5_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc5

  function do_ajax_control_formtarifa_mob_validate_estatusc5_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc5";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc5_cb

  // ---------- Validate c6
  function do_ajax_control_formtarifa_mob_validate_c6()
  {
    var nomeCampo_c6 = "c6";
    var var_c6 = scAjaxGetFieldText(nomeCampo_c6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c6(var_c6, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c6_cb);
  } // do_ajax_control_formtarifa_mob_validate_c6

  function do_ajax_control_formtarifa_mob_validate_c6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c6_cb

  // ---------- Validate importec6
  function do_ajax_control_formtarifa_mob_validate_importec6()
  {
    var nomeCampo_importec6 = "importec6";
    var var_importec6 = scAjaxGetFieldText(nomeCampo_importec6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec6(var_importec6, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec6_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec6

  function do_ajax_control_formtarifa_mob_validate_importec6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec6_cb

  // ---------- Validate importeelc6
  function do_ajax_control_formtarifa_mob_validate_importeelc6()
  {
    var nomeCampo_importeelc6 = "importeelc6";
    var var_importeelc6 = scAjaxGetFieldText(nomeCampo_importeelc6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc6(var_importeelc6, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc6_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc6

  function do_ajax_control_formtarifa_mob_validate_importeelc6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc6_cb

  // ---------- Validate importeepc6
  function do_ajax_control_formtarifa_mob_validate_importeepc6()
  {
    var nomeCampo_importeepc6 = "importeepc6";
    var var_importeepc6 = scAjaxGetFieldText(nomeCampo_importeepc6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc6(var_importeepc6, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc6_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc6

  function do_ajax_control_formtarifa_mob_validate_importeepc6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc6_cb

  // ---------- Validate estatusc6
  function do_ajax_control_formtarifa_mob_validate_estatusc6()
  {
    var nomeCampo_estatusc6 = "estatusc6";
    var var_estatusc6 = scAjaxGetFieldRadio(nomeCampo_estatusc6);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc6(var_estatusc6, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc6_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc6

  function do_ajax_control_formtarifa_mob_validate_estatusc6_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc6";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc6_cb

  // ---------- Validate c7
  function do_ajax_control_formtarifa_mob_validate_c7()
  {
    var nomeCampo_c7 = "c7";
    var var_c7 = scAjaxGetFieldText(nomeCampo_c7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c7(var_c7, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c7_cb);
  } // do_ajax_control_formtarifa_mob_validate_c7

  function do_ajax_control_formtarifa_mob_validate_c7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c7_cb

  // ---------- Validate importec7
  function do_ajax_control_formtarifa_mob_validate_importec7()
  {
    var nomeCampo_importec7 = "importec7";
    var var_importec7 = scAjaxGetFieldText(nomeCampo_importec7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec7(var_importec7, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec7_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec7

  function do_ajax_control_formtarifa_mob_validate_importec7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec7_cb

  // ---------- Validate importeelc7
  function do_ajax_control_formtarifa_mob_validate_importeelc7()
  {
    var nomeCampo_importeelc7 = "importeelc7";
    var var_importeelc7 = scAjaxGetFieldText(nomeCampo_importeelc7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc7(var_importeelc7, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc7_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc7

  function do_ajax_control_formtarifa_mob_validate_importeelc7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc7_cb

  // ---------- Validate importeepc7
  function do_ajax_control_formtarifa_mob_validate_importeepc7()
  {
    var nomeCampo_importeepc7 = "importeepc7";
    var var_importeepc7 = scAjaxGetFieldText(nomeCampo_importeepc7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc7(var_importeepc7, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc7_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc7

  function do_ajax_control_formtarifa_mob_validate_importeepc7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc7_cb

  // ---------- Validate estatusc7
  function do_ajax_control_formtarifa_mob_validate_estatusc7()
  {
    var nomeCampo_estatusc7 = "estatusc7";
    var var_estatusc7 = scAjaxGetFieldRadio(nomeCampo_estatusc7);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc7(var_estatusc7, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc7_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc7

  function do_ajax_control_formtarifa_mob_validate_estatusc7_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc7";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc7_cb

  // ---------- Validate c8
  function do_ajax_control_formtarifa_mob_validate_c8()
  {
    var nomeCampo_c8 = "c8";
    var var_c8 = scAjaxGetFieldText(nomeCampo_c8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c8(var_c8, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c8_cb);
  } // do_ajax_control_formtarifa_mob_validate_c8

  function do_ajax_control_formtarifa_mob_validate_c8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c8_cb

  // ---------- Validate importeelc8
  function do_ajax_control_formtarifa_mob_validate_importeelc8()
  {
    var nomeCampo_importeelc8 = "importeelc8";
    var var_importeelc8 = scAjaxGetFieldText(nomeCampo_importeelc8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc8(var_importeelc8, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc8_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc8

  function do_ajax_control_formtarifa_mob_validate_importeelc8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc8_cb

  // ---------- Validate importec8
  function do_ajax_control_formtarifa_mob_validate_importec8()
  {
    var nomeCampo_importec8 = "importec8";
    var var_importec8 = scAjaxGetFieldText(nomeCampo_importec8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec8(var_importec8, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec8_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec8

  function do_ajax_control_formtarifa_mob_validate_importec8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec8_cb

  // ---------- Validate importeepc8
  function do_ajax_control_formtarifa_mob_validate_importeepc8()
  {
    var nomeCampo_importeepc8 = "importeepc8";
    var var_importeepc8 = scAjaxGetFieldText(nomeCampo_importeepc8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc8(var_importeepc8, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc8_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc8

  function do_ajax_control_formtarifa_mob_validate_importeepc8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc8_cb

  // ---------- Validate estatusc8
  function do_ajax_control_formtarifa_mob_validate_estatusc8()
  {
    var nomeCampo_estatusc8 = "estatusc8";
    var var_estatusc8 = scAjaxGetFieldRadio(nomeCampo_estatusc8);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc8(var_estatusc8, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc8_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc8

  function do_ajax_control_formtarifa_mob_validate_estatusc8_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc8";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc8_cb

  // ---------- Validate c9
  function do_ajax_control_formtarifa_mob_validate_c9()
  {
    var nomeCampo_c9 = "c9";
    var var_c9 = scAjaxGetFieldText(nomeCampo_c9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_c9(var_c9, var_script_case_init, do_ajax_control_formtarifa_mob_validate_c9_cb);
  } // do_ajax_control_formtarifa_mob_validate_c9

  function do_ajax_control_formtarifa_mob_validate_c9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "c9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_c9_cb

  // ---------- Validate importec9
  function do_ajax_control_formtarifa_mob_validate_importec9()
  {
    var nomeCampo_importec9 = "importec9";
    var var_importec9 = scAjaxGetFieldText(nomeCampo_importec9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importec9(var_importec9, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importec9_cb);
  } // do_ajax_control_formtarifa_mob_validate_importec9

  function do_ajax_control_formtarifa_mob_validate_importec9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importec9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importec9_cb

  // ---------- Validate importeelc9
  function do_ajax_control_formtarifa_mob_validate_importeelc9()
  {
    var nomeCampo_importeelc9 = "importeelc9";
    var var_importeelc9 = scAjaxGetFieldText(nomeCampo_importeelc9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeelc9(var_importeelc9, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeelc9_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeelc9

  function do_ajax_control_formtarifa_mob_validate_importeelc9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeelc9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeelc9_cb

  // ---------- Validate importeepc9
  function do_ajax_control_formtarifa_mob_validate_importeepc9()
  {
    var nomeCampo_importeepc9 = "importeepc9";
    var var_importeepc9 = scAjaxGetFieldText(nomeCampo_importeepc9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_importeepc9(var_importeepc9, var_script_case_init, do_ajax_control_formtarifa_mob_validate_importeepc9_cb);
  } // do_ajax_control_formtarifa_mob_validate_importeepc9

  function do_ajax_control_formtarifa_mob_validate_importeepc9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "importeepc9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_importeepc9_cb

  // ---------- Validate estatusc9
  function do_ajax_control_formtarifa_mob_validate_estatusc9()
  {
    var nomeCampo_estatusc9 = "estatusc9";
    var var_estatusc9 = scAjaxGetFieldRadio(nomeCampo_estatusc9);
    var var_script_case_init = document.F1.script_case_init.value;
    x_ajax_control_formtarifa_mob_validate_estatusc9(var_estatusc9, var_script_case_init, do_ajax_control_formtarifa_mob_validate_estatusc9_cb);
  } // do_ajax_control_formtarifa_mob_validate_estatusc9

  function do_ajax_control_formtarifa_mob_validate_estatusc9_cb(sResp)
  {
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    sFieldValid = "estatusc9";
    scEventControl_onBlur(sFieldValid);
    scAjaxUpdateFieldErrors(sFieldValid, "valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors)
    {
      var sImgStatus = sc_img_status_ok;
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      var sImgStatus = sc_img_status_err;
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    var $oImg = $('#id_sc_status_' + sFieldValid);
    if (0 < $oImg.length)
    {
      $oImg.attr('src', sImgStatus).css('display', '');
    }
    scAjaxShowDebug();
    scAjaxSetMaster();
    scAjaxSetFocus();
  } // do_ajax_control_formtarifa_mob_validate_estatusc9_cb
function scAjaxShowErrorDisplay(sErrorId, sErrorMsg) {
	scAjaxShowErrorDisplay_default(sErrorId, sErrorMsg);
}

function scAjaxHideErrorDisplay(sErrorId, sErrorMsg) {
	scAjaxHideErrorDisplay_default(sErrorId, sErrorMsg);
}

function scAjaxShowMessage(messageType) {
	scAjaxShowMessage_default();
}

function scAjaxHideMessage() {
	scAjaxHideMessage_default();
}

function _scAjaxShowMessage(params) {
	_scAjaxShowMessage_default(params);
} // _scAjaxShowMessage

function scJs_alert(message, callbackOk, params) {
    message = message.replace(/<!--SC_NL-->/gi, "\n");
	scJs_alert_default(message, callbackOk);
} // scJs_alert

function scJs_confirm(message, callbackOk, callbackCancel) {
	scJs_confirm_default(message, callbackOk, callbackCancel);
} // scJs_confirm

  // ---------- Form
  function do_ajax_control_formtarifa_mob_submit_form()
  {
    if (scEventControl_active("")) {
      setTimeout(function() { do_ajax_control_formtarifa_mob_submit_form(); }, 500);
      return;
    }
    scAjaxHideMessage();
    var var_a = scAjaxGetFieldText("a");
    var var_importea = scAjaxGetFieldText("importea");
    var var_importeela = scAjaxGetFieldText("importeela");
    var var_importeepa = scAjaxGetFieldText("importeepa");
    var var_estatusa = scAjaxGetFieldRadio("estatusa");
    var var_m = scAjaxGetFieldText("m");
    var var_importem = scAjaxGetFieldText("importem");
    var var_importeelm = scAjaxGetFieldText("importeelm");
    var var_importeepm = scAjaxGetFieldText("importeepm");
    var var_estatusm = scAjaxGetFieldRadio("estatusm");
    var var_b2 = scAjaxGetFieldText("b2");
    var var_importeb2 = scAjaxGetFieldText("importeb2");
    var var_importeelb2 = scAjaxGetFieldText("importeelb2");
    var var_importeepb2 = scAjaxGetFieldText("importeepb2");
    var var_estatusb2 = scAjaxGetFieldRadio("estatusb2");
    var var_b3 = scAjaxGetFieldText("b3");
    var var_importeb3 = scAjaxGetFieldText("importeb3");
    var var_importeelb3 = scAjaxGetFieldText("importeelb3");
    var var_importeepb3 = scAjaxGetFieldText("importeepb3");
    var var_estatusb3 = scAjaxGetFieldRadio("estatusb3");
    var var_b4 = scAjaxGetFieldText("b4");
    var var_importeb4 = scAjaxGetFieldText("importeb4");
    var var_importeelb4 = scAjaxGetFieldText("importeelb4");
    var var_importeepb4 = scAjaxGetFieldText("importeepb4");
    var var_estatusb4 = scAjaxGetFieldRadio("estatusb4");
    var var_c2 = scAjaxGetFieldText("c2");
    var var_importec2 = scAjaxGetFieldText("importec2");
    var var_importeelc2 = scAjaxGetFieldText("importeelc2");
    var var_importeepc2 = scAjaxGetFieldText("importeepc2");
    var var_estatusc2 = scAjaxGetFieldRadio("estatusc2");
    var var_c3 = scAjaxGetFieldText("c3");
    var var_importec3 = scAjaxGetFieldText("importec3");
    var var_importeelc3 = scAjaxGetFieldText("importeelc3");
    var var_importeepc3 = scAjaxGetFieldText("importeepc3");
    var var_estatusc3 = scAjaxGetFieldRadio("estatusc3");
    var var_c4 = scAjaxGetFieldText("c4");
    var var_importec4 = scAjaxGetFieldText("importec4");
    var var_importeelc4 = scAjaxGetFieldText("importeelc4");
    var var_importeepc4 = scAjaxGetFieldText("importeepc4");
    var var_estatusc4 = scAjaxGetFieldRadio("estatusc4");
    var var_c5 = scAjaxGetFieldText("c5");
    var var_importec5 = scAjaxGetFieldText("importec5");
    var var_importeelc5 = scAjaxGetFieldText("importeelc5");
    var var_importeepc5 = scAjaxGetFieldText("importeepc5");
    var var_estatusc5 = scAjaxGetFieldRadio("estatusc5");
    var var_c6 = scAjaxGetFieldText("c6");
    var var_importec6 = scAjaxGetFieldText("importec6");
    var var_importeelc6 = scAjaxGetFieldText("importeelc6");
    var var_importeepc6 = scAjaxGetFieldText("importeepc6");
    var var_estatusc6 = scAjaxGetFieldRadio("estatusc6");
    var var_c7 = scAjaxGetFieldText("c7");
    var var_importec7 = scAjaxGetFieldText("importec7");
    var var_importeelc7 = scAjaxGetFieldText("importeelc7");
    var var_importeepc7 = scAjaxGetFieldText("importeepc7");
    var var_estatusc7 = scAjaxGetFieldRadio("estatusc7");
    var var_c8 = scAjaxGetFieldText("c8");
    var var_importeelc8 = scAjaxGetFieldText("importeelc8");
    var var_importec8 = scAjaxGetFieldText("importec8");
    var var_importeepc8 = scAjaxGetFieldText("importeepc8");
    var var_estatusc8 = scAjaxGetFieldRadio("estatusc8");
    var var_c9 = scAjaxGetFieldText("c9");
    var var_importec9 = scAjaxGetFieldText("importec9");
    var var_importeelc9 = scAjaxGetFieldText("importeelc9");
    var var_importeepc9 = scAjaxGetFieldText("importeepc9");
    var var_estatusc9 = scAjaxGetFieldRadio("estatusc9");
    var var_nm_form_submit = document.F1.nm_form_submit.value;
    var var_nmgp_url_saida = document.F1.nmgp_url_saida.value;
    var var_nmgp_opcao = document.F1.nmgp_opcao.value;
    var var_nmgp_ancora = document.F1.nmgp_ancora.value;
    var var_nmgp_num_form = document.F1.nmgp_num_form.value;
    var var_nmgp_parms = document.F1.nmgp_parms.value;
    var var_script_case_init = document.F1.script_case_init.value;
    var var_csrf_token = scAjaxGetFieldText("csrf_token");
    scAjaxProcOn();
    x_ajax_control_formtarifa_mob_submit_form(var_a, var_importea, var_importeela, var_importeepa, var_estatusa, var_m, var_importem, var_importeelm, var_importeepm, var_estatusm, var_b2, var_importeb2, var_importeelb2, var_importeepb2, var_estatusb2, var_b3, var_importeb3, var_importeelb3, var_importeepb3, var_estatusb3, var_b4, var_importeb4, var_importeelb4, var_importeepb4, var_estatusb4, var_c2, var_importec2, var_importeelc2, var_importeepc2, var_estatusc2, var_c3, var_importec3, var_importeelc3, var_importeepc3, var_estatusc3, var_c4, var_importec4, var_importeelc4, var_importeepc4, var_estatusc4, var_c5, var_importec5, var_importeelc5, var_importeepc5, var_estatusc5, var_c6, var_importec6, var_importeelc6, var_importeepc6, var_estatusc6, var_c7, var_importec7, var_importeelc7, var_importeepc7, var_estatusc7, var_c8, var_importeelc8, var_importec8, var_importeepc8, var_estatusc8, var_c9, var_importec9, var_importeelc9, var_importeepc9, var_estatusc9, var_nm_form_submit, var_nmgp_url_saida, var_nmgp_opcao, var_nmgp_ancora, var_nmgp_num_form, var_nmgp_parms, var_script_case_init, var_csrf_token, do_ajax_control_formtarifa_mob_submit_form_cb);
  } // do_ajax_control_formtarifa_mob_submit_form

  function do_ajax_control_formtarifa_mob_submit_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxUpdateErrors("valid");
    sAppErrors = scAjaxListErrors(true);
    if ("" == sAppErrors || "menu_link" == document.F1.nmgp_opcao.value)
    {
      $('.sc-js-ui-statusimg').css('display', 'none');
      scAjaxHideErrorDisplay("table");
    }
    else
    {
      scAjaxError_markList();
      scAjaxShowErrorDisplay("table", sAppErrors);
    }
    if (scAjaxIsOk())
    {
      scResetFormChanges();
      scAjaxShowMessage("success");
      scAjaxHideErrorDisplay("table");
      scLigEditLookupCall();
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['under_dashboard']) {
?>
      var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['parent_widget']; ?>']");
      if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.nm_gp_move) {
        dbParentFrame[0].contentWindow.nm_gp_move("igual");
      }
<?php
}
?>
    }
    Nm_Proc_Atualiz = false;
    if (!scAjaxHasError())
    {
      scAjaxSetFields(false);
      scAjaxSetVariables();
      scAjaxSetMaster();
      if (scInlineFormSend())
      {
        self.parent.tb_remove();
        return;
      }
    }
    scAjaxShowDebug();
    scAjaxSetDisplay();
    scBtnDisabled();
    scBtnLabel();
    scAjaxSetLabel();
    scAjaxSetReadonly();
    scAjaxAlert(do_ajax_control_formtarifa_mob_submit_form_cb_after_alert);
  } // do_ajax_control_formtarifa_mob_submit_form_cb
  function do_ajax_control_formtarifa_mob_submit_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
    scAjaxRedir();
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_control_formtarifa_mob_submit_form_cb_after_alert

  var scStatusDetail = {};

  function do_ajax_control_formtarifa_mob_navigate_form()
  {
    perform_ajax_control_formtarifa_mob_navigate_form();
  }

  function perform_ajax_control_formtarifa_mob_navigate_form()
  {
    if (scRefreshTable())
    {
      return;
    }
  } // do_ajax_control_formtarifa_mob_navigate_form

  var scMasterDetailParentIframe = "<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['control_formtarifa_mob']['dashboard_info']['parent_widget'] ?>";
  var scMasterDetailIframe = {};
<?php
foreach ($this->Ini->sc_lig_iframe as $tmp_i => $tmp_v)
{
?>
  scMasterDetailIframe["<?php echo $tmp_i; ?>"] = "<?php echo $tmp_v; ?>";
<?php
}
?>
  function do_ajax_control_formtarifa_mob_navigate_form_cb(sResp)
  {
    scAjaxProcOff();
    oResp = scAjaxResponse(sResp);
    scAjaxRedir();
    if (oResp['empty_filter'] && oResp['empty_filter'] == "ok")
    {
        document.F5.nmgp_opcao.value = "inicio";
        document.F5.nmgp_parms.value = "";
        document.F5.submit();
    }
    scAjaxClearErrors()
    scResetFormChanges()
    sc_mupload_ok = true;
    scAjaxSetFields(false);
    scAjaxSetVariables();
    scAjaxShowDebug();
    scAjaxSetLabel(true);
    scAjaxSetReadonly(true);
    scAjaxSetMaster();
    scAjaxSetNavStatus("b");
    scAjaxSetDisplay(true);
    scAjaxSetBtnVars();
    $('.sc-js-ui-statusimg').css('display', 'none');
    scAjaxAlert(do_ajax_control_formtarifa_mob_navigate_form_cb_after_alert);
  } // do_ajax_control_formtarifa_mob_navigate_form_cb
  function do_ajax_control_formtarifa_mob_navigate_form_cb_after_alert() {
    scAjaxMessage();
    scAjaxJavascript();
    scAjaxSetFocus();
<?php
if ($this->Embutida_form)
{
?>
    do_ajax_control_formtarifa_mob_restore_buttons();
<?php
}
?>
    if (hasJsFormOnload)
    {
      sc_form_onload();
    }
  } // do_ajax_control_formtarifa_mob_navigate_form_cb_after_alert

  function sc_hide_control_formtarifa_mob_form()
  {
    for (var block_id in ajax_block_id) {
      $("#div_" + ajax_block_id[block_id]).hide();
    }
  } // sc_hide_control_formtarifa_mob_form


  function scAjaxDetailProc()
  {
    return true;
  } // scAjaxDetailProc


  var ajax_error_geral = "";

  var ajax_error_type = new Array("valid", "onblur", "onchange", "onclick", "onfocus");

  var ajax_field_list = new Array();
  var ajax_field_Dt_Hr = new Array();
  ajax_field_list[0] = "a";
  ajax_field_list[1] = "importea";
  ajax_field_list[2] = "importeela";
  ajax_field_list[3] = "importeepa";
  ajax_field_list[4] = "estatusa";
  ajax_field_list[5] = "m";
  ajax_field_list[6] = "importem";
  ajax_field_list[7] = "importeelm";
  ajax_field_list[8] = "importeepm";
  ajax_field_list[9] = "estatusm";
  ajax_field_list[10] = "b2";
  ajax_field_list[11] = "importeb2";
  ajax_field_list[12] = "importeelb2";
  ajax_field_list[13] = "importeepb2";
  ajax_field_list[14] = "estatusb2";
  ajax_field_list[15] = "b3";
  ajax_field_list[16] = "importeb3";
  ajax_field_list[17] = "importeelb3";
  ajax_field_list[18] = "importeepb3";
  ajax_field_list[19] = "estatusb3";
  ajax_field_list[20] = "b4";
  ajax_field_list[21] = "importeb4";
  ajax_field_list[22] = "importeelb4";
  ajax_field_list[23] = "importeepb4";
  ajax_field_list[24] = "estatusb4";
  ajax_field_list[25] = "c2";
  ajax_field_list[26] = "importec2";
  ajax_field_list[27] = "importeelc2";
  ajax_field_list[28] = "importeepc2";
  ajax_field_list[29] = "estatusc2";
  ajax_field_list[30] = "c3";
  ajax_field_list[31] = "importec3";
  ajax_field_list[32] = "importeelc3";
  ajax_field_list[33] = "importeepc3";
  ajax_field_list[34] = "estatusc3";
  ajax_field_list[35] = "c4";
  ajax_field_list[36] = "importec4";
  ajax_field_list[37] = "importeelc4";
  ajax_field_list[38] = "importeepc4";
  ajax_field_list[39] = "estatusc4";
  ajax_field_list[40] = "c5";
  ajax_field_list[41] = "importec5";
  ajax_field_list[42] = "importeelc5";
  ajax_field_list[43] = "importeepc5";
  ajax_field_list[44] = "estatusc5";
  ajax_field_list[45] = "c6";
  ajax_field_list[46] = "importec6";
  ajax_field_list[47] = "importeelc6";
  ajax_field_list[48] = "importeepc6";
  ajax_field_list[49] = "estatusc6";
  ajax_field_list[50] = "c7";
  ajax_field_list[51] = "importec7";
  ajax_field_list[52] = "importeelc7";
  ajax_field_list[53] = "importeepc7";
  ajax_field_list[54] = "estatusc7";
  ajax_field_list[55] = "c8";
  ajax_field_list[56] = "importeelc8";
  ajax_field_list[57] = "importec8";
  ajax_field_list[58] = "importeepc8";
  ajax_field_list[59] = "estatusc8";
  ajax_field_list[60] = "c9";
  ajax_field_list[61] = "importec9";
  ajax_field_list[62] = "importeelc9";
  ajax_field_list[63] = "importeepc9";
  ajax_field_list[64] = "estatusc9";

  var ajax_block_list = new Array();
  ajax_block_list[0] = "0";

  var ajax_error_list = {
    "a": {"label": "A", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importea": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeela": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepa": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusa": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "m": {"label": "M", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importem": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelm": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepm": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusm": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "b2": {"label": "B2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeb2": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelb2": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepb2": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusb2": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "b3": {"label": "B3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeb3": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelb3": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepb3": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusb3": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "b4": {"label": "B4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeb4": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelb4": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepb4": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusb4": {"label": "EstatusB4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c2": {"label": "C2", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec2": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc2": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc2": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc2": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c3": {"label": "C3", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec3": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc3": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc3": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc3": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c4": {"label": "C4", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec4": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc4": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc4": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc4": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c5": {"label": "C5", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec5": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc5": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc5": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc5": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c6": {"label": "C6", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec6": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc6": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc6": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc6": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c7": {"label": "C7", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec7": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc7": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc7": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc7": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c8": {"label": "C8", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc8": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec8": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc8": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc8": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "c9": {"label": "C9", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importec9": {"label": "Importe", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeelc9": {"label": "Importe EEL", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "importeepc9": {"label": "Importe EEP", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5},
    "estatusc9": {"label": "Estatus", "valid": new Array(), "onblur": new Array(), "onchange": new Array(), "onclick": new Array(), "onfocus": new Array(), "timeout": 5}
  };
  var ajax_error_timeout = 5;

  var ajax_block_id = {
    "0": "hidden_bloco_0"
  };

  var ajax_block_tab = {
    "hidden_bloco_0": ""
  };

  var ajax_field_mult = {
    "a": new Array(),
    "importea": new Array(),
    "importeela": new Array(),
    "importeepa": new Array(),
    "estatusa": new Array(),
    "m": new Array(),
    "importem": new Array(),
    "importeelm": new Array(),
    "importeepm": new Array(),
    "estatusm": new Array(),
    "b2": new Array(),
    "importeb2": new Array(),
    "importeelb2": new Array(),
    "importeepb2": new Array(),
    "estatusb2": new Array(),
    "b3": new Array(),
    "importeb3": new Array(),
    "importeelb3": new Array(),
    "importeepb3": new Array(),
    "estatusb3": new Array(),
    "b4": new Array(),
    "importeb4": new Array(),
    "importeelb4": new Array(),
    "importeepb4": new Array(),
    "estatusb4": new Array(),
    "c2": new Array(),
    "importec2": new Array(),
    "importeelc2": new Array(),
    "importeepc2": new Array(),
    "estatusc2": new Array(),
    "c3": new Array(),
    "importec3": new Array(),
    "importeelc3": new Array(),
    "importeepc3": new Array(),
    "estatusc3": new Array(),
    "c4": new Array(),
    "importec4": new Array(),
    "importeelc4": new Array(),
    "importeepc4": new Array(),
    "estatusc4": new Array(),
    "c5": new Array(),
    "importec5": new Array(),
    "importeelc5": new Array(),
    "importeepc5": new Array(),
    "estatusc5": new Array(),
    "c6": new Array(),
    "importec6": new Array(),
    "importeelc6": new Array(),
    "importeepc6": new Array(),
    "estatusc6": new Array(),
    "c7": new Array(),
    "importec7": new Array(),
    "importeelc7": new Array(),
    "importeepc7": new Array(),
    "estatusc7": new Array(),
    "c8": new Array(),
    "importeelc8": new Array(),
    "importec8": new Array(),
    "importeepc8": new Array(),
    "estatusc8": new Array(),
    "c9": new Array(),
    "importec9": new Array(),
    "importeelc9": new Array(),
    "importeepc9": new Array(),
    "estatusc9": new Array()
  };
  ajax_field_mult["a"][1] = "a";
  ajax_field_mult["importea"][1] = "importea";
  ajax_field_mult["importeela"][1] = "importeela";
  ajax_field_mult["importeepa"][1] = "importeepa";
  ajax_field_mult["estatusa"][1] = "estatusa";
  ajax_field_mult["m"][1] = "m";
  ajax_field_mult["importem"][1] = "importem";
  ajax_field_mult["importeelm"][1] = "importeelm";
  ajax_field_mult["importeepm"][1] = "importeepm";
  ajax_field_mult["estatusm"][1] = "estatusm";
  ajax_field_mult["b2"][1] = "b2";
  ajax_field_mult["importeb2"][1] = "importeb2";
  ajax_field_mult["importeelb2"][1] = "importeelb2";
  ajax_field_mult["importeepb2"][1] = "importeepb2";
  ajax_field_mult["estatusb2"][1] = "estatusb2";
  ajax_field_mult["b3"][1] = "b3";
  ajax_field_mult["importeb3"][1] = "importeb3";
  ajax_field_mult["importeelb3"][1] = "importeelb3";
  ajax_field_mult["importeepb3"][1] = "importeepb3";
  ajax_field_mult["estatusb3"][1] = "estatusb3";
  ajax_field_mult["b4"][1] = "b4";
  ajax_field_mult["importeb4"][1] = "importeb4";
  ajax_field_mult["importeelb4"][1] = "importeelb4";
  ajax_field_mult["importeepb4"][1] = "importeepb4";
  ajax_field_mult["estatusb4"][1] = "estatusb4";
  ajax_field_mult["c2"][1] = "c2";
  ajax_field_mult["importec2"][1] = "importec2";
  ajax_field_mult["importeelc2"][1] = "importeelc2";
  ajax_field_mult["importeepc2"][1] = "importeepc2";
  ajax_field_mult["estatusc2"][1] = "estatusc2";
  ajax_field_mult["c3"][1] = "c3";
  ajax_field_mult["importec3"][1] = "importec3";
  ajax_field_mult["importeelc3"][1] = "importeelc3";
  ajax_field_mult["importeepc3"][1] = "importeepc3";
  ajax_field_mult["estatusc3"][1] = "estatusc3";
  ajax_field_mult["c4"][1] = "c4";
  ajax_field_mult["importec4"][1] = "importec4";
  ajax_field_mult["importeelc4"][1] = "importeelc4";
  ajax_field_mult["importeepc4"][1] = "importeepc4";
  ajax_field_mult["estatusc4"][1] = "estatusc4";
  ajax_field_mult["c5"][1] = "c5";
  ajax_field_mult["importec5"][1] = "importec5";
  ajax_field_mult["importeelc5"][1] = "importeelc5";
  ajax_field_mult["importeepc5"][1] = "importeepc5";
  ajax_field_mult["estatusc5"][1] = "estatusc5";
  ajax_field_mult["c6"][1] = "c6";
  ajax_field_mult["importec6"][1] = "importec6";
  ajax_field_mult["importeelc6"][1] = "importeelc6";
  ajax_field_mult["importeepc6"][1] = "importeepc6";
  ajax_field_mult["estatusc6"][1] = "estatusc6";
  ajax_field_mult["c7"][1] = "c7";
  ajax_field_mult["importec7"][1] = "importec7";
  ajax_field_mult["importeelc7"][1] = "importeelc7";
  ajax_field_mult["importeepc7"][1] = "importeepc7";
  ajax_field_mult["estatusc7"][1] = "estatusc7";
  ajax_field_mult["c8"][1] = "c8";
  ajax_field_mult["importeelc8"][1] = "importeelc8";
  ajax_field_mult["importec8"][1] = "importec8";
  ajax_field_mult["importeepc8"][1] = "importeepc8";
  ajax_field_mult["estatusc8"][1] = "estatusc8";
  ajax_field_mult["c9"][1] = "c9";
  ajax_field_mult["importec9"][1] = "importec9";
  ajax_field_mult["importeelc9"][1] = "importeelc9";
  ajax_field_mult["importeepc9"][1] = "importeepc9";
  ajax_field_mult["estatusc9"][1] = "estatusc9";

  var ajax_field_id = {
    "a": new Array("hidden_field_label_a", "hidden_field_data_a"),
    "importea": new Array("hidden_field_label_importea", "hidden_field_data_importea"),
    "importeela": new Array("hidden_field_label_importeela", "hidden_field_data_importeela"),
    "importeepa": new Array("hidden_field_label_importeepa", "hidden_field_data_importeepa"),
    "estatusa": new Array("hidden_field_label_estatusa", "hidden_field_data_estatusa"),
    "m": new Array("hidden_field_label_m", "hidden_field_data_m"),
    "importem": new Array("hidden_field_label_importem", "hidden_field_data_importem"),
    "importeelm": new Array("hidden_field_label_importeelm", "hidden_field_data_importeelm"),
    "importeepm": new Array("hidden_field_label_importeepm", "hidden_field_data_importeepm"),
    "estatusm": new Array("hidden_field_label_estatusm", "hidden_field_data_estatusm"),
    "b2": new Array("hidden_field_label_b2", "hidden_field_data_b2"),
    "importeb2": new Array("hidden_field_label_importeb2", "hidden_field_data_importeb2"),
    "importeelb2": new Array("hidden_field_label_importeelb2", "hidden_field_data_importeelb2"),
    "importeepb2": new Array("hidden_field_label_importeepb2", "hidden_field_data_importeepb2"),
    "estatusb2": new Array("hidden_field_label_estatusb2", "hidden_field_data_estatusb2"),
    "b3": new Array("hidden_field_label_b3", "hidden_field_data_b3"),
    "importeb3": new Array("hidden_field_label_importeb3", "hidden_field_data_importeb3"),
    "importeelb3": new Array("hidden_field_label_importeelb3", "hidden_field_data_importeelb3"),
    "importeepb3": new Array("hidden_field_label_importeepb3", "hidden_field_data_importeepb3"),
    "estatusb3": new Array("hidden_field_label_estatusb3", "hidden_field_data_estatusb3"),
    "b4": new Array("hidden_field_label_b4", "hidden_field_data_b4"),
    "importeb4": new Array("hidden_field_label_importeb4", "hidden_field_data_importeb4"),
    "importeelb4": new Array("hidden_field_label_importeelb4", "hidden_field_data_importeelb4"),
    "importeepb4": new Array("hidden_field_label_importeepb4", "hidden_field_data_importeepb4"),
    "estatusb4": new Array("hidden_field_label_estatusb4", "hidden_field_data_estatusb4"),
    "c2": new Array("hidden_field_label_c2", "hidden_field_data_c2"),
    "importec2": new Array("hidden_field_label_importec2", "hidden_field_data_importec2"),
    "importeelc2": new Array("hidden_field_label_importeelc2", "hidden_field_data_importeelc2"),
    "importeepc2": new Array("hidden_field_label_importeepc2", "hidden_field_data_importeepc2"),
    "estatusc2": new Array("hidden_field_label_estatusc2", "hidden_field_data_estatusc2"),
    "c3": new Array("hidden_field_label_c3", "hidden_field_data_c3"),
    "importec3": new Array("hidden_field_label_importec3", "hidden_field_data_importec3"),
    "importeelc3": new Array("hidden_field_label_importeelc3", "hidden_field_data_importeelc3"),
    "importeepc3": new Array("hidden_field_label_importeepc3", "hidden_field_data_importeepc3"),
    "estatusc3": new Array("hidden_field_label_estatusc3", "hidden_field_data_estatusc3"),
    "c4": new Array("hidden_field_label_c4", "hidden_field_data_c4"),
    "importec4": new Array("hidden_field_label_importec4", "hidden_field_data_importec4"),
    "importeelc4": new Array("hidden_field_label_importeelc4", "hidden_field_data_importeelc4"),
    "importeepc4": new Array("hidden_field_label_importeepc4", "hidden_field_data_importeepc4"),
    "estatusc4": new Array("hidden_field_label_estatusc4", "hidden_field_data_estatusc4"),
    "c5": new Array("hidden_field_label_c5", "hidden_field_data_c5"),
    "importec5": new Array("hidden_field_label_importec5", "hidden_field_data_importec5"),
    "importeelc5": new Array("hidden_field_label_importeelc5", "hidden_field_data_importeelc5"),
    "importeepc5": new Array("hidden_field_label_importeepc5", "hidden_field_data_importeepc5"),
    "estatusc5": new Array("hidden_field_label_estatusc5", "hidden_field_data_estatusc5"),
    "c6": new Array("hidden_field_label_c6", "hidden_field_data_c6"),
    "importec6": new Array("hidden_field_label_importec6", "hidden_field_data_importec6"),
    "importeelc6": new Array("hidden_field_label_importeelc6", "hidden_field_data_importeelc6"),
    "importeepc6": new Array("hidden_field_label_importeepc6", "hidden_field_data_importeepc6"),
    "estatusc6": new Array("hidden_field_label_estatusc6", "hidden_field_data_estatusc6"),
    "c7": new Array("hidden_field_label_c7", "hidden_field_data_c7"),
    "importec7": new Array("hidden_field_label_importec7", "hidden_field_data_importec7"),
    "importeelc7": new Array("hidden_field_label_importeelc7", "hidden_field_data_importeelc7"),
    "importeepc7": new Array("hidden_field_label_importeepc7", "hidden_field_data_importeepc7"),
    "estatusc7": new Array("hidden_field_label_estatusc7", "hidden_field_data_estatusc7"),
    "c8": new Array("hidden_field_label_c8", "hidden_field_data_c8"),
    "importeelc8": new Array("hidden_field_label_importeelc8", "hidden_field_data_importeelc8"),
    "importec8": new Array("hidden_field_label_importec8", "hidden_field_data_importec8"),
    "importeepc8": new Array("hidden_field_label_importeepc8", "hidden_field_data_importeepc8"),
    "estatusc8": new Array("hidden_field_label_estatusc8", "hidden_field_data_estatusc8"),
    "c9": new Array("hidden_field_label_c9", "hidden_field_data_c9"),
    "importec9": new Array("hidden_field_label_importec9", "hidden_field_data_importec9"),
    "importeelc9": new Array("hidden_field_label_importeelc9", "hidden_field_data_importeelc9"),
    "importeepc9": new Array("hidden_field_label_importeepc9", "hidden_field_data_importeepc9"),
    "estatusc9": new Array("hidden_field_label_estatusc9", "hidden_field_data_estatusc9")
  };

  var ajax_read_only = {
    "a": "on",
    "importea": "off",
    "importeela": "off",
    "importeepa": "off",
    "estatusa": "off",
    "m": "on",
    "importem": "off",
    "importeelm": "off",
    "importeepm": "off",
    "estatusm": "off",
    "b2": "on",
    "importeb2": "off",
    "importeelb2": "off",
    "importeepb2": "off",
    "estatusb2": "off",
    "b3": "on",
    "importeb3": "off",
    "importeelb3": "off",
    "importeepb3": "off",
    "estatusb3": "off",
    "b4": "on",
    "importeb4": "off",
    "importeelb4": "off",
    "importeepb4": "off",
    "estatusb4": "off",
    "c2": "on",
    "importec2": "off",
    "importeelc2": "off",
    "importeepc2": "off",
    "estatusc2": "off",
    "c3": "on",
    "importec3": "off",
    "importeelc3": "off",
    "importeepc3": "off",
    "estatusc3": "off",
    "c4": "on",
    "importec4": "off",
    "importeelc4": "off",
    "importeepc4": "off",
    "estatusc4": "off",
    "c5": "on",
    "importec5": "off",
    "importeelc5": "off",
    "importeepc5": "off",
    "estatusc5": "off",
    "c6": "on",
    "importec6": "off",
    "importeelc6": "off",
    "importeepc6": "off",
    "estatusc6": "off",
    "c7": "on",
    "importec7": "off",
    "importeelc7": "off",
    "importeepc7": "off",
    "estatusc7": "off",
    "c8": "on",
    "importeelc8": "off",
    "importec8": "off",
    "importeepc8": "off",
    "estatusc8": "off",
    "c9": "on",
    "importec9": "off",
    "importeelc9": "off",
    "importeepc9": "off",
    "estatusc9": "off"
  };
  var bRefreshTable = false;
  function scRefreshTable()
  {
    return false;
  }

  function scAjaxDetailValue(sIndex, sValue)
  {
    var aValue = new Array();
    aValue[0] = {"value" : sValue};
    if ("a" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importea" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeela" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepa" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusa" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("m" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importem" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelm" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepm" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusm" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("b2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeb2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelb2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepb2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusb2" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("b3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeb3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelb3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepb3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusb3" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("b4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeb4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelb4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepb4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusb4" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc2" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc2" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc3" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc3" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc4" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc4" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc5" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc5" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc6" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc6" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc7" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc7" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc8" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc8" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("c9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importec9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeelc9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("importeepc9" == sIndex)
    {
      scAjaxSetFieldText(sIndex, aValue, "", "", true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    if ("estatusc9" == sIndex)
    {
      scAjaxSetFieldRadio(sIndex, aValue, null, 1, null, "", false, true);
      updateHeaderFooter(sIndex, aValue);

      if ($("#id_sc_field_" + sIndex).length) {
          $("#id_sc_field_" + sIndex).change();
      }
      else if (document.F1.elements[sIndex]) {
          $(document.F1.elements[sIndex]).change();
      }
      else if (document.F1.elements[sFieldName + "[]"]) {
          $(document.F1.elements[sFieldName + "[]"]).change();
      }

      return;
    }
    scAjaxSetFieldInnerHtml(sIndex, aValue);
  }
 </SCRIPT>
