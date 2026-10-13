<?php
class Producto {
    public $nombre;
    public $precio;
    public $stock;

    public function __construct($nombre, $precio, $stock) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function agregarStock($cantidad) {
        if ($cantidad > 0) {
            $this->stock += $cantidad;
        }
    }

    public function obtenerEstadoStock() {
        if ($this->stock > 10) {
            return '<span class="badge stock-alto">Disponible (' . $this->stock . ')</span>';
        } else {
            return '<span class="badge stock-bajo">Stock Bajo (' . $this->stock . ')</span>';
        }
    }
}

$producto1 = new Producto("Laptop HP 15.6 pulgadas", 12500.00, 5);
$producto2 = new Producto("Mouse Inalambrico Logitech", 450.50, 25);
$producto3 = new Producto("Teclado Mecanico RGB", 1200.00, 8);

$producto1->agregarStock(3);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestion de Inventario</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin-top: 0;
            color: #34495e;
            font-size: 1.2rem;
        }
        .price {
            font-size: 1.3rem;
            color: #27ae60;
            font-weight: bold;
            margin: 10px 0;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.85rem;
            font-weight: bold;
        }
        .stock-alto {
            background-color: #e8f8f5;
            color: #1abc9c;
        }
        .stock-bajo {
            background-color: #fdebd0;
            color: #d35400;
        }
        .log-box {
            margin-top: 40px;
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px 20px;
            border-radius: 8px;
            font-family: monospace;
        }
    </style>
</head>
<body>

<div class="container">
    <h1> Sistema de Gestion de Inventario (POO)</h1>

    <div class="grid">
        <!-- Producto 1 -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto1->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto1->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto1->obtenerEstadoStock(); ?></p>
        </div>

        <!-- Producto 2 -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto2->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto2->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto2->obtenerEstadoStock(); ?></p>
        </div>

        <!-- Producto 3 -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto3->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto3->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto3->obtenerEstadoStock(); ?></p>
        </div>
    </div>

    <div class="log-box">
        <strong>[Log del Sistema]:</strong> Se aplico el metodo <code>agregarStock(3)</code> al producto <em><?php echo $producto1->nombre; ?></em> de manera dinamica.
    </div>
</div>

</body>
</html>