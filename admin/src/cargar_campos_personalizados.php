<?php

/**
 * Generador del listado de presentaciones disponibles
 *
 * @author Alejandro Orozco - aorozco
 * @since 2011-02-25
 * @package src
 */
/**
 * Clase para el manejo de eventos
 */
include_once '../class/Evento.php';

$campos = Evento::consultarDetallesGlobales('campos', $_SESSION['sched_conf_id']);
$valores = Evento::consultarDetallesGlobales('valores_campos', $_SESSION['sched_conf_id']);
$html = "";
$vacio = true;
$valor_vacio = true;
$contador = 1;
$ocultos = "";
if (!empty($campos))
{
  $lista = explode("|",$campos);
  $lista_valores = explode(";",$valores);
  foreach ($lista as $item)
  {
    if (!empty($item))
    {
      $html .= "              <tr>\n";
      $html .= "                <td align=\"right\">\n";
      $html .= "                  ".htmlentities($item)."\n";
      $html .= "                </td>\n";
      $html .= "                <td align=\"left\">\n";
      $select = "";
      if (!empty($valores))
      {
        $select .= "                <select id=\"campo_personalizado_$contador\" name=\"campo_personalizado_$contador\" class=\"formulario\">\n";
        $select .= "                  <option value=\"N/A\">Seleccionar</option>\n";
        $items_valores = explode("|",$lista_valores[$contador-1]);
        foreach ($items_valores as $item_valor)
        {
          if (!empty($item_valor))
          {
            $select .= "                <option value=\"$item_valor\">".htmlentities($item_valor)."</option>\n";
            $valor_vacio = false;
          }
        }
        $select .= "                </select>\n";
      }
      if($valor_vacio)
      {
        $select = "                <input type=\"text\" name=\"campo_personalizado_$contador\" id=\"campo_personalizado_$contador\" size=\"20\" class=\"formulario\"/>\n";
      }
      $html .= $select;
      $html .= "                </td>\n";
      $html .= "              </tr>\n";
      $vacio = false;
    }else
    {
      $ocultos .= "                <input type=\"hidden\" name=\"campo_personalizado_$contador\" id=\"campo_personalizado_$contador\" value=\" \"/>\n";
    }
    $valor_vacio = true;
    $contador++;
  }
}
$html .= "              <tr style=\"display:none;\"><td colspan=\"2\">$ocultos</td></tr>\n";
echo $html;
?>
