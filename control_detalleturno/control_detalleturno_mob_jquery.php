
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["mxn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidadmxn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidadusd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importemxn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeusd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinicialcr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinalcr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinicialeap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinaleap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinir1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinr1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinir2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinr2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinir3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinr3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["mxn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mxn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidadmxn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidadmxn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidadusd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidadusd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importemxn" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importemxn" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeusd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeusd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["folioinicialcr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["folioinicialcr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliofinalcr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliofinalcr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["folioinicialeap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["folioinicialeap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliofinaleap" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliofinaleap" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["folioinir1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["folioinir1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliofinr1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliofinr1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["folioinir2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["folioinir2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliofinr2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliofinr2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["folioinir3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["folioinir3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliofinr3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliofinr3" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_mxn' + iSeqRow).bind('blur', function() { sc_control_detalleturno_mxn_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_control_detalleturno_mxn_onfocus(this, iSeqRow) });
  $('#id_sc_field_usd' + iSeqRow).bind('blur', function() { sc_control_detalleturno_usd_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_control_detalleturno_usd_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidadmxn' + iSeqRow).bind('blur', function() { sc_control_detalleturno_cantidadmxn_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_detalleturno_cantidadmxn_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidadusd' + iSeqRow).bind('blur', function() { sc_control_detalleturno_cantidadusd_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_detalleturno_cantidadusd_onfocus(this, iSeqRow) });
  $('#id_sc_field_importemxn' + iSeqRow).bind('blur', function() { sc_control_detalleturno_importemxn_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_importemxn_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeusd' + iSeqRow).bind('blur', function() { sc_control_detalleturno_importeusd_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_importeusd_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinicialcr' + iSeqRow).bind('blur', function() { sc_control_detalleturno_folioinicialcr_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_detalleturno_folioinicialcr_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinalcr' + iSeqRow).bind('blur', function() { sc_control_detalleturno_foliofinalcr_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_control_detalleturno_foliofinalcr_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinicialeap' + iSeqRow).bind('blur', function() { sc_control_detalleturno_folioinicialeap_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_control_detalleturno_folioinicialeap_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinaleap' + iSeqRow).bind('blur', function() { sc_control_detalleturno_foliofinaleap_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_detalleturno_foliofinaleap_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinir1' + iSeqRow).bind('blur', function() { sc_control_detalleturno_folioinir1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_folioinir1_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinr1' + iSeqRow).bind('blur', function() { sc_control_detalleturno_foliofinr1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_foliofinr1_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinir2' + iSeqRow).bind('blur', function() { sc_control_detalleturno_folioinir2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_folioinir2_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinr2' + iSeqRow).bind('blur', function() { sc_control_detalleturno_foliofinr2_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_foliofinr2_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinir3' + iSeqRow).bind('blur', function() { sc_control_detalleturno_folioinir3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_folioinir3_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinr3' + iSeqRow).bind('blur', function() { sc_control_detalleturno_foliofinr3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_detalleturno_foliofinr3_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_detalleturno_mxn_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_mxn();
  scCssBlur(oThis);
}

function sc_control_detalleturno_mxn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_usd_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_usd();
  scCssBlur(oThis);
}

function sc_control_detalleturno_usd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_cantidadmxn_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_cantidadmxn();
  scCssBlur(oThis);
}

function sc_control_detalleturno_cantidadmxn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_cantidadusd_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_cantidadusd();
  scCssBlur(oThis);
}

function sc_control_detalleturno_cantidadusd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_importemxn_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_importemxn();
  scCssBlur(oThis);
}

function sc_control_detalleturno_importemxn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_importeusd_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_importeusd();
  scCssBlur(oThis);
}

function sc_control_detalleturno_importeusd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_folioinicialcr_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_folioinicialcr();
  scCssBlur(oThis);
}

function sc_control_detalleturno_folioinicialcr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_foliofinalcr_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_foliofinalcr();
  scCssBlur(oThis);
}

function sc_control_detalleturno_foliofinalcr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_folioinicialeap_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_folioinicialeap();
  scCssBlur(oThis);
}

function sc_control_detalleturno_folioinicialeap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_foliofinaleap_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_foliofinaleap();
  scCssBlur(oThis);
}

function sc_control_detalleturno_foliofinaleap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_folioinir1_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_folioinir1();
  scCssBlur(oThis);
}

function sc_control_detalleturno_folioinir1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_foliofinr1_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_foliofinr1();
  scCssBlur(oThis);
}

function sc_control_detalleturno_foliofinr1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_folioinir2_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_folioinir2();
  scCssBlur(oThis);
}

function sc_control_detalleturno_folioinir2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_foliofinr2_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_foliofinr2();
  scCssBlur(oThis);
}

function sc_control_detalleturno_foliofinr2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_folioinir3_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_folioinir3();
  scCssBlur(oThis);
}

function sc_control_detalleturno_folioinir3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_detalleturno_foliofinr3_onblur(oThis, iSeqRow) {
  do_ajax_control_detalleturno_mob_validate_foliofinr3();
  scCssBlur(oThis);
}

function sc_control_detalleturno_foliofinr3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("mxn", "", status);
	displayChange_field("usd", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("cantidadmxn", "", status);
	displayChange_field("cantidadusd", "", status);
	displayChange_field("importemxn", "", status);
	displayChange_field("importeusd", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("folioinicialcr", "", status);
	displayChange_field("foliofinalcr", "", status);
	displayChange_field("folioinicialeap", "", status);
	displayChange_field("foliofinaleap", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("folioinir1", "", status);
	displayChange_field("foliofinr1", "", status);
	displayChange_field("folioinir2", "", status);
	displayChange_field("foliofinr2", "", status);
	displayChange_field("folioinir3", "", status);
	displayChange_field("foliofinr3", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_mxn(row, status);
	displayChange_field_usd(row, status);
	displayChange_field_cantidadmxn(row, status);
	displayChange_field_cantidadusd(row, status);
	displayChange_field_importemxn(row, status);
	displayChange_field_importeusd(row, status);
	displayChange_field_folioinicialcr(row, status);
	displayChange_field_foliofinalcr(row, status);
	displayChange_field_folioinicialeap(row, status);
	displayChange_field_foliofinaleap(row, status);
	displayChange_field_folioinir1(row, status);
	displayChange_field_foliofinr1(row, status);
	displayChange_field_folioinir2(row, status);
	displayChange_field_foliofinr2(row, status);
	displayChange_field_folioinir3(row, status);
	displayChange_field_foliofinr3(row, status);
}

function displayChange_field(field, row, status) {
	if ("mxn" == field) {
		displayChange_field_mxn(row, status);
	}
	if ("usd" == field) {
		displayChange_field_usd(row, status);
	}
	if ("cantidadmxn" == field) {
		displayChange_field_cantidadmxn(row, status);
	}
	if ("cantidadusd" == field) {
		displayChange_field_cantidadusd(row, status);
	}
	if ("importemxn" == field) {
		displayChange_field_importemxn(row, status);
	}
	if ("importeusd" == field) {
		displayChange_field_importeusd(row, status);
	}
	if ("folioinicialcr" == field) {
		displayChange_field_folioinicialcr(row, status);
	}
	if ("foliofinalcr" == field) {
		displayChange_field_foliofinalcr(row, status);
	}
	if ("folioinicialeap" == field) {
		displayChange_field_folioinicialeap(row, status);
	}
	if ("foliofinaleap" == field) {
		displayChange_field_foliofinaleap(row, status);
	}
	if ("folioinir1" == field) {
		displayChange_field_folioinir1(row, status);
	}
	if ("foliofinr1" == field) {
		displayChange_field_foliofinr1(row, status);
	}
	if ("folioinir2" == field) {
		displayChange_field_folioinir2(row, status);
	}
	if ("foliofinr2" == field) {
		displayChange_field_foliofinr2(row, status);
	}
	if ("folioinir3" == field) {
		displayChange_field_folioinir3(row, status);
	}
	if ("foliofinr3" == field) {
		displayChange_field_foliofinr3(row, status);
	}
}

function displayChange_field_mxn(row, status) {
    var fieldId;
}

function displayChange_field_usd(row, status) {
    var fieldId;
}

function displayChange_field_cantidadmxn(row, status) {
    var fieldId;
}

function displayChange_field_cantidadusd(row, status) {
    var fieldId;
}

function displayChange_field_importemxn(row, status) {
    var fieldId;
}

function displayChange_field_importeusd(row, status) {
    var fieldId;
}

function displayChange_field_folioinicialcr(row, status) {
    var fieldId;
}

function displayChange_field_foliofinalcr(row, status) {
    var fieldId;
}

function displayChange_field_folioinicialeap(row, status) {
    var fieldId;
}

function displayChange_field_foliofinaleap(row, status) {
    var fieldId;
}

function displayChange_field_folioinir1(row, status) {
    var fieldId;
}

function displayChange_field_foliofinr1(row, status) {
    var fieldId;
}

function displayChange_field_folioinir2(row, status) {
    var fieldId;
}

function displayChange_field_foliofinr2(row, status) {
    var fieldId;
}

function displayChange_field_folioinir3(row, status) {
    var fieldId;
}

function displayChange_field_foliofinr3(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_detalleturno_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'control_detalleturno_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

