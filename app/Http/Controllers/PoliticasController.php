<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PoliticasController extends Controller
{
	public function index(){
		
		return view('politicas.index');
	}
	
}
?>