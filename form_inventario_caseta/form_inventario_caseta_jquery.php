
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
  scEventControl_data["id_caseta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["carril" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["marca" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modelo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numero_serie" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["localizacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["status" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_caseta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_caseta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["carril" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["carril" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["marca" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modelo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numero_serie" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numero_serie" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["localizacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["localizacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["status" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("id_caseta" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("carril" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("status" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
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
  $('#id_sc_field_id' + iSeqRow).bind('change', function() { sc_form_inventario_caseta_id_onchange(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_descripcion_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_inventario_caseta_descripcion_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_inventario_caseta_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_marca' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_marca_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_inventario_caseta_marca_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_inventario_caseta_marca_onfocus(this, iSeqRow) });
  $('#id_sc_field_modelo' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_modelo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_caseta_modelo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_caseta_modelo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_inventario_caseta_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_inventario_caseta_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_localizacion' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_localizacion_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_inventario_caseta_localizacion_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_inventario_caseta_localizacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_numero_serie' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_numero_serie_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_inventario_caseta_numero_serie_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_inventario_caseta_numero_serie_onfocus(this, iSeqRow) });
  $('#id_sc_field_carril' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_carril_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_caseta_carril_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_caseta_carril_onfocus(this, iSeqRow) });
  $('#id_sc_field_status' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_status_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_inventario_caseta_status_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_inventario_caseta_status_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_caseta' + iSeqRow).bind('blur', function() { sc_form_inventario_caseta_id_caseta_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_inventario_caseta_id_caseta_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_inventario_caseta_id_caseta_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_inv_reemplazo' + iSeqRow).bind('change', function() { sc_form_inventario_caseta_id_inv_reemplazo_onchange(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_inventario_caseta_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_marca_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_marca();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_marca_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_marca_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_modelo_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_modelo();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_modelo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_modelo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_cantidad();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_cantidad_onchange(oThis, iSeqRow) {
  scJQSlideValue("cantidad" + iSeqRow, iSeqRow);
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_localizacion_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_localizacion();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_localizacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_localizacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_numero_serie_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_numero_serie();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_numero_serie_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_numero_serie_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_carril_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_carril();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_carril_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_carril_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_status_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_status();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_status_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_inventario_caseta_status_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_id_caseta_onblur(oThis, iSeqRow) {
  do_ajax_form_inventario_caseta_validate_id_caseta();
  scCssBlur(oThis);
}

function sc_form_inventario_caseta_id_caseta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_inventario_caseta_refresh_id_caseta();
}

function sc_form_inventario_caseta_id_caseta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_inventario_caseta_id_inv_reemplazo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_caseta", "", status);
	displayChange_field("carril", "", status);
	displayChange_field("descripcion", "", status);
	displayChange_field("marca", "", status);
	displayChange_field("modelo", "", status);
	displayChange_field("numero_serie", "", status);
	displayChange_field("localizacion", "", status);
	displayChange_field("cantidad", "", status);
	displayChange_field("status", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_caseta(row, status);
	displayChange_field_carril(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_marca(row, status);
	displayChange_field_modelo(row, status);
	displayChange_field_numero_serie(row, status);
	displayChange_field_localizacion(row, status);
	displayChange_field_cantidad(row, status);
	displayChange_field_status(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_caseta" == field) {
		displayChange_field_id_caseta(row, status);
	}
	if ("carril" == field) {
		displayChange_field_carril(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("marca" == field) {
		displayChange_field_marca(row, status);
	}
	if ("modelo" == field) {
		displayChange_field_modelo(row, status);
	}
	if ("numero_serie" == field) {
		displayChange_field_numero_serie(row, status);
	}
	if ("localizacion" == field) {
		displayChange_field_localizacion(row, status);
	}
	if ("cantidad" == field) {
		displayChange_field_cantidad(row, status);
	}
	if ("status" == field) {
		displayChange_field_status(row, status);
	}
}

function displayChange_field_id_caseta(row, status) {
    var fieldId;
}

function displayChange_field_carril(row, status) {
    var fieldId;
}

function displayChange_field_descripcion(row, status) {
    var fieldId;
}

function displayChange_field_marca(row, status) {
    var fieldId;
}

function displayChange_field_modelo(row, status) {
    var fieldId;
}

function displayChange_field_numero_serie(row, status) {
    var fieldId;
}

function displayChange_field_localizacion(row, status) {
    var fieldId;
}

function displayChange_field_cantidad(row, status) {
    var fieldId;
}

function displayChange_field_status(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_inventario_caseta_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_inventario_caseta')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQSlideAdd(seqRow) {
  $("#sc-ui-slide-cantidad" + seqRow).slider({
    min: 0,
    max: 10,
    range: "min",
    step: 1,
    slide: function(event, ui) {
      var thisValue = ui.value;
      if (_scOnInputSupport && !_scMacOs) {
        $("#id_sc_field_cantidad" + seqRow).val(thisValue);
        $("#id_sc_field_cantidad" + seqRow).scInput("formatValue");
      }
      else {
        $("#id_sc_field_cantidad" + seqRow).val(scFormatValue_cantidad(thisValue));
      }
      var changedRow = $("input[name='sc_check_vert[" + seqRow + "]']");
      if (changedRow.length) {
        $(changedRow[0]).prop("checked", true);
      }
    },
    stop: function(event, ui) {
        $("#id_sc_field_cantidad" + seqRow).change();
    }
  });
  scJQSlideValue("cantidad" + seqRow, seqRow);
} // scJQSlideAdd

function scFormatValue_cantidad(thisValue) {
<?php
if ('.' == $this->field_config['cantidad']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt");
<?php
}
elseif (',' == $this->field_config['cantidad']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("en");
<?php
}
elseif ('' != $this->field_config['cantidad']['symbol_grp']) {
?>
  thisValue = thisValue.toLocaleString("pt").replace(new RegExp(scRegExpQuote("."), "g"), "<?php echo $this->field_config['cantidad']['symbol_grp']; ?>");
<?php
}
?>
  return thisValue;
} // scFormatValue_cantidad

function scUnformatValue_cantidad(thisValue) {
<?php
if ('' != $this->field_config['cantidad']['symbol_grp']) {
?>
  thisValue = thisValue.replace(new RegExp(scRegExpQuote("<?php echo $this->field_config['cantidad']['symbol_grp']; ?>"), "g"), "");
<?php
}
?>
  return thisValue;
} // scUnformatValue_cantidad

function scJQSlideValue(fieldName, seqRow) {
  var fieldValue = $("#id_sc_field_" + fieldName).val();
  var testFieldName = fieldName;
  if ("" != seqRow) {
    testFieldName = testFieldName.substr(0, testFieldName.length - seqRow.toString().length);
  }
  if ("cantidad" == testFieldName) {
    fieldValue = scUnformatValue_cantidad(fieldValue);
  }
  if ("" == fieldValue) {
    return;
  }
  fieldValue = parseInt(fieldValue);
  if ("number" != typeof(fieldValue)) {
    return;
  }
  $("#sc-ui-slide-" + fieldName).slider("value", fieldValue);
} // scJQSlideValue

function scRegExpQuote(str) {
  return str.replace(/([.?*+^$[\]\\(){}|-])/g, "\\$1");
} // scRegExpQuote

function scJQSelect2Add(seqRow, specificField) {
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSlideAdd(iLine);
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

