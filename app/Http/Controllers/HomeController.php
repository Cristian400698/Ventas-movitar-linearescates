<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portainbound;
use App\Models\portadigital;
use App\Models\portatelev;
use App\Models\upgradeinbo;
use App\Models\upgradedigi;
use App\Models\upgradetelev;
use App\Models\prepostinbound;
use App\Models\prepostdigital;
use App\Models\preposteleventa;
use App\Models\fijainbound;
use App\Models\fijadigital;
use App\Models\fijateleventa;
use App\Models\linea_nueva;
use App\Models\phoenixe;
use App\Models\comunidad;
use App\Models\linearescate;
use App\Models\tentenportabilidad;
use App\Models\tentenmigracion;
use App\Models\tentenprepo;
use App\Models\migracionrede;
use App\Models\portabilidadrede;
use App\Models\prepostrede;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $mes = $request->get('mes');

        /* Selecionar mes actual */
        $date = new Carbon();
        $datenow = $date->format('m');


        $data = [];

        if ($mes == 'enero') {
            $y = '01';
        } elseif ($mes == 'febrero') {
            $y = '02';
        } elseif ($mes == 'marzo') {
            $y = '03';
        } elseif ($mes == 'abril') {
            $y = '04';
        } elseif ($mes == 'mayo') {
            $y = '05';
        } elseif ($mes == 'junio') {
            $y = '06';
        } elseif ($mes == 'julio') {
            $y = '07';
        } elseif ($mes == 'agosto') {
            $y = '08';
        } elseif ($mes == 'septiembre') {
            $y = '09';
        } elseif ($mes == 'octubre') {
            $y = '10';
        } elseif ($mes == 'noviembre') {
            $y = '11';
        } elseif ($mes == 'diciembre') {
            $y = '12';
        } elseif ($mes == '') {
            $y = $datenow;
        }


        /* INICO DASH POR DIA */

        $portinb1['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-1')->count();
        $portinb2['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-2')->count();
        $portinb3['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-3')->count();
        $portinb4['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-4')->count();
        $portinb5['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-5')->count();
        $portinb6['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-6')->count();
        $portinb7['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-7')->count();
        $portinb8['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-8')->count();
        $portinb9['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-9')->count();
        $portinb10['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-10')->count();
        $portinb11['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-11')->count();
        $portinb12['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-12')->count();
        $portinb13['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-13')->count();
        $portinb14['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-14')->count();
        $portinb15['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-15')->count();
        $portinb16['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-16')->count();
        $portinb17['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-17')->count();
        $portinb18['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-18')->count();
        $portinb19['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-19')->count();
        $portinb20['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-20')->count();
        $portinb21['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-21')->count();
        $portinb22['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-22')->count();
        $portinb23['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-23')->count();
        $portinb24['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-24')->count();
        $portinb25['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-25')->count();
        $portinb26['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-26')->count();
        $portinb27['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-27')->count();
        $portinb28['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-28')->count();
        $portinb29['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-29')->count();
        $portinb30['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-30')->count();
        $portinb31['portainbounds']    = portainbound::where('dia', '2024-' . $y . '-31')->count();


        $portdig1['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-1')->count();
        $portdig2['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-2')->count();
        $portdig3['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-3')->count();
        $portdig4['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-4')->count();
        $portdig5['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-5')->count();
        $portdig6['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-6')->count();
        $portdig7['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-7')->count();
        $portdig8['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-8')->count();
        $portdig9['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-9')->count();
        $portdig10['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-10')->count();
        $portdig11['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-11')->count();
        $portdig12['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-12')->count();
        $portdig13['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-13')->count();
        $portdig14['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-14')->count();
        $portdig15['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-15')->count();
        $portdig16['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-16')->count();
        $portdig17['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-17')->count();
        $portdig18['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-18')->count();
        $portdig19['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-19')->count();
        $portdig20['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-20')->count();
        $portdig21['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-21')->count();
        $portdig22['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-22')->count();
        $portdig23['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-23')->count();
        $portdig24['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-24')->count();
        $portdig25['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-25')->count();
        $portdig26['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-26')->count();
        $portdig27['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-27')->count();
        $portdig28['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-28')->count();
        $portdig29['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-29')->count();
        $portdig30['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-30')->count();
        $portdig31['portadigitals']    = portadigital::where('dia', '2024-' . $y . '-31')->count();

        $portele1['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-1')->count();
        $portele2['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-2')->count();
        $portele3['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-3')->count();
        $portele4['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-4')->count();
        $portele5['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-5')->count();
        $portele6['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-6')->count();
        $portele7['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-7')->count();
        $portele8['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-8')->count();
        $portele9['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-9')->count();
        $portele10['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-10')->count();
        $portele11['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-11')->count();
        $portele12['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-12')->count();
        $portele13['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-13')->count();
        $portele14['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-14')->count();
        $portele15['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-15')->count();
        $portele16['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-16')->count();
        $portele17['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-17')->count();
        $portele18['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-18')->count();
        $portele19['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-19')->count();
        $portele20['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-20')->count();
        $portele21['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-21')->count();
        $portele22['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-22')->count();
        $portele23['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-23')->count();
        $portele24['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-24')->count();
        $portele25['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-25')->count();
        $portele26['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-26')->count();
        $portele27['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-27')->count();
        $portele28['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-28')->count();
        $portele29['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-29')->count();
        $portele30['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-30')->count();
        $portele31['portatelevs']    = portatelev::where('dia', '2024-' . $y . '-31')->count();


        $upginb1['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-1')->count();
        $upginb2['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-2')->count();
        $upginb3['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-3')->count();
        $upginb4['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-4')->count();
        $upginb5['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-5')->count();
        $upginb6['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-6')->count();
        $upginb7['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-7')->count();
        $upginb8['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-8')->count();
        $upginb9['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-9')->count();
        $upginb10['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-10')->count();
        $upginb11['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-11')->count();
        $upginb12['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-12')->count();
        $upginb13['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-13')->count();
        $upginb14['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-14')->count();
        $upginb15['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-15')->count();
        $upginb16['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-16')->count();
        $upginb17['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-17')->count();
        $upginb18['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-18')->count();
        $upginb19['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-19')->count();
        $upginb20['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-20')->count();
        $upginb21['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-21')->count();
        $upginb22['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-22')->count();
        $upginb23['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-23')->count();
        $upginb24['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-24')->count();
        $upginb25['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-25')->count();
        $upginb26['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-26')->count();
        $upginb27['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-27')->count();
        $upginb28['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-28')->count();
        $upginb29['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-29')->count();
        $upginb30['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-30')->count();
        $upginb31['upgradeinbos']    = upgradeinbo::where('dia', '2024-' . $y . '-31')->count();

        $upgradedig1['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-1')->count();
        $upgradedig2['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-2')->count();
        $upgradedig3['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-3')->count();
        $upgradedig4['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-4')->count();
        $upgradedig5['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-5')->count();
        $upgradedig6['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-6')->count();
        $upgradedig7['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-7')->count();
        $upgradedig8['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-8')->count();
        $upgradedig9['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-9')->count();
        $upgradedig10['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-10')->count();
        $upgradedig11['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-11')->count();
        $upgradedig12['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-12')->count();
        $upgradedig13['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-13')->count();
        $upgradedig14['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-14')->count();
        $upgradedig15['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-15')->count();
        $upgradedig16['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-16')->count();
        $upgradedig17['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-17')->count();
        $upgradedig18['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-18')->count();
        $upgradedig19['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-19')->count();
        $upgradedig20['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-20')->count();
        $upgradedig21['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-21')->count();
        $upgradedig22['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-22')->count();
        $upgradedig23['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-23')->count();
        $upgradedig24['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-24')->count();
        $upgradedig25['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-25')->count();
        $upgradedig26['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-26')->count();
        $upgradedig27['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-27')->count();
        $upgradedig28['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-28')->count();
        $upgradedig29['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-29')->count();
        $upgradedig30['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-30')->count();
        $upgradedig31['upgradedigis']    = upgradedigi::where('dia', '2024-' . $y . '-31')->count();

        $upgradetel1['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-1')->count();
        $upgradetel2['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-2')->count();
        $upgradetel3['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-3')->count();
        $upgradetel4['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-4')->count();
        $upgradetel5['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-5')->count();
        $upgradetel6['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-6')->count();
        $upgradetel7['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-7')->count();
        $upgradetel8['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-8')->count();
        $upgradetel9['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-9')->count();
        $upgradetel10['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-10')->count();
        $upgradetel11['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-11')->count();
        $upgradetel12['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-12')->count();
        $upgradetel13['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-13')->count();
        $upgradetel14['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-14')->count();
        $upgradetel15['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-15')->count();
        $upgradetel16['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-16')->count();
        $upgradetel17['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-17')->count();
        $upgradetel18['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-18')->count();
        $upgradetel19['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-19')->count();
        $upgradetel20['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-20')->count();
        $upgradetel21['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-21')->count();
        $upgradetel22['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-22')->count();
        $upgradetel23['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-23')->count();
        $upgradetel24['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-24')->count();
        $upgradetel25['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-25')->count();
        $upgradetel26['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-26')->count();
        $upgradetel27['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-27')->count();
        $upgradetel28['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-28')->count();
        $upgradetel29['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-29')->count();
        $upgradetel30['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-30')->count();
        $upgradetel31['upgradetelevs']    = upgradetelev::where('dia', '2024-' . $y . '-31')->count();

        $preinb1['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-1')->count();
        $preinb2['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-2')->count();
        $preinb3['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-3')->count();
        $preinb4['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-4')->count();
        $preinb5['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-5')->count();
        $preinb6['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-6')->count();
        $preinb7['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-7')->count();
        $preinb8['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-8')->count();
        $preinb9['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-9')->count();
        $preinb10['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-10')->count();
        $preinb11['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-11')->count();
        $preinb12['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-12')->count();
        $preinb13['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-13')->count();
        $preinb14['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-14')->count();
        $preinb15['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-15')->count();
        $preinb16['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-16')->count();
        $preinb17['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-17')->count();
        $preinb18['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-18')->count();
        $preinb19['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-19')->count();
        $preinb20['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-20')->count();
        $preinb21['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-21')->count();
        $preinb22['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-22')->count();
        $preinb23['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-23')->count();
        $preinb24['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-24')->count();
        $preinb25['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-25')->count();
        $preinb26['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-26')->count();
        $preinb27['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-27')->count();
        $preinb28['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-28')->count();
        $preinb29['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-29')->count();
        $preinb30['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-30')->count();
        $preinb31['prepostinbounds']    = prepostinbound::where('dia', '2024-' . $y . '-31')->count();

        $predig1['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-1')->count();
        $predig2['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-2')->count();
        $predig3['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-3')->count();
        $predig4['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-4')->count();
        $predig5['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-5')->count();
        $predig6['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-6')->count();
        $predig7['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-7')->count();
        $predig8['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-8')->count();
        $predig9['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-9')->count();
        $predig10['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-10')->count();
        $predig11['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-11')->count();
        $predig12['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-12')->count();
        $predig13['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-13')->count();
        $predig14['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-14')->count();
        $predig15['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-15')->count();
        $predig16['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-16')->count();
        $predig17['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-17')->count();
        $predig18['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-18')->count();
        $predig19['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-19')->count();
        $predig20['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-20')->count();
        $predig21['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-21')->count();
        $predig22['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-22')->count();
        $predig23['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-23')->count();
        $predig24['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-24')->count();
        $predig25['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-25')->count();
        $predig26['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-26')->count();
        $predig27['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-27')->count();
        $predig28['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-28')->count();
        $predig29['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-29')->count();
        $predig30['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-30')->count();
        $predig31['prepostdigitals']    = prepostdigital::where('dia', '2024-' . $y . '-31')->count();

        $pretel1['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-1')->count();
        $pretel2['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-2')->count();
        $pretel3['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-3')->count();
        $pretel4['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-4')->count();
        $pretel5['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-5')->count();
        $pretel6['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-6')->count();
        $pretel7['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-7')->count();
        $pretel8['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-8')->count();
        $pretel9['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-9')->count();
        $pretel10['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-10')->count();
        $pretel11['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-11')->count();
        $pretel12['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-12')->count();
        $pretel13['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-13')->count();
        $pretel14['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-14')->count();
        $pretel15['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-15')->count();
        $pretel16['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-16')->count();
        $pretel17['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-17')->count();
        $pretel18['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-18')->count();
        $pretel19['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-19')->count();
        $pretel20['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-20')->count();
        $pretel21['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-21')->count();
        $pretel22['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-22')->count();
        $pretel23['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-23')->count();
        $pretel24['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-24')->count();
        $pretel25['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-25')->count();
        $pretel26['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-26')->count();
        $pretel27['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-27')->count();
        $pretel28['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-28')->count();
        $pretel29['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-29')->count();
        $pretel30['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-30')->count();
        $pretel31['preposteleventas']    = preposteleventa::where('dia', '2024-' . $y . '-31')->count();

        $fijainb1['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-1')->count();
        $fijainb2['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-2')->count();
        $fijainb3['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-3')->count();
        $fijainb4['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-4')->count();
        $fijainb5['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-5')->count();
        $fijainb6['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-6')->count();
        $fijainb7['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-7')->count();
        $fijainb8['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-8')->count();
        $fijainb9['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-9')->count();
        $fijainb10['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-10')->count();
        $fijainb11['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-11')->count();
        $fijainb12['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-12')->count();
        $fijainb13['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-13')->count();
        $fijainb14['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-14')->count();
        $fijainb15['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-15')->count();
        $fijainb16['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-16')->count();
        $fijainb17['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-17')->count();
        $fijainb18['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-18')->count();
        $fijainb19['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-19')->count();
        $fijainb20['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-20')->count();
        $fijainb21['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-21')->count();
        $fijainb22['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-22')->count();
        $fijainb23['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-23')->count();
        $fijainb24['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-24')->count();
        $fijainb25['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-25')->count();
        $fijainb26['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-26')->count();
        $fijainb27['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-27')->count();
        $fijainb28['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-28')->count();
        $fijainb29['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-29')->count();
        $fijainb30['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-30')->count();
        $fijainb31['fijainbounds']    = fijainbound::where('dia', '2024-' . $y . '-31')->count();

        $fijadig1['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-1')->count();
        $fijadig2['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-2')->count();
        $fijadig3['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-3')->count();
        $fijadig4['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-4')->count();
        $fijadig5['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-5')->count();
        $fijadig6['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-6')->count();
        $fijadig7['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-7')->count();
        $fijadig8['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-8')->count();
        $fijadig9['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-9')->count();
        $fijadig10['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-10')->count();
        $fijadig11['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-11')->count();
        $fijadig12['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-12')->count();
        $fijadig13['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-13')->count();
        $fijadig14['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-14')->count();
        $fijadig15['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-15')->count();
        $fijadig16['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-16')->count();
        $fijadig17['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-17')->count();
        $fijadig18['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-18')->count();
        $fijadig19['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-19')->count();
        $fijadig20['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-20')->count();
        $fijadig21['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-21')->count();
        $fijadig22['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-22')->count();
        $fijadig23['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-23')->count();
        $fijadig24['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-24')->count();
        $fijadig25['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-25')->count();
        $fijadig26['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-26')->count();
        $fijadig27['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-27')->count();
        $fijadig28['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-28')->count();
        $fijadig29['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-29')->count();
        $fijadig30['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-30')->count();
        $fijadig31['fijainbounds']    = fijadigital::where('dia', '2024-' . $y . '-31')->count();

        $fijate1['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-1')->count();
        $fijate2['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-2')->count();
        $fijate3['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-3')->count();
        $fijate4['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-4')->count();
        $fijate5['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-5')->count();
        $fijate6['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-6')->count();
        $fijate7['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-7')->count();
        $fijate8['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-8')->count();
        $fijate9['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-9')->count();
        $fijate10['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-10')->count();
        $fijate11['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-11')->count();
        $fijate12['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-12')->count();
        $fijate13['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-13')->count();
        $fijate14['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-14')->count();
        $fijate15['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-15')->count();
        $fijate16['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-16')->count();
        $fijate17['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-17')->count();
        $fijate18['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-18')->count();
        $fijate19['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-19')->count();
        $fijate20['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-20')->count();
        $fijate21['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-21')->count();
        $fijate22['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-22')->count();
        $fijate23['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-23')->count();
        $fijate24['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-24')->count();
        $fijate25['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-25')->count();
        $fijate26['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-26')->count();
        $fijate27['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-27')->count();
        $fijate28['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-28')->count();
        $fijate29['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-29')->count();
        $fijate30['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-30')->count();
        $fijate31['fijateleventas']    = fijateleventa::where('dia', '2024-' . $y . '-31')->count();

        $l1['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-1')->count();
        $l2['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-2')->count();
        $l3['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-3')->count();
        $l4['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-4')->count();
        $l5['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-5')->count();
        $l6['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-6')->count();
        $l7['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-7')->count();
        $l8['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-8')->count();
        $l9['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-9')->count();
        $l10['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-10')->count();
        $l11['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-11')->count();
        $l12['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-12')->count();
        $l13['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-13')->count();
        $l14['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-14')->count();
        $l15['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-15')->count();
        $l16['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-16')->count();
        $l17['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-17')->count();
        $l18['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-18')->count();
        $l19['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-19')->count();
        $l20['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-20')->count();
        $l21['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-21')->count();
        $l22['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-22')->count();
        $l23['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-23')->count();
        $l24['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-24')->count();
        $l25['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-25')->count();
        $l26['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-26')->count();
        $l27['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-27')->count();
        $l28['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-28')->count();
        $l29['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-29')->count();
        $l30['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-30')->count();
        $l31['linea_nuevas']    = linea_nueva::where('dia', '2024-' . $y . '-31')->count();

        $ph1['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-1')->count();
        $ph2['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-2')->count();
        $ph3['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-3')->count();
        $ph4['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-4')->count();
        $ph5['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-5')->count();
        $ph6['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-6')->count();
        $ph7['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-7')->count();
        $ph8['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-8')->count();
        $ph9['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-9')->count();
        $ph10['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-10')->count();
        $ph11['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-11')->count();
        $ph12['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-12')->count();
        $ph13['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-13')->count();
        $ph14['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-14')->count();
        $ph15['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-15')->count();
        $ph16['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-16')->count();
        $ph17['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-17')->count();
        $ph18['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-18')->count();
        $ph19['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-19')->count();
        $ph20['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-20')->count();
        $ph21['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-21')->count();
        $ph22['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-22')->count();
        $ph23['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-23')->count();
        $ph24['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-24')->count();
        $ph25['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-25')->count();
        $ph26['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-26')->count();
        $ph27['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-27')->count();
        $ph28['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-28')->count();
        $ph29['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-29')->count();
        $ph30['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-30')->count();
        $ph31['phoenixes']    = phoenixe::where('dia', '2024-' . $y . '-31')->count();

        $ce1['comunidads']    = comunidad::where('dia', '2024-' . $y . '-1')->count();
        $ce2['comunidads']    = comunidad::where('dia', '2024-' . $y . '-2')->count();
        $ce3['comunidads']    = comunidad::where('dia', '2024-' . $y . '-3')->count();
        $ce4['comunidads']    = comunidad::where('dia', '2024-' . $y . '-4')->count();
        $ce5['comunidads']    = comunidad::where('dia', '2024-' . $y . '-5')->count();
        $ce6['comunidads']    = comunidad::where('dia', '2024-' . $y . '-6')->count();
        $ce7['comunidads']    = comunidad::where('dia', '2024-' . $y . '-7')->count();
        $ce8['comunidads']    = comunidad::where('dia', '2024-' . $y . '-8')->count();
        $ce9['comunidads']    = comunidad::where('dia', '2024-' . $y . '-9')->count();
        $ce10['comunidads']    = comunidad::where('dia', '2024-' . $y . '-10')->count();
        $ce11['comunidads']    = comunidad::where('dia', '2024-' . $y . '-11')->count();
        $ce12['comunidads']    = comunidad::where('dia', '2024-' . $y . '-12')->count();
        $ce13['comunidads']    = comunidad::where('dia', '2024-' . $y . '-13')->count();
        $ce14['comunidads']    = comunidad::where('dia', '2024-' . $y . '-14')->count();
        $ce15['comunidads']    = comunidad::where('dia', '2024-' . $y . '-15')->count();
        $ce16['comunidads']    = comunidad::where('dia', '2024-' . $y . '-16')->count();
        $ce17['comunidads']    = comunidad::where('dia', '2024-' . $y . '-17')->count();
        $ce18['comunidads']    = comunidad::where('dia', '2024-' . $y . '-18')->count();
        $ce19['comunidads']    = comunidad::where('dia', '2024-' . $y . '-19')->count();
        $ce20['comunidads']    = comunidad::where('dia', '2024-' . $y . '-20')->count();
        $ce21['comunidads']    = comunidad::where('dia', '2024-' . $y . '-21')->count();
        $ce22['comunidads']    = comunidad::where('dia', '2024-' . $y . '-22')->count();
        $ce23['comunidads']    = comunidad::where('dia', '2024-' . $y . '-23')->count();
        $ce24['comunidads']    = comunidad::where('dia', '2024-' . $y . '-24')->count();
        $ce25['comunidads']    = comunidad::where('dia', '2024-' . $y . '-25')->count();
        $ce26['comunidads']    = comunidad::where('dia', '2024-' . $y . '-26')->count();
        $ce27['comunidads']    = comunidad::where('dia', '2024-' . $y . '-27')->count();
        $ce28['comunidads']    = comunidad::where('dia', '2024-' . $y . '-28')->count();
        $ce29['comunidads']    = comunidad::where('dia', '2024-' . $y . '-29')->count();
        $ce30['comunidads']    = comunidad::where('dia', '2024-' . $y . '-30')->count();
        $ce31['comunidads']    = comunidad::where('dia', '2024-' . $y . '-31')->count();

        $tenporta1['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-1')->count();
        $tenporta2['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-2')->count();
        $tenporta3['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-3')->count();
        $tenporta4['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-4')->count();
        $tenporta5['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-5')->count();
        $tenporta6['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-6')->count();
        $tenporta7['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-7')->count();
        $tenporta8['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-8')->count();
        $tenporta9['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-9')->count();
        $tenporta10['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-10')->count();
        $tenporta11['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-11')->count();
        $tenporta12['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-12')->count();
        $tenporta13['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-13')->count();
        $tenporta14['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-14')->count();
        $tenporta15['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-15')->count();
        $tenporta16['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-16')->count();
        $tenporta17['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-17')->count();
        $tenporta18['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-18')->count();
        $tenporta19['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-19')->count();
        $tenporta20['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-20')->count();
        $tenporta21['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-21')->count();
        $tenporta22['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-22')->count();
        $tenporta23['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-23')->count();
        $tenporta24['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-24')->count();
        $tenporta25['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-25')->count();
        $tenporta26['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-26')->count();
        $tenporta27['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-27')->count();
        $tenporta28['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-28')->count();
        $tenporta29['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-29')->count();
        $tenporta30['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-30')->count();
        $tenporta31['tentenportabilidad']    = tentenportabilidad::where('dia', '2024-' . $y . '-31')->count();

        $tenmigra1['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-1')->count();
        $tenmigra2['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-2')->count();
        $tenmigra3['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-3')->count();
        $tenmigra4['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-4')->count();
        $tenmigra5['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-5')->count();
        $tenmigra6['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-6')->count();
        $tenmigra7['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-7')->count();
        $tenmigra8['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-8')->count();
        $tenmigra9['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-9')->count();
        $tenmigra10['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-10')->count();
        $tenmigra11['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-11')->count();
        $tenmigra12['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-12')->count();
        $tenmigra13['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-13')->count();
        $tenmigra14['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-14')->count();
        $tenmigra15['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-15')->count();
        $tenmigra16['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-16')->count();
        $tenmigra17['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-17')->count();
        $tenmigra18['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-18')->count();
        $tenmigra19['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-19')->count();
        $tenmigra20['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-20')->count();
        $tenmigra21['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-21')->count();
        $tenmigra22['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-22')->count();
        $tenmigra23['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-23')->count();
        $tenmigra24['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-24')->count();
        $tenmigra25['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-25')->count();
        $tenmigra26['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-26')->count();
        $tenmigra27['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-27')->count();
        $tenmigra28['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-28')->count();
        $tenmigra29['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-29')->count();
        $tenmigra30['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-30')->count();
        $tenmigra31['tentenmigracion']    = tentenmigracion::where('dia', '2024-' . $y . '-31')->count();

        $tenprepo1['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-1')->count();
        $tenprepo2['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-2')->count();
        $tenprepo3['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-3')->count();
        $tenprepo4['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-4')->count();
        $tenprepo5['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-5')->count();
        $tenprepo6['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-6')->count();
        $tenprepo7['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-7')->count();
        $tenprepo8['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-8')->count();
        $tenprepo9['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-9')->count();
        $tenprepo10['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-10')->count();
        $tenprepo11['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-11')->count();
        $tenprepo12['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-12')->count();
        $tenprepo13['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-13')->count();
        $tenprepo14['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-14')->count();
        $tenprepo15['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-15')->count();
        $tenprepo16['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-16')->count();
        $tenprepo17['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-17')->count();
        $tenprepo18['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-18')->count();
        $tenprepo19['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-19')->count();
        $tenprepo20['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-20')->count();
        $tenprepo21['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-21')->count();
        $tenprepo22['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-22')->count();
        $tenprepo23['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-23')->count();
        $tenprepo24['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-24')->count();
        $tenprepo25['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-25')->count();
        $tenprepo26['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-26')->count();
        $tenprepo27['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-27')->count();
        $tenprepo28['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-28')->count();
        $tenprepo29['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-29')->count();
        $tenprepo30['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-30')->count();
        $tenprepo31['tentenprepo']    = tentenprepo::where('dia', '2024-' . $y . '-31')->count();


        $migracionrede1['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-1')->count();
        $migracionrede2['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-2')->count();
        $migracionrede3['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-3')->count();
        $migracionrede4['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-4')->count();
        $migracionrede5['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-5')->count();
        $migracionrede6['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-6')->count();
        $migracionrede7['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-7')->count();
        $migracionrede8['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-8')->count();
        $migracionrede9['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-9')->count();
        $migracionrede10['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-10')->count();
        $migracionrede11['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-11')->count();
        $migracionrede12['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-12')->count();
        $migracionrede13['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-13')->count();
        $migracionrede14['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-14')->count();
        $migracionrede15['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-15')->count();
        $migracionrede16['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-16')->count();
        $migracionrede17['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-17')->count();
        $migracionrede18['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-18')->count();
        $migracionrede19['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-19')->count();
        $migracionrede20['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-20')->count();
        $migracionrede21['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-21')->count();
        $migracionrede22['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-22')->count();
        $migracionrede23['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-23')->count();
        $migracionrede24['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-24')->count();
        $migracionrede25['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-25')->count();
        $migracionrede26['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-26')->count();
        $migracionrede27['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-27')->count();
        $migracionrede28['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-28')->count();
        $migracionrede29['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-29')->count();
        $migracionrede30['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-30')->count();
        $migracionrede31['migracionredes']    = migracionrede::where('dia', '2024-' . $y . '-31')->count();

        $portabilidadrede1['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-1')->count();
        $portabilidadrede2['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-2')->count();
        $portabilidadrede3['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-3')->count();
        $portabilidadrede4['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-4')->count();
        $portabilidadrede5['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-5')->count();
        $portabilidadrede6['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-6')->count();
        $portabilidadrede7['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-7')->count();
        $portabilidadrede8['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-8')->count();
        $portabilidadrede9['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-9')->count();
        $portabilidadrede10['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-10')->count();
        $portabilidadrede11['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-11')->count();
        $portabilidadrede12['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-12')->count();
        $portabilidadrede13['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-13')->count();
        $portabilidadrede14['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-14')->count();
        $portabilidadrede15['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-15')->count();
        $portabilidadrede16['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-16')->count();
        $portabilidadrede17['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-17')->count();
        $portabilidadrede18['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-18')->count();
        $portabilidadrede19['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-19')->count();
        $portabilidadrede20['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-20')->count();
        $portabilidadrede21['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-21')->count();
        $portabilidadrede22['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-22')->count();
        $portabilidadrede23['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-23')->count();
        $portabilidadrede24['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-24')->count();
        $portabilidadrede25['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-25')->count();
        $portabilidadrede26['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-26')->count();
        $portabilidadrede27['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-27')->count();
        $portabilidadrede28['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-28')->count();
        $portabilidadrede29['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-29')->count();
        $portabilidadrede30['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-30')->count();
        $portabilidadrede31['portabilidadredes']    = portabilidadrede::where('dia', '2024-' . $y . '-31')->count();

        $prepostrede1['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-1')->count();
        $prepostrede2['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-2')->count();
        $prepostrede3['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-3')->count();
        $prepostrede4['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-4')->count();
        $prepostrede5['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-5')->count();
        $prepostrede6['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-6')->count();
        $prepostrede7['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-7')->count();
        $prepostrede8['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-8')->count();
        $prepostrede9['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-9')->count();
        $prepostrede10['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-10')->count();
        $prepostrede11['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-11')->count();
        $prepostrede12['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-12')->count();
        $prepostrede13['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-13')->count();
        $prepostrede14['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-14')->count();
        $prepostrede15['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-15')->count();
        $prepostrede16['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-16')->count();
        $prepostrede17['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-17')->count();
        $prepostrede18['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-18')->count();
        $prepostrede19['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-19')->count();
        $prepostrede20['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-20')->count();
        $prepostrede21['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-21')->count();
        $prepostrede22['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-22')->count();
        $prepostrede23['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-23')->count();
        $prepostrede24['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-24')->count();
        $prepostrede25['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-25')->count();
        $prepostrede26['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-26')->count();
        $prepostrede27['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-27')->count();
        $prepostrede28['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-28')->count();
        $prepostrede29['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-29')->count();
        $prepostrede30['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-30')->count();
        $prepostrede31['prepostredes']    = prepostrede::where('dia', '2024-' . $y . '-31')->count();

        // Línea Rescate (registros normales)
        $linearescate1['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-1')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate2['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-2')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate3['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-3')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate4['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-4')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate5['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-5')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate6['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-6')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate7['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-7')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate8['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-8')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate9['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-9')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate10['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-10')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate11['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-11')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate12['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-12')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate13['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-13')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate14['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-14')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate15['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-15')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate16['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-16')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate17['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-17')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate18['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-18')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate19['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-19')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate20['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-20')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate21['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-21')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate22['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-22')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate23['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-23')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate24['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-24')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate25['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-25')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate26['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-26')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate27['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-27')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate28['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-28')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate29['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-29')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate30['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-30')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();
        $linearescate31['linearescates'] = Linearescate::where('dia', '2025-' . $y . '-31')
            ->where(function ($query) {
                $query->where('tipo', '!=', 'servicio_cliente')
                    ->orWhereNull('tipo');
            })
            ->count();

        // Servicio al Cliente
        $serviciocliente1['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-1')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente2['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-2')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente3['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-3')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente4['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-4')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente5['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-5')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente6['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-6')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente7['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-7')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente8['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-8')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente9['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-9')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente10['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-10')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente11['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-11')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente12['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-12')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente13['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-13')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente14['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-14')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente15['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-15')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente16['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-16')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente17['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-17')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente18['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-18')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente19['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-19')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente20['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-20')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente21['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-21')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente22['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-22')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente23['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-23')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente24['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-24')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente25['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-25')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente26['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-26')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente27['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-27')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente28['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-28')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente29['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-29')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente30['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-30')
            ->where('tipo', 'servicio_cliente')
            ->count();
        $serviciocliente31['servicioclientes'] = Linearescate::where('dia', '2025-' . $y . '-31')
            ->where('tipo', 'servicio_cliente')
            ->count();

        return view('home', compact(

            /* INICIO DASH POR DIAS */

            /*  INICIO REDES  */

            'migracionrede1',
            'migracionrede2',
            'migracionrede3',
            'migracionrede4',
            'migracionrede5',
            'migracionrede6',
            'migracionrede7',
            'migracionrede8',
            'migracionrede9',
            'migracionrede10',
            'migracionrede11',
            'migracionrede12',
            'migracionrede13',
            'migracionrede14',
            'migracionrede15',
            'migracionrede16',
            'migracionrede17',
            'migracionrede18',
            'migracionrede19',
            'migracionrede20',
            'migracionrede21',
            'migracionrede22',
            'migracionrede23',
            'migracionrede24',
            'migracionrede25',
            'migracionrede26',
            'migracionrede27',
            'migracionrede28',
            'migracionrede29',
            'migracionrede30',
            'migracionrede31',

            'portabilidadrede1',
            'portabilidadrede2',
            'portabilidadrede3',
            'portabilidadrede4',
            'portabilidadrede5',
            'portabilidadrede6',
            'portabilidadrede7',
            'portabilidadrede8',
            'portabilidadrede9',
            'portabilidadrede10',
            'portabilidadrede11',
            'portabilidadrede12',
            'portabilidadrede13',
            'portabilidadrede14',
            'portabilidadrede15',
            'portabilidadrede16',
            'portabilidadrede17',
            'portabilidadrede18',
            'portabilidadrede19',
            'portabilidadrede20',
            'portabilidadrede21',
            'portabilidadrede22',
            'portabilidadrede23',
            'portabilidadrede24',
            'portabilidadrede25',
            'portabilidadrede26',
            'portabilidadrede27',
            'portabilidadrede28',
            'portabilidadrede29',
            'portabilidadrede30',
            'portabilidadrede31',

            'prepostrede1',
            'prepostrede2',
            'prepostrede3',
            'prepostrede4',
            'prepostrede5',
            'prepostrede6',
            'prepostrede7',
            'prepostrede8',
            'prepostrede9',
            'prepostrede10',
            'prepostrede11',
            'prepostrede12',
            'prepostrede13',
            'prepostrede14',
            'prepostrede15',
            'prepostrede16',
            'prepostrede17',
            'prepostrede18',
            'prepostrede19',
            'prepostrede20',
            'prepostrede21',
            'prepostrede22',
            'prepostrede23',
            'prepostrede24',
            'prepostrede25',
            'prepostrede26',
            'prepostrede27',
            'prepostrede28',
            'prepostrede29',
            'prepostrede30',
            'prepostrede31',


            /*  FIN REDES  */

            /*  INICIO PORTABILIDAD  */

            'portinb1',
            'portinb2',
            'portinb3',
            'portinb4',
            'portinb5',
            'portinb6',
            'portinb7',
            'portinb8',
            'portinb9',
            'portinb10',
            'portinb11',
            'portinb12',
            'portinb13',
            'portinb14',
            'portinb15',
            'portinb16',
            'portinb17',
            'portinb18',
            'portinb19',
            'portinb20',
            'portinb21',
            'portinb22',
            'portinb23',
            'portinb24',
            'portinb25',
            'portinb26',
            'portinb27',
            'portinb28',
            'portinb29',
            'portinb30',
            'portinb31',

            'portdig1',
            'portdig2',
            'portdig3',
            'portdig4',
            'portdig5',
            'portdig6',
            'portdig7',
            'portdig8',
            'portdig9',
            'portdig10',
            'portdig11',
            'portdig12',
            'portdig13',
            'portdig14',
            'portdig15',
            'portdig16',
            'portdig17',
            'portdig18',
            'portdig19',
            'portdig20',
            'portdig21',
            'portdig22',
            'portdig23',
            'portdig24',
            'portdig25',
            'portdig26',
            'portdig27',
            'portdig28',
            'portdig29',
            'portdig30',
            'portdig31',

            'portele1',
            'portele2',
            'portele3',
            'portele4',
            'portele5',
            'portele6',
            'portele7',
            'portele8',
            'portele9',
            'portele10',
            'portele11',
            'portele12',
            'portele13',
            'portele14',
            'portele15',
            'portele16',
            'portele17',
            'portele18',
            'portele19',
            'portele20',
            'portele21',
            'portele22',
            'portele23',
            'portele24',
            'portele25',
            'portele26',
            'portele27',
            'portele28',
            'portele29',
            'portele30',
            'portele31',

            /*  FIN PORTABILIDAD T */
            /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
            /*  INICIO UP GRADE  */

            'upginb1',
            'upginb2',
            'upginb3',
            'upginb4',
            'upginb5',
            'upginb6',
            'upginb7',
            'upginb8',
            'upginb9',
            'upginb10',
            'upginb11',
            'upginb12',
            'upginb13',
            'upginb14',
            'upginb15',
            'upginb16',
            'upginb17',
            'upginb18',
            'upginb19',
            'upginb20',
            'upginb21',
            'upginb22',
            'upginb23',
            'upginb24',
            'upginb25',
            'upginb26',
            'upginb27',
            'upginb28',
            'upginb29',
            'upginb30',
            'upginb31',

            'upgradedig1',
            'upgradedig2',
            'upgradedig3',
            'upgradedig4',
            'upgradedig5',
            'upgradedig6',
            'upgradedig7',
            'upgradedig8',
            'upgradedig9',
            'upgradedig10',
            'upgradedig11',
            'upgradedig12',
            'upgradedig13',
            'upgradedig14',
            'upgradedig15',
            'upgradedig16',
            'upgradedig17',
            'upgradedig18',
            'upgradedig19',
            'upgradedig20',
            'upgradedig21',
            'upgradedig22',
            'upgradedig23',
            'upgradedig24',
            'upgradedig25',
            'upgradedig26',
            'upgradedig27',
            'upgradedig28',
            'upgradedig29',
            'upgradedig30',
            'upgradedig31',

            'upgradetel1',
            'upgradetel2',
            'upgradetel3',
            'upgradetel4',
            'upgradetel5',
            'upgradetel6',
            'upgradetel7',
            'upgradetel8',
            'upgradetel9',
            'upgradetel10',
            'upgradetel11',
            'upgradetel12',
            'upgradetel13',
            'upgradetel14',
            'upgradetel15',
            'upgradetel16',
            'upgradetel17',
            'upgradetel18',
            'upgradetel19',
            'upgradetel20',
            'upgradetel21',
            'upgradetel22',
            'upgradetel23',
            'upgradetel24',
            'upgradetel25',
            'upgradetel26',
            'upgradetel27',
            'upgradetel28',
            'upgradetel29',
            'upgradetel30',
            'upgradetel31',

            /*  FIN UP GRADE  */

            /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
            /*  INICIO PRE POST  */

            'preinb1',
            'preinb2',
            'preinb3',
            'preinb4',
            'preinb5',
            'preinb6',
            'preinb7',
            'preinb8',
            'preinb9',
            'preinb10',
            'preinb11',
            'preinb12',
            'preinb13',
            'preinb14',
            'preinb15',
            'preinb16',
            'preinb17',
            'preinb18',
            'preinb19',
            'preinb20',
            'preinb21',
            'preinb22',
            'preinb23',
            'preinb24',
            'preinb25',
            'preinb26',
            'preinb27',
            'preinb28',
            'preinb29',
            'preinb30',
            'preinb31',

            'predig1',
            'predig2',
            'predig3',
            'predig4',
            'predig5',
            'predig6',
            'predig7',
            'predig8',
            'predig9',
            'predig10',
            'predig11',
            'predig12',
            'predig13',
            'predig14',
            'predig15',
            'predig16',
            'predig17',
            'predig18',
            'predig19',
            'predig20',
            'predig21',
            'predig22',
            'predig23',
            'predig24',
            'predig25',
            'predig26',
            'predig27',
            'predig28',
            'predig29',
            'predig30',
            'predig31',

            'pretel1',
            'pretel2',
            'pretel3',
            'pretel4',
            'pretel5',
            'pretel6',
            'pretel7',
            'pretel8',
            'pretel9',
            'pretel10',
            'pretel11',
            'pretel12',
            'pretel13',
            'pretel14',
            'pretel15',
            'pretel16',
            'pretel17',
            'pretel18',
            'pretel19',
            'pretel20',
            'pretel21',
            'pretel22',
            'pretel23',
            'pretel24',
            'pretel25',
            'pretel26',
            'pretel27',
            'pretel28',
            'pretel29',
            'pretel30',
            'pretel31',

            /*  FIN PRE POST  */

            /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
            /*  INICIO FIJA */

            'fijainb1',
            'fijainb2',
            'fijainb3',
            'fijainb4',
            'fijainb5',
            'fijainb6',
            'fijainb7',
            'fijainb8',
            'fijainb9',
            'fijainb10',
            'fijainb11',
            'fijainb12',
            'fijainb13',
            'fijainb14',
            'fijainb15',
            'fijainb16',
            'fijainb17',
            'fijainb18',
            'fijainb19',
            'fijainb20',
            'fijainb21',
            'fijainb22',
            'fijainb23',
            'fijainb24',
            'fijainb25',
            'fijainb26',
            'fijainb27',
            'fijainb28',
            'fijainb29',
            'fijainb30',
            'fijainb31',

            'fijadig1',
            'fijadig2',
            'fijadig3',
            'fijadig4',
            'fijadig5',
            'fijadig6',
            'fijadig7',
            'fijadig8',
            'fijadig9',
            'fijadig10',
            'fijadig11',
            'fijadig12',
            'fijadig13',
            'fijadig14',
            'fijadig15',
            'fijadig16',
            'fijadig17',
            'fijadig18',
            'fijadig19',
            'fijadig20',
            'fijadig21',
            'fijadig22',
            'fijadig23',
            'fijadig24',
            'fijadig25',
            'fijadig26',
            'fijadig27',
            'fijadig28',
            'fijadig29',
            'fijadig30',
            'fijadig31',

            'fijate1',
            'fijate2',
            'fijate3',
            'fijate4',
            'fijate5',
            'fijate6',
            'fijate7',
            'fijate8',
            'fijate9',
            'fijate10',
            'fijate11',
            'fijate12',
            'fijate13',
            'fijate14',
            'fijate15',
            'fijate16',
            'fijate17',
            'fijate18',
            'fijate19',
            'fijate20',
            'fijate21',
            'fijate22',
            'fijate23',
            'fijate24',
            'fijate25',
            'fijate26',
            'fijate27',
            'fijate28',
            'fijate29',
            'fijate30',
            'fijate31',

            /*  FIN FIJA  */

            /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
            /*  INICIO LINEA NUEVA */

            'l1',
            'l2',
            'l3',
            'l4',
            'l5',
            'l6',
            'l7',
            'l8',
            'l9',
            'l10',
            'l11',
            'l12',
            'l13',
            'l14',
            'l15',
            'l16',
            'l17',
            'l18',
            'l19',
            'l20',
            'l21',
            'l22',
            'l23',
            'l24',
            'l25',
            'l26',
            'l27',
            'l28',
            'l29',
            'l30',
            'l31',

            /*  FIN LINEA NUEVA */

            /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */
            /*  INICIO PHOENIX */

            'ph1',
            'ph2',
            'ph3',
            'ph4',
            'ph5',
            'ph6',
            'ph7',
            'ph8',
            'ph9',
            'ph10',
            'ph11',
            'ph12',
            'ph13',
            'ph14',
            'ph15',
            'ph16',
            'ph17',
            'ph18',
            'ph19',
            'ph20',
            'ph21',
            'ph22',
            'ph23',
            'ph24',
            'ph25',
            'ph26',
            'ph27',
            'ph28',
            'ph29',
            'ph30',
            'ph31',

            /*  FIN PHOENIX */

            /* INICIO COMUNIDAD EMPRESARIAL */

            'ce1',
            'ce2',
            'ce3',
            'ce4',
            'ce5',
            'ce6',
            'ce7',
            'ce8',
            'ce9',
            'ce10',
            'ce11',
            'ce12',
            'ce13',
            'ce14',
            'ce15',
            'ce16',
            'ce17',
            'ce18',
            'ce19',
            'ce20',
            'ce21',
            'ce22',
            'ce23',
            'ce24',
            'ce25',
            'ce26',
            'ce27',
            'ce28',
            'ce29',
            'ce30',
            'ce31',

            /* FIN COMUNIDAD EMPRESARIAL */

            /* INICIO TENTEN PORTABILIDADL */

            'tenporta1',
            'tenporta2',
            'tenporta3',
            'tenporta4',
            'tenporta5',
            'tenporta6',
            'tenporta7',
            'tenporta8',
            'tenporta9',
            'tenporta10',
            'tenporta11',
            'tenporta12',
            'tenporta13',
            'tenporta14',
            'tenporta15',
            'tenporta16',
            'tenporta17',
            'tenporta18',
            'tenporta19',
            'tenporta20',
            'tenporta21',
            'tenporta22',
            'tenporta23',
            'tenporta24',
            'tenporta25',
            'tenporta26',
            'tenporta27',
            'tenporta28',
            'tenporta29',
            'tenporta30',
            'tenporta31',

            /* FIN TENTEN PORTABILIDADL */

            /* INICIO TENTEN MIGRACION */

            'tenmigra1',
            'tenmigra2',
            'tenmigra3',
            'tenmigra4',
            'tenmigra5',
            'tenmigra6',
            'tenmigra7',
            'tenmigra8',
            'tenmigra9',
            'tenmigra10',
            'tenmigra11',
            'tenmigra12',
            'tenmigra13',
            'tenmigra14',
            'tenmigra15',
            'tenmigra16',
            'tenmigra17',
            'tenmigra18',
            'tenmigra19',
            'tenmigra20',
            'tenmigra21',
            'tenmigra22',
            'tenmigra23',
            'tenmigra24',
            'tenmigra25',
            'tenmigra26',
            'tenmigra27',
            'tenmigra28',
            'tenmigra29',
            'tenmigra30',
            'tenmigra31',

            /* FIN TENTEN MIGRACION */

            /* INICIO TENTEN PREPOS */

            'tenprepo1',
            'tenprepo2',
            'tenprepo3',
            'tenprepo4',
            'tenprepo5',
            'tenprepo6',
            'tenprepo7',
            'tenprepo8',
            'tenprepo9',
            'tenprepo10',
            'tenprepo11',
            'tenprepo12',
            'tenprepo13',
            'tenprepo14',
            'tenprepo15',
            'tenprepo16',
            'tenprepo17',
            'tenprepo18',
            'tenprepo19',
            'tenprepo20',
            'tenprepo21',
            'tenprepo22',
            'tenprepo23',
            'tenprepo24',
            'tenprepo25',
            'tenprepo26',
            'tenprepo27',
            'tenprepo28',
            'tenprepo29',
            'tenprepo30',
            'tenprepo31',

            /* FIN TENTEN PREPOS */

            /* INICIO LINEARESCATES */
            'linearescate1',
            'linearescate2',
            'linearescate3',
            'linearescate4',
            'linearescate5',
            'linearescate6',
            'linearescate7',
            'linearescate8',
            'linearescate9',
            'linearescate10',
            'linearescate11',
            'linearescate12',
            'linearescate13',
            'linearescate14',
            'linearescate15',
            'linearescate16',
            'linearescate17',
            'linearescate18',
            'linearescate19',
            'linearescate20',
            'linearescate21',
            'linearescate22',
            'linearescate23',
            'linearescate24',
            'linearescate25',
            'linearescate26',
            'linearescate27',
            'linearescate28',
            'linearescate29',
            'linearescate30',
            'linearescate31',
            /* FIN LINEARESCATES */

            /* INICIO SERVICIO_CLIENTE  */
            'serviciocliente1',
            'serviciocliente2',
            'serviciocliente3',
            'serviciocliente4',
            'serviciocliente5',
            'serviciocliente6',
            'serviciocliente7',
            'serviciocliente8',
            'serviciocliente9',
            'serviciocliente10',
            'serviciocliente11',
            'serviciocliente12',
            'serviciocliente13',
            'serviciocliente14',
            'serviciocliente15',
            'serviciocliente16',
            'serviciocliente17',
            'serviciocliente18',
            'serviciocliente19',
            'serviciocliente20',
            'serviciocliente21',
            'serviciocliente22',
            'serviciocliente23',
            'serviciocliente24',
            'serviciocliente25',
            'serviciocliente26',
            'serviciocliente27',
            'serviciocliente28',
            'serviciocliente29',
            'serviciocliente30',
            'serviciocliente31',
            /* FIN SERVICIO_CLIENTE  */
        ));
    }
}
