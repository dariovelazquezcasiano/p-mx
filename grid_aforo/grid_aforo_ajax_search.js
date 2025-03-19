
  // ---------- Proc BI
function ajax_ch_bi_search(field, parm)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_ch_bi_search&script_case_init=" + document.F1.script_case_init.value + "&Campo_bi=" + field + "&Opc_bi=" + parm
     })
     .done(function(json_ch_bi) {
        var i, oResp, ret_bi_opc;
        ret_bi_opc = parm;
        ret_bi_dt  = '';
        Tst_integrid = json_ch_bi.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonDyn_ch_bi);
            return;
        }
        eval("oResp = " + json_ch_bi);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["ch_bi"]) {
          for (i = 0; i < oResp["ch_bi"].length; i++) {
               $("#" + oResp["ch_bi"][i]["field"]).val(oResp["ch_bi"][i]["value"]);
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        x = eval("formata_bi_" + field);
        x(parm, ret_bi_opc, ret_bi_dt);
        nmAjaxProcOff();
    });
}
function ajax_refresh_field(fields, parms, Proc_on)
{
    if (!Proc_on || Proc_on == null) {nmAjaxProcOn();}
    $.ajax({
      type: "POST", async:false,
      url: "index.php",
      data: "nmgp_opcao=ajax_refresh_field&script_case_init=" + document.F1.script_case_init.value + "&NM_fields_refresh=" + fields + "&NM_parms_refresh=" + parms
     })
     .done(function(json_ref_fil) {
        var i, oResp;
        Tst_integrid = json_ref_fil.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (json_ref_fil);
            return;
        }
        eval("oResp = " + json_ref_fil);
        if (oResp["ss_time_out"]) {
            nmAjaxProcOff();
            nm_move();
        }
        if (oResp["set_html"]) {
          for (i = 0; i < oResp["set_html"].length; i++) {
               $("#" + oResp["set_html"][i]["field"]).html(oResp["set_html"][i]["value"]);
          }
        }
        if (oResp["set_option"]) {
          for (i = 0; i < oResp["set_option"].length; i++) {
              var obj_sel = document.getElementById(oResp["set_option"][i]["field"]);
              obj_sel.length = 0
              var ind = 0;
              for (y = 0; y < oResp["set_option"][i]["value"].length; y++) {
                   obj_sel.options[ind] = new Option(oResp["set_option"][i]["value"][y]["value"], oResp["set_option"][i]["value"][y]["opt"]);
                   ind++;
              }
          }
        }
        if (oResp["set_dselect"]) {
          for (i = 0; i < oResp["set_dselect"].length; i++) {
              var obj_sel_orig = document.getElementById(oResp["set_dselect"][i]["field"] + "_orig");
              var obj_sel_dest = document.getElementById(oResp["set_dselect"][i]["field"] + "_dest");
              obj_sel_orig.length = 0
              obj_sel_dest.length = 0
              var ind = 0;
              for (y = 0; y < oResp["set_dselect"][i]["value"].length; y++) {
                   obj_sel_orig.options[ind] = new Option(oResp["set_dselect"][i]["value"][y]["value"], oResp["set_dselect"][i]["value"][y]["opt"]);
                   ind++;
              }
          }
        }
        if (oResp["htmOutput"]) {
            nmAjaxShowDebug(oResp);
        }
        if (!Proc_on || Proc_on == null) {nmAjaxProcOff();}
    });
}
