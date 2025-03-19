<?php
class Header_Footer extends TCPDF
{
   var $nm_data;
   var $Nm_lang;
   function Header()
   {
            $Lin_extras = array();
            $this->default_font = $_SESSION['scriptcase']['pdfreport_aforo']['default_font'];
            $str_lang = (isset($_SESSION['scriptcase']['str_lang']) && !empty($_SESSION['scriptcase']['str_lang'])) ? $_SESSION['scriptcase']['str_lang'] : "es";
            if (empty($this->Nm_lang))
            {
                include("../_lib/lang/" . $str_lang . ".lang.php");
            }
            $this->nm_data = new nm_data("es");
                      /*-------- Def. Header --------*/
            $cell_CasetaID = array('posx' => '11.583802291665206', 'posy' => '12.906718958331707', 'data' => $_SESSION['pdfreport_aforo']['casetaid'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_FechaOperacion = array('posx' => '10.777643333331973', 'posy' => '20.51764374999741', 'data' => $_SESSION['pdfreport_aforo']['fechaoperacion'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TurnoID = array('posx' => '11.840104166665174', 'posy' => '28.34772291666309', 'data' => $_SESSION['pdfreport_aforo']['turnoid'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TramoID = array('posx' => '116.08593749998536', 'posy' => '13.423476666664973', 'data' => $_SESSION['pdfreport_aforo']['tramoid'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Titulo = array('posx' => '12', 'posy' => '13', 'data' => $_SESSION['pdfreport_aforo']['titulo'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => 'B');
          /*-------- Def. Body --------*/
            $cell_FechaTurno = array('posx' => '10', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['fechaturno'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_HoraEvento = array('posx' => '36.454556249995406', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['horaevento'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CarrilID = array('posx' => '38', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['carrilid'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Cuerpo = array('posx' => '185.73644166664323', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['cuerpo'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Secuencial = array('posx' => '50.7420562499936', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['secuencial'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Folio = array('posx' => '29.839972916662905', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['folio'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_VehiculoID_CR = array('posx' => '77.9941395833235', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['vehiculoid_cr'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_ClaseVehiculo_CR = array('posx' => '102.0712229166538', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['clasevehiculo_cr'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_Importe_CR = array('posx' => '63.706639583325305', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['importe_cr'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_CantidadEje_CR = array('posx' => '164.56977499997924', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['cantidadeje_cr'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_TarifaEE_CR = array('posx' => '126.40997916665073', 'posy' => '0', 'data' => $_SESSION['pdfreport_aforo']['tarifaee_cr'], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);



            $this->SetFont($cell_CasetaID['font_type'], $cell_CasetaID['font_style'], $cell_CasetaID['font_size']);
            $this->pdf_text_color($cell_CasetaID['data'], $cell_CasetaID['color_r'], $cell_CasetaID['color_g'], $cell_CasetaID['color_b']);
            if (!empty($cell_CasetaID['posx']) && !empty($cell_CasetaID['posy']))
            {
                $this->SetXY($cell_CasetaID['posx'], $cell_CasetaID['posy']);
            }
            elseif (!empty($cell_CasetaID['posx']))
            {
                $this->SetX($cell_CasetaID['posx']);
            }
            elseif (!empty($cell_CasetaID['posy']))
            {
                $this->SetY($cell_CasetaID['posy']);
            }
            $this->Cell($cell_CasetaID['width'], 0, $cell_CasetaID['data'], 0, 0, $cell_CasetaID['align']);

            $this->SetFont($cell_FechaOperacion['font_type'], $cell_FechaOperacion['font_style'], $cell_FechaOperacion['font_size']);
            $this->pdf_text_color($cell_FechaOperacion['data'], $cell_FechaOperacion['color_r'], $cell_FechaOperacion['color_g'], $cell_FechaOperacion['color_b']);
            if (!empty($cell_FechaOperacion['posx']) && !empty($cell_FechaOperacion['posy']))
            {
                $this->SetXY($cell_FechaOperacion['posx'], $cell_FechaOperacion['posy']);
            }
            elseif (!empty($cell_FechaOperacion['posx']))
            {
                $this->SetX($cell_FechaOperacion['posx']);
            }
            elseif (!empty($cell_FechaOperacion['posy']))
            {
                $this->SetY($cell_FechaOperacion['posy']);
            }
            $this->Cell($cell_FechaOperacion['width'], 0, $cell_FechaOperacion['data'], 0, 0, $cell_FechaOperacion['align']);

            $this->SetFont($cell_TurnoID['font_type'], $cell_TurnoID['font_style'], $cell_TurnoID['font_size']);
            $this->pdf_text_color($cell_TurnoID['data'], $cell_TurnoID['color_r'], $cell_TurnoID['color_g'], $cell_TurnoID['color_b']);
            if (!empty($cell_TurnoID['posx']) && !empty($cell_TurnoID['posy']))
            {
                $this->SetXY($cell_TurnoID['posx'], $cell_TurnoID['posy']);
            }
            elseif (!empty($cell_TurnoID['posx']))
            {
                $this->SetX($cell_TurnoID['posx']);
            }
            elseif (!empty($cell_TurnoID['posy']))
            {
                $this->SetY($cell_TurnoID['posy']);
            }
            $this->Cell($cell_TurnoID['width'], 0, $cell_TurnoID['data'], 0, 0, $cell_TurnoID['align']);

            $this->SetFont($cell_TramoID['font_type'], $cell_TramoID['font_style'], $cell_TramoID['font_size']);
            $this->pdf_text_color($cell_TramoID['data'], $cell_TramoID['color_r'], $cell_TramoID['color_g'], $cell_TramoID['color_b']);
            if (!empty($cell_TramoID['posx']) && !empty($cell_TramoID['posy']))
            {
                $this->SetXY($cell_TramoID['posx'], $cell_TramoID['posy']);
            }
            elseif (!empty($cell_TramoID['posx']))
            {
                $this->SetX($cell_TramoID['posx']);
            }
            elseif (!empty($cell_TramoID['posy']))
            {
                $this->SetY($cell_TramoID['posy']);
            }
            $this->Cell($cell_TramoID['width'], 0, $cell_TramoID['data'], 0, 0, $cell_TramoID['align']);

            $this->SetFont($cell_Titulo['font_type'], $cell_Titulo['font_style'], $cell_Titulo['font_size']);
            $this->pdf_text_color($cell_Titulo['data'], $cell_Titulo['color_r'], $cell_Titulo['color_g'], $cell_Titulo['color_b']);
            if (!empty($cell_Titulo['posx']) && !empty($cell_Titulo['posy']))
            {
                $this->SetXY($cell_Titulo['posx'], $cell_Titulo['posy']);
            }
            elseif (!empty($cell_Titulo['posx']))
            {
                $this->SetX($cell_Titulo['posx']);
            }
            elseif (!empty($cell_Titulo['posy']))
            {
                $this->SetY($cell_Titulo['posy']);
            }
            $this->Cell($cell_Titulo['width'], 0, $cell_Titulo['data'], 0, 0, $cell_Titulo['align']);

            foreach ($Lin_extras as $Lines => $Data_lines) 
            {
                $this->Ln(4.2333333333333);
                foreach ($Data_lines as $Col => $Parms) 
                {
                    if (isset($Parms["type"]) && $Parms["type"] == "img")
                    {
                        $posY = $this->GetY();
                        if (isset($Parms["data"]) && !empty($Parms["data"]) && is_file($Parms["data"]))
                        {
                            $this->Image($Parms['data'], $Col, $posY, $Parms['larg'], $Parms['alt']);
                        }
                    }
                    else
                    {
                        $this->SetX($Col);
                        $this->SetFont($Parms["font_type"], $Parms["font_style"], $Parms["font_size"]);
                        $this->pdf_text_color($Parms["data"], $Parms["color_r"], $Parms["color_g"], $Parms["color_b"]);
                        $this->Cell($Parms["width"], 0, $Parms["data"], 0, 0, $Parms["align"]);
                    }
                }
            }
            $this->SetTopMargin(40);
   }
   function Footer()
   {
   }
   function pdf_text_color(&$val, $r, $g, $b)
   {
       if (is_array($val)) {
           $val = "";
       }
       $pos = strpos($val, "@SCNEG#");
       if ($pos !== false)
       {
           $cor = trim(substr($val, $pos + 7));
           $val = substr($val, 0, $pos);
           $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
           if (strlen($cor) == 6)
           {
               $r = hexdec(substr($cor, 0, 2));
               $g = hexdec(substr($cor, 2, 2));
               $b = hexdec(substr($cor, 4, 2));
           }
       }
       $this->SetTextColor($r, $g, $b);
   }
   function SC_conv_utf8($input)
   {
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
        {
            $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
        }
       return $input;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
}
?>
