
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
  scEventControl_data["consecutivo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["turnoid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["casetaid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tramoid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cuerpo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["usuarioid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carrilid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaoperacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaturno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["horainicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechafin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["horafin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["operacionid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliocierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estatuscarril" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["preliquidado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["montocr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["montoana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidadmxn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidadusd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importemxn" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["importeusd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinicialcr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinalcr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["folioinicialeap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["foliofinaleap" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["faltante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ingresoelu_pre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["entregado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["administradorid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["encargadoturnoid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["encargadoturnoid_pre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechacierre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechapreliq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechaliq" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["operacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["liquidadorid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["faltanteana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ingresoelu_ana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conteo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechainiciodictamen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechafindictamen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["consecutivo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consecutivo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["turnoid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["turnoid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["casetaid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["casetaid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tramoid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tramoid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cuerpo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cuerpo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["usuarioid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["usuarioid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["carrilid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["carrilid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaoperacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaoperacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaturno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaturno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["horainicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["horainicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechafin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechafin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["horafin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["horafin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["operacionid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["operacionid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["foliocierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["foliocierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estatuscarril" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estatuscarril" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["preliquidado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["preliquidado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["montocr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["montocr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["montoana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["montoana" + iSeqRow]["change"]) {
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
  if (scEventControl_data["faltante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["faltante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ingresoelu_pre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ingresoelu_pre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["entregado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["entregado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["administradorid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["administradorid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["encargadoturnoid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["encargadoturnoid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["encargadoturnoid_pre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["encargadoturnoid_pre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechacierre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechacierre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechapreliq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechapreliq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaliq" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaliq" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["operacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["operacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["liquidadorid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["liquidadorid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["faltanteana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["faltanteana" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ingresoelu_ana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ingresoelu_ana" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conteo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conteo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechainiciodictamen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechainiciodictamen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechafindictamen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechafindictamen" + iSeqRow]["change"]) {
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
  $('#id_sc_field_consecutivo' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_consecutivo_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_consecutivo_onfocus(this, iSeqRow) });
  $('#id_sc_field_turnoid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_turnoid_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_muestra_ingresoEluPre_turnoid_onfocus(this, iSeqRow) });
  $('#id_sc_field_casetaid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_casetaid_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_casetaid_onfocus(this, iSeqRow) });
  $('#id_sc_field_tramoid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_tramoid_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_muestra_ingresoEluPre_tramoid_onfocus(this, iSeqRow) });
  $('#id_sc_field_cuerpo' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_cuerpo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_muestra_ingresoEluPre_cuerpo_onfocus(this, iSeqRow) });
  $('#id_sc_field_usuarioid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_usuarioid_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_muestra_ingresoEluPre_usuarioid_onfocus(this, iSeqRow) });
  $('#id_sc_field_carrilid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_carrilid_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_carrilid_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaoperacion' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechaoperacion_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechaoperacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaturno' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechaturno_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechaturno_onfocus(this, iSeqRow) });
  $('#id_sc_field_horainicio' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_horainicio_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_muestra_ingresoEluPre_horainicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechafin' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechafin_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechafin_onfocus(this, iSeqRow) });
  $('#id_sc_field_horafin' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_horafin_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_muestra_ingresoEluPre_horafin_onfocus(this, iSeqRow) });
  $('#id_sc_field_operacionid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_operacionid_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_operacionid_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliocierre' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_foliocierre_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_foliocierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatuscarril' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_estatuscarril_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_muestra_ingresoEluPre_estatuscarril_onfocus(this, iSeqRow) });
  $('#id_sc_field_observacion' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_observacion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_observacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_preliquidado' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_preliquidado_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_muestra_ingresoEluPre_preliquidado_onfocus(this, iSeqRow) });
  $('#id_sc_field_montocr' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_montocr_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_muestra_ingresoEluPre_montocr_onfocus(this, iSeqRow) });
  $('#id_sc_field_montoana' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_montoana_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_montoana_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidadmxn' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_cantidadmxn_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_cantidadmxn_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidadusd' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_cantidadusd_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_cantidadusd_onfocus(this, iSeqRow) });
  $('#id_sc_field_importemxn' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_importemxn_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_muestra_ingresoEluPre_importemxn_onfocus(this, iSeqRow) });
  $('#id_sc_field_importeusd' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_importeusd_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_muestra_ingresoEluPre_importeusd_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinicialcr' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_folioinicialcr_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_muestra_ingresoEluPre_folioinicialcr_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinalcr' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_foliofinalcr_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_muestra_ingresoEluPre_foliofinalcr_onfocus(this, iSeqRow) });
  $('#id_sc_field_folioinicialeap' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_folioinicialeap_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_muestra_ingresoEluPre_folioinicialeap_onfocus(this, iSeqRow) });
  $('#id_sc_field_foliofinaleap' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_foliofinaleap_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_muestra_ingresoEluPre_foliofinaleap_onfocus(this, iSeqRow) });
  $('#id_sc_field_faltante' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_faltante_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_faltante_onfocus(this, iSeqRow) });
  $('#id_sc_field_ingresoelu_pre' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_ingresoelu_pre_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_muestra_ingresoEluPre_ingresoelu_pre_onfocus(this, iSeqRow) });
  $('#id_sc_field_entregado' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_entregado_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_muestra_ingresoEluPre_entregado_onfocus(this, iSeqRow) });
  $('#id_sc_field_administradorid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_administradorid_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_muestra_ingresoEluPre_administradorid_onfocus(this, iSeqRow) });
  $('#id_sc_field_encargadoturnoid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_encargadoturnoid_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_muestra_ingresoEluPre_encargadoturnoid_onfocus(this, iSeqRow) });
  $('#id_sc_field_encargadoturnoid_pre' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_encargadoturnoid_pre_onblur(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_muestra_ingresoEluPre_encargadoturnoid_pre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechacierre' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechacierre_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechacierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechacierre_hora' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechacierre_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechacierre_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechapreliq' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechapreliq_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechapreliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechapreliq_hora' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechapreliq_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechapreliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaliq' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechaliq_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechaliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaliq_hora' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechaliq_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechaliq_onfocus(this, iSeqRow) });
  $('#id_sc_field_operacion' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_operacion_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_muestra_ingresoEluPre_operacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_liquidadorid' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_liquidadorid_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_muestra_ingresoEluPre_liquidadorid_onfocus(this, iSeqRow) });
  $('#id_sc_field_faltanteana' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_faltanteana_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_muestra_ingresoEluPre_faltanteana_onfocus(this, iSeqRow) });
  $('#id_sc_field_ingresoelu_ana' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_ingresoelu_ana_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_muestra_ingresoEluPre_ingresoelu_ana_onfocus(this, iSeqRow) });
  $('#id_sc_field_conteo' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_conteo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_muestra_ingresoEluPre_conteo_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainiciodictamen' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechainiciodictamen_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechainiciodictamen_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechainiciodictamen_hora' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechainiciodictamen_onblur(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechainiciodictamen_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechafindictamen' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechafindictamen_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechafindictamen_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechafindictamen_hora' + iSeqRow).bind('blur', function() { sc_form_muestra_ingresoEluPre_fechafindictamen_onblur(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_muestra_ingresoEluPre_fechafindictamen_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_muestra_ingresoEluPre_consecutivo_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_consecutivo();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_consecutivo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_turnoid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_turnoid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_turnoid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_casetaid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_casetaid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_casetaid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_tramoid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_tramoid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_tramoid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_cuerpo_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_cuerpo();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_cuerpo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_usuarioid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_usuarioid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_usuarioid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_carrilid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_carrilid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_carrilid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaoperacion_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaoperacion();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaoperacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaturno_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaturno();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaturno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_horainicio_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_horainicio();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_horainicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafin_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechafin();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_horafin_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_horafin();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_horafin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_operacionid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_operacionid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_operacionid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_foliocierre_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_foliocierre();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_foliocierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_estatuscarril_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_estatuscarril();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_estatuscarril_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_observacion_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_observacion();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_observacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_preliquidado_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_preliquidado();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_preliquidado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_montocr_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_montocr();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_montocr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_montoana_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_montoana();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_montoana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_cantidadmxn_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_cantidadmxn();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_cantidadmxn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_cantidadusd_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_cantidadusd();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_cantidadusd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_importemxn_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_importemxn();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_importemxn_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_importeusd_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_importeusd();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_importeusd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_folioinicialcr_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_folioinicialcr();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_folioinicialcr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_foliofinalcr_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_foliofinalcr();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_foliofinalcr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_folioinicialeap_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_folioinicialeap();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_folioinicialeap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_foliofinaleap_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_foliofinaleap();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_foliofinaleap_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_faltante_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_faltante();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_faltante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_ingresoelu_pre_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_ingresoelu_pre();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_ingresoelu_pre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_entregado_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_entregado();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_entregado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_administradorid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_administradorid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_administradorid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_encargadoturnoid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_encargadoturnoid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_encargadoturnoid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_encargadoturnoid_pre_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_encargadoturnoid_pre();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_encargadoturnoid_pre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechacierre_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechacierre();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechacierre_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechacierre();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechacierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechacierre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechapreliq_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechapreliq();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechapreliq_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechapreliq();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechapreliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechapreliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaliq_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaliq();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaliq_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaliq();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechaliq_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_operacion_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_operacion();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_operacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_liquidadorid_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_liquidadorid();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_liquidadorid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_faltanteana_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_faltanteana();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_faltanteana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_ingresoelu_ana_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_ingresoelu_ana();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_ingresoelu_ana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_conteo_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_conteo();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_conteo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechainiciodictamen_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechainiciodictamen();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechainiciodictamen_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechainiciodictamen();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechainiciodictamen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechainiciodictamen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafindictamen_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechafindictamen();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafindictamen_onblur(oThis, iSeqRow) {
  do_ajax_form_muestra_ingresoEluPre_mob_validate_fechafindictamen();
  scCssBlur(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafindictamen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_muestra_ingresoEluPre_fechafindictamen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("consecutivo", "", status);
	displayChange_field("turnoid", "", status);
	displayChange_field("casetaid", "", status);
	displayChange_field("tramoid", "", status);
	displayChange_field("cuerpo", "", status);
	displayChange_field("usuarioid", "", status);
	displayChange_field("carrilid", "", status);
	displayChange_field("fechaoperacion", "", status);
	displayChange_field("fechaturno", "", status);
	displayChange_field("horainicio", "", status);
	displayChange_field("fechafin", "", status);
	displayChange_field("horafin", "", status);
	displayChange_field("operacionid", "", status);
	displayChange_field("foliocierre", "", status);
	displayChange_field("estatuscarril", "", status);
	displayChange_field("observacion", "", status);
	displayChange_field("preliquidado", "", status);
	displayChange_field("montocr", "", status);
	displayChange_field("montoana", "", status);
	displayChange_field("cantidadmxn", "", status);
	displayChange_field("cantidadusd", "", status);
	displayChange_field("importemxn", "", status);
	displayChange_field("importeusd", "", status);
	displayChange_field("folioinicialcr", "", status);
	displayChange_field("foliofinalcr", "", status);
	displayChange_field("folioinicialeap", "", status);
	displayChange_field("foliofinaleap", "", status);
	displayChange_field("faltante", "", status);
	displayChange_field("ingresoelu_pre", "", status);
	displayChange_field("entregado", "", status);
	displayChange_field("administradorid", "", status);
	displayChange_field("encargadoturnoid", "", status);
	displayChange_field("encargadoturnoid_pre", "", status);
	displayChange_field("fechacierre", "", status);
	displayChange_field("fechapreliq", "", status);
	displayChange_field("fechaliq", "", status);
	displayChange_field("operacion", "", status);
	displayChange_field("liquidadorid", "", status);
	displayChange_field("faltanteana", "", status);
	displayChange_field("ingresoelu_ana", "", status);
	displayChange_field("conteo", "", status);
	displayChange_field("fechainiciodictamen", "", status);
	displayChange_field("fechafindictamen", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_consecutivo(row, status);
	displayChange_field_turnoid(row, status);
	displayChange_field_casetaid(row, status);
	displayChange_field_tramoid(row, status);
	displayChange_field_cuerpo(row, status);
	displayChange_field_usuarioid(row, status);
	displayChange_field_carrilid(row, status);
	displayChange_field_fechaoperacion(row, status);
	displayChange_field_fechaturno(row, status);
	displayChange_field_horainicio(row, status);
	displayChange_field_fechafin(row, status);
	displayChange_field_horafin(row, status);
	displayChange_field_operacionid(row, status);
	displayChange_field_foliocierre(row, status);
	displayChange_field_estatuscarril(row, status);
	displayChange_field_observacion(row, status);
	displayChange_field_preliquidado(row, status);
	displayChange_field_montocr(row, status);
	displayChange_field_montoana(row, status);
	displayChange_field_cantidadmxn(row, status);
	displayChange_field_cantidadusd(row, status);
	displayChange_field_importemxn(row, status);
	displayChange_field_importeusd(row, status);
	displayChange_field_folioinicialcr(row, status);
	displayChange_field_foliofinalcr(row, status);
	displayChange_field_folioinicialeap(row, status);
	displayChange_field_foliofinaleap(row, status);
	displayChange_field_faltante(row, status);
	displayChange_field_ingresoelu_pre(row, status);
	displayChange_field_entregado(row, status);
	displayChange_field_administradorid(row, status);
	displayChange_field_encargadoturnoid(row, status);
	displayChange_field_encargadoturnoid_pre(row, status);
	displayChange_field_fechacierre(row, status);
	displayChange_field_fechapreliq(row, status);
	displayChange_field_fechaliq(row, status);
	displayChange_field_operacion(row, status);
	displayChange_field_liquidadorid(row, status);
	displayChange_field_faltanteana(row, status);
	displayChange_field_ingresoelu_ana(row, status);
	displayChange_field_conteo(row, status);
	displayChange_field_fechainiciodictamen(row, status);
	displayChange_field_fechafindictamen(row, status);
}

function displayChange_field(field, row, status) {
	if ("consecutivo" == field) {
		displayChange_field_consecutivo(row, status);
	}
	if ("turnoid" == field) {
		displayChange_field_turnoid(row, status);
	}
	if ("casetaid" == field) {
		displayChange_field_casetaid(row, status);
	}
	if ("tramoid" == field) {
		displayChange_field_tramoid(row, status);
	}
	if ("cuerpo" == field) {
		displayChange_field_cuerpo(row, status);
	}
	if ("usuarioid" == field) {
		displayChange_field_usuarioid(row, status);
	}
	if ("carrilid" == field) {
		displayChange_field_carrilid(row, status);
	}
	if ("fechaoperacion" == field) {
		displayChange_field_fechaoperacion(row, status);
	}
	if ("fechaturno" == field) {
		displayChange_field_fechaturno(row, status);
	}
	if ("horainicio" == field) {
		displayChange_field_horainicio(row, status);
	}
	if ("fechafin" == field) {
		displayChange_field_fechafin(row, status);
	}
	if ("horafin" == field) {
		displayChange_field_horafin(row, status);
	}
	if ("operacionid" == field) {
		displayChange_field_operacionid(row, status);
	}
	if ("foliocierre" == field) {
		displayChange_field_foliocierre(row, status);
	}
	if ("estatuscarril" == field) {
		displayChange_field_estatuscarril(row, status);
	}
	if ("observacion" == field) {
		displayChange_field_observacion(row, status);
	}
	if ("preliquidado" == field) {
		displayChange_field_preliquidado(row, status);
	}
	if ("montocr" == field) {
		displayChange_field_montocr(row, status);
	}
	if ("montoana" == field) {
		displayChange_field_montoana(row, status);
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
	if ("faltante" == field) {
		displayChange_field_faltante(row, status);
	}
	if ("ingresoelu_pre" == field) {
		displayChange_field_ingresoelu_pre(row, status);
	}
	if ("entregado" == field) {
		displayChange_field_entregado(row, status);
	}
	if ("administradorid" == field) {
		displayChange_field_administradorid(row, status);
	}
	if ("encargadoturnoid" == field) {
		displayChange_field_encargadoturnoid(row, status);
	}
	if ("encargadoturnoid_pre" == field) {
		displayChange_field_encargadoturnoid_pre(row, status);
	}
	if ("fechacierre" == field) {
		displayChange_field_fechacierre(row, status);
	}
	if ("fechapreliq" == field) {
		displayChange_field_fechapreliq(row, status);
	}
	if ("fechaliq" == field) {
		displayChange_field_fechaliq(row, status);
	}
	if ("operacion" == field) {
		displayChange_field_operacion(row, status);
	}
	if ("liquidadorid" == field) {
		displayChange_field_liquidadorid(row, status);
	}
	if ("faltanteana" == field) {
		displayChange_field_faltanteana(row, status);
	}
	if ("ingresoelu_ana" == field) {
		displayChange_field_ingresoelu_ana(row, status);
	}
	if ("conteo" == field) {
		displayChange_field_conteo(row, status);
	}
	if ("fechainiciodictamen" == field) {
		displayChange_field_fechainiciodictamen(row, status);
	}
	if ("fechafindictamen" == field) {
		displayChange_field_fechafindictamen(row, status);
	}
}

function displayChange_field_consecutivo(row, status) {
    var fieldId;
}

function displayChange_field_turnoid(row, status) {
    var fieldId;
}

function displayChange_field_casetaid(row, status) {
    var fieldId;
}

function displayChange_field_tramoid(row, status) {
    var fieldId;
}

function displayChange_field_cuerpo(row, status) {
    var fieldId;
}

function displayChange_field_usuarioid(row, status) {
    var fieldId;
}

function displayChange_field_carrilid(row, status) {
    var fieldId;
}

function displayChange_field_fechaoperacion(row, status) {
    var fieldId;
}

function displayChange_field_fechaturno(row, status) {
    var fieldId;
}

function displayChange_field_horainicio(row, status) {
    var fieldId;
}

function displayChange_field_fechafin(row, status) {
    var fieldId;
}

function displayChange_field_horafin(row, status) {
    var fieldId;
}

function displayChange_field_operacionid(row, status) {
    var fieldId;
}

function displayChange_field_foliocierre(row, status) {
    var fieldId;
}

function displayChange_field_estatuscarril(row, status) {
    var fieldId;
}

function displayChange_field_observacion(row, status) {
    var fieldId;
}

function displayChange_field_preliquidado(row, status) {
    var fieldId;
}

function displayChange_field_montocr(row, status) {
    var fieldId;
}

function displayChange_field_montoana(row, status) {
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

function displayChange_field_faltante(row, status) {
    var fieldId;
}

function displayChange_field_ingresoelu_pre(row, status) {
    var fieldId;
}

function displayChange_field_entregado(row, status) {
    var fieldId;
}

function displayChange_field_administradorid(row, status) {
    var fieldId;
}

function displayChange_field_encargadoturnoid(row, status) {
    var fieldId;
}

function displayChange_field_encargadoturnoid_pre(row, status) {
    var fieldId;
}

function displayChange_field_fechacierre(row, status) {
    var fieldId;
}

function displayChange_field_fechapreliq(row, status) {
    var fieldId;
}

function displayChange_field_fechaliq(row, status) {
    var fieldId;
}

function displayChange_field_operacion(row, status) {
    var fieldId;
}

function displayChange_field_liquidadorid(row, status) {
    var fieldId;
}

function displayChange_field_faltanteana(row, status) {
    var fieldId;
}

function displayChange_field_ingresoelu_ana(row, status) {
    var fieldId;
}

function displayChange_field_conteo(row, status) {
    var fieldId;
}

function displayChange_field_fechainiciodictamen(row, status) {
    var fieldId;
}

function displayChange_field_fechafindictamen(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_muestra_ingresoEluPre_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(38);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechaoperacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechaoperacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaoperacion(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechaoperacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechaturno" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechaturno" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaturno(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechaturno']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechafin" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechafin" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_muestra_ingresoEluPre_mob_validate_fechafin(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechafin']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechacierre" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechacierre" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechacierre']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechacierre']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_muestra_ingresoEluPre_mob_validate_fechacierre(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechacierre']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechapreliq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechapreliq" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechapreliq']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechapreliq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_muestra_ingresoEluPre_mob_validate_fechapreliq(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechapreliq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechaliq" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechaliq" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechaliq']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechaliq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_muestra_ingresoEluPre_mob_validate_fechaliq(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechaliq']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechainiciodictamen" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechainiciodictamen" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechainiciodictamen']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechainiciodictamen']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_muestra_ingresoEluPre_mob_validate_fechainiciodictamen(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechainiciodictamen']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fechafindictamen" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechafindictamen" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fechafindictamen']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechafindictamen']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_muestra_ingresoEluPre_mob_validate_fechafindictamen(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fechafindictamen']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_muestra_ingresoEluPre_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
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

