<?php

function flash(){
	$ci =& get_instance();
	if($ci->session->flashdata('success')){
		$success = '<div class="alert alert-success">'.$ci->session->flashdata('success').'<span class="close" data-dismiss="alert">&times;</span></div>';
		echo $success;
	}
	if($ci->session->flashdata('error')){
		$error = '<div class="alert alert-danger">'.$ci->session->flashdata('error').'<span class="close" data-dismiss="alert">&times;</span></div>';
		echo $error;
	}
}

function dump($data = null){
	echo "<pre>\n";
	var_dump($data);
	echo "</pre>\n";
}

function get_token($len = 6){
	$str = 'AB1CD2EFG3HI4JKL5MN6OPQ7RS8TUV9WX0YZ';
	$str = str_shuffle($str);
    $arr = str_split($str);
    $result = '';
    for ($i=0; $i < $len; $i++) { 
        $result .= $arr[mt_rand(0,35)];
    }
    return $result;
}

if (!function_exists('bulan')) {
    function bulan($bulan){
        switch ($bulan) {
            case 1:
                $bulan = " Januari ";
                break;
            case 2:
                $bulan = " Februari ";
                break;
            case 3:
                $bulan = " Maret ";
                break;
            case 4:
                $bulan = " April ";
                break;
            case 5:
                $bulan = " Mei ";
                break;
            case 6:
                $bulan = " Juni ";
                break;
            case 7:
                $bulan = " Juli ";
                break;
            case 8:
                $bulan = " Agustus ";
                break;
            case 9:
                $bulan = " September ";
                break;
            case 10:
                $bulan = " Oktober ";
                break;
            case 11:
                $bulan = " November ";
                break;
            case 12:
                $bulan = " Desember ";
                break;

            default:
                $bulan = Date('F');
                break;
        }
        return $bulan;
    }
}

function fix_date($date=null) {
    if($date!=null){
        $date = date_create($date);
        return date_format($date,"d").bulan(date_format($date,"m")).date_format($date,"Y");
    }
    else{
        return 'Tidak Ada';
    }
}

function fix_datetime($date=null) {
    if($date!=null){
        $date = date_create($date);
        return date_format($date,"d").bulan(date_format($date,"m")).date_format($date,"Y H:i:s");
    }
    else{
        return 'Tidak Ada';
    }
}

function date_now(){
    $date = date("Y-m-d");
    return $date;
}

function idr($money){
	return 'Rp. '.str_replace(',', '.', number_format($money));
}

function parse_cookie($data){
    $temp = explode('; ', $data);

    if(!is_array($temp)){
        $temp = explode(';', $data);
    }

    if(is_array($temp)){
        $data = array();
        foreach($temp as $value) {
            $uri = explode('=', $value);
            $data[array_shift($uri)] = implode('', $uri);
        }

        return $data;
    }
    else{
        return null;
    }
}