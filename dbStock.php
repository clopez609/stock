  <?php

    class Gateway
    {
        protected $connection = null;

        public function __construct()
        {
            $this->connection = new PDO("mysql:host=localhost; dbname=stock", 'root', '');
        }
        
        // Productos 
        public function loadAll($table)
        {
            $sql = 'SELECT * FROM productos';
            $rows = $this->connection->query($sql);

            return $rows;
        }

        public function loadById($id)
        {
            $sql = 'SELECT * FROM productos WHERE id_producto = ' . (int) $id;
            $result = $this->connection->query($sql);

            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Presentaciones
        public function loadAllStock($id)
        {
            $sql = 'SELECT ps.Descripcion, ps.StockActual FROM presentaciones as ps INNER JOIN productos as p ON ps.ID_Producto = p.ID_Producto WHERE ps.id_producto = ' . (int) $id;
            $result = $this->connection->query($sql);
            
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Auditoria
        public function addReg($id)
        {
            date_default_timezone_set('America/Mexico_city');
 
            $sql = "INSERT INTO auditoria (id_producto, fecha) VALUES ('$id', now() )";
            $respuesta = $this->connection->query($sql);

            if ($respuesta == TRUE) {
                echo "Nuevo Registro Creado!";
            } else {
                echo "Error: " . $sql;
            }
        }
    }

  ?>