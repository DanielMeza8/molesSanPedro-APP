<?php

namespace App\Http\Controllers;

use App\Models\LinkProducto;
use App\Models\Producto;
use Illuminate\Http\Request;

class RecetasController extends Controller
{
    // public function index (){
    //     $datos = array();
    //     $datos[0] = "./public/img/bote.png"."||"."Cupra Leon <br>$528.900"."||"."<ul>
    //     <li>Motor: 4 cilindros turbo de 2.0 litros<br></li>
    //     <li>Potencia máxima: 290 hp @ 5,900 rpm<br></li>
    //     <li>Par máximo: 258 lb-pie @ 1,700 rpm<br></li>
    //     <li>Transmisión: Automática de doble embrague de 6 vels.<br></li>
    //     <li>Tracción: Delantera<br></li>
    //     <li>Frenos: Disco / Disco<br></li>
    //     <li>Peso: 1,421 kg<br></li>
    //     <li>Velocidad máxima': 250 km/h<br></li>
    //     <li>Aceleración de 0 a 100 km/h': 5.6 s<br></li>
    //     <li>Suspensión delantera: Independiente tipo McPherson<br></li>
    //     <li>Suspensión trasera: Independiente multibrazo<br></li>
    //     <li>Longitud: 4,281 mm<br></li>
    //     <li>Cajuela: 380 litros<br></li>
    //     <li>Consumo en ciudad: 11.1 km/l<br></li>
    //     <li>Emisiones de CO2': 151 g/km<br></li>
    //     <li>Capacidad del tanque: 50 litros</li></ul>";
    //     $datos[1] = "./img/jimmy.jpeg"."||"."Susuki Jimmy <br>$439.990"."||"."<ul>
    //     <li>Motor: 4 cilindros de 1.5 litros<br></li>
    //     <li>Potencia: 102 hp @ 6,000 rpm<br></li>
    //     <li>Par: 96 lb-pie @ 4,000 rpm<br></li>
    //     <li>Transmisión: Manual de 5 vels. + caja reductora<br></li>
    //     <li>Tracción: Integral conectable<br></li>
    //     <li>Frenos: Disco / tambor<br></li>
    //     <li>Peso: 1,165 kg<br></li>
    //     <li>Velocidad máxima: 145 km/h<br></li>
    //     <li>Aceleración de 0 a 100 km/h: 14.3 s<br></li>
    //     <li>Suspensión delantera: Eje rígido<br></li>
    //     <li>Suspensión trasera: Eje rígido<br></li>
    //     <li>Longitud: 3,480 mm<br></li>
    //     <li>Cajuela: 85 litros<br></li>
    //     <li>Consumo en ciudad: 12.4 km/l<br></li>
    //     <li>Capacidad del tanque: 40 litros</li></ul>";
    //     $datos[2] = "./img/mgGT.jpg"."||"."MG GT Alpha <br>$464.900"."||"."<ul>
    //     <li>Motor: 1.5 litros turbo (4 cil.)<br></li>
    //     <li>Potencia: 160 hp @ 5,600 RPM<br></li>
    //     <li>Par: 185 lb-pie @ 1,750 - 4,000 RPM<br></li>
    //     <li>Transmisión: Automática doble embrague de 7 cambios<br></li>
    //     <li>Tracción: Delantera<br></li>
    //     <li>Frenos: Disco / disco<br></li>
    //     <li>Suspensión delantera: Independiente<br></li>
    //     <li>Suspensión trasera: Barra de torsión<br></li>
    //     <li>Longitud: 4,675 mm<br></li>
    //     <li>Cajuela: 470 litros<br></li>
    //     <li>Consumo en ciudad: 15.6 km/l</li></ul>";
    //     $datos[3] = "./img/pegaut208.webp"."||"."Pegaut 208 GT <br>$484.000"."||"."<ul>
    //     <li>Potencia: 100 hp @5,500 rpm<br></li>
    //     <li>Torque: 205 NM @1,750 rpm<br></li>
    //     <li>Cilindraje (cc): 1,199 (3 cilindros)<br></li>
    //     <li>Velocidad Máxima: 187 km/h<br></li>
    //     <li>Aceleración 0 a 100km: 11.2s<br></li>
    //     <li>Tipo de combustible: Gasolina<br></li>
    //     <li>Tracción: Delantera<br></li>
    //     <li>Dirección: Asistencia eléctrica</li>
    //     <li>Suspensión Del / Trasera: Pseudo MacPherson / Barra de torsión<br></li>
    //     <li>Transmisión: Manual de 6 velocidades</li>
    //     </ul>";
    //     $datos[4] = "./img/polo.jpg"."||"."Wolksvagen Polo <br>$368.986"."||"."<ul>
    //     <li>Motor 1.6 L 105 Hp / 153 Nm<br></li>
    //     <li>Techo y carcasas de espejos exteriores pintados en color negro<br></li>
    //     <li>Rines de aluminio de 15” en color negro<br></li>
    //     <li>Sensor de lluvia con regulación automática de los limpiadores<br></li>
    //     <li>Sensores de estacionamiento traseros<br></li>
    //     <li>Espejo interior retrovisor antideslumbrante automático<br></li>
    //     <li>Renovado en todos sus aspectos ideal para impactar</li></ul>";
    //     $datos[5] = "./img/rangeRoverSport.jpg"."||"."Range Rover Sport <br>$2.203.987"."||"."<ul>
    //     <li>Longitud: 4,94 metros<br></li>
    //     <li> Velocidad máxima': 209 km/h<br></li>
    //     <li> Anchura: 2,20 metros<br></li>
    //     <li> Altura: 1,82 metros<br></li>
    //     <li> Distancia entre ejes: 2,99 metros<br></li>
    //     <li> Peso: 2.390 - 2.810 kilos<br></li>
    //     <li> Maletero: 657 / 1.991 litros<br></li>
    //     <li> Motor: Gasolina V8 de 4.4 litros biturbo de 530 CV (P530)<br></li>
    //     <li> Cambio: Automático de 8 velocidades y tracción total</li></ul>
    //     ";
    //     $datos[6] = "./img/seatleon.jpg"."||"."Seat Leon <br>$482.900"."||"."<ul>
    //     <li>Velocidad máxima: 221 km/h<br></li>
    //     <li>Aceleración: 0-100 km/h	8,4 s<br></li>
    //     <li>Consumo (urbano/extraurbano/mixto): 5,6 l/100 km<br></li>
    //     <li>Largo/Ancho/Alto: 4.368 / 1.800 / 1.456 mm<br></li>
    //     <li>Peso	1.361 kg<br></li>
    //     <li>Carga máxima: 1.890 kg<br></li>
    //     <li>Depósito: 50 litros<br></li>
    //     <li>Maletero max: 1.301 litros<br></li>
    //     <li>Plazas: 5<br></li>
    //     <li>Número de cilindros: 4<br></li>
    //     <li>Tipo de motor: Híbrido<br></li>
    //     <li>Combustible: Gasolina<br></li>
    //     <li>Cilindrada: 1.498 cc<br></li>
    //     <li>Potencia combustión: 150 cv / 6.000 rpm</li></ul>";
    //     $datos[7] = "./img/yaris.webp"."||"."Toyota Yaris <br>$338.900"."||"."<ul>
    //     <li>Distancia libre al suelo: 135 (mm)<br></li>
    //     <li>Peso bruto: 1550 (kg)<br></li>
    //     <li>Capacidad del tanque: 42 L<br></li>
    //     <li>Tipo de combustible: Gasolina<br></li>
    //     <li>Motor: 1496 16V DOHC, 4cyl Dual VVT-i<br></li>
    //     <li>Potencia Hp: 106@6000<br></li>
    //     <li>Pasajeros: 5<br></li>
    //     <li>Llantas: 185/60 R15</li></ul>";
    //     $datos[8] = "./img/m2.jpg"."||"."BMW m2 <br>$1,380,000"."||"."<ul>
    //     <li>Combustible: Gasolina<br></li>
    //     <li>Cilindrada: 2979 cc<br></li>
    //     <li>Potencia: 410/7000 hp/rpm<br></li>
    //     <li>Torque: 343/2350-5230 lb·pie/rpm<br></li>
    //     <li>Cilindros: 6 en línea<br></li>
    //     <li>Válvulas: 24<br></li>
    //     <li>Alimentación: inyección directa turbo intercooler<br></li>
    //     <li>Aceleración : 0-100 km/h	4.4 s<br></li>
    //     <li>Motor - Tracción:	delantero - trasera<br></li>
    //     <li>Transmisión: manual 6 velocidades<br></li>
    //     <li>Frenos (Del. - Tras.): discos ventilados - discos ventilados</li></ul>
    //     ";

    //     return view('recetas.index', compact('datos'));
    // }
    public function index()
{
    $datos = [
        [
            'imagen' => asset('img/recetas/guajolote.webp'),
            'titulo' => 'Mole con Guajolote Tradicional <br>Tiempo de preparación: 60 min',
            'descripcion' => 'Ingredientes: <br>
                <ul>
                <li>2 piernas de pavo<br></li>
                <li>2 chiles anchos<br></li>
                <li>3 chiles mulatos<br></li>
                <li>1 chile pasilla.<br></li>
                <li>15 gramos de pasita<br></li>
                <li>15 gramos de almendra, pelada<br></li>
                <li>15 gramos de nuez pecana<br></li>
                <li>1 ciruela pasa<br></li>
                <li>10 gramos de ajonjolí<br></li>
                <li>1 canela<br></li>
                <li>1 clavo de olor<br></li>
                <li>1 pimienta gorda<br></li>
                <li>2 jitomates<br></li>
                <li>1/4 cebollas<br></li>
                <li>1/2 tortillas<br></li>
                <li>1/2 bolillos</li>
                <li>60 gramos de manteca</li>
                <li>1/4 piloncillos</li>
                <li>30 gramos de sal</li>
                <li>1 hierbas de olor</li>
                <li>2 litros de agua</li>
                </ul>
            ',
            'procedimiento' => 'Preparacion: <br>
                <p> 
                    Desvenar los chiles, asarlos, freírlos. y colocarlos en agua caliente para ablandarlos. Reservar.<br>
                    Asar los tomates, cebolla, ajo, ajonjolí. nuez, almendra, canela, clavo, pimienta, ciruela pasa, pasa. Reservar en un tazón.
                </p>
            '

        ],
        [
            'imagen' => asset('img/recetas/hojaldras.webp'),
            'titulo' => 'Hojaldras de Pollo <br>Tiempo de preparación: 25 min',
            'descripcion' => 'Ingredientes: <br>
                <ul>
                    <li>4 tazas de harina, para la masa<br></li>
                    <li>1/2 tazas de azúcar, para la masa<br></li>
                    <li>1 sobre de levadura, 11 g, para la masa<br></li>
                    <li>2 huevos, para la masa<br></li>
                    <li>1 pizca de sal, para la masa<br></li>
                    <li>120 gramos de mantequilla, para la masa<br></li>
                    <li>Peso: 1,165 kg<br></li>
                    <li>150 gramos de mantequilla, para el empastado, a temperatura ambiente<br></li>
                    <li>85 gramos de harina, para el empastado<br></li>
                    <li>300 gramos de mole, en pasta<br></li>
                    <li>4 tazas de caldo de pollo, para el mole<br></li>
                    <li>1 tablilla de chocolate de mesa, para el molem<br></li>
                    <li>4 tazas de pechuga de pollo, cocida y deshebrada<br></li>
                    <li>suficiente de leche y mantequilla, para la masa<br></li>
                </ul>
            ',
            'procedimiento' => 'Preparacion: <br>
                <p> En un bowl de batidora mezcla la harina, el azúcar, la levadura, los huevos, la sal, la mantequilla, con ayuda del aditamento de gancho bate a velocidad media agregando poco a poco la leche, hasta tener una masa homogénea y suave. Coloca en un bowl previamente engrasado y cubre con un paño húmedo o película plástica y deja fermentar por 20 minutos bien hasta que duplique su volumen.
                    <br>Para el empastado, en un bowl mezcla la mantequilla con la harina hasta tener una pasta homogénea. Reserva.
                </p>
            '
        ],
        [
            'imagen' => asset('img/recetas/milanesa.webp'),
            'titulo' => 'Milanesa de pollo con mole <br>Tiempo de preparación: 40 min',
            'descripcion' => 'Ingredientes: <br>
            <ul>
                <li>suficiente de aceite, para el mole<br></li>
                <li>1/4 cebollas, para el mole<br></li>
                <li>1 diente de ajo, para el mole<br></li>
                <li>4 jitomates, para el mole<br></li>
                <li>1 manzana, para el mole<br></li>
                <li>suficiente de harina, para las milanesas<br></li>
                <li>2 huevos, para las milanesas<br></li>
                <li>suficiente de hojuelas de maíz, molidas, para las milanesas<br></li>
                <li>4 milanesas de pollo, para las milanesas<br></li>
                <li>suficiente de aceite, para las milanesas<br></li>
                <li>suficiente de ajonjolí garapiñado, para decorar<br></li>
                <li>suficiente de cebollín, para decorar<br></li>
            </ul>',
            'procedimiento' => '            
                Preparacion: <br> <p>Empanizar y freir las milanesas <br> Vertir el mole encima y decorar con el ajonjoli</p>
            '
        ],
        [
            'imagen' => asset('img/recetas/flautas.webp'),
            'titulo' => 'Flautas de pollo <br>Tiempo de preparación: 50 min',
            'descripcion' => 'Ingredientes: <br>
            <ul>
                <li>2 tazas de pechuga de pollo, (cocida y deshebrada) para las flautas<br></li>
                <li>12 tortillas de maíz, calientes y ovaladas, para flautas<br></li>
                <li>suficiente de aceite vegetal, para freír las flautas<br></li>
                <li>suficiente de crema, para acompañar<br></li>
                <li>suficiente de queso fresco, desmoronado, para acompañar<br></li>
                <li>suficiente de cebolla morada, en tiras para acompañar<br></li>
                <li>suficiente de cilantro fresco, para acompañar<br></li>
                <li>suficiente de aguacate, en láminas para acompañar<br></li>
            </ul>',
            'procedimiento' => '            
                Preparacion: <br> <p>Envolver el pollo en la tortilla y freir las milanesas <br> Vertir el mole encima y decorar con el ajonjoli</p>
            '
        ],
        [
            'imagen' => asset('img/recetas/oxaqueno.webp'),
            'titulo' => 'Flautas de pollo <br>Tiempo de preparación: 95 min',
            'descripcion' => 'Ingredientes: <br>
            <ul>
                <li>suficiente de hoja de plátano, cortada en cuadros de 20x15 cm<br></li>
                <li>250 gramos de manteca de cerdo, para la masa<br></li>
                <li>1 kilo de masa de maíz, para la masa<br></li>
                <li>1 cucharada de sal, para la masar<br></li>
                <li>2 cucharadas de polvo para hornear, para la masa<br></li>
                <li>suficiente de caldo de pollo, para la masa<br></li>
                <li>1 taza de mole<br></li>
                <li>2 tazas de pollo, cocido y deshebrado<br></li>
            </ul>',
            'procedimiento' => '            
                Preparacion: <br> <p>En un comal a fuego medio asa las hojas de plátano hasta que estén suaves y sean flexibles. Reserva. Corta en cuadrados. <br> En un bowl, bate la manteca de cerdo alrededor de 5 minutos o hasta que se suavice por completo. Agrega la masa poco a poco sin dejar de batir hasta integrar. Añade la sal, el polvo para hornear y el caldo, continúa batiendo hasta tener una consistencia homogénea y una masa semi espesa.
                </p>
            '
        ],
        [
            'imagen' => asset('img/recetas/romeros.jfif'),
            'titulo' => 'Romeritos <br>Tiempo de preparación: 90 min',
            'descripcion' => 'Ingredientes: <br>
            <ul>
                <li>100 gramos de camarones secos<br></li>
                <li>500 gramos de papas, cocidas y cortadas en cubos<br></li>
                <li>Sal al gusto<br></li>
                <li>1 kilo de romeritos, lavados y escurridos<br></li>
                <li>1 pizca de bicarbonato<br></li>
                <li>1 taza de pasta para mole negro<br></li>
                <li>1 cucharada de aceite vegetal<br></li>
                <li>250 gramos de nopales precocidos, cortados en tiritas<br></li>
            </ul>',
            'procedimiento' => '            
                Preparacion: <br> <p>Remoja los camarones en agua fría, hasta que estén suaves. Pela los camarones y reserva el agua en que se remojaron después de colarla. <br> Cuece las papas en agua hirviendo con sal, hasta que estén tan suaves que puedas picarlas fácilmente con un tenedor, aproximadamente 25 minutos. Deja enfriar, pela y corta en cubos. Reserva.
                <br>Aparte, cuece los rometiros en agua hirviendo con sal y una pizca de bicarbonato durante 5 minutos. Escurre bien. <br>Calienta el aceite en una cazuela de barro a fuego moderado, agrega el mole y fríe durante unos minutos, moviendo con una cuchara de madera para evitar que se corte. Agrega 3 tazas del agua en que se remojaron los camarones y mezcla bien; deja que hierva. Añade los rometiros y los camarones enteros. (Si el mole queda demasiado espeso, agrega más agua de camarón hasta alcanzar la consistencia deseada).
                <br>Por último, incorpora las papas y los nopales. Cocina hasta que todo se haya calentado y sazonado.
                </p>
            '
        ],
        // [
        //     'imagen' => asset('img/recetas/romeros.jfif'),
        //     'titulo' => 'Romerosjsxknas <br>Tiempo de preparación: 90 min',
        //     'descripcion' => 'Ingredientes: <br>
        //     <ul>
        //         <li>100 gramos de camarones secos<br></li>
        //         <li>500 gramos de papas, cocidas y cortadas en cubos<br></li>
        //         <li>Sal al gusto<br></li>
        //         <li>1 kilo de romeritos, lavados y escurridos<br></li>
        //         <li>1 pizca de bicarbonato<br></li>
        //         <li>1 taza de pasta para mole negro<br></li>
        //         <li>1 cucharada de aceite vegetal<br></li>
        //         <li>250 gramos de nopales precocidos, cortados en tiritas<br></li>
        //     </ul>',
        //     'procedimiento' => '            
        //         Preparacion: <br> <p>Remoja los camarones en agua fría, hasta que estén suaves. Pela los camarones y reserva el agua en que se remojaron después de colarla. <br> Cuece las papas en agua hirviendo con sal, hasta que estén tan suaves que puedas picarlas fácilmente con un tenedor, aproximadamente 25 minutos. Deja enfriar, pela y corta en cubos. Reserva.
        //         <br>Aparte, cuece los rometiros en agua hirviendo con sal y una pizca de bicarbonato durante 5 minutos. Escurre bien. <br>Calienta el aceite en una cazuela de barro a fuego moderado, agrega el mole y fríe durante unos minutos, moviendo con una cuchara de madera para evitar que se corte. Agrega 3 tazas del agua en que se remojaron los camarones y mezcla bien; deja que hierva. Añade los rometiros y los camarones enteros. (Si el mole queda demasiado espeso, agrega más agua de camarón hasta alcanzar la consistencia deseada).
        //         <br>Por último, incorpora las papas y los nopales. Cocina hasta que todo se haya calentado y sazonado.
        //         </p>
        //     '
        // ],
        // [
        //     'imagen' => asset('img/recetas/lugares.png'),
        //     'titulo' => 'Lugares donde nos puedes encontrar <br>',
        //     'descripcion' => 'Nos encontramos en los mejores supermercados <br>
        //     <ul>
        //     </ul>',
        //     'procedimiento' => '            
        //     '
        // ],
        // Agrega los demás autos siguiendo el mismo formato
    ];

    return view('recetas.index', compact('datos'));
}

    public function productos(){
        
        // $products = Producto::with('links')->get();
        // $products = LinkProducto::all();
        $products = LinkProducto::select('empresa', 'producto', 'descripcion', 'link', 'imegen')
        ->get()
        ->groupBy('producto');
        return view('nav.productos', compact('products'));
    }

}
