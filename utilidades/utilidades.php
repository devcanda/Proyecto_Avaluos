<?php 

class utilidades
{

	public static function formatearNumero($valor)
	{
		return number_format($valor,2,',','.');
	}


	public static function normalizarCantidad($monto )
	{		
        $monto = str_replace(".","",$monto);
		$monto = str_replace(",",".",$monto);
		return $monto;
	}
    
    public static function formatearFecha($fecha)
	{
		if($fecha ==null) return '';
		return date("d/m/Y",strtotime($fecha));
	}

	public static function hoy()
	{
       $hoy = getdate();
       return $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];
	} 

	public static function FormatearTipoDocumento($tipo, $numero)
	{

		if($numero =='') return '';

		switch ($tipo) {
			case '1':
				return '(RC)'.'-'.$numero;
			case '2':
				return '(CC)'.'-'.$numero;
			case '3':
				return '(CE)'.'-'.$numero;
			case '4':
				return '(P)'.'-'.$numero;
			case '5':
				return '(TI)'.'-'.$numero;
			case '6':
				return '(AI)'.'-'.$numero;
			case '7':
				return '(MI)'.'-'.$numero;
			case '8':
				return '(NIT)'.'-'.$numero;
			case '9':
				return '(PEP)'.'-'.$numero;
			case '10':
				return '(PT)'.'-'.$numero;
			default:
				return '';
		}   
	} 

	public static function mesEsp($mes)
	{
	   
	   	if ($mes==1)
			return "Enero";
		if ($mes==2)
			return "Febrero";
		if ($mes==3)
			return "Marzo";
		if ($mes==4)
			return "Abril";			   
		if ($mes==5)
			return "Mayo";
		if ($mes==6)
			return "Junio";
		if ($mes==7)
			return "Julio";
		if ($mes==8)
			return "Agosto";
		if ($mes==9)
			return "Septiembre";
		if ($mes==10)
			return "Octubre";
		if ($mes==11)
			return "Noviembre";
		if ($mes==12)
			return "Diciembre";
	}
	
	public static function getUrlBase()
    {
        $instancia = $_SERVER['REQUEST_SCHEME']. '://' . $_SERVER['HTTP_HOST'];
        if($instancia =='http://localhost' || $instancia =='https://localhost' || $instancia =='http://127.0.0.1' || $instancia =='https://127.0.0.1')
           return  $instancia . '/proyecto_diego'; 
        else
		  return  $instancia;
    }

}


?>