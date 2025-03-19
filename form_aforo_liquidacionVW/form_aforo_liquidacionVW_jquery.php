
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
  scEventControl_data["vehiculocorrecto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagoid_ana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vehiculoid_ana" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["vehiculocorrecto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculocorrecto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagoid_ana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagoid_ana" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vehiculoid_ana" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vehiculoid_ana" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("estatusana" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pagoid_ana" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("vehiculoid_ana" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
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
  $('#id_sc_field_consecutivo' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_consecutivo_onchange(this, iSeqRow) });
  $('#id_sc_field_casetaid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_casetaid_onchange(this, iSeqRow) });
  $('#id_sc_field_fechaoperacion' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechaoperacion_onchange(this, iSeqRow) });
  $('#id_sc_field_fechaturno' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechaturno_onchange(this, iSeqRow) });
  $('#id_sc_field_turnoid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_turnoid_onchange(this, iSeqRow) });
  $('#id_sc_field_horaevento' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_horaevento_onchange(this, iSeqRow) });
  $('#id_sc_field_tramoid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tramoid_onchange(this, iSeqRow) });
  $('#id_sc_field_carrilid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_carrilid_onchange(this, iSeqRow) });
  $('#id_sc_field_cuerpo' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cuerpo_onchange(this, iSeqRow) });
  $('#id_sc_field_secuencial' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_secuencial_onchange(this, iSeqRow) });
  $('#id_sc_field_folio' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_folio_onchange(this, iSeqRow) });
  $('#id_sc_field_vehiculoid_ect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_vehiculoid_ect_onchange(this, iSeqRow) });
  $('#id_sc_field_clasevehiculo_ect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_clasevehiculo_ect_onchange(this, iSeqRow) });
  $('#id_sc_field_importe_ect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_importe_ect_onchange(this, iSeqRow) });
  $('#id_sc_field_cantidadeje_ect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cantidadeje_ect_onchange(this, iSeqRow) });
  $('#id_sc_field_tarifaee_ect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tarifaee_ect_onchange(this, iSeqRow) });
  $('#id_sc_field_vehiculoid_cr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_vehiculoid_cr_onchange(this, iSeqRow) });
  $('#id_sc_field_clasevehiculo_cr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_clasevehiculo_cr_onchange(this, iSeqRow) });
  $('#id_sc_field_importe_cr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_importe_cr_onchange(this, iSeqRow) });
  $('#id_sc_field_cantidadeje_cr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cantidadeje_cr_onchange(this, iSeqRow) });
  $('#id_sc_field_tarifaee_cr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tarifaee_cr_onchange(this, iSeqRow) });
  $('#id_sc_field_vehiculoid_eap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_vehiculoid_eap_onchange(this, iSeqRow) });
  $('#id_sc_field_clasevehiculo_eap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_clasevehiculo_eap_onchange(this, iSeqRow) });
  $('#id_sc_field_importe_eap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_importe_eap_onchange(this, iSeqRow) });
  $('#id_sc_field_cantidadeje_eap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cantidadeje_eap_onchange(this, iSeqRow) });
  $('#id_sc_field_tarifaee_eap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tarifaee_eap_onchange(this, iSeqRow) });
  $('#id_sc_field_pagoid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_pagoid_onchange(this, iSeqRow) });
  $('#id_sc_field_excentoid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_excentoid_onchange(this, iSeqRow) });
  $('#id_sc_field_usuarioid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_usuarioid_onchange(this, iSeqRow) });
  $('#id_sc_field_placas' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_placas_onchange(this, iSeqRow) });
  $('#id_sc_field_numerotarjeta' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_numerotarjeta_onchange(this, iSeqRow) });
  $('#id_sc_field_tipotarjeta' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tipotarjeta_onchange(this, iSeqRow) });
  $('#id_sc_field_fechaenvio' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechaenvio_onchange(this, iSeqRow) });
  $('#id_sc_field_codigofacturacion' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_codigofacturacion_onchange(this, iSeqRow) });
  $('#id_sc_field_vehiculoid_ana' + iSeqRow).bind('blur', function() { sc_form_aforo_liquidacionVW_vehiculoid_ana_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_aforo_liquidacionVW_vehiculoid_ana_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_aforo_liquidacionVW_vehiculoid_ana_onfocus(this, iSeqRow) });
  $('#id_sc_field_clasevehiculo_ana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_clasevehiculo_ana_onchange(this, iSeqRow) });
  $('#id_sc_field_importe_ana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_importe_ana_onchange(this, iSeqRow) });
  $('#id_sc_field_pagoid_ana' + iSeqRow).bind('blur', function() { sc_form_aforo_liquidacionVW_pagoid_ana_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_aforo_liquidacionVW_pagoid_ana_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_aforo_liquidacionVW_pagoid_ana_onfocus(this, iSeqRow) });
  $('#id_sc_field_estatusana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_estatusana_onchange(this, iSeqRow) });
  $('#id_sc_field_fld_ar_sct' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fld_ar_sct_onchange(this, iSeqRow) });
  $('#id_sc_field_cantidadeje_ana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cantidadeje_ana_onchange(this, iSeqRow) });
  $('#id_sc_field_tarifaee_ana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tarifaee_ana_onchange(this, iSeqRow) });
  $('#id_sc_field_fechamodificadoana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechamodificadoana_onchange(this, iSeqRow) });
  $('#id_sc_field_fechamodificadoana_hora' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechamodificadoana_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_eludidoextra' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_eludidoextra_onchange(this, iSeqRow) });
  $('#id_sc_field_revisado' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_revisado_onchange(this, iSeqRow) });
  $('#id_sc_field_fechamarcacioncr' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechamarcacioncr_onchange(this, iSeqRow) });
  $('#id_sc_field_fechamarcacioncr_hora' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechamarcacioncr_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadeteccionect' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechadeteccionect_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadeteccionect_hora' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechadeteccionect_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadeteccioneap' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechadeteccioneap_onchange(this, iSeqRow) });
  $('#id_sc_field_fechadeteccioneap_hora' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fechadeteccioneap_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_tramoidorigen' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tramoidorigen_onchange(this, iSeqRow) });
  $('#id_sc_field_operacionid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_operacionid_onchange(this, iSeqRow) });
  $('#id_sc_field_residente' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_residente_onchange(this, iSeqRow) });
  $('#id_sc_field_cancelado' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_cancelado_onchange(this, iSeqRow) });
  $('#id_sc_field_operadortlp' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_operadortlp_onchange(this, iSeqRow) });
  $('#id_sc_field_tipotlp' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_tipotlp_onchange(this, iSeqRow) });
  $('#id_sc_field_categoriatlp' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_categoriatlp_onchange(this, iSeqRow) });
  $('#id_sc_field_estatustlp' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_estatustlp_onchange(this, iSeqRow) });
  $('#id_sc_field_generadoxml' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_generadoxml_onchange(this, iSeqRow) });
  $('#id_sc_field_xml' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_xml_onchange(this, iSeqRow) });
  $('#id_sc_field_autorizacion' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_autorizacion_onchange(this, iSeqRow) });
  $('#id_sc_field_importe' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_importe_onchange(this, iSeqRow) });
  $('#id_sc_field_detectadospreid' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_detectadospreid_onchange(this, iSeqRow) });
  $('#id_sc_field_nombreimagen' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_nombreimagen_onchange(this, iSeqRow) });
  $('#id_sc_field_vehiculocorrecto' + iSeqRow).bind('blur', function() { sc_form_aforo_liquidacionVW_vehiculocorrecto_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_aforo_liquidacionVW_vehiculocorrecto_onchange(this, iSeqRow) })
                                              .bind('click', function() { sc_form_aforo_liquidacionVW_vehiculocorrecto_onclick(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_aforo_liquidacionVW_vehiculocorrecto_onfocus(this, iSeqRow) });
  $('#id_sc_field_fld_importe_eeana' + iSeqRow).bind('change', function() { sc_form_aforo_liquidacionVW_fld_importe_eeana_onchange(this, iSeqRow) });
  $('.sc-ui-radio-vehiculocorrecto' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_aforo_liquidacionVW_consecutivo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_casetaid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechaoperacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechaturno_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_turnoid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_horaevento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tramoid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_carrilid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cuerpo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_secuencial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_folio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculoid_ect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_clasevehiculo_ect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_importe_ect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cantidadeje_ect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tarifaee_ect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculoid_cr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_clasevehiculo_cr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_importe_cr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cantidadeje_cr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tarifaee_cr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculoid_eap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_clasevehiculo_eap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_importe_eap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cantidadeje_eap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tarifaee_eap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_pagoid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_excentoid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_usuarioid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_placas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_numerotarjeta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tipotarjeta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechaenvio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_codigofacturacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculoid_ana_onblur(oThis, iSeqRow) {
  do_ajax_form_aforo_liquidacionVW_validate_vehiculoid_ana();
  scCssBlur(oThis);
}

function sc_form_aforo_liquidacionVW_vehiculoid_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_aforo_liquidacionVW_event_vehiculoid_ana_onchange();
}

function sc_form_aforo_liquidacionVW_vehiculoid_ana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_aforo_liquidacionVW_clasevehiculo_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_importe_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_pagoid_ana_onblur(oThis, iSeqRow) {
  do_ajax_form_aforo_liquidacionVW_validate_pagoid_ana();
  scCssBlur(oThis);
}

function sc_form_aforo_liquidacionVW_pagoid_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_aforo_liquidacionVW_event_pagoid_ana_onchange();
}

function sc_form_aforo_liquidacionVW_pagoid_ana_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_aforo_liquidacionVW_estatusana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fld_ar_sct_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cantidadeje_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tarifaee_ana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechamodificadoana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechamodificadoana_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_eludidoextra_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_revisado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechamarcacioncr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechamarcacioncr_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechadeteccionect_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechadeteccionect_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechadeteccioneap_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_fechadeteccioneap_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tramoidorigen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_operacionid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_residente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_cancelado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_operadortlp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_tipotlp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_categoriatlp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_estatustlp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_generadoxml_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_xml_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_autorizacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_importe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_detectadospreid_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_nombreimagen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculocorrecto_onblur(oThis, iSeqRow) {
  do_ajax_form_aforo_liquidacionVW_validate_vehiculocorrecto();
  scCssBlur(oThis);
}

function sc_form_aforo_liquidacionVW_vehiculocorrecto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_aforo_liquidacionVW_vehiculocorrecto_onclick(oThis, iSeqRow) {
  do_ajax_form_aforo_liquidacionVW_event_vehiculocorrecto_onclick();
}

function sc_form_aforo_liquidacionVW_vehiculocorrecto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_aforo_liquidacionVW_fld_importe_eeana_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("vehiculocorrecto", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("pagoid_ana", "", status);
	displayChange_field("vehiculoid_ana", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_vehiculocorrecto(row, status);
	displayChange_field_pagoid_ana(row, status);
	displayChange_field_vehiculoid_ana(row, status);
}

function displayChange_field(field, row, status) {
	if ("vehiculocorrecto" == field) {
		displayChange_field_vehiculocorrecto(row, status);
	}
	if ("pagoid_ana" == field) {
		displayChange_field_pagoid_ana(row, status);
	}
	if ("vehiculoid_ana" == field) {
		displayChange_field_vehiculoid_ana(row, status);
	}
}

function displayChange_field_vehiculocorrecto(row, status) {
    var fieldId;
}

function displayChange_field_pagoid_ana(row, status) {
    var fieldId;
}

function displayChange_field_vehiculoid_ana(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_aforo_liquidacionVW_form" + pageNo).hide();
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_aforo_liquidacionVW')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

