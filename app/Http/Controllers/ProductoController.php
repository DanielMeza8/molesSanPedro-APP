<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        $products = Producto::all();
        // $products = Producto::with('categoria', 'user')->latest()->get();
        return view('productos.index', compact('categorias', 'products'));
    }
    public function welcome(){
        // $products = Producto::all();
        $datos = [
            [
                'imagen' => asset('img/banner.jpeg'),
                'titulo' => 'Conoce nuestros productos',
                'descripcion' => '<br>
                    <ul>
                    </ul>
                ',
                'procedimiento' => '
                '
            ],
            [
                'imagen' => asset('img/platoMole.png'),
                'titulo' => '<h4 class="mb-1 text-primary">El mole</h4><br>
                            <h1 class="display-5 mb-4">Un platillo mexicano</h1><br>
                            <p class="mb-4">
                                El mole es un platillo tradicional mexicano que se originó en la época prehispánica. Su nombre proviene de la palabra náhuatl molli o mulli, que significa salsa. 
                                Origen prehispánico
                                Los indígenas mezclaban chiles, semillas de calabaza, hierba santa y jitomate para crear una salsa. 
                                Se le servía a los grandes señores y se le ofrendaba a los dioses. 
                                Se acompañaba con carne de guajolote, pato, armadillo, iguana, xoloiscuincles, ranas. 
                            </p>',
                'descripcion' => '
                    <ul>
                    </ul>
                ',
                'procedimiento' => '
                '
            ],
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
            [
                    'imagen' => asset('img/recetas/lugares2.png'),
                    'titulo' => '<h3><strong>Lugares donde nos puedes encontrar</strong></h3> <br> <p>Nos encontramos en los mejores supermercados</p>',
                    'descripcion' => 'Nos encontramos en los mejores supermercados <br>
                    <ul>
                    </ul>',
                    'procedimiento' => '            
                    '    
            ],
            // Agrega los demás autos siguiendo el mismo formato
        ];
        $products = Producto::with('links')->get();
        return view('welcome', compact('products', 'datos'));
    }

    


    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:80',
            'descripcion' => 'required|string|max:500',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'categoria' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        // Producto::create([
        //     'categoria_id' => $request->categoria->id,
        //     'user_id' => Auth::id(),
        //     'nombre' => $request->nombre,
        //     'descripcion' => $request->descripcion,
        //     'cantidad' => $request->cantidad, 
        //     'precio' => $request->precio,
        //     'imagen' => $request->$imagenPath,
        // ]);


        // return redirect()->route('productos.index')->with('success', 'Producto creado con exito');

        $producto = new Producto();
        $producto->categoria_id = $request->categoria;
        $producto->user_id = Auth::id();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->imagen = $imagenPath;
        $producto->save();

        return to_route('productos.index')->with('success', 'Producto creado con exito');

    }

    public function guardar(Request $request){
        $item = new Categoria();
        $item->nombre = $request->nombre;
        $item->save();
        return to_route('categorias');
    }
}
