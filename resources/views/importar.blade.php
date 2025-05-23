@extends('layout/plantilla3')

@section('contenido')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col mt-4">
                {{-- <h1>Datos</h1> --}}
                
                @if (isset($codigos))

                    <h3 class="mt-4 ">Datos importados</h3>

                    <div class="alert alert-info mt-4" role="alert">
                        Total de códigos válidos: <strong>{{ $codigos->filter(fn($fila) => $fila['fila5'] || $fila['oc'] || $fila['fila1'])->count() }}</strong>
                    </div>
                    
                    <button type="button" class="btn btn-outline-primary" onclick="exportarTablaAPowerPoint()">Crear archivo de codigos de barras</button>
                    <div class="d-flex align-content-center flex-wrap mt-4">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" border="1" id="datos">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>CEDIS</th>
                                        <th>OC</th>
                                        <th>UPC</th>
                                        {{-- <th>Numero de cajas</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tablaDatos">
                                    @foreach ($codigos as $fila)
                                        @if ($fila['fila5'] || $fila['oc'] || $fila['fila1'])
                                            <tr>
                                                <td>
                                                    <svg class="barcode" data-code="{{$fila['contador'] - 1}}"></svg>
                                                </td>
                                                @if ($fila['fila5'])
                                                <td>
                                                    <svg class="barcode" data-code="{{ $fila['fila5'] }}"></svg>
                                                </td>
                                                @endif
                                                @if ($fila['oc'])
                                                    <td>
                                                        <svg class="barcode" data-code="{{ $fila['oc'] }}"></svg>
                                                    </td>
                                                @endif
                                                @if ($fila['fila1'])
                                                    <td>
                                                        <svg class="barcode" data-code="{{ $fila['fila1'] }}"></svg>
                                                    </td>
                                                @endif
                                                {{-- @if ($fila['cajas'])
                                                    <td>
                                                        <svg class="barcode" data-code="{{ $fila['cajas'] }}"></svg>
                                                    </td>
                                                @endif --}}
                                                
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const barcodes = document.querySelectorAll("svg.barcode");
    // console.log("SVG encontrados:", barcodes.length); // ← Agrega esto

    barcodes.forEach((svg) => {
        const code = svg.getAttribute("data-code");
        // console.log("Generando barcode para:", code);
        JsBarcode(svg, code, {
            format: "CODE39",
            lineColor: "#000",
            width: 1.8,
            height: 39,
            displayValue: true
            });
        });
    });
</script>

<script>
    function exportarTablaAPowerPoint() {
        const pptx = new PptxGenJS();
    
        pptx.defineLayout({ name: 'VERTICAL', width: 8.5, height: 11 });
        pptx.layout = 'VERTICAL';
    
        const tabla = document.getElementById("datos");
        const filas = tabla.querySelectorAll("tbody tr");
        const promises = [];
    
        let etiquetaIndex = 0;
        let slide = pptx.addSlide();
    
        filas.forEach((fila, filaIndex) => {
            const col = etiquetaIndex % 2;
            const row = Math.floor(etiquetaIndex / 2) % 3;
    
            const x = col * 4.25 + 0.25; // posición horizontal
            const y = row * 3.5 + 0.25;  // posición vertical
    
            // Recuadro
            slide.addShape(pptx.ShapeType.rect, {
                x, y, w: 4, h: 3.2,
                line: { color: '000000' },
                fill: { color: 'FFFFFF' }
            });
    
            const celdas = fila.querySelectorAll("td");
            const currentSlide = slide;
    
            let imageY = y + 0.3;
    
            const nombresColumnas = ["CAJA", "CEDIS", "OC", "UPC"];

            celdas.forEach((celda, i) => {
                const svg = celda.querySelector("svg.barcode");

                if (svg) {
                    const nombreColumna = nombresColumnas[i] || `Columna ${i+1}`;
                    const svgData = new XMLSerializer().serializeToString(svg);
                    const svgBlob = new Blob([svgData], { type: "image/svg+xml;charset=utf-8" });
                    const url = URL.createObjectURL(svgBlob);

                    const promise = new Promise((resolve, reject) => {
                        const img = new Image();
                        img.onload = async () => {
                            try {
                                await img.decode();
                                const canvas = document.createElement("canvas");
                                canvas.width = img.width;
                                canvas.height = img.height;
                                const ctx = canvas.getContext("2d");
                                ctx.drawImage(img, 0, 0);
                                const dataUrl = canvas.toDataURL("image/png");

                                // Agregar texto del nombre de la columna (alineado a la izquierda)
                                currentSlide.addText(`${nombreColumna}:`, {
                                    x: x + 0.25,
                                    y: imageY + 0.1,
                                    w: 1,
                                    h: 0.3,
                                    fontSize: 12,
                                    bold: true,
                                    color: "000000",
                                    align: "left"
                                });

                                // Agregar imagen del código de barras a la derecha del nombre
                                currentSlide.addImage({
                                    data: dataUrl,
                                    x: x + 1,
                                    y: imageY,
                                    w: 2.5,
                                    h: 0.6
                                });

                                imageY += 0.75; // espacio entre códigos
                                URL.revokeObjectURL(url);
                                resolve();
                            } catch (e) {
                                console.error("Error al procesar imagen SVG:", e);
                                reject(e);
                            }
                        };
                        img.onerror = () => reject("No se pudo cargar la imagen del código de barras");
                        img.src = url;
                    });

                    promises.push(promise);
                }
            });

            etiquetaIndex++;
            if (etiquetaIndex % 6 === 0 && filaIndex < filas.length - 1) {
                slide = pptx.addSlide();
            }
        });
    
        Promise.all(promises)
            .then(() => {
                pptx.writeFile("Etiquetas_Wallmart.pptx");
            })
            .catch((err) => {
                console.error("Error al exportar:", err);
            });
        }
</script>
@endsection

