<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Reserva;
use App\Dolar;
use App\libs\MercadoPago\MP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
//use MercadoPago\MP;
class HomeController extends Controller
{
  public function terminos_y_condiciones(){
    return view('politicas_y_condiciones');
  }
  public function enviar_formulario(Request $request){
    $nombre=$request->nombre;
    $correo=$request->correo;
    $telefono=$request->telefono;
    $mensaje=$request->mensaje;

    $name=$nombre;
    $title=$nombre.' Quiere Contactarse!';

     $messagepro=$name." a completado el formulario de contacto su correo electronico es ".$correo.
     ", y su telefono ".$telefono." y tiene el siguiente mensaje '".$mensaje."'.";

    Mail::to('handiolainfo@gmail.com')->send(new SendMailable($name,$title,$messagepro));

     return "Exito!";
  }
  public function get_reserva(Request $request){
    $id=$request->id;
    $reserva=Reserva::findOrFail($id);

    return response()->json($reserva);
  }
  public function GuardarCambios(Request $request){


    $fecha_desde=$request->fecha_desde;
    $fecha_hasta=$request->fecha_hasta;
    $cantidad_habitaciones=$request->cantidad_habitaciones;
    $cantidad_banos=$request->cantidad_banos;
    $costo_total=$request->costo_total;
    $direccion_alojamiento=$request->direccion_alojamiento;
    $hora_llave=$request->hora_llave;
    $fecha_llave=$request->fecha_llave;
    $direccion_llave=$request->direccion_llave;
    $reservante=$request->reservante;
    $numero_dias=$request->numero_dias;
    $reservante=$request->reservante;
    $id=$request->id;

    $title="Reserva Handiola del ".$fecha_desde. " al ".$fecha_hasta . " en ".$direccion_alojamiento;

    $mp = new MP ("APP_USR-6826639623857597-052419-9ed225fba7f746eca89c4535d08f832f-321582894");
    $preference_data = array (
    "items" => array (
        array (
            "title" => $title,
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => (float)$costo_total
        )
      ),
      "back_urls" => array(
        "success" => 'https://www.handiola.com/status_success?id='.$id,
        "failure" =>'https://www.handiola.com/',
        "pending" =>'https://www.handiola.com/'
      )
    );


   $preference = $mp->create_preference($preference_data);
    $reserva=Reserva::where('id',$id)->first();

    $reserva->cantidad_habitaciones=$cantidad_habitaciones;
    $reserva->cantidad_banos=$cantidad_banos;
    $reserva->fecha_reserva=date('Y-m-d');
    $reserva->fecha_desde=$fecha_desde;
    $reserva->fecha_hasta=$fecha_hasta;
    $reserva->numero_dias=$numero_dias;
    $reserva->costo_total=$costo_total;
    $reserva->reservante=$reservante;
    $reserva->direccion_alojamiento=$direccion_alojamiento;
    $reserva->hora_llave=$hora_llave;
    $reserva->fecha_llave=$fecha_llave;
    $reserva->direccion_llave=$direccion_llave;

    $reserva->estado='Pendiente';
    $reserva->mp_link=$preference['response']['init_point'];
    $reserva->mp_id=$preference['response']['id'];
    $reserva->save();


      $user=User::findOrFail($reserva->user_id);

      $name=$user->name;
      $title='Tu reserva ha sido actualizada por el administrador';
      $messagepro='Hemos actualizado tu reserva  Nº'.$reserva->no_reserva.'. Tu link de pago es '.$preference['response']['init_point']." Gracias por elegir Handiola .";

      Mail::to($user->email)->send(new SendMailable($name,$title,$messagepro));

  }
  public function save_reserva(Request $request){

    $fecha_desde=$request->fecha_desde;
    $fecha_hasta=$request->fecha_hasta;
    $cantidad_habitaciones=$request->cantidad_habitaciones;
    $cantidad_banos=$request->cantidad_banos;
    $costo_total=$request->costo_total;
    $direccion_alojamiento=$request->direccion_alojamiento;
    $hora_llave=$request->hora_llave;
    $fecha_llave=$request->fecha_llave;
    $direccion_llave=$request->direccion_llave;
    $reservante=$request->reservante;
    $numero_dias=$request->numero_dias;
    $reservante=$request->reservante;
    $user_id=auth()->user()->id;
    $title="Reserva Handiola del ".$fecha_desde. " al ".$fecha_hasta . " en ".$direccion_alojamiento;


    $lastreservaid=Reserva::where('user_id','!=',0)->orderBy('id', 'desc')->first();
    $no_reservaid=$lastreservaid->id+1;

    $mp = new MP ("APP_USR-6826639623857597-052419-9ed225fba7f746eca89c4535d08f832f-321582894");
    $preference_data = array (
    "items" => array (
        array (
            "title" => $title,
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => (float)$costo_total
        )
    ),
    "back_urls" => array(
      "success" => 'https://www.handiola.com/status_success?id='.$no_reservaid,
      "failure" =>'https://www.handiola.com/',
      "pending" =>'https://www.handiola.com/'
    )
);

$preference = $mp->create_preference($preference_data);
$lastreserva=Reserva::where('user_id','!=',0)->orderBy('no_reserva', 'desc')->first();
$no_reserva=$lastreserva->no_reserva+1;
    $reserva=new Reserva();
    $reserva->user_id=$user_id;
    $reserva->cantidad_habitaciones=$cantidad_habitaciones;
    $reserva->cantidad_banos=$cantidad_banos;
    $reserva->fecha_reserva=date('Y-m-d');
    $reserva->fecha_desde=$fecha_desde;
    $reserva->fecha_hasta=$fecha_hasta;
    $reserva->numero_dias=$numero_dias;
    $reserva->costo_total=$costo_total;
    $reserva->reservante=$reservante;
    $reserva->direccion_alojamiento=$direccion_alojamiento;
    $reserva->hora_llave=$hora_llave;
    $reserva->fecha_llave=$fecha_llave;
    $reserva->direccion_llave=$direccion_llave;
    $reserva->no_reserva=$no_reserva;
    $reserva->estado='Pendiente';
    $reserva->mp_link=$preference['response']['init_point'];
    $reserva->mp_id=$preference['response']['id'];
    $reserva->save();



    if($reserva->id>0){
      $user=User::findOrFail($user_id);

      $name=$user->name;
      $title='Tu reserva ha sido cargada con exito';
      $messagepro='Hemos guardado tu reserva con exito nos pondremos en contacto contigo a la brevedad. Tu link de pago es '
      .$preference['response']['init_point'].", Tu numero de reserva es: ".str_pad($reserva->no_reserva, 6, '0', STR_PAD_LEFT)." Gracias por elegir Handiola .";

      Mail::to($user->email)->send(new SendMailable($name,$title,$messagepro));

      $name=$user->name;
      $title='Tenes una nueva reserva aqui estan los datos: ';
      $messagepro='Nombre: '.$user->name.', Correo: '.$user->email.', Nº Reserva: '.$reserva->no_reserva;
      Mail::to('handiolainfo@gmail.com')->send(new SendMailable($name,$title,$messagepro));

       return $preference['response']['init_point'];
    }else{
        return 0;
    }

  }
  public function get_price(Request $request){
    $id=1;
    $dolar=Dolar::where('id',$id)->first();

    if($dolar->activo==0){
      $costo=$request->costo;
      $valor = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q=USD_ARS&compact=ultra&apiKey=4c4c1e7fd9831634bfee");
      $json=json_decode($valor,true);
      $valorUSD=$json['USD_ARS'];
        $costo=$costo*$valorUSD;
     return $costo;
   }else{
     $costo=$request->costo;
     $valorUSD=$dolar->valor;
       $costo=$costo*$valorUSD;
    return $costo;
   }
  }
  public function  setDolar(Request $request){
    $optionDolar=$request->optionDolar;
    $valor=$request->valorDolar;
    if($optionDolar=='dolarof'){
       $id=1;
        $dolar=Dolar::where('id',$id)->first();
        $dolar->activo=0;
        $dolar->save();
    }else{
      $id=1;
       $dolar=Dolar::where('id',$id)->first();
       $dolar->activo=1;
       $dolar->valor=$valor;
       $dolar->save();
    }
    return 0;
  }
  public function setStatus(Request $request){
    $id=$request->id;
    $estado=$request->estado;
    $reserva=Reserva::where('id',$id)->first();
    $reserva->estado=$estado;
    $reserva->save();
  }

  public function get_locations(Request $request){
    $input=$request->input;
     $url="https://maps.googleapis.com/maps/api/place/autocomplete/json?input=".urlencode($input)."&types=address&location=-34.6080333,-58.4483968&radius=15000&strictbounds&key=AIzaSyDbkfRCQbeJ5ydJOPMnqQuscHsSHRoxg7Q";
    $response=file_get_contents($url);
    $json=json_decode($response,true);

$locations=$json['status'];

       return $locations;
  }

  public function status_success(Request $request){
         $id=$request->id;
         $reserva=Reserva::where('id',$id)->first();

         $reserva->estado="Pago Confirmado";
         $reserva->save();

        $name='Handiola';
        $title='Tenes una nueva confirmación de pago: ';
        $messagepro='Nombre: '.$reserva->user->name.', Correo: '.$reserva->user->email.', Nº Reserva: '.$reserva->no_reserva.', Pago: '.$reserva->costo_total;
        Mail::to('handiolainfo@gmail.com')->send(new SendMailable($name,$title,$messagepro));

        $name=$reserva->user->name;
        $title='Tu pago ha sido confirmado: ';
        $messagepro=$reserva->user->name." tu pago de $".$reserva->costo_total." ha sido confirmado, gracias por confiar en nuestros servicios.";
        Mail::to($reserva->user->email)->send(new SendMailable($name,$title,$messagepro));

          return view('Home',compact('reserva'));
  }

   public function Reservas(){

      if (Auth::check()) {
        $user_id=auth()->user()->id;
        if(auth()->user()->administrador==1){
            $reservas=Reserva::All();
        }else{
        $reservas=Reserva::Where('user_id',$user_id)->get();
        }
        return view('Reservas',compact('reservas'));
      }else{
        return view('/');
      }

   }
   public function Reserva()
   {
      if(Auth::check()){
         return view('Reserva');
      }
      else{
        return view('/');
      }
     //return view('Reserva');
   }
   public function agregar_usuario(Request $request){

        $email=$request->email;
        $name=$request->nombre;
        $existingUser = User::where('email', $request->email)->first();
        if($existingUser){
          return 1;
        }else{
          $apellido=$request->apellido;
          $telefono_movil=$request->telefono_movil;
          $password=$request->password;
          $descripcion=$request->descripcion;
          $recaptcha_response=$request->recaptchaResponse;

          $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
          $recaptcha_secret = '6Lcu5ZoUAAAAAMrYCZslL4VFjZZ8MTziDfO4kTqy';


          $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
          $recaptcha = json_decode($recaptcha);

    //  email,dni,nombre,apellido,telefono_movil,domicilio,direccion,password,confirmpass,descripcion,recaptchaResponse

         if ($recaptcha->score >= 0.5) {
             $user= new User;
             $user->email=$email;
             $user->name=$name;
             $user->apellido=$apellido;
             $user->telefono_movil=$telefono_movil;
             $user->password=bcrypt($password);
             $user->descripcion=$descripcion;
             $user->save();

             $title='Bienvenido a Handiola';
             $messagepro='Te damos la bienvenida a Handiola, una experiencia diferente para el usuario.';

             Mail::to($email)->send(new SendMailable($name,$title,$messagepro));

         } else {

         }
         return response()->json($recaptcha);
        }


   }
   public function registro(){
       return view('Registro');
   }
      public function inicio(){
        if (Auth::check()) {

         return view('Home');
        }else{
        return view('Home');
         }
     }
     public function login(){
       if (Auth::check()) {

         $user_id=auth()->user()->id;
         if(auth()->user()->administrador==1){
             $reservas=Reserva::All();
         }else{
         $reservas=Reserva::Where('user_id',$user_id)->get();
         }

         return view('Reservas',compact('reservas'));
       }else{
           return view('Login');
       }
     }
     public function calcularReserva(){

     }
     public function contacto(){
         return view('contacto');
     }

     public function get_status(Request $request){
       //$mp = new MP ("CLIENT_ID", "CLIENT_SECRET");
       $id=57;
        $reserva=Reserva::Where('id',$id)->first();
      //  $transaccion = substr(preg_replace("/[^0-9]/", '', $reserva->mp_id),-12);
       $mp = new MP ("APP_USR-6826639623857597-052419-9ed225fba7f746eca89c4535d08f832f-321582894");
       $transaccion = substr(preg_replace("/[^0-9]/", '', $reserva->mp_id),-12);
                                                 ///checkout/preferences/:id
         $search_result = $mp -> get("/checkout/preferences/$reserva->mp_id");
           return $search_result;
     }

     public function set_telefono(Request $request){
      $id=$request->id;
      $telefono_movil=$request->telefono_movil;
      $user=User::where('id',$id)->first();
      $user->telefono_movil=$telefono_movil;
      $user->save();

      return response()->json($user);
     }

     public function mision()
     {
         return $this->inicio();
     }
     
     public function vision()
     {
         return $this->inicio();
     }
     
}
