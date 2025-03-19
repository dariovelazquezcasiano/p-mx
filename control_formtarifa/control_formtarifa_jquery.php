
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
  scEventControl_data["a" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeela" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusm" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["b2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeb2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelb2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepb2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusb2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["b3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeb3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelb3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepb3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusb3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["b4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeb4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelb4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepb4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusb4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc5" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc6" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc7" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc8" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importec9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeelc9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeepc9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatusc9" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["a" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["a" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeela" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeela" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusm" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusm" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["b2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["b2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeb2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeb2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelb2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelb2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepb2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepb2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusb2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusb2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["b3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["b3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeb3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeb3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelb3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelb3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepb3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepb3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusb3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusb3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["b4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["b4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeb4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeb4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelb4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelb4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepb4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepb4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusb4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusb4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc5" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc5" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc6" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc6" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc7" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc7" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc8" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc8" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importec9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importec9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeelc9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeelc9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["importeepc9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["importeepc9" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatusc9" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatusc9" + iSeqRow]["change"]) {
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
  $('#id_sc_field_a' + iSeqRow).bind('blur', function() { sc_control_formtarifa_a_onblur(this, iSeqRow) })
                               .bind('change', function() { sc_control_formtarifa_a_onchange(this, iSeqRow) })
                               .bind('focus', function() { sc_control_formtarifa_a_onfocus(this, iSeqRow) });
  $('#id_sc_field_m' + iSeqRow).bind('blur', function() { sc_control_formtarifa_m_onblur(this, iSeqRow) })
                               .bind('change', function() { sc_control_formtarifa_m_onchange(this, iSeqRow) })
                               .bind('focus', function() { sc_control_formtarifa_m_onfocus(this, iSeqRow) });
  $('#id_sc_field_b2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_b2_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_b2_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_b2_onfocus(this, iSeqRow) });
  $('#id_sc_field_b3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_b3_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_b3_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_b3_onfocus(this, iSeqRow) });
  $('#id_sc_field_b4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_b4_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_b4_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_b4_onfocus(this, iSeqRow) });
  $('#id_sc_field_c2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c2_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c2_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c2_onfocus(this, iSeqRow) });
  $('#id_sc_field_c3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c3_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c3_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c3_onfocus(this, iSeqRow) });
  $('#id_sc_field_c4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c4_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c4_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c4_onfocus(this, iSeqRow) });
  $('#id_sc_field_c5' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c5_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c5_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c5_onfocus(this, iSeqRow) });
  $('#id_sc_field_c6' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c6_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c6_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c6_onfocus(this, iSeqRow) });
  $('#id_sc_field_c7' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c7_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c7_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c7_onfocus(this, iSeqRow) });
  $('#id_sc_field_c8' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c8_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c8_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c8_onfocus(this, iSeqRow) });
  $('#id_sc_field_c9' + iSeqRow).bind('blur', function() { sc_control_formtarifa_c9_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_control_formtarifa_c9_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_control_formtarifa_c9_onfocus(this, iSeqRow) });
  $('#id_sc_field_importea' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importea_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_formtarifa_importea_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_formtarifa_importea_onfocus(this, iSeqRow) });
  $('#id_sc_field_importem' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importem_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_formtarifa_importem_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_formtarifa_importem_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeb2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeb2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importeb2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importeb2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeb3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeb3_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importeb3_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importeb3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeb4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeb4_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importeb4_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importeb4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec3_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec3_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec4_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec4_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec5' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec5_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec5_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec5_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec6' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec6_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec6_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec6_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec7' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec7_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec7_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec7_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec8' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec8_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec8_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec8_onfocus(this, iSeqRow) });
  $('#id_sc_field_importec9' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importec9_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_importec9_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_importec9_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeela' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeela_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_formtarifa_importeela_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_formtarifa_importeela_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelm' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelm_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_formtarifa_importeelm_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_formtarifa_importeelm_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelb2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelb2_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelb2_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelb2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelb3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelb3_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelb3_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelb3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelb4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelb4_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelb4_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelb4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc2_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc2_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc3_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc3_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc4_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc4_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc5' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc5_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc5_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc5_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc6' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc6_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc6_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc6_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc7' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc7_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc7_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc7_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc8' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc8_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc8_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc8_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeelc9' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeelc9_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeelc9_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeelc9_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepa' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepa_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_formtarifa_importeepa_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_formtarifa_importeepa_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepm' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepm_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_formtarifa_importeepm_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_formtarifa_importeepm_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepb2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepb2_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepb2_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepb2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepb3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepb3_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepb3_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepb3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepb4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepb4_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepb4_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepb4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc2_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc2_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc2_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc3_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc3_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc3_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc4_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc4_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc4_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc5' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc5_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc5_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc5_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc6' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc6_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc6_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc6_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc7' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc7_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc7_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc7_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc8' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc8_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc8_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc8_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeepc9' + iSeqRow).bind('blur', function() { sc_control_formtarifa_importeepc9_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_control_formtarifa_importeepc9_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_formtarifa_importeepc9_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusa' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusa_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_formtarifa_estatusa_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_formtarifa_estatusa_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusm' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusm_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_formtarifa_estatusm_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_formtarifa_estatusm_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusb2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusb2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusb2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusb2_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusb3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusb3_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusb3_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusb3_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusb4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusb4_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusb4_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusb4_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc2' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc2_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc3' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc3_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc3_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc3_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc4' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc4_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc4_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc4_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc5' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc5_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc5_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc5_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc6' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc6_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc6_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc6_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc7' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc7_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc7_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc7_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc8' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc8_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc8_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc8_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusc9' + iSeqRow).bind('blur', function() { sc_control_formtarifa_estatusc9_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_formtarifa_estatusc9_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_formtarifa_estatusc9_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-estatusa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusm' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusb2' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusb3' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusb4' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc2' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc3' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc4' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc5' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc6' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc7' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc8' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-estatusc9' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_control_formtarifa_a_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_a();
  scCssBlur(oThis);
}

function sc_control_formtarifa_a_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_a_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_m_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_m();
  scCssBlur(oThis);
}

function sc_control_formtarifa_m_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_m_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_b2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_b2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_b2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_b2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_b3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_b3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_b3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_b3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_b4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_b4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_b4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_b4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c5_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c5();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c6_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c6();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c7_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c7();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c8_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c8();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_c9_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_c9();
  scCssBlur(oThis);
}

function sc_control_formtarifa_c9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_c9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importea_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importea();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importem_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importem();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importem_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeb2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeb2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeb2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeb2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeb3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeb3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeb3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeb3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeb4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeb4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeb4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeb4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec5_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec5();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec6_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec6();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec7_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec7();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec8_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec8();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importec9_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importec9();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importec9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importec9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeela_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeela();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeela_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeela_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelm_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelm();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelm_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelb2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelb2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelb2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelb2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelb3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelb3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelb3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelb3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelb4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelb4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelb4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelb4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc5_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc5();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc6_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc6();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc7_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc7();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc8_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc8();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeelc9_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeelc9();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeelc9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeelc9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepa_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepa();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepm_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepm();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepm_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepb2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepb2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepb2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepb2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepb3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepb3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepb3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepb3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepb4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepb4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepb4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepb4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc5_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc5();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc6_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc6();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc7_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc7();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc8_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc8();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_importeepc9_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_importeepc9();
  scCssBlur(oThis);
}

function sc_control_formtarifa_importeepc9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_importeepc9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusa_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusa();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusm_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusm();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusm_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusm_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusb2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusb2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusb2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusb2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusb3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusb3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusb3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusb3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusb4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusb4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusb4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusb4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc2_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc2();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc3_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc3();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc4_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc4();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc5_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc5();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc5_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc5_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc6_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc6();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc6_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc6_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc7_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc7();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc7_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc7_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc8_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc8();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc8_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc8_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_formtarifa_estatusc9_onblur(oThis, iSeqRow) {
  do_ajax_control_formtarifa_validate_estatusc9();
  scCssBlur(oThis);
}

function sc_control_formtarifa_estatusc9_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_formtarifa_estatusc9_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("a", "", status);
	displayChange_field("importea", "", status);
	displayChange_field("importeela", "", status);
	displayChange_field("importeepa", "", status);
	displayChange_field("estatusa", "", status);
	displayChange_field("m", "", status);
	displayChange_field("importem", "", status);
	displayChange_field("importeelm", "", status);
	displayChange_field("importeepm", "", status);
	displayChange_field("estatusm", "", status);
	displayChange_field("b2", "", status);
	displayChange_field("importeb2", "", status);
	displayChange_field("importeelb2", "", status);
	displayChange_field("importeepb2", "", status);
	displayChange_field("estatusb2", "", status);
	displayChange_field("b3", "", status);
	displayChange_field("importeb3", "", status);
	displayChange_field("importeelb3", "", status);
	displayChange_field("importeepb3", "", status);
	displayChange_field("estatusb3", "", status);
	displayChange_field("b4", "", status);
	displayChange_field("importeb4", "", status);
	displayChange_field("importeelb4", "", status);
	displayChange_field("importeepb4", "", status);
	displayChange_field("estatusb4", "", status);
	displayChange_field("c2", "", status);
	displayChange_field("importec2", "", status);
	displayChange_field("importeelc2", "", status);
	displayChange_field("importeepc2", "", status);
	displayChange_field("estatusc2", "", status);
	displayChange_field("c3", "", status);
	displayChange_field("importec3", "", status);
	displayChange_field("importeelc3", "", status);
	displayChange_field("importeepc3", "", status);
	displayChange_field("estatusc3", "", status);
	displayChange_field("c4", "", status);
	displayChange_field("importec4", "", status);
	displayChange_field("importeelc4", "", status);
	displayChange_field("importeepc4", "", status);
	displayChange_field("estatusc4", "", status);
	displayChange_field("c5", "", status);
	displayChange_field("importec5", "", status);
	displayChange_field("importeelc5", "", status);
	displayChange_field("importeepc5", "", status);
	displayChange_field("estatusc5", "", status);
	displayChange_field("c6", "", status);
	displayChange_field("importec6", "", status);
	displayChange_field("importeelc6", "", status);
	displayChange_field("importeepc6", "", status);
	displayChange_field("estatusc6", "", status);
	displayChange_field("c7", "", status);
	displayChange_field("importec7", "", status);
	displayChange_field("importeelc7", "", status);
	displayChange_field("importeepc7", "", status);
	displayChange_field("estatusc7", "", status);
	displayChange_field("c8", "", status);
	displayChange_field("importeelc8", "", status);
	displayChange_field("importec8", "", status);
	displayChange_field("importeepc8", "", status);
	displayChange_field("estatusc8", "", status);
	displayChange_field("c9", "", status);
	displayChange_field("importec9", "", status);
	displayChange_field("importeelc9", "", status);
	displayChange_field("importeepc9", "", status);
	displayChange_field("estatusc9", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_a(row, status);
	displayChange_field_importea(row, status);
	displayChange_field_importeela(row, status);
	displayChange_field_importeepa(row, status);
	displayChange_field_estatusa(row, status);
	displayChange_field_m(row, status);
	displayChange_field_importem(row, status);
	displayChange_field_importeelm(row, status);
	displayChange_field_importeepm(row, status);
	displayChange_field_estatusm(row, status);
	displayChange_field_b2(row, status);
	displayChange_field_importeb2(row, status);
	displayChange_field_importeelb2(row, status);
	displayChange_field_importeepb2(row, status);
	displayChange_field_estatusb2(row, status);
	displayChange_field_b3(row, status);
	displayChange_field_importeb3(row, status);
	displayChange_field_importeelb3(row, status);
	displayChange_field_importeepb3(row, status);
	displayChange_field_estatusb3(row, status);
	displayChange_field_b4(row, status);
	displayChange_field_importeb4(row, status);
	displayChange_field_importeelb4(row, status);
	displayChange_field_importeepb4(row, status);
	displayChange_field_estatusb4(row, status);
	displayChange_field_c2(row, status);
	displayChange_field_importec2(row, status);
	displayChange_field_importeelc2(row, status);
	displayChange_field_importeepc2(row, status);
	displayChange_field_estatusc2(row, status);
	displayChange_field_c3(row, status);
	displayChange_field_importec3(row, status);
	displayChange_field_importeelc3(row, status);
	displayChange_field_importeepc3(row, status);
	displayChange_field_estatusc3(row, status);
	displayChange_field_c4(row, status);
	displayChange_field_importec4(row, status);
	displayChange_field_importeelc4(row, status);
	displayChange_field_importeepc4(row, status);
	displayChange_field_estatusc4(row, status);
	displayChange_field_c5(row, status);
	displayChange_field_importec5(row, status);
	displayChange_field_importeelc5(row, status);
	displayChange_field_importeepc5(row, status);
	displayChange_field_estatusc5(row, status);
	displayChange_field_c6(row, status);
	displayChange_field_importec6(row, status);
	displayChange_field_importeelc6(row, status);
	displayChange_field_importeepc6(row, status);
	displayChange_field_estatusc6(row, status);
	displayChange_field_c7(row, status);
	displayChange_field_importec7(row, status);
	displayChange_field_importeelc7(row, status);
	displayChange_field_importeepc7(row, status);
	displayChange_field_estatusc7(row, status);
	displayChange_field_c8(row, status);
	displayChange_field_importeelc8(row, status);
	displayChange_field_importec8(row, status);
	displayChange_field_importeepc8(row, status);
	displayChange_field_estatusc8(row, status);
	displayChange_field_c9(row, status);
	displayChange_field_importec9(row, status);
	displayChange_field_importeelc9(row, status);
	displayChange_field_importeepc9(row, status);
	displayChange_field_estatusc9(row, status);
}

function displayChange_field(field, row, status) {
	if ("a" == field) {
		displayChange_field_a(row, status);
	}
	if ("importea" == field) {
		displayChange_field_importea(row, status);
	}
	if ("importeela" == field) {
		displayChange_field_importeela(row, status);
	}
	if ("importeepa" == field) {
		displayChange_field_importeepa(row, status);
	}
	if ("estatusa" == field) {
		displayChange_field_estatusa(row, status);
	}
	if ("m" == field) {
		displayChange_field_m(row, status);
	}
	if ("importem" == field) {
		displayChange_field_importem(row, status);
	}
	if ("importeelm" == field) {
		displayChange_field_importeelm(row, status);
	}
	if ("importeepm" == field) {
		displayChange_field_importeepm(row, status);
	}
	if ("estatusm" == field) {
		displayChange_field_estatusm(row, status);
	}
	if ("b2" == field) {
		displayChange_field_b2(row, status);
	}
	if ("importeb2" == field) {
		displayChange_field_importeb2(row, status);
	}
	if ("importeelb2" == field) {
		displayChange_field_importeelb2(row, status);
	}
	if ("importeepb2" == field) {
		displayChange_field_importeepb2(row, status);
	}
	if ("estatusb2" == field) {
		displayChange_field_estatusb2(row, status);
	}
	if ("b3" == field) {
		displayChange_field_b3(row, status);
	}
	if ("importeb3" == field) {
		displayChange_field_importeb3(row, status);
	}
	if ("importeelb3" == field) {
		displayChange_field_importeelb3(row, status);
	}
	if ("importeepb3" == field) {
		displayChange_field_importeepb3(row, status);
	}
	if ("estatusb3" == field) {
		displayChange_field_estatusb3(row, status);
	}
	if ("b4" == field) {
		displayChange_field_b4(row, status);
	}
	if ("importeb4" == field) {
		displayChange_field_importeb4(row, status);
	}
	if ("importeelb4" == field) {
		displayChange_field_importeelb4(row, status);
	}
	if ("importeepb4" == field) {
		displayChange_field_importeepb4(row, status);
	}
	if ("estatusb4" == field) {
		displayChange_field_estatusb4(row, status);
	}
	if ("c2" == field) {
		displayChange_field_c2(row, status);
	}
	if ("importec2" == field) {
		displayChange_field_importec2(row, status);
	}
	if ("importeelc2" == field) {
		displayChange_field_importeelc2(row, status);
	}
	if ("importeepc2" == field) {
		displayChange_field_importeepc2(row, status);
	}
	if ("estatusc2" == field) {
		displayChange_field_estatusc2(row, status);
	}
	if ("c3" == field) {
		displayChange_field_c3(row, status);
	}
	if ("importec3" == field) {
		displayChange_field_importec3(row, status);
	}
	if ("importeelc3" == field) {
		displayChange_field_importeelc3(row, status);
	}
	if ("importeepc3" == field) {
		displayChange_field_importeepc3(row, status);
	}
	if ("estatusc3" == field) {
		displayChange_field_estatusc3(row, status);
	}
	if ("c4" == field) {
		displayChange_field_c4(row, status);
	}
	if ("importec4" == field) {
		displayChange_field_importec4(row, status);
	}
	if ("importeelc4" == field) {
		displayChange_field_importeelc4(row, status);
	}
	if ("importeepc4" == field) {
		displayChange_field_importeepc4(row, status);
	}
	if ("estatusc4" == field) {
		displayChange_field_estatusc4(row, status);
	}
	if ("c5" == field) {
		displayChange_field_c5(row, status);
	}
	if ("importec5" == field) {
		displayChange_field_importec5(row, status);
	}
	if ("importeelc5" == field) {
		displayChange_field_importeelc5(row, status);
	}
	if ("importeepc5" == field) {
		displayChange_field_importeepc5(row, status);
	}
	if ("estatusc5" == field) {
		displayChange_field_estatusc5(row, status);
	}
	if ("c6" == field) {
		displayChange_field_c6(row, status);
	}
	if ("importec6" == field) {
		displayChange_field_importec6(row, status);
	}
	if ("importeelc6" == field) {
		displayChange_field_importeelc6(row, status);
	}
	if ("importeepc6" == field) {
		displayChange_field_importeepc6(row, status);
	}
	if ("estatusc6" == field) {
		displayChange_field_estatusc6(row, status);
	}
	if ("c7" == field) {
		displayChange_field_c7(row, status);
	}
	if ("importec7" == field) {
		displayChange_field_importec7(row, status);
	}
	if ("importeelc7" == field) {
		displayChange_field_importeelc7(row, status);
	}
	if ("importeepc7" == field) {
		displayChange_field_importeepc7(row, status);
	}
	if ("estatusc7" == field) {
		displayChange_field_estatusc7(row, status);
	}
	if ("c8" == field) {
		displayChange_field_c8(row, status);
	}
	if ("importeelc8" == field) {
		displayChange_field_importeelc8(row, status);
	}
	if ("importec8" == field) {
		displayChange_field_importec8(row, status);
	}
	if ("importeepc8" == field) {
		displayChange_field_importeepc8(row, status);
	}
	if ("estatusc8" == field) {
		displayChange_field_estatusc8(row, status);
	}
	if ("c9" == field) {
		displayChange_field_c9(row, status);
	}
	if ("importec9" == field) {
		displayChange_field_importec9(row, status);
	}
	if ("importeelc9" == field) {
		displayChange_field_importeelc9(row, status);
	}
	if ("importeepc9" == field) {
		displayChange_field_importeepc9(row, status);
	}
	if ("estatusc9" == field) {
		displayChange_field_estatusc9(row, status);
	}
}

function displayChange_field_a(row, status) {
    var fieldId;
}

function displayChange_field_importea(row, status) {
    var fieldId;
}

function displayChange_field_importeela(row, status) {
    var fieldId;
}

function displayChange_field_importeepa(row, status) {
    var fieldId;
}

function displayChange_field_estatusa(row, status) {
    var fieldId;
}

function displayChange_field_m(row, status) {
    var fieldId;
}

function displayChange_field_importem(row, status) {
    var fieldId;
}

function displayChange_field_importeelm(row, status) {
    var fieldId;
}

function displayChange_field_importeepm(row, status) {
    var fieldId;
}

function displayChange_field_estatusm(row, status) {
    var fieldId;
}

function displayChange_field_b2(row, status) {
    var fieldId;
}

function displayChange_field_importeb2(row, status) {
    var fieldId;
}

function displayChange_field_importeelb2(row, status) {
    var fieldId;
}

function displayChange_field_importeepb2(row, status) {
    var fieldId;
}

function displayChange_field_estatusb2(row, status) {
    var fieldId;
}

function displayChange_field_b3(row, status) {
    var fieldId;
}

function displayChange_field_importeb3(row, status) {
    var fieldId;
}

function displayChange_field_importeelb3(row, status) {
    var fieldId;
}

function displayChange_field_importeepb3(row, status) {
    var fieldId;
}

function displayChange_field_estatusb3(row, status) {
    var fieldId;
}

function displayChange_field_b4(row, status) {
    var fieldId;
}

function displayChange_field_importeb4(row, status) {
    var fieldId;
}

function displayChange_field_importeelb4(row, status) {
    var fieldId;
}

function displayChange_field_importeepb4(row, status) {
    var fieldId;
}

function displayChange_field_estatusb4(row, status) {
    var fieldId;
}

function displayChange_field_c2(row, status) {
    var fieldId;
}

function displayChange_field_importec2(row, status) {
    var fieldId;
}

function displayChange_field_importeelc2(row, status) {
    var fieldId;
}

function displayChange_field_importeepc2(row, status) {
    var fieldId;
}

function displayChange_field_estatusc2(row, status) {
    var fieldId;
}

function displayChange_field_c3(row, status) {
    var fieldId;
}

function displayChange_field_importec3(row, status) {
    var fieldId;
}

function displayChange_field_importeelc3(row, status) {
    var fieldId;
}

function displayChange_field_importeepc3(row, status) {
    var fieldId;
}

function displayChange_field_estatusc3(row, status) {
    var fieldId;
}

function displayChange_field_c4(row, status) {
    var fieldId;
}

function displayChange_field_importec4(row, status) {
    var fieldId;
}

function displayChange_field_importeelc4(row, status) {
    var fieldId;
}

function displayChange_field_importeepc4(row, status) {
    var fieldId;
}

function displayChange_field_estatusc4(row, status) {
    var fieldId;
}

function displayChange_field_c5(row, status) {
    var fieldId;
}

function displayChange_field_importec5(row, status) {
    var fieldId;
}

function displayChange_field_importeelc5(row, status) {
    var fieldId;
}

function displayChange_field_importeepc5(row, status) {
    var fieldId;
}

function displayChange_field_estatusc5(row, status) {
    var fieldId;
}

function displayChange_field_c6(row, status) {
    var fieldId;
}

function displayChange_field_importec6(row, status) {
    var fieldId;
}

function displayChange_field_importeelc6(row, status) {
    var fieldId;
}

function displayChange_field_importeepc6(row, status) {
    var fieldId;
}

function displayChange_field_estatusc6(row, status) {
    var fieldId;
}

function displayChange_field_c7(row, status) {
    var fieldId;
}

function displayChange_field_importec7(row, status) {
    var fieldId;
}

function displayChange_field_importeelc7(row, status) {
    var fieldId;
}

function displayChange_field_importeepc7(row, status) {
    var fieldId;
}

function displayChange_field_estatusc7(row, status) {
    var fieldId;
}

function displayChange_field_c8(row, status) {
    var fieldId;
}

function displayChange_field_importeelc8(row, status) {
    var fieldId;
}

function displayChange_field_importec8(row, status) {
    var fieldId;
}

function displayChange_field_importeepc8(row, status) {
    var fieldId;
}

function displayChange_field_estatusc8(row, status) {
    var fieldId;
}

function displayChange_field_c9(row, status) {
    var fieldId;
}

function displayChange_field_importec9(row, status) {
    var fieldId;
}

function displayChange_field_importeelc9(row, status) {
    var fieldId;
}

function displayChange_field_importeepc9(row, status) {
    var fieldId;
}

function displayChange_field_estatusc9(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_formtarifa_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'control_formtarifa')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

