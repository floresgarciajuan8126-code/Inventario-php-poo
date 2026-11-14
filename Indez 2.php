<?php
/**
 * Actividad Formativa 3. Herencia en Programación Orientada a Objetos
 * Alumno: Juan Alberto Flores García
 * Matrícula: 105633
 */

// ==========================================
// 1. CLASE BASE (SUPERCLASE)
// ==========================================
class Producto {
    public $nombre;
    public $precio;
    public $stock;

    // Constructor de la clase base
    public function __construct($nombre, $precio, $stock) {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    // Método para incrementar el inventario
    public function agregarStock($cantidad) {
        if ($cantidad > 0) {
            $this->stock += $cantidad;
        }
    }

    // Método para obtener el estado visual del stock
    public function obtenerEstadoStock() {
        if ($this->stock > 10) {
            return '<span class="badge stock-alto">Disponible (' . $this->stock . ')</span>';
        } else {
            return '<span class="badge stock-bajo">Stock Bajo (' . $this->stock . ')</span>';
        }
    }
}

// ==========================================
// 2. CLASES DERIVADAS (SUBCLASES) QUE APLICAN HERENCIA
// ==========================================

// Subclase 1: ProductoElectronico hereda de Producto
class ProductoElectronico extends Producto {
    public $garantiaMeses; // Atributo exclusivo de la subclase

    public function __construct($nombre, $precio, $stock, $garantiaMeses) {
        // Reutilización del constructor de la clase base mediante parent::
        parent::__construct($nombre, $precio, $stock);
        $this->garantiaMeses = $garantiaMeses;
    }

    // Método exclusivo para productos electrónicos
    public function obtenerDetalleGarantia() {
        return "Garantía de fábrica: " . $this->garantiaMeses . " meses.";
    }
}

// Subclase 2: ProductoRopa hereda de Producto
class ProductoRopa extends Producto {
    public $talla;
    public $material; // Atributos exclusivos

    public function __construct($nombre, $precio, $stock, $talla, $material) {
        parent::__construct($nombre, $precio, $stock);
        $this->talla = $talla;
        $this->material = $material;
    }

    // Método exclusivo para ropa
    public function obtenerDetalleRopa() {
        return "Talla: " . $this->talla . " | Material: " . $this->material;
    }
}

// ==========================================
// 3. INSTANCIACIÓN DE OBJETOS
// ==========================================
$producto1 = new ProductoElectronico("Laptop HP 15.6 pulgadas", 12500.00, 5, 12);
$producto2 = new ProductoElectronico("Mouse Inalámbrico Logitech", 450.50, 25, 6);
$producto3 = new ProductoRopa("Camisa Casual de Algodón", 650.00, 15, "L", "100% Algodón");

// Probando el método heredado de la clase base
$producto1->agregarStock(3);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Inventario con Herencia (POO)</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
        .extra-info {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-top: 10px;
            border-top: 1px solid #ecf0f1;
            padding-top: 8px;
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
    <h1>Sistema de Gestión de Inventario (Aplicación de Herencia en POO)</h1>

    <div class="grid">
        <!-- Producto 1: Instancia de ProductoElectronico (Herencia) -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto1->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto1->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto1->obtenerEstadoStock(); ?></p>
            <div class="extra-info"><?php echo $producto1->obtenerDetalleGarantia(); ?></div>
        </div>

        <!-- Producto 2: Instancia de ProductoElectronico (Herencia) -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto2->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto2->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto2->obtenerEstadoStock(); ?></p>
            <div class="extra-info"><?php echo $producto2->obtenerDetalleGarantia(); ?></div>
        </div>

        <!-- Producto 3: Instancia de ProductoRopa (Herencia) -->
        <div class="card">
            <h3><?php echo htmlspecialchars($producto3->nombre); ?></h3>
            <div class="price">$<?php echo number_format($producto3->precio, 2); ?> MXN</div>
            <p>Estado: <?php echo $producto3->obtenerEstadoStock(); ?></p>
            <div class="extra-info"><?php echo $producto3->obtenerDetalleRopa(); ?></div>
        </div>
    </div>

    <div class="log-box">
        <strong>[Log del Sistema]:</strong> Se aplicó herencia creando las clases derivadas <code>ProductoElectronico</code> y <code>ProductoRopa</code> a partir de la clase base <code>Producto</code>. Se ejecutó el método heredado <code>agregarStock(3)</code> en <em><?php echo htmlspecialchars($producto1->nombre); ?></em>.
    </div>
</div>

</body>
</html>